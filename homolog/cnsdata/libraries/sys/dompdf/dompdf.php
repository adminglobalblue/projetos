<?php
	require "autoload.php";	

	use Dompdf\Dompdf;
	use Dompdf\Options;

	function getDompdfObj ($options = null) {
		$dompdf = new Dompdf($options);
		return $dompdf;
	}

	function  getOptionDompdf () {
		$options = new Options();
		$options->setIsPhpEnabled(true);
		$options->isRemoteEnabled(true);
		//$options->set('debugLayout', true);
		return $options;
	}

	function mountCSS ($mgTop = "15", $mgRight = "20", $mgBottom = "15", $mgLeft = "20", $orientacao = "portrait") {
		if ($orientacao == "portrait") {
			$wA4 = "210";
			$hA4 = "297";
		} elseif ($orientacao == "landscape") {
			$wA4 = "297";
			$hA4 = "210";
		}
		$wNMg = $wA4 - ($mgRight + $mgLeft);
		$css = "<style>
			html {
				margin: {$mgTop}mm {$mgRight}mm {$mgBottom}mm {$mgLeft}mm;	
			}
			body {
				font-family: Helvetica;
			}
			div {
				word-wrap: break-word;
			}
			label {
			    font-weight: bold;
			}
			table {
				border-spacing: 0;
				border-collapse: collapse;
			}
			table, th, td {
				border: 1px solid rgb(109, 109, 109);
			}
			.row {
				padding: 0;
				height: auto;
				border: 1px solid black;
			}
			td {
    			padding: 5px;
				font-size: 12px;
			}
			.center {
				text-align: center;
			}
			.b-left {
				 border-left: 1px solid black;
			}
			.b-top {
				 border-top: 1px solid black;
			}
			.b-right {
				 border-right: 1px solid black;
			}
			.b-bottom {
				 border-bottom: 1px solid black;
			}
			.nb {
				border: none;
			}
			table.label-top {
				border: none;
			}
			table.label-top td {
				border: none;
				padding: 0;
			}
			.nMtop {margin-top: 0px}
			.nMbottom {margin-bottom: 0px}
			table.label-top > tbody > tr:nth-child(2) > td > label {
				font-weight: 300;
			}
			/*.col-1, .col-2, .col-3, .col-4, .col-5,.col-6,.col-7,.col-8,.col-9,.col-10,.col-11 {
				 padding-top:10px;
			}*/
			.col-1 {width: ".(floor(100/12))."%;}
			.col-2 {width: ".(2*floor(100/12))."%;}
			.col-3 {width: ".(3*floor(100/12))."%;}
			.col-4 {width: ".(4*floor(100/12))."%;}
			.col-5 {width: ".(5*floor(100/12))."%;}
			.col-6 {width: ".(6*floor(100/12))."%;}
			.col-7 {width: ".(7*floor(100/12))."%;}
			.col-8 {width: ".(8*floor(100/12))."%;}
			.col-9 {width: ".(9*floor(100/12))."%;}
			.col-10 {width: ".(10*floor(100/12))."%;}
			.col-11 {width: ".(11*floor(100/12))."%;}
			.col-12 {width: 100%;}
			.col-0 {width: 0mm;}
			.inline {display:inline}
			.inline-block {display:inline-block}
			.block {display:block}
			.color {background-color: #aaa}
			</style>";
		return $css;
	}
?>