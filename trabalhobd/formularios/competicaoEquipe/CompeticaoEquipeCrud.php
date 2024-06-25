<?php
include ("../FileMySQL.php"); // <--Segue control e clique no caminho para ter certeza qe o caminho est� correto
class CompeticaoEquipeClasseCrude extends ConectaAoMySql {
	private $primaryKey;
	public function inserirCompeticaoEquipe($posicao, $NomeEquipe, $NomeDaCompeticao, $Pontuacao, $GolsFavor, $golsContra) {
		$sql = "INSERT INTO competicaoequipe
                (Posicao, NomeEquipe, IdDaCompeticao, Pontuacao, GolsFavor,GolsContra)
                VALUES (?, ?, ?, ?,?,?)";
		
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $posicao );
		$stmt->bindParam ( 2, $NomeEquipe );
		$stmt->bindParam ( 3, $NomeDaCompeticao );
		$stmt->bindParam ( 4, $Pontuacao );
		$stmt->bindParam ( 5, $GolsFavor );
		$stmt->bindParam ( 6, $golsContra );
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			$valido = false;
			$erro = "Erro c�digo " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		}
	}
	public function lerCompeticaoEquipe() {
		// PDO � o objeto da classe base
		$sql = "SELECT * FROM competicaoequipe";
		// $rs-->result set
		$rs = $this->PDO->prepare ( $sql );
		if ($rs->execute ()) {
			// ::pegar algum campo estatico da classe PDO
			while ( $registro = $rs->fetch ( PDO::FETCH_OBJ ) ) {
				echo "<tr>";
				// o operador . � responsavel pela concatena��o
				// nomes das colunas do banco
				echo "<td>" . $registro->Posicao . "</td>";
				echo "<td>" . $registro->NomeEquipe . "</td>";
				echo "<td>" . $registro->IdDaCompeticao. "</td>";
				echo "<td>" . $registro->Pontuacao . "</td>";
				echo "<td>" . $registro->GolsFavor . "</td>";
				echo "<td>" . $registro->GolsContra . "</td>";
				// ser� utilizada no m�todo abaixo o de deletar e alterar
				$primaryKey = array (
						$registro->NomeEquipe,
						$registro->IdDaCompeticao
				);
				
				echo "<td>" . "<a href='?excluir=true
                &NomeEquipe=" . $primaryKey [0] . "&IdDaCompeticao=" . $primaryKey [1] . "'>Deletar</a>" . "</td>";
				echo "<td>" . "<a href='./CompeticaoUpdate.php?alterar=true
				&NomeEquipe=" . $primaryKey [0] . "&IdDaCompeticao=" . $primaryKey [1] . "'>Alterar</a>", "</td>";
				
				echo "</tr>";
			}
		} else {
			echo "Falha na sele��o de usu�rios <br>";
		}
	}
	public function deletarCompeticaoEquipe($primaryKey) {
		$sql = ("DELETE FROM competicaoequipe where NomeEquipe=? && IdDaCompeticao=?");
		
		$stmt = $this->PDO->prepare ( $sql );
		$stmt->bindParam ( 1, $primaryKey [0] );
		$stmt->bindParam ( 2, $primaryKey [1] );
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			echo "Erro c�digo " . $stmt->errorCode () . ":";
			echo implode ( ",", $stmt->errorInfo () );
		} else
			echo "Sucesso : equipe da competi��o removida com sucesso <br><br>";
	}
	public function consultarCompeticaoEquipe($primaryKey) {
		$sql = "SELECT * FROM competicaoequipe WHERE NomeEquipe	= ? && IdDaCompeticao= ?";
		$rs = $this->PDO->prepare ( $sql );
		
		$rs->bindParam ( 1, $primaryKey [0] );
		$rs->bindParam ( 2, $primaryKey [1] );
		if ($rs->execute ()) {
			// rs->fetch captura cada linha da tabela, isto �, cada objeto jogador da tabela
			// e manda para $registro
			if ($registro = $rs->fetch ( PDO::FETCH_OBJ )) {
				// txtNomeJogador � o nome no formulario
				// enquanto $registro->Nome � o nome da coluna no banco
				$_POST ["txtPosicao"] = $registro->Posicao;
				$_POST ["nomeEquipe"] = $registro->NomeEquipe;
				$_POST ["idcompeticao"] = $registro->IdDaCompeticao;
				$_POST ["pontuacao"] = $registro->Pontuacao;
				$_POST ["golsFavor"] = $registro->GolsFavor;
				$_POST ["golsContra"] = $registro->GolsContra;
			} else
				$erro = "Registro n�o encontrado";
		} else
			$erro = "Falha na captura do registro";
	}
	public function alterarCompeticaoEquipe($primaryKey, $campos) {
		$sql = "UPDATE competicaoequipe SET 
		Posicao = ?, 
		NomeEquipe = ?, 
		NomeDaCompeticao = ?, 
		Pontuacao = ?, 
		GolsFavor = ?,
  		GolsContra = ?
		WHERE NomeEquipe= ? && NomeDaCompeticao = ?";
		
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $campos [0] );
		$stmt->bindParam ( 2, $campos [1] );
		$stmt->bindParam ( 3, $campos [2] );
		$stmt->bindParam ( 4, $campos [3] );
		$stmt->bindParam ( 5, $campos [4] );
		$stmt->bindParam ( 6, $campos [5] );
		$stmt->bindParam ( 7, $primaryKey [0] );
		$stmt->bindParam ( 8, $primaryKey [1] );
		
		$stmt->execute ();
		if ($stmt->errorCode () != "00000") {
			$valido = false;
			$erro = "Erro c�digo " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		} else {
			echo utf8_encode ( "Altera��o realizada com sucesso" );
		}
	}
}

?>
