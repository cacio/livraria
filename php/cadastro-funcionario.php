<?php

	require_once('../inc/inc.autoload.php');

	$tpl = new TemplatePower('../tpl/_master.htm');

	$tpl->assignInclude('conteudo','../tpl/cadastro-funcionario.htm');

	$tpl->prepare();

	/**************************************************************/		
	$data = date('Y-m-d');
	$tpl->assign('data',$data);	
	
	
		

	/**************************************************************/

	$tpl->printToScreen();



?>