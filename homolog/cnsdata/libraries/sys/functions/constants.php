<?php
	function getConstants() {
	$c = array(
		'itens' => array(
			'2' => array(
				'tabela' => 'tb_solaudovistoria',
				'app' => 'form_SolicitacaoDeLaudoDeVistoria',
				'app_up' => 'form_up_SolicitacaoDeLaudoDeVistoria',
			),
			'3' => array(
				'tabela' => 'tb_laudovistoria',
				'app' => 'form_LaudoDeVistoria',
				'app_up' => 'form_up_LaudoDeVistoria',
			),
			'4' => array(
				'tabela' => 'tb_responsabilitadetecnica',
				'app' => 'form_DeclaracaoDeResponsabilidadeTecnica',
				'app_up' => 'form_up_DeclaracaoDeResponsabilidadeTecnica',
			),
			'5' => array(
				'tabela' => 'tb_itemsae',
				'app' => null,
				'app_up' => 'form_up_sae',
			),
			'6' => array(
				'tabela' => 'tb_art',
				'app' => 'form_ART',
				'app_up' => 'form_up_ART',
			),
			'7' => array(
				'tabela' => 'tb_mdescritivotecnico',
				'app' => 'form_MemorialDescritivoTecnico',
				'app_up' => 'form_up_MemorialDescritivoTecnico',
			),
			'8' => array(
				'tabela' => 'tb_mdescritivo',
				'app' => 'form_MemorialDestritivo',
				'app_up' => 'form_up_MemorialDestritivo',
			),
			'9' => array(
				'tabela' => 'tb_relatoriofotografico',
				'app' => null,
				'app_up' => 'form_up_RelatorioFotografico',
			),
			'10' => array(
				'tabela' => 'tb_responsabilidadecivil',
				'app' => null,
				'app_up' => 'form_up_SeguroDeResponsabilidadeCivil',
			),
			'11' => array(
				'tabela' => 'tb_laudoradiometrico',
				'app' => null,
				'app_up' => 'form_up_LaudoRadiometrico',
			),
			'12' => array(
				'tabela' => 'form_InformacoesDoCondomino',
				'app' => '',
			),
			'13' => array(
				'tabela' => 'tb_mdescritivo',
				'app' => 'form_MemorialDestritivo',
				'app_up' => 'form_up_MemorialDestritivo',
			)
		),
		'pdf' => array(
			'SolicitacaoDeLaudoDeVistoria' => array(
				'itens' => array(
					array(
						's' => false,
						'k' => 'id'
					),
					array(
						's' => false,
						'k' => 'id_Projeto'
					),
					array(
						's' => false,
						'k' =>'ID_Item'
					),
					array(
						's' => true,
						'k' => 'ID_Usuario',
						'label' => 'Usuário'
					),
					array(
						's' => true,
						'k' => 'Finalidade',
						'label' => 'Finalidade'
					),
					array(
						's' => true,
						'k' => 'Nom_Responsavel',
						'label' => 'Nome do Responsável'
					),
					array(
						's' => true,
						'k' => 'Email_Responsavel',
						'label' => 'E-mail do Responsável'
					),
					array(
						's' => true,
						'k' => 'Tel_Responsavel',
						'label' => 'Tel. do Responsável'
					),
					array(
						's' => true,
						'k' => 'Data_Inclusao',
						'label' => 'Data de inclusão'
					),
				)
			)
		),
		'sessionData' => array(
			'ID_Usuario', 
			'Nom_UserName',
			'password',
			'Nom_Nome',
			'Num_TipoUsuario',
			'ID_Perfil',
			'ID_OPE',
			'Contexto_Tipo',
			'Contexto_ID_OPE',
			'End_Numero',
			'Num_Ativo',
			'Num_TOTVS',
			'Data_UltimoLogin',
			'IMG_Foto',
			'Nome_Completo',
			'Num_CPF',
			'Num_RG',
			'Data_Nasc',
			'Nom_Email1',
			'Nom_Email2',
			'Num_TelefoneComercial',
			'Num_TelefoneCelular',
			'End_tipoLogradouro',
			'End_Logradouro',
			'End_Complemento',
			'End_Bairro',
			'End_Cidade',
			'End_UF',
			'End_CEP'
		),
		'permissionData' => array(
			'storageSassKey', // Armazenas as variáeis de sessão que foram inseridas manualmente
			'profile', // armazenamento dos dados do perfil
			'typeUserView', // Tipos de usuários que o usuário logado poderá ver na app de USUÁRIOS
			'listPrestadores', // condição da query para filtrar quais prestasdoras de serviço o usuário poderá acessar
			'tipoTecnico', // O ENUM['P','O'] do tipo do técnico que este usuário criará, se for userOA (O) se for userPA (P)
			'gridViewSAE', // Condição da query para a grid de SAEs - filtro
		),
		'relacaoCampoTabela' => array(
		),
		'initApp' => 'menu',
		'loginApp' => 'login',
		'logoutApp' => 'login?act=logout',
		'MailFrom' => 'cnsdata@cnsdata.com.br',
		'MailPass' => 'xUVI9lhLk2mZ9mza',
		'MailFromName' => 'GLOBALBLUE | CNSDATA',
		'MailSMTP' => 'smtp.houseti.com.br',
		'MailPORT' => 587,
	);
	return $c;
}