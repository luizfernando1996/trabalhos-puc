<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Cadastro de Equipe</Title>

<link rel="stylesheet"
	href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

<style></style>
<link rel="stylesheet" type="text/css" href="../estilos.css">

</head>
<?php
$erro = null;
$valido = false;
// isset retorna false se o valor for null ou se a variavel n�o existir
if (isset ( $_REQUEST ["validar"] ) && $_REQUEST ["validar"] == true) {
	
	include ('./EquipeCrud.php');
	
	$Robinho = new ClasseEquipeCrude();
	$nomeEquipe= $_POST ["nomeEquipe"];
	$estado= $_POST ["estado"];
	$nomeEstadio= $_POST ["nomeEstadio"];
	$cidade= $_POST ["cidade"];
$Robinho->inserirBanco($nomeEquipe, $estado, $nomeEstadio, $cidade);
} else {
	if (isset ( $erro )) {
	}
}
?>
<body class="wraper">
	<header>
		<!-- cabe�alho -->
			<!-- O primeiro ponto � a pasta onde vc esta e o segundo � o numero maximo de pontos que � uma pasta acima -->
			<img src="../utilitarios/figuras/Topo.png" alt="topoHome">
			
			<nav>
  <ul class="menu">
  				<!-- ../ retorna uma pasta anterior-->

		<li><a href="#">Equipe</a></li>
		<li><a href="./equipeConsulta.php">Consultar Equipes</a></li>
	  		<li><a href="./equipeUpdate.php">Alterar dados das Equipes</a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>
</ul>
</nav>
	</header>

	<div id="tituloForm">Cadastro de Equipes</div>
	<form id="formularioInteiro" name="tabelaJogador" method="post"
		action="?validar=true">
		<!-- Campo Nome -->
		<div class="retiraQuebraDeLinha">
			<label>Nome da Equipe:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="nomeEquipe"
				placeholder="Digite aqui o nome da equipe..."><br>
				<br>
		</div>
<!-- Campo Estado: -->
		<label><?php echo(utf8_encode('Estado:'))?></label>
		<!--  -->
		<select name="estado">

			<!-- Op��o 1: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == "Minas Gerais") {
					echo "selected";
				}
				?>>Minas Gerais</option>

			<!-- Op��o 2: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == "S�o Paulo") {
					echo "selected";
				}
				?>><?php echo(utf8_encode("S�o Paulo")); ?></option>

			<!-- Op��o 3: -->
			<option
				<?php
				if (isset ( $_POST ["estado"] ) && $_POST ["estado"] == "Goias") {
					echo "selected";
				}
				?>>Goias</option>


		</select> <br> <!-- br quebra linha -->

		<!-- Campo Nome da Equipe -->
			<label>Nome do estadio:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="nomeEstadio"
				placeholder="Digite o nome do estadio.."><br>
			
			<label>Cidade:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="cidade"
				placeholder="Digite o nome da cidade.."><br>
		<br>

	
<br>

		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input id="botaoEnviar" type="submit"
			value="Enviar os dados">
	</form>

	<br>
	<a id="botao" href="./equipeConsulta.php">Consultar Equipes</a>
			<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. � class e # � id -->
</body>
</html>