<?php
//N�o consegui n�o incluir todo o caminho do arquivo

include ('../FileMySQL.php');
class TecnicoCRUDClasse extends ConectaAoMySql{
	private $primaryKey;
	
	public function inserirBanco($nome, $equipe ){ 
		$sql = "INSERT INTO tecnico
                (Nome, Equipe)
                VALUES (?, ?)";
		
		$stmt = $this->PDO->prepare ( $sql );
		
		$stmt->bindParam ( 1, $nome );
		$stmt->bindParam ( 2, $equipe );	
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			$valido = false;
			$erro = "Erro c�digo " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		}
	}
	public function lerTecnico() {
		// PDO � o objeto da classe base
		$sql = "SELECT * FROM tecnico";
		// $rs-->result set
		$rs = $this->PDO->prepare ( $sql );
		if ($rs->execute ()) {
			// ::pegar algum campo estatico da classe PDO
			while ( $registro = $rs->fetch ( PDO::FETCH_OBJ ) ) {
				echo "<tr>";
				// o operador . � responsavel pela concatena��o
				// nomes das colunas do banco
				echo "<td>" . $registro->Nome . "</td>";
				echo "<td>" . $registro->Equipe . "</td>";
				
				// ser� utilizada no m�todo abaixo o de deletar e alterar
				$primaryKey = array (
						$registro->Nome,
						$registro-> Equipe
				);
				
				echo "<td>" . "<a href='?excluir=true
                &nome=" . $primaryKey [0] .
                "&equipe=" . $primaryKey [1] .
                 "'>Deletar</a>" . "</td>";
				echo "<td>" . "<a href='./TecnicoUpdate.php?alterar=true
				&nome=" . $primaryKey [0] .
				"&equipe=" . $primaryKey [1] .
				 "'>Alterar</a>", "</td>";
				
				echo "</tr>";
			}
		} else {
			echo "Falha na sele��o de usu�rios <br>";
		}
	}
	public function deletarTecnico($primaryKey) {
		$sql = ("DELETE FROM tecnico where Nome=? && Equipe = ?");
		
		$stmt = $this->PDO->prepare ( $sql );
		$stmt->bindParam ( 1, $primaryKey [0] );
		$stmt->bindParam ( 2, $primaryKey [1] );
		$stmt->execute ();
		
		if ($stmt->errorCode () != "00000") {
			echo "Erro c�digo " . $stmt->errorCode () . ":";
			echo implode ( ",", $stmt->errorInfo () );
		} else
			echo "Sucesso : tecnico removido com sucesso <br><br>";
	}
	public function consultarTecnico($primaryKey) {
		$sql = "SELECT * FROM tecnico WHERE Nome = ? && Equipe = ?";
		$rs = $this->PDO->prepare ( $sql );
		
		$rs->bindParam ( 1, $primaryKey [0] );
		$rs->bindParam ( 2, $primaryKey [1] );
		
		
		if ($rs->execute ()) {
			// rs->fetch captura cada linha da tabela, isto �, cada objeto jogador da tabela
			// e manda para $registro
			if ($registro = $rs->fetch ( PDO::FETCH_OBJ )) {
				// txtNomeJogador � o nome no formulario
				// enquanto $registro->Nome � o nome da coluna no banco
				$_POST ["txtNome"] = $registro->Nome;
				$_POST ["txtEquipe"] = $registro->Equipe;
				
			} else
				$erro = "Registro n�o encontrado";
		} else
			$erro = "Falha na captura do registro";
	}
	public function alterarDadosTecnico($primaryKey,$campos){
		
		$sql = "UPDATE tecnico SET
		Nome = ?,
		Equipe = ?		
		WHERE Nome = ? && Equipe = ?";
		
		$stmt = $this->PDO->prepare ( $sql );		
		
		$stmt->bindParam ( 1, $campos[0] );	
		$stmt->bindParam ( 2, $campos[1] );	
		$stmt->bindParam ( 3, $primaryKey[0]);
		$stmt->bindParam ( 4, $primaryKey[1]);
		$stmt->execute ();
		
		if($stmt->errorCode()!="00000") {
			$valido = false;
			$erro = "Erro c�digo " . $stmt->errorCode () . ": ";
			$erro .= implode ( ", ", $stmt->errorInfo () );
		}		

		else
			echo utf8_encode("Altera��o realizada com sucesso");
	}
}

?>



