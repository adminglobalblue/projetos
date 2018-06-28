<?php

class RGFluxo {
    public $fluxo;

    public function __construct() {
        $this->resetFluxo();
    }

    public function resetFluxo() {
        $this->fluxo = [
            "objetivo" => [ // 1
                "title" => "OBJETIVO",
                "code" => "objetivo",
                "display" => 1,
                "data" => "",
                "content" => "Apresentar os serviços realizados no período de #RG_InicioVigencia# a #RG_FimVigencia# para execução das atividades de consultoria conforme contrato e descrição a seguir.
                    As informações contidas neste relatório são confidenciais e destinadas ao uso gerencial exclusivo do condomínio #RG_Empreendimento_Nome#.",
				"tags" => ["#RG_InicioVigencia#", "#RG_FimVigencia#", "#RG_Empreendimento_Nome#"]
			],
			"descServicos" => [ // 2
                "title" => "DESCRIÇÃO DOS SERVIÇOS",
                "code" => "descServicos",
                "display" => 1,
                "data" => "",
                "content" => "A GLOBALBLUE elaborou o relatório periódico de todos os itens pertinentes tratados desde o último relatório realizado, compreendendo as regularizações necessárias as de 
                    infraestrutura de Teelcon do #RG_Empreendimento_Nome#, regularização da infraestrutura de cabeamentos e tubulações realizadas por operadoras e permissionárias. 
                    Com o objetivo de termos o histórico das ações acoradadas com as empresas e a própria administração do condomínio, a GLOBALBLUE deverá manter o texto que compõem as atividades
                    até a sua finalização. Modelo padrão de cotnrato de cessão de espaço oneroso Visando adotar uma padronização para todo contrato firmados junto às operadoras, a GLOBALBLUE tem
                    utilizado seu modelo padrão de contrato de cessão de espaço a título oneroso, para que este seja utilizado nas negociações dos espaços disponíveis do empreendimento.",
				"tags" => ["#RG_Empreendimento_Nome#"]
			],
			"docProjAbordagem" => [ // 3
                "title" => "DOCUMENTAÇÃO PARA PROJETOS DE ABORDAGEM",
                "code" => "docProjAbordagem",
				"content" => "",
                "tags" => [],
                "display" => 1,
                "data" => "",
				"child" => [
					"poe" => [ // 3.1
                        "title" => "POE - Ponto de Entrada de Operadoras",
                        "code" => "poe",
                        "content" => "",
                        "tags" => [],
                        "display" => 1,
                        "data" => "",
                        "childModel" => [ // 3.1.1
                            "title" => "#POE_LOCALIZACAO#",
                            "display" => 1,
                            "data" => "",
                            "content" => ["A seguir, a localização da(s) caixa(s) subterrâneas #POE_LOCALIZACAO#.",
                                "#TEXT_DESCRICAO#",
                                "#FOTOS#"],
                            "tags" => ["#POE_LOCALIZACAO#", "#TEXT_DESCRICAO#", "#FOTOS#"]
                        ]
                    ],
                    "pop" => [ // 3.2
                        "title" => "SALA POP/DG",
                        "code" => "pop",
                        "content" => "",
                        "tags" => [],
                        "display" => 1,
                        "data" => "",
                        "childModel" => [ // 3.2.1
                            "title" => "#POP_IDENTIFICACAO# - #POP_LOCALIZACAO#",
                            "data" => "",
							"content" => "#TEXT_DESCRICAO#
								#FOTOS#
								#GRAFICO_POP_UTILIZACAO#",
							"tags" => ["#POP_IDENTIFICACAO#", "#POP_LOCALIZACAO#", "#TEXT_DESCRICAO#", "#FOTOS#", "#GRAFICO_POP_UTILIZACAO#"]						
                        ]
				    ],
                    "antenario" => [ // 3.3
                        "title" => "ANTENÁRIO",
                        "code" => "antenario",
                        "content" => "",
                        "tags" => [],
                        "display" => 1,
                        "data" => "",
                        "childModel" => [ // 3.3.1
                            "title" => "#ANTENARIO_IDENTIFICACAO# - #ANTENARIO_LOCALIZACAO#",
                            "data" => "",
							"content" => "#TEXT_DESCRICAO#
								#FOTOS#
								#GRAFICO_ANTENARIO_UTILIZACAO#",
							"tags" => ["#ANTENARIO_IDENTIFICACAO#", "#ANTENARIO_LOCALIZACAO#", "#TEXT_DESCRICAO#", "#FOTOS#", "#GRAFICO_ANTENARIO_UTILIZACAO#"]	
                        ]
				    ]
			    ]
            ],
            "inconformidades" => [ // 4
                "title" => "IRREGULARIDADES ENCONTRADAS NAS ÁREAS CONDOMINIAIS",
                "code" => "irregularidades",
                "content" => "Neste item serão registradas as irregularidades encontradas em vistorias na sala do DG, POP e áreas condominiais do empreendimento:",
                "tags" => [],
                "display" => 1,
                "data" => "",
                "childModel" => [ // 4.1
                    "title" => "#INCONFORMIDADE_OPERADORA#",
                    "data" => "",
                    "content" => "#INCONFORMIDADE_DESCRICAO#
                        #FOTOS#
                        #INCONFORMIDADE_HISTORICO#",
                    "tags" => ["#INCONFORMIDADE_OPERADORA#", "#INCONFORMIDADE_DESCRICAO#", "#INCONFORMIDADE_HISTORICO#", "#FOTOS#"]						
                ]
            ],
            "abordagemOperadoras" => [ // 5
                "title" => "ABORDAGEM DE OPERADORAS - SALA DE OPERADORAS | ANTENÁRIO",
                "code" => "abordagemOperadoras",
                "display" => 1,
                "data" => "",
                "content" => ["A seguir registro das tratativas a respeito de operadoras que já estão em processo de abordagem e/ou estudo. 
                    O quadro a seguir apresenta o status das negociações realizadas pela GLOBALBLUE com o cronograma de instalação e supervisão de arrecadação da CESSÃO DE ESPAÇO da sala POP/DG e ANTENÁRIO.",
                    //"#TABELA_PROJETO_ABORDAGEM_APROVADOS#",
                    //"#GRAFICO_CEUO#",
                    "Vale salientar que os valores arrecadados com a cessão de espaço possuem um contrato firmado entre as partes, porém a qualquer momento independente das partes e usuários, o mesmo poderá ser interrompido e consequentemente seus respectivos valores. 
                    De forma que, caso haja um planejamento à longo prazo comprometendo essas arrecadações, o mesmo deverá ter ciência da ruptura.
                    "],
                "tags" => ["#TABELA_PROJETO_ABORDAGEM_APROVADOS#", "#GRAFICO_CEUO#"],
                "childModel" => [
                    "contratuais" => [ // 5.1
                        "title" => "INFORMAÇÕES CONTRATUAIS",
                        "content" => "",
                        "data" => "",
                        "tags" => []
                    ], 
                    "inadimplencias" => [ // 5.2
                        "title" => "INFORMAÇÕES DE INADIMPLÊNCIAS",
                        "content" => "",
                        "data" => "",
                        "tags" => []
                    ]
                ]
            ],
            "ctrProjEspeciais"=>  [ // 6
                "title" => "CONTROLE DE PROJETOS ESPECIAIS APROVADOS",
                "code" => "ctrProjEspeciais",
                "display" => 1,
                "data" => "",
                "content" => ["A seguir a lista dos projetos analisados e aprovados com nome dos provedores, instaladores dos serviços, denominação dos projetos e suas respectivas datas.
                    Todos os meses serão incluídos os projetos aprovados para controle e acompanhamento das instações.",
                    "#TABELA_PROJETO_INSTALACAO_APROVADOS#",
                    "#GRAFICO_PROJETO_INSTALACAO_APROVADOS_ANUAL#",
                    "OBS: HOUVE #QTDProjetos# APROVADOS NO PERÍODO", 
                    "OBS: NÂO HOUVE PROJETOS ESPECIAIS APROVADOS NO PERÍODO DE #RGINICIOVIGENCIA# ATÉ #RGFIMVIGENCIA#"
                ],
                "tags" => ["#TABELA_PROJETO_INSTALACAO_APROVADOS#", "#GRAFICO_PROJETO_INSTALACAO_APROVADOS_ANUAL#", "#RGINICIOVIGENCIA#", "#RGFIMVIGENCIA#"]
            ],
            "ctrAgendTecnicos" => [ // 7
                "title" => "CONTROLE DE AGENDAMENTOS TÉCNICOS",
                "code" => "ctrAgendTecnicos",
                "display" => 1,
                "data" => "",
                "content" => ["#TABELA_AGENDAMENTO_TECNICO#",
                    "#GRAFICO_AGENDAMENTO_TECNICO_ANUAL#",
                    "OBS: HOUVE #QTDSae# SOLICITAÇÕES DE ACESSO NO PERÍODO DE #RGINICIOVIGENCIA# ATÉ #RGFIMVIGENCIA#",
                    "OBS: NÃO HOUVE SOLICITAÇÕES DE ACESSO NO PERÍODO DE DE #RGINICIOVIGENCIA# ATÉ #RGFIMVIGENCIA#"
                ],
                "tags" => ["#TABELA_AGENDAMENTO_TECNICO#", "#GRAFICO_AGENDAMENTO_TECNICO_ANUAL#"]
            ],
            "opePreBloqueadas" => [ // 8
                "title" => "RELAÇÃO DE OPERADORAS / PRESTADORAS DE SERVIÇOS BLOQUEADAS",
                "code" => "opePreBloqueadas",
                "display" => 1,
                "data" => "",
                "content" => "#TABELA_OPERADORAS_BLOQUEADAS#",
                "tags" => ["#TABELA_OPERADORAS_BLOQUEADAS#"]
            ],
            "sobreAviso" => [ // 9
                "title" => "SOBRE AVISO",
                "code" => "sobreAviso",
                "display" => 1,
                "data" => "",
                "content" => "
                    <p class='fs12'>
                        Este empreendimento não contratou o serviço de \"sobre aviso\" a GLOBALBLUE poderá disponibilizar o atendimento emergencial de \"Sobre Aviso\" 24 horas.
                        Os serviços de supervisão são realizados em 2(duas) maneiras:
                    </p>
                    <ul class='fs12'>
                        <li>
                            SUPERVISÃO REMOTA - Neste tipo de atendimento, o consultor técnico realizará o atendimento e o controle de acessos ao empreendimento via telefone e/ou efetuando acesso remoto ao servidor ou estação de trabalho se assim for necessário, geralmente este atendimento aplica-se a serviços, como por exemplo: 
                            Manutenção, interrupções ou falhas no fornecimento de energia elétrica, interrupção de link de internet, falha de telefonia (PABX) e acessos emergenciais em geral.
                            Devido ao tipo de necessidade, que nesse caso são emergenciais.
                        </li>
                        <li>
                            SUPERVISÃO PRESENCIAL - Caso haja necessidade de supervisão técnica presencial, o consultor técnico deverá se deslocar para o empreendimento para supervisão e apoio aos serviços 
                            0 0,2 0,4 0,6 0,8 1 Comparativo Anual Condôminos executados por uma operadora e/ou fornecedores, 
                            ou em caso de intervenções, que na maioria das vezes devem ser pré-agendadas, como por exemplo: instalações de equipamentos, instalações de cabeamentos, fusões de fibra e etc.
                        </li>
                    </ul>
                    <p class='fs12'>Caso haja interesse do empreendimento em contratar o serviços de sobre aviso, entrar em contato com o Sr. Mauricio Morgenstern no telefone: 4228-9020.</p>
                ",
                "tags" => []
            ]
        ];
    }

    public function getFluxo() {
        return $this->fluxo;
    }
}