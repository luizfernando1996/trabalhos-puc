<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Cadastro de Equipe De Arbitragem:</Title>

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
	
	include ("./EquipeDeArbitragemCRUD.php");	
	$objArbitragem = new EquipeDeArbitragemCRUDClasse();
	$nomeBandeirinha1 = $_POST ["txtNomeBandeirinha1"];
	$nomeBandeirinha2= $_POST ["txtNomeBandeirinha2"];
	$nomeArbitro = $_POST ["txtNomeArbitro"];
	$nomeQuartoArbitro = $_POST ["txtNomeQuartoArbitro"];
	$nomeEntidade = $_POST["txtNomeEntidade"];
	$delegado = $_POST["txtDelegado"];
	$nomeCompeticao = $_POST["txtNomeCompeticao"];
	$anoCompeticao = $_POST["txtAnoCompeticao"];
	$numeroJogo = $_POST["txtNumeroJogo"];
	$objArbitragem->inserirBanco ( $nomeBandeirinha1, $nomeBandeirinha2, $nomeArbitro, $nomeQuartoArbitro, $nomeEntidade, $delegado, $nomeCompeticao, $anoCompeticao, $numeroJogo );
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

		<li><a href="#">Equipe De Arbitragem</a></li>
		<li><a href="./EquipeDeArbitragemConsulta.php">Consultar a Equipe De Arbitragem</a></li>
	  		<li><a href="./EquipeDeArbitragemUpdate.php">Editar dados da Equipe de Arbitragem</a>
			</li>
		<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>
</ul>
</nav>
	</header>

	<div id="tituloForm">Cadastro de Equipes de Arbitragem</div>
	<form id="formularioInteiro" name="tabelaEquipeDeArbitragem" method="post"
		action="?validar=true">
		
		<!-- Campo Bandeirinha 1: -->
		<div class="retiraQuebraDeLinha">
			<label>Bandeirinha 1:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtNomeBandeirinha1"
				placeholder="Digite o nome do bandeirinha 1..."><br>
				<br>
		</div>
		
		<!-- Campo Bandeirinha 2 -->
			<div class="retiraQuebraDeLinha">
			<label>Bandeirinha 2:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtNomeBandeirinha2"
				placeholder="Digite o nome do bandeirinha 2.."><br>
				<br>
		</div>	
		
		<!-- Campo Arbitro -->
			<div class="retiraQuebraDeLinha">
			<label>Arbitro:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtNomeArbitro"
				placeholder="Digite o nome do arbitro.."><br>
				<br>
		</div>	
		
		<!-- Campo Quarto Arbitro -->
			<div class="retiraQuebraDeLinha">
			<label>Quarto Arbitro:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtNomeQuartoArbitro"
				placeholder="Digite o nome do  quarto arbitro.."><br>
				<br>
		</div>	
		
		<!-- Campo Entidade -->
			<div class="retiraQuebraDeLinha">
			<label>Entidade:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="txtNomeEntidade"
				placeholder="Digite o nome da entidade.."><br>
				<br>
		</div>
		
		<!-- Campo Delegado-->
			<div class="retiraQuebraDeLinha">
			<label>Delegado:</label>			
			<input id="inputs" type="text"  name="txtDelegado"
				placeholder="Digite o nome do delegado.."><br>
				<br>
		</div>
		
		<!-- Campo Nome Competicao-->
			<div class="retiraQuebraDeLinha">
			<label>Competicao:</label>			
			<input id="inputs" type="text"  name="txtNomeCompeticao"
				placeholder="Digite o nome da competicao.."><br>
				<br>
		</div>
		
		<!-- Campo Ano Competicao-->
			<div class="retiraQuebraDeLinha">
			<label>Ano da Competicao:</label>			
			<input id="inputs" type="number"  name="txtAnoCompeticao"
				placeholder="Digite o ano da competicao.."><br>
				<br>
		</div>
		
		<!-- Campo Numero do Jogo-->
			<div class="retiraQuebraDeLinha">
			<label>Numero do jogo:</label>			
			<input id="inputs" type="text"  name="txtNumeroJogo"
				placeholder="Digite o numero do jogo.."><br>
				<br>
		</div>


<br>	

		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input id="botaoEnviar" type="submit"
			value="Enviar os dados">
	</form>

	<br>
	<a id="botao" href="./EquipeDeArbitragemConsulta.php">Consultar Equipe De Arbitragem</a>
			<footer class="footer">
			<img class="footer" src="../utilitarios/figuras/rodape.png" alt="rodape">
	</footer><!-- em estilo. � class e # � id -->
</body>
</html>

<!-- Cada bloco de php � um arquivo, logo ele deve ser acessado 
atrav�s do include ou atrav�s de um objeto (somente nos casos em que o arquivo a ser acessado est� contido 
no mesmo arquivo onde se declara o objeto). Desta forma, exceto no ultimo caso todos devem vir com a instru��o include-->