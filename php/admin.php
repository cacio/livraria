<?php

	require_once('../inc/inc.autoload.php');

	$tpl = new TemplatePower('../tpl/_master.htm');

	$tpl->assignInclude('conteudo','../tpl/admin.htm');

	$tpl->prepare();

	/**************************************************************/		

	
			
		

	/**************************************************************/

	$tpl->printToScreen();



?>