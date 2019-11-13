<?php
require_once('inc.autoload.php');
require_once('inc.connect.php');	
class FuncionarioDAO{
	private $dba;
	public function __construct(){
		
		$dba = new DbAdmin('mysql');
		$dba->connect(HOST,USER,SENHA,BD);
		$this->dba = $dba;
		
	}
	
	public function ListarFuncionario(){
		
		$dba = $this->dba;
		$vet = array();
		$sql = "SELECT 
					f.idfuncionarios,
					f.nome,
					f.datacontratacao
				FROM
					funcionarios f;";
		
		$res = $dba->query($sql);

		$num = $dba->rows($res); 


		for($i = 0; $i<$num; $i++){

			$cod 			 = $dba->result($res,$i,'idfuncionarios');
			$nome 			 = $dba->result($res,$i,'nome');
			$datacontratacao = $dba->result($res,$i,'datacontratacao');
			

			$fun = new Funcionario();
			
			$fun->setId($cod);
			$fun->setNome($nome);
			$fun->setDataContratacao($datacontratacao);
			
			$vet[$i] = $fun;

		

		}

		return $vet;	
		
	}
	
	
}

?>