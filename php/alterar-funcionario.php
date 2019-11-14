<?php

	require_once('../inc/inc.autoload.php');

	$tpl = new TemplatePower('../tpl/_master.htm');

	$tpl->assignInclude('conteudo','../tpl/alterar-funcionario.htm');

	$tpl->prepare();

	/**************************************************************/		
	
	if(!empty($_GET['id'])){
		
		$id  = $_GET['id'];	
		$dao = new FuncionarioDAO();
		$vet = $dao->ListarAlterarFuncionario($id);	
		$num = count($vet);
		
		if($num > 0){
			
			$fun = $vet[0];
			$id 			 = $fun->getId();
			$nome 			 = $fun->getNome();
			$datacontratacao = $fun->getDataContratacao();
			
			$tpl->assign('id',$id);
			$tpl->assign('nome',$nome);
			$tpl->assign('datacontratacao',$datacontratacao);
						
		}else{
			
			//manda volta
			$destino = "lista-funcionario.php";
			header('Location:'.$destino);
		}
		
	}else{		
		//manda volta
		$destino = "lista-funcionario.php";
		header('Location:'.$destino);
	}
	
	
		

	/**************************************************************/

	$tpl->printToScreen();



?>