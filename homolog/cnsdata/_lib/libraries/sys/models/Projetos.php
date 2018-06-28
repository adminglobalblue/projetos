<?php 
if (!class_exists("Model")) include "Model.php";
if (!class_exists("Config")) include "Config.php";
	
class Projetos extends Model {
    public $table;
	public $_Config;

    public function __construct($sc) {
        parent::__construct($sc);
		
		$this->_Config = new Config($sc);
    }

	public function getById(int $id) {
        return $this->query("SELECT tb1.*, tb2.Code as ProjetoTipoCode FROM {$this->table} as tb1 INNER JOIN {$this->tables['Projetostipos']} as tb2 ON tb2.ID_ProjetoTipo = tb1.ID_TipoProjeto WHERE ID_projeto = '$id'");
	}
	
    public function getStatus ($ID_Projeto, $limit = 1) {
        $rs = $this->query("select a.CodeStatus as Code, Replace(
			(CASE
  				WHEN '{$this->language}' = 'pt_br' THEN b.Nom_Status
  				WHEN '{$this->language}' = 'es' THEN b.Nom_Status_es
  				WHEN '{$this->language}' = 'en_us' THEN b.Nom_Status_en
			END), '%s', IFNULL(a.Num_Analise, 0)) as StatusText, c.Nom_Nome as Usuario, DATE_FORMAT(a.Data, '%d/%c/%Y %H:%i:%s') as Data, a.Num_Analise as Num_Analise from tb_projetoanalisestatus a 
            INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus 
            LEFT JOIN tb_usuarios c ON c.ID_Usuario = a.ID_Usuario 
            WHERE ID_Projeto = '$ID_Projeto' 
            order by a.Data DESC
            ".($limit > 0 ? "LIMIT $limit" : ""));
        if (isset($rs[0])) {
			if ($limit == 1) {
				return $rs[0];
			} else {
				return $rs;
			}
		} else return false;        
    }

	public function getStatusByProtocolo ($ProtocoloHex, $limit = 1) {
        $rs = $this->query("select d.Num_Ativo as ProjNum_Ativo, a.CodeStatus as Code, Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) as StatusText, c.Nom_Nome as Usuario, DATE_FORMAT(a.Data, '%d/%c/%Y %H:%i:%s') as Data, IFNULL(a.Num_Analise, 1) as Num_Analise from tb_projetoanalisestatus a 
            INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus 
            LEFT JOIN {$this->tables["Usuarios"]} c ON c.ID_Usuario = a.ID_Usuario 
            INNER JOIN {$this->table} d ON a.ID_Projeto = d.ID_projeto 
            WHERE d.ProtocoloHex = '$ProtocoloHex' 
            order by a.Data DESC
            ".($limit > 0 ? "LIMIT $limit" : ""));
        if (isset($rs[0])) {
			if ($limit == 1) {
				return $rs[0];
			} else {
				return $rs;
			}
		} else return null;        
    }
	
	public function getExpiredProjects (int $days, array $status) {
		if ($status) {
			$statusList = implode("','", $status);
			return $this->query("SELECT
				ID_projeto,
				ID_TipoProjeto,
				ID_Empreendimento,
				ID_Operadora,
				ID_Prestadora, 
				Data_Criacao,
				ProtocoloHex,
				(select b.Code from tb_projetoanalisestatus a 
				INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus  
				LEFT JOIN tb_usuarios c ON c.ID_Usuario = a.ID_Usuario 
				WHERE a.ID_Projeto = tb_projetos.ID_projeto 
				order by a.Data Desc 
				LIMIT 1) as Num_Status,
				(select a.Data from tb_projetoanalisestatus a 
				INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus 
				LEFT JOIN tb_usuarios c ON c.ID_Usuario = a.ID_Usuario 
				WHERE a.ID_Projeto = tb_projetos.ID_projeto 
				order by a.Data Desc 
				LIMIT 1) as Data_Status,
			    tb_projetostipos.Nom_ProjetoTipo as Nom_ProjetoTipo
			FROM tb_projetos 
			INNER JOIN tb_projetostipos ON tb_projetos.ID_TipoProjeto = tb_projetostipos.ID_ProjetoTipo
			WHERE Data_Criacao < (NOW() - INTERVAL $days DAY) 
			HAVING Num_Status IN ('$statusList') AND Num_Ativo = 'S' 
			ORDER BY Data_Criacao DESC;");
		} else {
			return [];
		}
		/* 
			HAVING 
				Data_Status < (NOW() - INTERVAL $days DAY) AND 
				Num_Status IN ('$statusList') AND Num_Ativo = 'S'
		*/
	}
	
	public function getDataExpiracao($ID_Projeto) {
		$DataExpiracao = $this->_Config->getByKey("routine_chkProjetosValidade::ToleranceToExpire");
		$Projeto = $this->query("SELECT Data_Criacao FROM tb_projetos WHERE ID_projeto = '$ID_Projeto'");
		if ($Projeto) {
			return date("d/m/Y", strtotime("+$DataExpiracao days", strtotime($Projeto[0]["Data_Criacao"])));
		} return null;
	}
	
	public function updateStatus (int $ID_Projeto, string $statusCode, int $ID_Usuario, int $num_Analise) {
		return $this->query("INSERT INTO tb_projetoanalisestatus (ID_Projeto, CodeStatus, ID_Usuario, Data, Num_Analise) Values ('$ID_Projeto', '$statusCode', $ID_Usuario, '".date('Y-m-d H:i:s')."', '$num_Analise')");
	}
	
	public function getNumeroPrjeto(int $id, string $Tipo_OP) {
		$rs = $this->query("SELECT count(*) as count FROM tb_projetos 
			WHERE ('P' = '$Tipo_OP' AND ID_Prestadora = (SELECT ID_Prestadora FROM tb_projetos WHERE ID_projeto = '$id')) OR 
				('O' = '$Tipo_OP' AND ID_Operadora = (SELECT ID_Operadora FROM tb_projetos WHERE ID_projeto = '$id')) AND 
				Data_Criacao <= (SELECT Data_Criacao FROM tb_projetos WHERE ID_projeto = '$id') AND Num_Ativo = 'S'");
		if ($rs) {
			return str_pad($rs[0]["count"], 4, "0", STR_PAD_LEFT);
		} else return false;
	}
}