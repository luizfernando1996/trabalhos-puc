<?php
class verificaCamposJogador {
	// Ingenuinamente atribui $_POST como parametro o que � muito errado porque $_POST � uma super variavel,
	//� uma instru��o do php
	public function verificaPosicao($g) {
		echo "sa".$g;
		if (isset ( $g )) {
			if ($g == "Atacante") {
				echo "selected";
			} else if ($g == "Goleiro(a)") {
				echo "selected";
			} else if ($g == "Zagueiro(a)") {
				echo "selected";
			}
		}
	}
}
?>