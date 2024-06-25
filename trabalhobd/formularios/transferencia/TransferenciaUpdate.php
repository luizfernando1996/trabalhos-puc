<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title><?php utf8_encode("Atualiza��o de dados do Jogador");?></Title>

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

				<li><a href="./TransferenciaCadastrar.php">Cadastrar Transferencia</a></li>
				<li><a href="./TransferenciaConsulta.php">Consultar Transferencia</a></li>
				<li><a href="#">Alterar dados da transferencia</a></li>
				<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>
			</ul>
		</nav>
	</header>

<?php
$erro = null;
$valido = false;
include ('./TransferenciaCrud.php');
$PeleMilanBarcelona = new Transferencia_Crude ();

// respos�vel por editar os dados carregados do else
if (isset ( $_POST ["primaryKey"] )) { // isset retorna false se o valor for null ou se a variavel n�o existir
	$primaryKey = explode ( "*", $_POST ["primaryKey"] );
	
	$campos = array (
			$_POST ["numeroCamisa"],
			$_POST ["NomeEquipeAntiga"],
			$_POST ["nomeEquipeFutura"] 
	);
	echo $campos [0] . " " . $campos [1] . " " . $campos [2] . " " . $primaryKey [0];
	$PeleMilanBarcelona->alterarDadosTransferencia ( $primaryKey, $campos );
} // responsavel por receber todos os dados quando a pagina � carregada e apresentar ao usuario
else {
	$primaryKey = array (
			$_REQUEST ["id"] 
	);
	// Os campos do formulario ficam preenchidos com o valor
	// ap�s o m�todo consultar jogador ser executado atrav�s do metodo post do php
	$PeleMilanBarcelona->consultarTransferencia ( $primaryKey );
}
?>
<body>

	<!-- estrutura fundamental por passar a primary key para o if-->


	<h1 id="tiloDoForm">
		<pre>     Editar dados das Transferencias</pre>
	</h1>
	<form id="formularioInter" name="tabelaJogador" method="post"
		action="?validar=true">

		<!-- Campo Numero da Camisa -->
		<label><?php echo(utf8_encode('N�mero da camisa'))?></label> <input
			type="number" name="numeroCamisa"
			<?php if(isset($_POST ["numeroCamisa"])){echo "value='".$_POST ["numeroCamisa"]."'";}?>><br>

		<div class="retiraQuebraDeLinha">
			<label>Nome da Equipe:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="NomeEquipeAntiga"
				placeholder="Digite aqui o nome da equipe..."
				<?php if(isset($_POST ["NomeEquipeAntiga"])){echo "value='".$_POST ["NomeEquipeAntiga"]."'";}?>><br>
		</div>

		<div class="retiraQuebraDeLinha">
			<label>Nome da Equipe Futura:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="nomeEquipeFutura"
				placeholder="Digite aqui o nome da equipe futura..."
				<?php if(isset($_POST ["nomeEquipeFutura"])){echo "value='".$_POST ["nomeEquipeFutura"]."'";}?>><br>
		</div>
		<br>

		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input
			id="botaoEnviar" type="submit" value="Alterar os dados">

		<!-- Bot�o invisivel responsav�l por capturar as primaryKey e assim promover a edi��o dos dados -->
		<input type="hidden" name=primaryKey
			value="<?php
				// nome dos campos do m�todo ler jogadores no crude
				echo $_REQUEST ["id"];
			?>">
	</form>


	<a id="botao" href="./TransferenciaConsulta.php">Consultar Transferencias</a>
	<footer class="footer">
		<img class="footer" src="../utilitarios/figuras/rodape.png"
			alt="rodape">
	</footer>
	<!-- em estilo. � class e # � id -->
</body>
</html>