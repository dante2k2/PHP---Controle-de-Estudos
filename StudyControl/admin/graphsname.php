<?php
	include "config.inc.php";

	$busca = "SELECT nomeDisciplina FROM disciplinas order by nomeDisciplina";
    $todos = mysqli_query($conexao, $busca);

    while ($dados = mysqli_fetch_array($todos)) { 
    
    	$nomesD[] = $dados['nomeDisciplina'];

    }
    mysqli_close($conexao);

	include_once "phplot.php";
	include_once "rgb.inc.php";

	$data = array(
		array(0,0)
	);

	$plot = new PHPlot(320, 125);

	$plot->SetPlotType("bars");

	$plot->SetLegend($nomesD);

	$plot->SetLegendPosition(0, 0, 'image', 0, 0, 5, 5);

	$plot->SetLegendStyle('left', 'left');

	$plot->SetDataType("text-data");

	$plot->SetDataValues($data);

	$plot->SetXTickPos('none');

	$plot->DrawGraph();

?>
