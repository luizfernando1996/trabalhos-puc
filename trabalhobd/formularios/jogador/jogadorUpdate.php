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

				<li><a href="./JogadorCadastrar.php">Cadastrar Jogador</a></li>
				<li><a href="./jogadorConsulta.php">Consultar Jogadores</a></li>
				<li><a href="#">Alterar dados dos jogadores</a></li>
				<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>
			</ul>
		</nav>
	</header>

<?php
$erro = null;
$valido = false;
include ('./FileJogCrud.php');
$Robinho = new JogadorCrude ();

// respos�vel por editar os dados carregados do else
if (isset ( $_POST ["primaryKey"] )) { // isset retorna false se o valor for null ou se a variavel n�o existir
	$primaryKey = explode ( "*", $_POST ["primaryKey"] );
	
	$campos = array (
			$_POST ["posicao"],
			$_POST ["txtNomeJogador"],
			$_POST ["dataNascimento"],
			$_POST ["numeroCamisa"],
			$_POST ["nomeEquipe"] 
	);
	
	$Robinho->alterarDadosJogador ( $primaryKey, $campos );
} // responsavel por receber todos os dados quando a pagina � carregada e apresentar ao usuario
else {
	$primaryKey = array (
			$_REQUEST ["camisa"],
			$_REQUEST ["nomeEquipe"] 
	);
	// Os campos do formulario ficam preenchidos com o valor
	// ap�s o m�todo consultar jogador ser executado atrav�s do metodo post do php
	$Robinho->consultarJogador ( $primaryKey );
}
?>



<body>

	<!-- estrutura fundamental por passar a primary key para o if-->


	<h1 id="tiloDoForm">
		<pre>     Editar dados de Jogadores</pre>
	</h1>
	<form id="formularioInter" name="tabelaJogador" method="post"
		action="?validar=true">
		<!-- Campo Nome -->
		<div class="retiraQuebraDeLinha">
			<label>Nome:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtNomeJogador"
				placeholder="Digite aqui o seu nome..."
				<?php if(isset($_POST ["txtNomeJogador"])){echo "value='".$_POST ["txtNomeJogador"]."'";}?>><br>
		</div>
		<!-- Campo Data Nascimento -->
		<label>Digite sua data de nascimento:</label> <input type="text"
			id="calendario" placeholder="Selecione a data ao lado"
			name="dataNascimento"
			<?php if(isset($_POST ["dataNascimento"])){echo "value='".$_POST ["dataNascimento"]."'";}?>><br>

		<!-- Script do calendario abaixo -->
		<script>
$(function() {
	
	//Apresenta o calendario
    $( "#calendario" ).datepicker({
        
    	//Apresenta o icone do calendario
        showOn: "button",
        buttonImage: "../utilitarios/mes/calendar.png",
        buttonImageOnly: true,
        showButtonPanel:true,
        
        //Permite que o usuario selecione o mes e o ano
        changeMonth: true,
        changeYear: true,
        
        //Formata a data
        dateFormat: 'yy-mm-dd',
        
       //Traduzindo o calendario
       dayNames: ['Domingo','Segunda','Ter�a','Quarta','Quinta','Sexta','S�bado','Domingo'],
       dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
       dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','S�b','Dom'],
       monthNames: ['Janeiro','Fevereiro','Mar�o','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
       monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
       
       //Apresenta os 31 dias do mes mais alguns dias do proximo m�s
       showOtherMonths: true,
       selectOtherMonths: true
    });    
});
</script>


		<!-- Campo Posicao: -->
		<label><?php echo(utf8_encode('Posi��o:'))?></label>
		<!--  -->
		<select name="posicao">

			<!-- Op��o 1: -->
			<option
				<?php
				if (isset ( $_POST ["posicao"] ) && $_POST ["posicao"] == "Atacante") {
					echo "selected";
				}
				?>>Atacante</option>

			<!-- Op��o 2: -->
			<option
				<?php
				if (isset ( $_POST ["posicao"] ) && $_POST ["posicao"] == "Zagueiro(a)") {
					echo "selected";
				}
				?>>Zagueiro(a)</option>

			<!-- Op��o 3: -->
			<option
				<?php
				if (isset ( $_POST ['posicao'] ) && $_POST ['posicao'] == "Goleiro(a)") {
					echo "selected";
				}
				?>>Goleiro(a)</option>


		</select> <br> <label><?php echo(utf8_encode('N�mero da camisa'))?></label>
		<input type="number" name="numeroCamisa"
			<?php if(isset($_POST ["numeroCamisa"])){echo "value='".$_POST ["numeroCamisa"]."'";}?>><br>

		<!-- Campo Nome da Equipe -->
		<div id="retiraQuebraDeLinha">
			<label>Nome da equipe:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="nomeEquipe"
				placeholder="Digite o nome da equipe..."
				<?php if(isset($_POST ["nomeEquipe"])){echo "value='".$_POST ["nomeEquipe"]."'";}?>><br>
		</div>
		<br>

		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input
			id="botaoEnviar" type="submit" value="Alterar os dados">

		<!-- Bot�o invisivel responsav�l por capturar as primaryKey e assim promover a edi��o dos dados -->
		<input type="hidden" name=primaryKey
			value="<?php
			if (isset ( $_REQUEST ["camisa"] ) && isset ( $_REQUEST ["nomeEquipe"] ))
				// nome dos campos do m�todo ler jogadores no crude
				echo $_REQUEST ["camisa"] . "*" . $_REQUEST ["nomeEquipe"];
			else
				// nomes dos campos desta tabela
				echo $_POST ["numeroCamisa"] . "*" . $_POST ["nomeEquipe"] ;
			?>">
	</form>


	<a id="botao" href="./jogadorConsulta.php">Consultar Jogadores</a>
	<footer class="footer">
		<img class="footer" src="../utilitarios/figuras/rodape.png"
			alt="rodape">
	</footer>
	<!-- em estilo. � class e # � id -->
</body>
</html>