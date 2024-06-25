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
	
	include ('./CompeticaoEquipeCrud.php');
	
	$brasileiraoCruzeiro = new CompeticaoEquipeClasseCrude ();
	$posicaoCampeonato = $_POST ["posicaoCampeonato"];
	$NomeEquipe = $_POST ["txtNomeEquipe"];
	$nomeCompeticao = $_POST ["nomeCompeticao"];
	$pontuacao = $_POST ["pontuacao"];
	$golsFavor = $_POST["golsFavor"];
	$golsContra = $_POST["golsContra"];
	
	$brasileiraoCruzeiro->inserirCompeticaoEquipe ( $posicaoCampeonato, $NomeEquipe, 
			$nomeCompeticao, $pontuacao, $golsFavor,$golsContra);
	
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

				<li><a href="#">Cadastrar CompeticaoEquipe</a></li>
				<li><a href="./CompeticaoConsulta.php">Consultar CompeticaoEquipe</a></li>
				<li><a href="./CompeticaoUpdate.php">Alterar dados da
						CompeticaoEquipe</a></li>
				<li><a href="../homeFormularios.php">Olhar outra tabela</a></li>
			</ul>
		</nav>
	</header>

	<div id="tituloForm"><?php echo utf8_encode("Cadastro de Competi��es de Equipes")?></div>
	<form id="formularioInteiro" name="tabelaJogador" method="post"
		action="?validar=true">

		<!-- Campo Posicao da Equipe -->
		<div class="retiraQuebraDeLinha">
			<label><?php echo utf8_encode("Informe a posi��o no campeonato:")?></label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required"
				name="posicaoCampeonato"
				placeholder=<?php echo utf8_encode("Digite aqui a posi��o da equipe...")?>><br>
			<br>
		</div>

		<!-- Campo Nome da Equipe -->
		<div class="retiraQuebraDeLinha">
			<label>Nome da Equipe:</label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required"
				name="txtNomeEquipe" placeholder="Digite aqui o nome da equipe..."><br>
			<br>
		</div>
		
		
		<br>
		<!-- Campo Nome da Competicao -->
		<div id="retiraQuebraDeLinha">
			<label><?php echo utf8_encode("ID da competi��o:");?></label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required"
				name="nomeCompeticao" placeholder="Digite o nome da competicao..."><br>
		</div>

		<!-- Campo Pontuacao-->
		<div id="retiraQuebraDeLinha">
			<label><?php echo utf8_encode("Pontua��o")?></label>
			<!-- required="required"->exige o preenchimento -->
			<input id="inputs" type="text" required="required" name="pontuacao"
				placeholder=<?php echo utf8_encode("Digite a pontua��o")?>><br>
		</div>

		<br> <label><?php echo(utf8_encode("Gols a Favor:"))?></label>
		<input id="inputs" type="number" name="golsFavor"><br>
		
		<br> <label><?php echo(utf8_encode("Gols Contra:"))?></label>
		<input id="inputs" type="number" name="golsContra"><br>
		
		<!--BOTOES PARA ENVIAR-->
		<input id="botaoEnviar" type="reset" value="Limpar os dados"> <input
			id="botaoEnviar" type="submit" value="Enviar os dados">
	</form>

	<br>
	<a id="botao" href="./CompeticaoConsulta.php">Consultar CompeticaoEquipe</a>
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