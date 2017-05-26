<?php

    $busca = "SELECT disciplinas.nomeDisciplina, disciplinas.nomeProfessor, notas.nota1, notas.nota2, notas.nota3 FROM disciplinas INNER JOIN notas ON disciplinas.matricula = notas.matricula AND disciplinas.idDisciplina = notas.idDisciplina order by (ifnull(notas.nota1,0)+ifnull(notas.nota2,0)+ifnull(notas.nota3,0))/3";
    $todos = mysqli_query($conexao, $busca);
?>
<div class="text-center"><h3 style="display: inline-block;">Ordem de Estudos&ensp;<span class="glyphicon glyphicon-stats"></span></h3></div>
<table class="table table-hover" style="border-top: 1px solid;">
    <thead>
        <th class="col-xs-5">Disciplina</th>
        <th class="col-xs-4">Professor</th>
        <th class="text-center">1º Estágio</th>
        <th class="text-center">2º Estágio</th>
        <th class="text-center">3º Estágio</th>
    </thead>
    <tr class="success text-center">
    	<td colspan="2"></td>
    	<td>Nota</td>
    	<td>Nota</td>
    	<td>Nota</td>
    </tr>
    <?php while ($dados = mysqli_fetch_array($todos)) { ?>

    <tr>
        <td><?=utf8_encode($dados['nomeDisciplina']);?></td>
        <td><?=utf8_encode($dados['nomeProfessor']);?></td>
        <td class="text-center"><?=$dados['nota1'];?></td>
        <td class="text-center"><?=$dados['nota2'];?></td>
        <td class="text-center"><?=$dados['nota3'];?></td>
    </tr>
    
    <?php } ?>

</table>

<fieldset>
	<img src="graphs.php" alt="Gráfico de notas" title="Gráfico de notas" />
</fieldset>

<fieldset>
	<img src="graphsname.php" alt="Gráfico de notas" title="Gráfico de notas" />
</fieldset>

<h3 class="text-center">Faltas</h3>
<?php 
	$count = mysqli_query($conexao, "SELECT SUM(falta1+falta2+falta3) FROM numfaltas WHERE matricula = $userID");
    if (mysqli_fetch_array($count)[0] <= 0) {
    	echo "<div class='alert alert-success text-center' role='alert'>Você não possui faltas até o momento. <span class='glyphicon glyphicon-thumbs-up'></span></div>";
    } else {
 ?>
<table class="table table-hover" style="border-top: 1px solid;">
    <thead style="background: #f2dede;">
        <th class="col-xs-6">Disciplina</th>
        <th class="text-center">1º Estágio</th>
        <th class="text-center">2º Estágio</th>
        <th class="text-center">3º Estágio</th>
    </thead>
    <?php

    	$busca = "SELECT disciplinas.nomeDisciplina, numfaltas.falta1, numfaltas.falta2, numfaltas.falta3 FROM disciplinas INNER JOIN notas ON disciplinas.matricula = notas.matricula AND disciplinas.idDisciplina = notas.idDisciplina INNER JOIN numfaltas ON disciplinas.matricula = numfaltas.matricula AND disciplinas.idDisciplina = numfaltas.idDisciplina order by (numfaltas.falta1+numfaltas.falta2+numfaltas.falta3)/3 DESC";

	    	$qtdFaltas = mysqli_query($conexao, $busca);

	    	while ($fal = mysqli_fetch_array($qtdFaltas)) { 

	    		$faltas1[]=$fal['falta1']; $faltas2[]=$fal['falta2']; $faltas3[]=$fal['falta3'];
    ?>

    <tr>
        <td><?=utf8_encode($fal['nomeDisciplina']);?></td>
        <td class="text-center"><?=$fal['falta1'];?></td>
        <td class="text-center"><?=$fal['falta2'];?></td>
        <td class="text-center"><?=$fal['falta3'];?></td>
    </tr>
    
    <?php }} ?>

</table>

<?php 
	mysqli_close($conexao);
 ?>