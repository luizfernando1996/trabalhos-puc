<?php
include ("../FileMySQL.php"); // <--Segue control e clique no caminho para ter certeza qe o caminho est� correto
class EntidadeClasseCrude extends ConectaAoMySql {
	public function inserirBanco($nome, $TerritorioDeAbrangencia, $Presidente) {
		$sql = "INSERT INTO entidade
                (Nome, TerritorioDeAbrangencia, Presidente)
                VALUES (?, ?, ?)";
		
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $nome );
		$stmt->bindParam ( 2, $TerritorioDeAbrangencia );
		$stmt->bindParam ( 3, $Presidente );
		
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			$valido = false;
			$erro = "Erro c�digo " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		} else
			echo "Cadastro efetuado com sucesso";
	}
	public function lerEntidades() {
		
		// PDO � o objeto da classe base
		$sql = "SELECT * FROM entidade";
		
		// $rs-->result set
		$rs = $this->PDO->prepare ( $sql );
		
		if ($rs->execute ()) {
			
			// ::pegar algum campo estatico da classe PDO
			while ( $registro = $rs->fetch ( PDO::FETCH_OBJ ) ) {
				echo "<tr>";
				
				// o operador . � responsavel pela concatena��o
				// nomes das colunas do banco
				
				echo "<td>" . $registro->Nome . "</td>";
				echo "<td>" . $registro->TerritorioDeAbrangencia . "</td>";
				echo "<td>" . $registro->Presidente . "</td>";
				// ser� utilizada no m�todo abaixo o de deletar e alterar
				
				$primaryKey = array (
						$registro->Nome
				);
				
				echo "<td>" . "<a href='?excluir=true
                &nome=" . $primaryKey [0] . "'>Deletar</a>" . "</td>";
				echo "<td>" . "<a href='./entidadeUpdate.php?alterar=true
				&nome=" . $primaryKey [0] . "'>Alterar</a>", "</td>";
				
				echo "</tr>";
			}
		} else {
			echo "Falha na sele��o de usu�rios <br>";
		}
	}
	public function deletarEntidade($primaryKey) {
		$sql = ("DELETE FROM entidade where Nome=?");
		
		$stmt = $this->PDO->prepare ( $sql );
		$stmt->bindParam ( 1, $primaryKey [0] );
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			echo "Erro c�digo " . $stmt->errorCode () . ":";
			echo implode ( ",", $stmt->errorInfo () );
		} else
			echo "Sucesso : entidade removida com sucesso <br><br>";
	}
	public function lerEntidade($primaryKey) {
		$sql = "SELECT * FROM entidade WHERE Nome= ? ";
		
		$rs = $this->PDO->prepare ( $sql );
		
		$rs->bindParam ( 1, $primaryKey [0] );
		
		if ($rs->execute ()) {
			// rs->fetch captura cada linha da tabela, isto �, cada objeto jogador da tabela
			// e manda para $registro
			if ($registro = $rs->fetch ( PDO::FETCH_OBJ )) {
				// txtNomeJogador � o nome no formulario
				// enquanto $registro->Nome � o nome da coluna no banco
				$_POST ["txtNomeEntidade"] = $registro->Nome;
				$_POST ["territorio"] = $registro->TerritorioDeAbrangencia;
				$_POST ["presidente"] = $registro->Presidente;
			} else
				$erro = "Registro n�o encontrado";
		} else
			$erro = "Falha na captura do registro";
	}
	public function alterarDadosEntidades($primaryKey,$campos) {
		$sql = "UPDATE entidade SET
		Nome = ?,
		TerritorioDeAbrangencia = ?,
		Presidente = ?
		WHERE Nome = ?";
		
		$stmt = $this->PDO->prepare ( $sql );
		$stmt->bindParam ( 1, $campos [0] );
		$stmt->bindParam ( 2, $campos [1] );
		$stmt->bindParam ( 3, $campos [2] );
		$stmt->bindParam ( 4, $primaryKey [0] );
		
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