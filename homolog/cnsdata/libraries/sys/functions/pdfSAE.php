<?php
	// require 'functions.php';			Importar no sc
	// require '../dompdf/dompdf.php';	Importar no sc

	class pdfSAE {
		public $o_dataSAE;
		public $o_dataTec = [];
		public $maskTel = ["(##) #####-####", "(##) ####-####"];
		public $maskRG = ["#.###.###-#", "##.###.###-#", "###.###.###-#"];
		public $language;	
		public $session;
	
		public function __construct(){
			$this->session = new manageSession();
			$this->language = $this->session->get("language") ?: "pt_br";
		}
		
		public function getSQL ($type, $Num_SAE) {
			$sql = null;
			switch($type) {
				case("SAE"):
					$sql = "SELECT 
							(CASE
							  WHEN '".$this->language."' = 'pt_br' THEN b.Nom_SAE
							  WHEN '".$this->language."' = 'es' THEN b.Nom_SAE_es
							  WHEN '".$this->language."' = 'en_us' THEN b.Nom_SAE_en
							END) as Nom_SAE, 
							c.Nom_Empreendimento as Nom_Empreendimento, 
							d.Nom_Nome as Nom_Nome,
							e.Nom_Conjunto as Nom_Conjunto,
							f.Nom_Andar as Nom_Andar,
							g.Nom_Torre as Nom_Torre, 
							h.Nom_Operadoras as Nom_Operadoras,
							a.Tipo_Cliente as Tipo_Cliente,
							a.Nom_Responsavel1 as Nom_Responsavel1,
							a.Nom_Responsavel2 as Nom_Responsavel2,
							a.Nom_Responsavel3 as Nom_Responsavel3,
							a.Num_Telefone1 as Num_Telefone1,
							a.Num_Telefone2 as Num_Telefone2,
							a.Num_Telefone3 as Num_Telefone3,
							a.Num_Celular2 as Num_Celular2,
							a.Num_Celular3 as Num_Celular3,
							a.PontoDeEncontro as PontoDeEncontro, 
							a.InstalacaoAntena as InstalacaoAntena,
							a.Emergencial as Emergencial,
							DATE_FORMAT(CONCAT(a.Data_Inicio,' ', a.Hora_Inicio), '%d/%c/%Y %H:%i:%s') as Data_Inicio,
							DATE_FORMAT(CONCAT(a.Data_Fim,' ', a.Hora_Fim), '%d/%c/%Y %H:%i:%s') as Data_Fim,
							DATE_FORMAT(a.Data_Abertura, '%d/%c/%Y %H:%i:%s') as Data_Abertura,							
							a.Desc as Descricao,
							a.Num_Status as Num_Status,
							i.Nom_RazaoSocial as Nom_RazaoSocial,
							a.Num_SAE as Num_SAE,
							c.IMG_Logo as IMG_Logo,
                            CONCAT(c.End_Logradouro,', ',c.End_Numero) as End_Empreendimento
						FROM tb_sae a
						INNER JOIN tb_tipossae b ON b.ID = a.ID_TipoSAE
						INNER JOIN tb_empreendimentos c ON c.ID_Empreendimento = a.ID_Empreendimento
						LEFT JOIN tb_condominos d ON d.ID_Condomino = a.ID_Condomino
						LEFT JOIN tb_conjunto e ON e.ID = a.ID_Conjunto
						LEFT JOIN tb_andar f ON f.ID = e.ID_Andar
						LEFT JOIN tb_torre g ON g.ID =  f.ID_Torre
						LEFT JOIN tb_operadoras h ON h.ID_Operadoras =  a.ID_Operadora
						LEFT JOIN tb_prestadores i ON i.ID_Prestador = a.ID_Prestador
						WHERE a.Num_SAE = '$Num_SAE'";
				break;
				case("TecOpe"):
					$sql = "SELECT b.Foto as Foto, CONCAT(b.Nom_Tecnico, ' ', b.Nom_Sobrenome) as Nome_Completo, 
                        b.Num_Telefone1 as Num_Telefone, 
                        b.Num_RG as Num_RG, 
                        c.Nom_Operadoras as Empresa
					FROM tb_tecsae a 
					INNER JOIN tb_tecnicos b ON b.ID = a.ID_Tecnico AND b.Tipo_Tecnico = 'O'
					INNER JOIN tb_operadoras c ON c.ID_Operadoras = b.ID_OpePre
					WHERE a.Num_SAE = '$Num_SAE'";
				break;
				case("TecPre"):
                    $sql = "SELECT b.Foto as Foto, CONCAT(b.Nom_Tecnico, ' ', b.Nom_Sobrenome) as Nome_Completo, 
                        b.Num_Telefone1 as Num_Telefone, 
                        b.Num_RG as Num_RG, 
                        c.Nom_RazaoSocial as Empresa
					FROM tb_tecsae a 
					INNER JOIN tb_tecnicos b ON b.ID = a.ID_Tecnico AND b.Tipo_Tecnico = 'P'
					INNER JOIN tb_prestadores c ON c.ID_Prestador = b.ID_OpePre
					WHERE a.Num_SAE = '$Num_SAE'";
                break;
                case("TecGB"):
                    $sql = "SELECT b.IMG_Foto as Foto, b.Nom_Nome as Nome_Completo, 
                        b.Num_TelefoneCelular as Num_Telefone, 
                        b.Num_RG as Num_RG
                    FROM tb_saetecgb a 
                    INNER JOIN tb_usuarios b ON b.ID_Usuario = a.ID_Usuario
                    WHERE a.Num_SAE = '$Num_SAE'
					group by b.ID_Usuario";
                break;
			}
			
			return $sql;
		}
		
		public function processData($dataSAEToInclude, $dataTecOpeToInclude, $dataTecPreToInclude, $dataTecGBToInclude) {
			$this->o_dataSAE = $dataSAEToInclude;
			$this->o_dataTec = ['O' => $dataTecOpeToInclude,
                    'P' => $dataTecPreToInclude,
                    'GB' => $dataTecGBToInclude];
			$this->createListTec('O');
            $this->createListTec('P');
            $this->createListTec('GB');
		}
		
		public function createListTec ($type) {			
			$list = [];
			if(isset($this->o_dataTec[$type][0])) {
				foreach($this->o_dataTec[$type] as $row) {
                    if ($row["Foto"]) {
                        $resource = imagecreatefromstring($row["Foto"]);
                        $x = imagesx($resource);
                        $y = imagesy($resource);
                        $resolution =  $x / $y;
                        if ($resolution >= 1) {
                            $nx = 50;
                            $ny = $nx / $resolution;
                        } else {
                            $ny = 50;
                            $nx = $ny * $resolution;
                        }
                        if ($ny > 50) {
                            $ny = 50;
                            $nx = $ny * $resolution;
                        }
                        if ($nx > 50) {
                            $nx = 50;
                            $ny = $nx / $resolution;
                        }
                        $row["Foto"] = "<img style='width:".$nx."px;heigth:".$ny."px' src='data:image/png;base64,".base64_encode($row["Foto"])."'>";
                    }
					array_push($list, ["Foto" => $row["Foto"],
                    "Nome_Completo" => $row["Nome_Completo"],
                    "Num_Telefone" => $row["Num_Telefone"] ? mask($row["Num_Telefone"], $this->maskTel) : ' - ',
					"Num_RG" => $row["Num_RG"] ? mask($row["Num_RG"], $this->maskRG) : ' - ',
					"Empresa" => isset($row["Empresa"]) ? $row["Empresa"] : ""]);
				}
			}
			$this->o_dataTec[$type] = $list;
		}
		
		public function mountHTML($sc) {
			$html = mountCSS()."
				<style>
                    body {
                        font-family: 'Helvetica';
                    }
                    .header {
                        background-color: #8db3e2;
                        padding: 1px 5px 1px 5px;
                        height: 14px;
                        font-size: 10px
                    }
                    .double-line {
                        height: 30px;
                    }
                    .ddouble-line {
                        height: 60px;
                    }
                    table.assinatura {
                        border: none;
                    }
                    table.assinatura td {
                        border: none;
                    }
                    table.assinatura td {
                        border: none;
                    }
                    table.assinatura > tbody > tr:nth-child(1) > td {
                        border-bottom: 1px solid black;
                        height: 50px;
                    }
                    table.assinatura > tbody > tr:nth-child(2) > td {
                        height: 10px;
                    }
                    table.label-top {
                        border: none;
                    }
                    table.label-top td {
                        border: none;
                        padding: 0;
                    }
                    table.label-top > tbody > tr:nth-child(2) > td > label {
                        font-weight: 300;
                    }
                    table.rodape1 {		
                        border: none;
                    }
                    table.rodape1 td {
                        border: none;
                        font-size: 7px;
                        color:rgb(192, 192, 192);
                        font-weight: 600;
                        text-align: center;
                    }
                    table.atencao td {
                        font-size: 8px;
                        text-align: justify;
                        text-justify: inter-word;
                        padding: 10px;
                        vertical-align: top;
                    }
                    table.rodape2, table.rodape2 td {
                        border: none;
                    }
                    table.no-border, table.no-border td {
                        border: none;
                    }
                    .descricao {
                        font-size: 10px;
                    }
                    .no-padding {
                        padding: 0px;
                    }
                    ul {
                        padding: 1px 1px 1px 20px;
                        font-size: 10px;
                        margin: 0;
                    }
                    .align-top {
                        vertical-algin: top;
                    }
                    body {
                        margin: 20mm 20mm 20mm 20mm;
                        /*background-image: url(../_lib/img/sys__NM__bg__NM__PAS_back3.png);
                        background-repeat: no-repeat;
                        background-attachment: fixed;
                        padding-top: 27mm;
                        padding-bottom: 15mm;*/
                    }
                    html {
                        margin: 0px;
                    }
                    .content {
                        margin: 25mm 20mm 25mm 20mm;
                    }
                    td {
                        padding: 2px 5px;
                    }
					.footerHtml { position: fixed; bottom: 5mm;font-size:12px;color:rgb(150, 150, 150)}
					.headerHtml { position: fixed; top: 0px;}
                </style>
				<div class='headerHtml' style='z-index:-1'><img src='../_lib/img/sys__NM__img__NM__GB_lg.png' style='height:291mm; margin-left:20px; margin-top:3mm'></div>
                <table class='col-12 no-border'>
                    <tr>
                        <td colspan='3' class='col-3' style='text-align:center'>
                            ".$this->o_dataSAE["IMG_Logo"]."
                        </td>
                        <td colspan='9' class='col-9' style='background-color: #ddd'>
                            <h2 style='text-align:center'>".$this->o_dataSAE["Nom_Empreendimento"]."</h2>
                            <h4 style='text-align:center'>".$this->o_dataSAE["End_Empreendimento"]."</h4>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='12' class='col-12'>
                            <h4 style='text-align:center; margin:10px 0 0 0;'>".$sc->Ini->Nm_lang["lang_label_upc_sae"]."</h4>
                        </td>
                    </tr>
                </table>
                <p style='font-size:5px'>&nbsp;</p>
				<table class='col-12'>
					<tr>
                        <td colspan='4' class='col-4'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_typesae"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".$this->o_dataSAE["Nom_SAE"].($this->o_dataSAE["InstalacaoAntena"] == 'S' ? ' (Antena)' : ($this->o_dataSAE["Emergencial"] == 'S' ? ' (Emergencial)' : ''))."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
						</td>
                        <td colspan='4' class='col-4'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_code"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".$this->o_dataSAE["Num_SAE"]."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td colspan='4' class='col-4'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_dateOfIssue"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".$this->o_dataSAE["Data_Abertura"]."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
					</tr>
					<tr>
                        <td colspan='5' class='col-5'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_client"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".($this->o_dataSAE["Tipo_Cliente"] == 'C' ? $this->o_dataSAE["Nom_Nome"] : 'GLOBALBLUE')."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td colspan='5' class='col-5'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_responsible"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".$this->o_dataSAE["Nom_Responsavel1"]."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td colspan='2' class='col-2'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_phone"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".mask($this->o_dataSAE["Num_Telefone1"], $this->maskTel)."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
					</tr>
                    <tr>
                        <td colspan='4' class='col-4'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_tower"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".($this->o_dataSAE["Nom_Torre"] ? $this->o_dataSAE["Nom_Torre"] : "-")."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td colspan='4' class='col-4'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_floor"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".($this->o_dataSAE["Nom_Andar"] ? $this->o_dataSAE["Nom_Andar"] : "-")."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td colspan='4' class='col-4'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_set"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".($this->o_dataSAE["Nom_Conjunto"] ? $this->o_dataSAE["Nom_Conjunto"] : "-")."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
					</tr>
                    <tr>
                        <td colspan='12' class='col-12'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_operator"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".($this->o_dataSAE["Nom_Operadoras"] ? $this->o_dataSAE["Nom_Operadoras"] : "-")."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
					</tr>
                    <tr>
                        <td colspan='6' class='col-6'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_responsible"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".($this->o_dataSAE["Nom_Responsavel2"] ? $this->o_dataSAE["Nom_Responsavel2"] : "-")."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td colspan='3' class='col-3'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_phone"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".($this->o_dataSAE["Num_Telefone2"] ? mask($this->o_dataSAE["Num_Telefone2"], $this->maskTel) : "-")."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td colspan='3' class='col-3'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_cellphone2"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".($this->o_dataSAE["Num_Celular2"] ? mask($this->o_dataSAE["Num_Celular2"], $this->maskTel) : "-")."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
					</tr>
                    <tr>
                        <td colspan='12' class='col-12'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_companyProvServ"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".($this->o_dataSAE["Nom_RazaoSocial"] ? $this->o_dataSAE["Nom_RazaoSocial"] : "-")."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
					</tr>
                    <tr>
                        <td colspan='6' class='col-6'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_responsible"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".($this->o_dataSAE["Nom_Responsavel3"] ? $this->o_dataSAE["Nom_Responsavel3"] : "-")."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td colspan='3' class='col-3'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_phone"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".($this->o_dataSAE["Num_Telefone3"] ? mask($this->o_dataSAE["Num_Telefone3"], $this->maskTel) : "-")."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td colspan='3' class='col-3'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_cellphone2"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".($this->o_dataSAE["Num_Celular3"] ? mask($this->o_dataSAE["Num_Celular3"], $this->maskTel) : "-")."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>						
					</tr>
                    <tr>
                        <td colspan='3' class='col-3'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_start"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".$this->o_dataSAE["Data_Inicio"]."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>	
                        <td colspan='3' class='col-3'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_termination"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".$this->o_dataSAE["Data_Fim"]."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>	
						<td colspan='6' class='col-6'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_meetingpoint"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".($this->o_dataSAE["PontoDeEncontro"] ? $this->o_dataSAE["PontoDeEncontro"] : '-')."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
					</tr>
					<tr>
                        <td colspan='12' class='col-12'>
                            <table class='label-top col-12'>
                                <tbody>
                                    <tr>
                                        <td><label>".$sc->Ini->Nm_lang["lang_label_description2"]."</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                            ".nl2br($this->o_dataSAE["Descricao"])."
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
						</td>
					</tr>
				</table>
				";
            $html .= "<p style='font-size:5px'>&nbsp;</p>
                    <table class='col-12'>
					<tr>
						<td colspan='12' class='col-12'>
							<label>".$sc->Ini->Nm_lang["lang_label_techniciansOp"]."</label>
						</td>
					</tr>
                    <tr>
                        <td colspan='1' class='col-1'><label>".$sc->Ini->Nm_lang["lang_label_photo"]."</label></td>
						<td colspan='4' class='col-4'><label>".$sc->Ini->Nm_lang["lang_label_officials"]."</label></td>
						<td colspan='2' class='col-2'><label>".$sc->Ini->Nm_lang["lang_label_nTelephone"]."</label></td>
						<td colspan='2' class='col-2'><label>R.G.</label></td>
						<td colspan='3' class='col-3'><label>".$sc->Ini->Nm_lang["lang_label_operator"]."</label></td>
                    </tr>";
            if (count($this->o_dataTec['O']) > 0) {
			    foreach($this->o_dataTec['O'] as $i) {
                    $html .= "<tr>
                            <td colspan='1' class='col-1' style='text-align:center'>".$i["Foto"]."</td>
						    <td colspan='4' class='col-4'>".$i["Nome_Completo"]."</td>
						    <td colspan='2' class='col-2'>".$i["Num_Telefone"]."</td>
						    <td colspan='2' class='col-2'>".$i["Num_RG"]."</td>
						    <td colspan='3' class='col-3'>".$i["Empresa"]."</td>
					    </tr>";
                }
            } else {
                $html .= "<tr>
                    <td colspan='1' class='col-1'>&nbsp;</td>
                    <td colspan='4' class='col-4'>&nbsp;</td>
                    <td colspan='2' class='col-2'>&nbsp;</td>
                    <td colspan='2' class='col-2'>&nbsp;</td>
                    <td colspan='3' class='col-3'>&nbsp;</td>
                </tr>";
            }
			$html .= "</table>
                    <p style='font-size:5px'>&nbsp;</p>
					<table class='col-12'>
					<tr>
						<td colspan='12' class='col-12'>
							<label>".$sc->Ini->Nm_lang["lang_label_techServProv"]."</label>
						</td>
					</tr>
                    <tr>
                        <td colspan='1' class='col-1'><label>".$sc->Ini->Nm_lang["lang_label_photo"]."</label></td>
                        <td colspan='4' class='col-4'><label>".$sc->Ini->Nm_lang["lang_label_officials"]."</label></td>
                        <td colspan='2' class='col-2'><label>".$sc->Ini->Nm_lang["lang_label_nTelephone"]."</label></td>
                        <td colspan='2' class='col-2'><label>R.G.</label></td>
                        <td colspan='3' class='col-3'><label>".$sc->Ini->Nm_lang["lang_label_provider"]."</label></td>
                    </tr>";
            if (count($this->o_dataTec['P']) > 0) {
                foreach($this->o_dataTec['P'] as $i) {
                    $html .= "<tr>
                            <td colspan='1' class='col-1' style='text-align:center'>".$i["Foto"]."</td>
                            <td colspan='4' class='col-4'>".$i["Nome_Completo"]."</td>
                            <td colspan='2' class='col-2'>".$i["Num_Telefone"]."</td>
                            <td colspan='2' class='col-2'>".$i["Num_RG"]."</td>
                            <td colspan='3' class='col-3'>".$i["Empresa"]."</td>
                        </tr>";
                }
            } else {
                $html .= "<tr>
                    <td colspan='1' class='col-1'>&nbsp;</td>
                    <td colspan='4' class='col-4'>&nbsp;</td>
                    <td colspan='2' class='col-2'>&nbsp;</td>
                    <td colspan='2' class='col-2'>&nbsp;</td>
                    <td colspan='3' class='col-3'>&nbsp;</td>
                </tr>";
            }
            $html .= "</table>
                    <p style='font-size:5px'>&nbsp;</p>
                    <table class='col-12'>
                    <tr>
                        <td colspan='12' class='col-12'>
                            <label>Técnicos: GlobalBlue</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='1' class='col-1'><label>".$sc->Ini->Nm_lang["lang_label_photo"]."</label></td>
                        <td colspan='5' class='col-5'><label>".$sc->Ini->Nm_lang["lang_label_officials"]."</label></td>
                        <td colspan='3' class='col-3'><label>".$sc->Ini->Nm_lang["lang_label_nTelephone"]."</label></td>
                        <td colspan='3' class='col-3'><label>R.G.</label></td>
                    </tr>";
            if (count($this->o_dataTec['GB']) > 0) {
                foreach($this->o_dataTec['GB'] as $i) {
                    $html .= "<tr>
                            <td colspan='1' class='col-1' style='text-align:center'>".$i["Foto"]."</td>
                            <td colspan='5' class='col-5'>".$i["Nome_Completo"]."</td>
                            <td colspan='3' class='col-3'>".$i["Num_Telefone"]."</td>
                            <td colspan='3' class='col-3'>".$i["Num_RG"]."</td>
                        </tr>";
                }
            } else {
                $html .= "<tr>
                    <td colspan='1' class='col-1'>&nbsp;</td>
                    <td colspan='5' class='col-5'>&nbsp;</td>
                    <td colspan='3' class='col-3'>&nbsp;</td>
                    <td colspan='3' class='col-3'>&nbsp;</td>
                </tr>";
            }
            $html .= "</table>
            <p style='font-size:5px'>&nbsp;</p>
            <table class='col-12 no-border atencao'>
                <tr>
                    <td colspan='12' class='col-12' style='padding:3px'>
                        <label style='font-size:12px'>Atenção!</label>
                    </td>
                </tr>
                <tr>
                    <td colspan='6' class='col-6' style='background-color:#ddd'>".$sc->Ini->Nm_lang["lang_label_serviceProv"]."</td>
                    <td colspan='6' class='col-6' style='background-color:#ddd'>".$sc->Ini->Nm_lang["lang_label_relatedEmploy"]."</td>
                </tr>
            </table>
            <table class='col-12 rodape1'>
                <tr>
                    <td colspan='12' class='col-12'>".$sc->Ini->Nm_lang["lang_label_footer_pdfsae"]."<br>".$sc->Ini->Nm_lang["lang_label_footer_pdfsae2"]."</td>
                </tr>
            </table>
            ";
			
			return $html;
		}
	}