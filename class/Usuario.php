<?php
class Usuario {

    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdusuario(){ 
    	 return $this->idusuario;
    }

    public function setIdusuario($value){         
         $this->idusuario = $value;
    }
    public function getDeslogin(){ 
    	 return $this->deslogin;
    }

    public function setDeslogin($value){         
         $this->deslogin=$value;
    }
    public function getDessenha(){ 
    	 return $this->dessenha;
    }

    public function setDessenha($value){         
         $this->dessenha=$value;
    }
    public function getDTcadastro(){ 
    	 return $this->dtcadastro;
    }

    public function setDTcadastro($value){         
         $this->dtcadastro=$value;
    }

    public function loadById($id){

    	$sql = new Sql();

    	$results = $sql-> select("SELECT * FROM tb_usuarios where idusuario =:ID",array(":ID"=>$id));

    	if(count($results)>0){
    		$row = $results[0];

    		$this->setIdusuario($row['idusuario']);
    		$this->setDeslogin($row['deslogin']);
    		$this->setDessenha($row['dessenha']);
    		$this->setDTcadastro(new DateTime($row['dtcadastro']));
    	}
    }
    public static function getList(){
     $sql = new Sql();
     return  $sql -> select("SELECT * FROM tb_usuarios ORDER BY deslogin;");

    }

    public static function search($Login){
   
      $sql = new Sql();

      return $sql ->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin",
         array(':SEARCH'=>"%".$login."%"));


    }
     public function login($login,$pass){

       $sql = new Sql();
         
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE dessenha = :PASSWORD AND deslogin = :LOGIN ;" ,
            array(
                ':LOGIN' => $login,
              ':PASSWORD' => $pass
         ));
        // $results =  $sql->select1("select * from tb_usuarios where deslogin = 'user' and dessenha = 1234;");

        if(count($results)>0){
            $row = $results[0];

            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDTcadastro(new DateTime($row['dtcadastro']));
        } else if(count($results)<1)
           {
            throw new Exception("Error Processing Request", 1);
            
            
            
           }



    }
    public function insert(){

        
    }
    public function __toString(){

    	return json_encode(array(
       "idusuario"=>$this->getIdusuario(),
       "deslogin"=>$this->getDeslogin(),
       "dessenha"=>$this->getDessenha(),
       "dtcadastro"=>$this->getDTcadastro()->format("d/m/Y H:i:s")
    	));
    }


}


?>
