<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Consultar todas as Competi��es</Title>

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

		<li><a href="./CompeticaoEquipeCadastrar.php">Cadastrar CompeticaoEquipe</a></li>
		<li><a href="#">Consultar CompeticaoEquipe</a></li>
	  		<li><a href="./CompeticaoUpdate.php">Alterar dados da CompeticaoEquipe</a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>
</ul>
</nav>
	</header>
	<table id="formularioInteiro3" border=1>
		<!-- Tr � a tag para linha no html -->
		<tr>
			<th><?php echo utf8_encode("Posi��o")?></th>
			<!-- Th define o titulo da coluna -->
			<th>Nome da Equipe</th>
			<th><?php echo utf8_encode("ID da Competi��o");?></th>
			<th><?php echo utf8_encode("Pontua��o")?></th>
			<th>Gols Favor</th>
			<th>Gols Contra</th>
			<th>Deletar</th>			
			<th>Editar</th>
		
		</tr>
<?php
include ('./CompeticaoEquipeCrud.php');
$ler = new CompeticaoEquipeClasseCrude();

if (isset ( $_REQUEST ["excluir"] ) && $_REQUEST ["excluir"] == true){
	$primaryKey=array($_REQUEST["NomeEquipe"],$_REQUEST["IdDaCompeticao"]);
	$ler->deletarCompeticaoEquipe($primaryKey);
}
$ler->lerCompeticaoEquipe();
?>
</table>
<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. � class e # � id -->
</body>
</html>