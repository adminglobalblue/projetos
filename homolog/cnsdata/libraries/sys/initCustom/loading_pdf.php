<?php 
function loadingPDF($sc,$dataExtra=[]){
	$subject = '';
	$urlGetAttr = 'geraPDF=true';
	$spanMsg1 = $sc->Ini->Nm_lang["lang_label_msgWaitPDF1"];
	$spanMsg2 = $sc->Ini->Nm_lang["lang_label_msgWaitPDF2"];
	foreach($dataExtra as $key => $value){
			$$key = $value;
	}
	echo '
	<html>
	<head>
		<script src='.sc_url_library("sys", "initCustom", "jquery.js").'></script>
		<style>
			/* Safari */
			@media(max-width: 750px){
				body{margin-top:0 !important;}
			}

			@-webkit-keyframes spin {
				0% { -webkit-transform: rotate(0deg); }
				100% { -webkit-transform: rotate(360deg); }
			}

			@keyframes spin {
				0% { transform: rotate(0deg); }
				100% { transform: rotate(360deg); }
			}
			
            body{
				margin-top:-120px;
                font-family:"Arial", sans-serif;
                font-size:1.5rem;
				background-image:url(../_lib/img/sys__NM__img__NM__GB_lg.png);
				background-repeat:no-repeat;
                background-size: 50% auto;
				background-position:50% 80%;
				z-index:-1;
				position:relative;
            }
            #conteudo{
                margin:0 auto;
                width: 70%;
                height:50%;
                border-radius:10px;
            }

			.loader {
				margin:-160% auto;
				border: 16px solid #f3f3f3;	
				border-radius: 50%;
				border-top: 16px solid #3498db;
				width: 60px;
				height: 58px;
				-webkit-animation: spin 2s linear infinite;
				animation: spin 2s linear infinite;
			}
			#id_div_process{
				margin: auto;
				/*left: calc(50% - 46px);*/
				top: calc(50% - 46px);
				position: absolute;
				z-index: 1000;
			}
			#msg{
                margin-top:25%;
                width:100%;
                text-align:center;
            }
            #assunto{
                font-weight:bold;
            }
		</style>
		<title>CNSDATA</title>
	</head>
	<body>
		<div id="conteudo">
			<div id="msg">'.$spanMsg1.' <span id="assunto">'.$subject.'</span> '.$spanMsg2.'</div>
				<div id="id_div_process" style="margin: 0px; left: calc(50% - 46px); top: calc(50% - 46px); position: absolute; z-index: 1000;" class="">  
					<div class="loader"></div>
				</div>
		</div>
	</body>
	<script>
	$(document).ready(function(){
		window.location = "./?'.$urlGetAttr.'";
	});
	
	</script>
</html>';
}
?>