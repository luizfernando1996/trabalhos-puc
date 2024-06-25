<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Consultar todos as Equipes de Arbitragem</Title>

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

		<li><a href="./EquipeDeArbitragem.php">Equipe De Arbitragem</a></li>
		<li><a href="#">Consultar a Equipe de Arbitragem</a></li>
	  		<li><a href="./EquipeDeArbitragemUpdate.php">Editar dados da Equipe De Abitragem</a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>             
</ul>
</nav>
	</header>
	<table id="formularioInteiro3" border=1>
		<!-- Tr � a tag para linha no html -->
		<tr>		
			
			<th>Bandeirinha 1</th>
			<th>Bandeirinha 2</th>
			<th>Arbitro</th>
			<th>Quarto Arbitro</th>
			<th>Entidade</th>
			<th>Delegado</th>
			<th>Competicao</th>
			<th>Ano</th>
			<th>Numero do Jogo</th>			
			<th>Deletar</th>			
			<th>Editar</th>		
		</tr>
<?php
include ('./EquipeDeArbitragemCRUD.php');
$ler = new EquipeDeArbitragemCRUDClasse ();

if (isset ( $_REQUEST ["excluir"] ) && $_REQUEST ["excluir"] == true){
	$primaryKey=array($_REQUEST["nomeCompeticao"], $_REQUEST["anoCompeticao"], $_REQUEST["numeroJogo"]);
	$ler->deletarEquipeDeArbitragem($primaryKey);
}
$ler->lerEquipeDeArbitragem();
?>
</table>
<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. � class e # � id -->
</body>
</html>
