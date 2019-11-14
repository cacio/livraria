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
	
	public function ListarAlterarFuncionario($id){
		
		$dba = $this->dba;
		$vet = array();
		$sql = "SELECT 
					f.idfuncionarios,
					f.nome,
					f.datacontratacao
				FROM
					funcionarios f where f.idfuncionarios = ".$id." ";
		
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
	
	public function inserir($fun){
		
		$dba = $this->dba;
		
		$nome 			 = $fun->getNome();
		$datacontratacao = $fun->getDataContratacao();
		
		$sql = "INSERT INTO `funcionarios`
				(`nome`,
				`datacontratacao`)
				VALUES
				('".$nome."',
				  '".$datacontratacao."')";
		
		$res = $dba->query($sql);
		
	}
	
	public function excluir($fun){
		
		$dba = $this->dba;
		
		$id = $fun->getId();
		
		$sql = "DELETE FROM `funcionarios` where idfuncionarios = ".$id." ";
		
		$res = $dba->query($sql);
		
	}
	
	public function alterar($fun){
		
		$dba = $this->dba;
		
		$id 			 = $fun->getId();
		$nome 			 = $fun->getNome();
		$datacontratacao = $fun->getDataContratacao();
		
		$sql = "UPDATE `funcionarios`
				SET
				`nome` = '".$nome."',
				`datacontratacao` = '".$datacontratacao."'
				WHERE `idfuncionarios` = ".$id." ";
		
		$res = $dba->query($sql);
		
	}
	
}

?>