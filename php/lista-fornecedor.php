<?php

	// include '../tpl/lista-fornecedor.html';
	// exit();


	require_once('../inc/inc.autoload.php');

	$tpl = new TemplatePower('../tpl/_master.htm');

	$tpl->assignInclude('conteudo','../tpl/lista-fornecedor.htm');
	
	$tpl->prepare();

	/**************************************************************/		

	
		

	/**************************************************************/

	$tpl->printToScreen();



?>