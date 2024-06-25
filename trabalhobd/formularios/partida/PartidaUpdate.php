<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<Title><?php utf8_encode("Atualiza��o de dados de Partidas");?></Title>

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
				<li><a href="./PartidaConsulta.php">Consultar a partida</a></li>
				<li><a href="#">Editar dados da partida</a></li>
				<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>
			</ul>
		</nav>
	</header>
<?php
$erro = null;
$valido = false;
include ('./PartidaCRUD.php');
$objAux = new PartidaCRUDClasse ();

// respos�vel por editar os dados carregados do else
if (isset ( $_POST ["primaryKey"] )) { // isset retorna false se o valor for null ou se a variavel n�o existir
	$primaryKey = $_POST ["primaryKey"];
	$_POST ["txtDisputaDePenaltis"] == "Sim" ? $_POST ["txtDisputaDePenaltis"] = 1 : $_POST ["txtDisputaDePenaltis"] = 0;
	$_POST ["txtGolQualificado"] == "Sim" ? $_POST ["txtGolQualificado"] = 1 : $_POST ["txtGolQualificado"] = 0;
	$campos = array (
			$_POST ["txtIDEquipeDeArbitragem"],
			$_POST ["txtNomeEntidade"],
			$_POST ["txtData"],
			$_POST ["txtHora"],
			$_POST ["txtResultadoFinal"],
			$_POST ["txtEquipeVencedora"],
			$_POST ["txtDisputaDePenaltis"],
			$_POST ["txtGolQualificado"],
			$_POST ["txtIdCompeticao"],
			$_POST ["txtNomeEquipeMandante"],
			$_POST ["txtNomeEstadio"],
			$_POST ["txtNomeEquipeVisitante"] 
	);
	$objAux->alterarDadosPartida ( $primaryKey, $campos );
} // responsavel por receber todos os dados quando a pagina � carregada e apresentar ao usuario
else {
	$primaryKey = array (
			
			$_REQUEST ["idPartida"] 
	
	);
	// Os campos do formulario ficam preenchidos com o valor
	// ap�s o m�todo consultar jogador ser executado atrav�s do metodo post do php
	$objAux->consultarPartida ( $primaryKey );
}
?>










<body>

	<!-- estrutura fundamental por passar a primary key para o if-->


	<h1 id="#tituloForm">Editar dados de Partidas</h1>


	<form id="formularioInter" name="tabelaAuxiliares" method="post"
		action="?validar=true">

		<!-- Campo ID Equipe De Arbitragem -->
		<div class="retiraQuebraDeLinha">
			<label>ID Equipe de Arbitragem:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtIDEquipeDeArbitragem"
				placeholder="Digite o id da equipe de arbitragem..."
				<?php if(isset($_POST ["txtIDEquipeDeArbitragem"])){echo "value='".$_POST ["txtIDEquipeDeArbitragem"]."'";}?>><br>
		</div>




		<!-- Campo Nome da Entidade -->
		<div id="retiraQuebraDeLinha">
			<label>Nome Entidade:</label>
			<!-- required="required"->exige o preenchimento -->
			<input type="text" required="required" name="txtNomeEntidade"
				placeholder="Digite o nome da entidade..."
				<?php if(isset($_POST ["txtNomeEntidade"])){echo "value='".$_POST ["txtNomeEntidade"]."'";}?>><br>
		</div>
		<br>




		<!-- Campo Data-->
		<label>Digite a data da partida:</label> <input type="text"
			id="calendario" placeholder="Selecione a data ao lado" name="txtData"
			<?php if(isset($_POST ["txtData"])){echo "value='".$_POST ["txtData"]."'";}?>><br>

		<!-- Script do calendario abaixo -->
		<script>
