<?php

	// include '../tpl/lista-fornecedor.html';
	// exit();


	require_once('../inc/inc.autoload.php');

	$tpl = new TemplatePower('../tpl/_master.htm');

	$tpl->assignInclude('conteudo','../tpl/lista-fornecedor.html');
	
	$tpl->prepare();

	/**************************************************************/		

	$dao = new FuncionarioDAO();
	$vet = $dao->ListarFuncionario();
	$num = count($vet);
	
	for($i =0; $i < $num; $i++){
		
		$fun = $vet[$i];
		
		$cod 			 = $fun->getId();
		$nome 			 = $fun->getNome();
		$datacontratacao = $fun->getDataContratacao();
		
		$tpl->newBlock('lista');
		
		$tpl->assign('cod',$cod);
		$tpl->assign('nome',$nome);
		$tpl->assign('datacontratacao',date('d/m/Y',strtotime($datacontratacao)));
		
	}
		

	/**************************************************************/

	$tpl->printToScreen();



?>