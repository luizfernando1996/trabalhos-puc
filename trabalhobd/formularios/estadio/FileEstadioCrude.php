<?php
include ("../FileMySQL.php"); // <--Segue control e clique no caminho para ter certeza qe o caminho est� correto
class EstadioCrude extends ConectaAoMySql {
	private $primaryKey;
	public function inserirBanco($NomeEstadio, $capacidade, $cidade, $estado) {
		$sql = "INSERT INTO estadio
                (Nome, Capacidade, Cidade, Estado)
                VALUES (?, ?, ?, ?)";
		
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $NomeEstadio );
		$stmt->bindParam ( 2, $capacidade );
		$stmt->bindParam ( 3, $cidade );
		$stmt->bindParam ( 4, $estado );
		
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			$valido = false;
			$erro = "Erro c�digo " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		}
	}
	public function lerEstadios() {
		// PDO � o objeto da classe base
		$sql = "SELECT * FROM estadio";
		// $rs-->result set
		$rs = $this->PDO->prepare ( $sql );
		
		if ($rs->execute ()) {
			// ::pegar algum campo estatico da classe PDO
			while ( $registro = $rs->fetch ( PDO::FETCH_OBJ ) ) {
				echo "<tr>";
				// o operador . � responsavel pela concatena��o
				// nomes das colunas do banco
				echo "<td>" . $registro->Nome . "</td>";
				echo "<td>" . $registro->Capacidade . "</td>";
				echo "<td>" . $registro->Cidade . "</td>";
				echo "<td>" . $registro->Estado . "</td>";
				// ser� utilizada no m�todo abaixo o de deletar e alterar
				$primaryKey = array (
						$registro->Nome 
				);
				
				echo "<td>" . "<a href='?excluir=true
                &nome=" . $primaryKey [0] . "'>Deletar</a>" . "</td>";
				echo "<td>" . "<a href='./estadioUpdate.php?alterar=true
				&nome=" . $primaryKey [0] . "'>Alterar</a>", "</td>";
				
				echo "</tr>";
			}
		} else {
			echo "Falha na sele��o de usu�rios <br>";
		}
	}
	public function deletarEstadio($primaryKey) {
		$sql = ("DELETE FROM estadio WHERE 	Nome=? ");
		
		$stmt = $this->PDO->prepare ( $sql );
		$stmt->bindParam ( 1, $primaryKey [0] );
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			echo "Erro c�digo " . $stmt->errorCode () . ":";
			echo implode ( ",", $stmt->errorInfo () );
		} else
			echo "Sucesso : estadio removido com sucesso <br><br>";
	}
	public function consultarEstadio($primaryKey) {
		$sql = "SELECT * FROM estadio WHERE Nome=?";
		$rs = $this->PDO->prepare ( $sql );
		
		$rs->bindParam ( 1, $primaryKey [0] );
		
		if ($rs->execute ()) {
			// rs->fetch captura cada linha da tabela, isto �, cada objeto jogador da tabela
			// e manda para $registro
			if ($registro = $rs->fetch ( PDO::FETCH_OBJ )) {
				// txtNomeJogador � o nome no formulario
				// enquanto $registro->Nome � o nome da coluna no banco
				$_POST ["nomeEstadio"] = $registro->Nome;
				$_POST ["capacidade"] = $registro->Capacidade;
				$_POST ["cidade"] = $registro->Cidade;
				$_POST ["estado"] = $registro->Estado;
			} else
				$erro = "Registro n�o encontrado";
		} else
			$erro = "Falha na captura do registro";
	}
	public function alterarDadosEstadio($primaryKey, $campos) {
		$sql = "UPDATE estadio SET 
		Nome = ?, 
		Capacidade = ?, 
		Cidade = ?, 
		Estado = ?
		WHERE Nome = ? ";
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $campos [0] );
		$stmt->bindParam ( 2, $campos [1] );
		$stmt->bindParam ( 3, $campos [2] );
		$stmt->bindParam ( 4, $campos [3] );
		$stmt->bindParam ( 5, $primaryKey );

		
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