$(function() {
	
	//Apresenta o calendario
    $("#calendario" ).datepicker({
        
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
		<br>

		<!-- Campo Hora -->
		<div class="retiraQuebraDeLinha">
			<label>Hora:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="time" required="required" name="txtHora"
				placeholder="Digite a hora da partida.."
				<?php if(isset($_POST ["txtHora"])){echo "value='".$_POST ["txtHora"]."'";}?>>

			<br>
		</div>
		<br>

		<!-- Campo Resultado Final -->
		<div class="retiraQuebraDeLinha">
			<label>Resultado Final:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required"
				name="txtResultadoFinal" placeholder="Mandante x Visitante.."
				<?php if(isset($_POST ["txtResultadoFinal"])){echo "value='".$_POST ["txtResultadoFinal"]."'";}?>>

			<br>
		</div>

		<!-- Campo Equipe Vencedora -->
		<div class="retiraQuebraDeLinha">
			<label>Equipe Vencedora:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required"
				name="txtEquipeVencedora"
				placeholder="Digite o nome da equipe vencedora.."
				<?php if(isset($_POST ["txtEquipeVencedora"])){echo "value='".$_POST ["txtEquipeVencedora"]."'";}?>><br>
			<br>
		</div>



		<!-- Campo Dispulta de Penaltis: -->
		<label><?php echo(utf8_encode('Disputa de Penaltis:'))?></label>
		<!--  -->
		<select id="inputs" name="txtDisputaDePenaltis">


			<!-- Op��o 1: -->
			<option
				<?php
				if (isset ( $_POST ["txtDisputaDePenaltis"] ) && $_POST ["txtDisputaDePenaltis"] == "Sim") {
					echo "selected";
				}
				?>>Sim</option>

			<!-- Op��o 2: -->
			<option
				<?php
				if (isset ( $_POST ["txtDisputaDePenaltis"] ) && $_POST ["txtDisputaDePenaltis"] == "N�o") {
					echo "selected";
				}
				?>><?php echo utf8_encode("N�o")?></option>

		</select> <br> <br>

		<!-- Campo Gol Qualificado: -->

		<label><?php echo(utf8_encode('Gol Qualificado:'))?></label>
		<!-- Op��o 1 -->
		<select id="inputs" name="txtGolQualificado">

			<!-- Op��o 1: -->
			<option
				<?php
				if (isset ( $_POST ["txtGolQualificado"] ) && $_POST ["txtGolQualificado"] == "Sim") {
					echo "selected";
				}
				?>>Sim</option>

			<!-- Op��o 2: -->
			<option
				<?php
				if (isset ( $_POST ["txtGolQualificado"] ) && $_POST ["txtGolQualificado"] == "N�o") {
					echo "selected";
				}
				?>><?php echo utf8_encode("N�o")?></option>

		</select> <br> <br>

		<!-- Campo Nome da Competi��o -->
		<br>
		<div class="retiraQuebraDeLinha">
			<label><?php echo utf8_encode("Competi��o:")?>:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required"
				name="txtIdCompeticao" placeholder="Digite o nome da competicao.."
				<?php if(isset($_POST ["txtIdCompeticao"])){echo "value='".$_POST ["txtIdCompeticao"]."'";}?>><br>
			<br>
		</div>


		<!-- Campo Equipe Mandante -->
		<div class="retiraQuebraDeLinha">
			<label>Equipe Mandante:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required"
				name="txtNomeEquipeMandante"
				placeholder="Digite o nome da equipe mandante.."
				<?php if(isset($_POST ["txtNomeEquipeMandante"])){echo "value='".$_POST ["txtNomeEquipeMandante"]."'";}?>><br>
			<br>
		</div>



		<!-- Campo Equipe Visitante -->
		<div class="retiraQuebraDeLinha">
			<label>Equipe Visitante:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required"
				name="txtNomeEquipeVisitante"
				placeholder="Digite o nome da equipe visitante.."
				<?php if(isset($_POST ["txtNomeEquipeVisitante"])){echo "value='".$_POST ["txtNomeEquipeVisitante"]."'";}?>><br>
			<br>
		</div>



		<!-- Campo Estadio -->
		<div class="retiraQuebraDeLinha">
			<label>Estadio:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required"
				name="txtNomeEstadio" placeholder="Digite o nome do estadio.."
				<?php if(isset($_POST ["txtNomeEstadio"])){echo "value='".$_POST ["txtNomeEstadio"]."'";}?>><br>
			<br>
		</div>

		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input
			id="botaoEnviar" type="submit" value="Alterar os dados">

		<!-- Bot�o invisivel responsav�l por capturar as primaryKey e assim promover a edi��o dos dados -->
		<input type="hidden" name=primaryKey
			value="<?php
			if (isset ( $_REQUEST ["idPartida"] ))
				// nome dos campos do m�todo ler jogadores no crude
				echo $_REQUEST ["idPartida"];
			else
				// nomes dos campos desta tabela
				echo $_POST ["idPartida"];
			?>">
	</form>


	<a id="botao" href="./PartidaConsulta.php">Consultar Partidas</a>

	<footer class="footer">
		<img class="footer" src="../utilitarios/figuras/rodape.png"
			alt="rodape">
	</footer>
	<!-- em estilo. � class e # � id -->
</body>




</html>