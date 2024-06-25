<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Consultar todas as Partidas</Title>

<link rel="stylesheet"
	href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

<style></style>
<link rel="stylesheet" type="text/css" href="../estilos.css">
<link rel="stylesheet" type="text/css" href="../consulta.css">

</head>

<body class="wraper">
	<header>
		<!-- cabe�alho -->
			<!-- O primeiro ponto � a pasta onde vc esta e o segundo � o numero maximo de pontos que � uma pasta acima -->
			<img src="../utilitarios/figuras/Topo.png" alt="topoHome">
			
			<nav>
  <ul class="menu">
  				<!-- ../ retorna uma pasta anterior-->

		<li><a href="./Partida.php">Partida</a></li>
		<li><a href="#">Consultar a partida</a></li>
	  		<li><a href="./PartidaUpdate.php">Editar dados da partida</a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>             
</ul>
</nav>
	</header>
	<br>
	<br><br>
	<table id="formPartida" border=1>
		<!-- Tr � a tag para linha no html -->
		<tr>		
			<th>ID Partida</th>
			<th>ID Equipe Arbitragem</th>
			<th>Entidade</th>
			<th>Data</th>
			<th>Hora</th>
			<th>Resultado Final  mandanteXvisitante</th>
			<th>Equipe Vendcedora</th>
			<th>Disputa De Penaltis</th>
			<th>Gol Qualificado</th>
			<th>ID Competicao</th>
			<th>Equipe Mandante</th>
			<th>Estadio</th>
			<th>Equipe Visitante</th>
			<th>Deletar</th>			
			<th>Editar</th>		
		</tr>
<?php
include ('./PartidaCRUD.php');
$ler = new PartidaCRUDClasse ();

if (isset ( $_REQUEST ["excluir"] ) && $_REQUEST ["excluir"] == true){
	$primaryKey=array($_REQUEST["idPartida"]);
	$ler->deletarPartida($primaryKey);
}
$ler->lerPartida();
?>
</table>
<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. � class e # � id -->
</body>
</html>