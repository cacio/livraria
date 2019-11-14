<?php
	require_once('../inc/inc.autoload.php');
	if(isset($_REQUEST['act']) and !empty($_REQUEST['act'])){

		$act = $_REQUEST['act'];	

		switch($act){

			case 'inserir':
				$nome 			 = !empty($_POST['nome']) ? $_POST['nome'] : "";
				$datacontratacao = !empty($_POST['datacontratacao']) ? $_POST['datacontratacao'] : date('Y-m-d');
				
				$fun = new Funcionario();
				
				$fun->setNome($nome);
				$fun->setDataContratacao($datacontratacao);
				
				$dao = new FuncionarioDAO();
				$dao->inserir($fun);
				$destino = "lista-funcionario.php";
			break;
			case 'alterar':
				$id 			 = $_POST['id'];
				$nome 			 = !empty($_POST['nome']) ? $_POST['nome'] : "";
				$datacontratacao = !empty($_POST['datacontratacao']) ? $_POST['datacontratacao'] : date('Y-m-d');
				
				$fun = new Funcionario();
				
				$fun->setId($id);
				$fun->setNome($nome);
				$fun->setDataContratacao($datacontratacao);
				
				$dao = new FuncionarioDAO();
				$dao->alterar($fun);
				$destino = "lista-funcionario.php";
			
			break;
			case 'excluir':
				
				$id = $_GET['id'];
				
				$fun = new Funcionario();
				$fun->setId($id);
				
				$dao = new FuncionarioDAO();				
				$dao->excluir($fun);
				$destino = "lista-funcionario.php";
				
			break;
		}

	}

	header('Location:'.$destino);

?>