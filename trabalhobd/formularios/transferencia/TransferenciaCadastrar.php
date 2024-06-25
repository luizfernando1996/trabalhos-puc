<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title>Cadastro de Jogador</Title>

<link rel="stylesheet"
	href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
<!-- hgghghg  -->
<style></style>
<link rel="stylesheet" type="text/css" href="../estilos.css">

</head>
<?php
$erro = null;
$valido = false;
// isset retorna false se o valor for null ou se a variavel n�o existir
if (isset ( $_REQUEST ["validar"] ) && $_REQUEST ["validar"] == true) {
	
	include ('./TransferenciaCrud.php');
	
	$jogadorTransferido = new Transferencia_Crude();
	$camisa= $_POST ["camisa"];
	$nomeEquipeAtual= $_POST ["nomeEquipeAtual"];
	$nomeEquipeFutura= $_POST ["nomeEquipeFutura"];
	
	$jogadorTransferido->inserirTransferencia( $camisa, $nomeEquipeAtual, $nomeEquipeFutura );
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

				<li><a href="#">Cadastrar Transferencia</a></li>
				<li><a href="./TransferenciaConsulta.php">Consultar Transferencia</a></li>
				<li><a href="./TransferenciaUpdate.php">Alterar dados da
						transferencia</a></li>
				<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>
			</ul>
		</nav>
	</header>

	<div id="tituloForm">Cadastro de Transferencias</div>
	<form id="formularioInteiro" name="tabelaJogador" method="post"
		action="?validar=true">

		<!-- Campo Numero camisa -->
		<label><?php echo(utf8_encode('N�mero da camisa'))?></label>
		<input id="inputs" type="number" name="camisa"
			placeholder="Informe o numero da camisa..."><br>
		
		<!-- Campo Nome da Equipe Atual -->
		<div class="retiraQuebraDeLinha">
			<label>Digite o nome da equipe</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="nomeEquipeAtual"><br>
		</div>

		<br>
		<!-- Campo Nome da Equipe Futura-->
		<div id="retiraQuebraDeLinha">
			<label>Informe o nome da futura equipe do jogador:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required"
				name="nomeEquipeFutura"
				placeholder="Digite o nome da equipe futura do jogador..."><br>
		</div>
		<br>

		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input
			id="botaoEnviar" type="submit" value="Enviar os dados">
	</form>

	<br>
	<a id="botao" href="./TransferenciaConsulta.php">Consultar Jogadores</a>
	<footer class="footer">
		<img class="footer" src="../utilitarios/figuras/rodape.png"
			alt="rodape">
	</footer>
	<!-- em estilo. � class e # � id -->
</body>
</html>

<!-- Cada bloco de php � um arquivo, logo ele deve ser acessado 
atrav�s do include ou atrav�s de um objeto (somente nos casos em que o arquivo a ser acessado est� contido 
no mesmo arquivo onde se declara o objeto). Desta forma, exceto no ultimo caso todos devem vir com a instru��o include-->