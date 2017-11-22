<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$c = false;
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$csenha = $_POST['csenha'];

		$usuario = "root";
		$senhaBD = "";
		$servidor = "localhost";
		$bddnome = "cadastro";
		header('Content-Type: text/html, charset-utf-8');
		$conexao = mysqli_connect($servidor,$usuario,$senha,$bddnome);

		if(!$conexao){
			echo "Não há conexão com o Banco";
		}
		if(isset($nome) and empty($nome) == false or isset($email) and empty($email) == false or isset($csenha) and empty($csenha) == false){
			echo "Um ou mais formulários não foram preenchidos";
		}
		else{
			if($senha == $csenha){
				$select = mysqli_query ($conexao,'SELECT * FROM cadastro');


				while($linha = mysqli_fetch_array($select)){
					if($linha["nome"] == $nome){
						$c = true;
						break;
					}
				}


					if($c==false){
						$id = mysqli_num_rowns($select);
						$id++;

						mysqli_query($conexao, "INSERT INTO usuario (id, nome, email, senha)
							VALUES('$id','$nome','$email',$senha)");

						header("LOCATION: index.php");
					}
					else{
						echo "Usuário "+$nome+" já existe";
					}
				}
			else{
				echo "Confirmação de senha incorreta";
			}

		}
	}
?>