<?php

include_once('ConexaoBD.php');
class funcao{
    # Criança
    private $idcrianca;
    private $nome_crianca;
    private $idade;
    private $res_ali;

    function getIdcrianca() {
        return $this->idcrianca;
    }
    function getNocrianca() {
        return $this->nome_crianca;
    }
    function getIdade() {
        return $this->idade;
    }
    function getRestri() {
        return $this->res_ali;
    }
    function setIdcrianca($idcrianca) {
        $this->idcrianca = $idcrianca;
    }
    function setNocrianca($nome_crianca) {
        $this->nome_crianca = $nome_crianca;
    }
    function setIdade($idade) {
        $this->idade = $idade;
    }
    function setRestri($res_ali) {
        $this->res_ali = $res_ali;
    }

    #Pais
    private $idpais;
    private $nome_pais;
    private $telefone;
    private $telefone_2;
    private $fk_crianca_pais;

    function getIdpais() {
        return $this->idpais;
    }
    function getNopais() {
        return $this->nome_pais;
    }
    function getTelefone() {
        return $this->telefone;
    }
    function getTelefone_2() {
        return $this->telefone_2;
    }
    function getFk_crianca_pais() {
        return $this->fk_crianca_pais;
    }

    function setIdpais($idpais) {
        $this->idpais = $idpais;
    }
    function setNopais($nome_pais) {
        $this->nome_pais = $nome_pais;
    }
    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    function setTelefone_2($telefone_2) {
        $this->telefone_2 = $telefone_2;
    }
    function setFk_crianca_pais($fk_crianca_pais) {
        $this->fk_crianca_pais = $fk_crianca_pais;
    }

    #Fixa
    private $id_ficha;
    private $culto_data;
    private $fk_crianca_ficha;
    private $fk_pais_ficha;

    function getIdficha() {
        return $this->id_ficha;
    }
    function getCulto_data() {
        return $this->culto_data;
    }
    function getFk_crianca_ficha() {
        return $this->fk_crianca_fica;
    }
    function getFk_pais_ficha() {
        return $this->fk_pais_ficha;
    }

    function setIdficha($id_ficha) {
        $this->id_ficha = $id_ficha;
    }
    function setCulto_data($culto_data) {
        $this->culto_data = $culto_data;
    }
    function setFk_crianca_ficha($fk_crianca_ficha) {
        $this->fk_crianca_ficha = $fk_crianca_ficha;
    }
    function setFk_pais_ficha($fk_pais_ficha) {
        $this->fk_pais_ficha = $fk_pais_ficha;
    }


    function __construct ($idcrianca = null, $nome_crianca = null, $idade = null, $res_ali = null, $idpais = null, $nome_pais = null, $telefone = null, $telefone_2 = null, $fk_crianca_pais = null, $idficha = null, $culto_data = null, $fk_crianca_ficha = null, $fk_pais_ficha = null) {
        $this->idcrianca = $idcrianca;
        $this->nome_crianca = $nome_crianca;
        $this->idade = $idade;
        $this->res_ali = $res_ali;

        $this->idpais = $idpais;
        $this->nome_pais = $nome_pais;
        $this->telefone = $telefone;
        $this->telefone_2 = $telefone_2;
        $this->fk_crianca_pais = $fk_crianca_pais;

        $this->idficha = $idficha;
        $this->culto_data = $culto_data;
        $this->fk_crianca_ficha = $fk_crianca_ficha;
        $this->fk_pais_ficha = $fk_pais_ficha;
    }

    public function lista($tabela){
        try {
            $conn = ConexaoBD::conecta();
            $res = array();
            if ($tabela = "crianca") {
                $sql  = "SELECT * FROM crianca ORDER BY nome_crianca";
                $sql  = $conn->query($sql);
                while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                    $crianca = new funcao();                
                    $crianca->setIdcrianca($row->idcrianca);
                    $crianca->setNocrianca($row->nome_crianca);
                    $crianca->setIdade($row->idade);
                    $crianca->setRestri($row->res_ali);
                    $res[] = $crianca;
                }
            }
            if ($tabela = "pais") {
                $sql  = "SELECT * FROM pais ORDER BY id_pais";
                $sql  = $conn->query($sql);
                while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                    $pai = new funcao();                
                    $pai->setIdpais($row->idpais);
                    $pai->setNopais($row->nopais);
                    $pai->setTelefone($row->telefone);
                    $pai->setTelefone_2($row->telefone_2);
                    $pai->setFk_crianca_pais($row->fk_crianca_pais);
                    $res[] = $pai;
                }
            }
            if ($tabela = "ficha") {
                $sql  = "SELECT * FROM ficha ORDER BY culto_data";
                $sql  = $conn->query($sql);
                while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                    $ficha = new funcao();                
                    $ficha->setIdficha($row->idficha);
                    $ficha->setCulto_data($row->culto_data);
                    $ficha->setFk_crianca_fixa($row->setFk_crianca_fixa);
                    $ficha->setFk_pais_ficha($row->fk_pais_ficha);
                    $res[] = $ficha;
                }
            }  
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($id, $tabela){
        try {
            $conn = ConexaoBD::conecta();
            $res = array();  
            if ($tabela = "crianca") {
            	$sql  = "SELECT * FROM crianca WHERE id_crianca = ".$id." ORDER BY nome_crianca";
            	$sql  = $conn->query($sql);
            	while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                	$crianca = new funcao();                
                    $crianca->setIdcrianca($row->idcrianca);
                    $crianca->setNocrianca($row->nome_crianca);
                    $crianca->setIdade($row->idade);
                    $crianca->setRestri($row->res_ali);
                    $res[] = $crianca;
            	}
            }
            if ($tabela = "pais") {
            	$sql  = "SELECT * FROM pais WHERE id_pais = ".$id." ORDER BY nome_pais";
            	$sql  = $conn->query($sql);
            	while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                	$pai = new funcao();                
                    $pai->setIdpais($row->idpais);
                    $pai->setNopais($row->nome_pais);
                    $pai->setTelefone($row->telefone);
                    $pai->setTelefone_2($row->telefone_2);
                    $pai->setFk_crianca_pais($row->fk_crianca_pais);
                    $res[] = $pai;
            	}
            }
            if ($tabela = "ficha") {
            	$sql  = "SELECT * FROM ficha WHERE id_fixa = ".$id." ORDER BY id_fixa";
            	$sql  = $conn->query($sql);
            	while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                	$ficha = new funcao();                
                    $ficha->setIdficha($row->idficha);
                    $ficha->setCulto_data($row->culto_data);
                    $ficha->setFk_crianca_ficha($row->setFk_crianca_ficha);
                    $ficha->setFk_pais_ficha($row->fk_pais_ficha);
                    $res[] = $ficha;
            	}
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera_tbcrianca($id, $nome, $idade, $restri_ali){
        try {
            $sql = "UPDATE crianca
                       SET nome_crianca = ? , idade = ? , restri_ali = ? ,
                       WHERE id_crianca = ?"; 
            $conn = ConexaoBD::conecta();

            $stm = $conn->prepare($sql);
            $stm->bindParam(1, $nome);
            $stm->bindParam(2, $idade);
            $stm->bindParam(3, $restri_ali);
            $stm->bindParam(4, $id);
            $stm->execute();
            return 1; 
	} catch (Exception $e) {
            return 0; 
        }
    }
    public function altera_tbpai($id, $nome, $tell, $tell2, $id_cri){
        try {
            $sql = "UPDATE pais
                       SET nome_pais = ? , telefone = ? , telefone_2 = ? , id_crianca = ? 
                     WHERE id_pais = ?"; 
            $conn = ConexaoBD::conecta();

            $stm = $conn->prepare($sql);
            $stm->bindParam(1, $nome);
            $stm->bindParam(2, $tell);
            $stm->bindParam(3, $tell2);
            $stm->bindParam(4, $id_cri);
            $stm->execute();
            return 1; 
	} catch (Exception $e) {
            return 0; 
        } //try-catch     
    }
    public function altera_tbficha($id, $data, $id_cri, $id_pais){
        try {
            $sql = "UPDATE ficha
                       SET culto_data = ? , id_crianca = ? , id_pais = ? 
                     WHERE id_ficha = ?"; 
            $conn = ConexaoBD::conecta();

            $stm = $conn->prepare($sql);
            $stm->bindParam(1, $data);
            $stm->bindParam(2, $id_cri);
            $stm->bindParam(3, $id_pais);
            $stm->bindParam(4, $id);
            $stm->execute();
            return 1; 
	} catch (Exception $e) {
            return 0; 
        } //try-catch     
    }
    
    public function insere_crianca($id, $nome, $idade, $restri_ali){
      try {
        $sql = "INSERT INTO crianca(id_crianca, nome_crianca, idade, restri_al)
                VALUES (?, ?, ?, ?)";
        $conn = ConexaoBD::conecta();

        $stm = $conn->prepare($sql);
        $stm->bindParam(1, $id);
        $stm->bindParam(2, $nome);
        $stm->bindParam(3, $idade);
        $stm->bindParam(4, $restri_ali);
        $stm->execute();
        return 1;
      } catch (Exception $e) {
        return 0; 
      	}
    }
    public function insere_pais($id, $nome, $tell, $tell2, $id_cri){
      try {
        $sql = "INSERT INTO pais(id_pais, nome_pais, telefone, telefone_2, id_crianca)
                VALUES (?, ?, ?, ?, ?)";
        $conn = ConexaoBD::conecta();

            $stm = $conn->prepare($sql);
            $stm->bindParam(1, $id);
            $stm->bindParam(2, $nome);
            $stm->bindParam(3, $tell);
            $stm->bindParam(4, $tell2);
            $stm->bindParam(5, $id_cri);
            $stm->execute();
            return 1;
        return 1;
      } catch (Exception $e) {
        return 0; 
      	}
    }
    public function insere_ficha($id, $data, $id_cri, $id_pais){
      try {
        $sql = "INSERT INTO ficha(id_ficha, culto_data, id_crianca, id_pais)
                VALUES (?, ?, ?, ?)";
        $conn = ConexaoBD::conecta();

        $stm = $conn->prepare($sql);
        $stm->bindParam(1, $id);
        $stm->bindParam(2, $data);
        $stm->bindParam(3, $id_cri);
        $stm->bindParam(4, $id_pais);
        $stm->execute();
        return 1;
      } catch (Exception $e) {
        return 0; 
      	}
    }
    public function exclui($codigo, $tabela){
      try {
	    if ($tabela = "crianca") {
	      	$sql = "DELETE FROM crianca WHERE id_crianca = ?"; 
	    	$conn = ConexaoBD::conecta();
                                     
	    	$stm = $conn->prepare($sql);
	    	$stm->bindParam(1, $codigo);
	    	$stm->execute();
            return 1;
	    }
	    if ($tabela = "pais") {
	      	$sql = "DELETE FROM pais WHERE id_pais = ?"; 
	    	$conn = ConexaoBD::conecta();
                                     
	    	$stm = $conn->prepare($sql);
	    	$stm->bindParam(1, $codigo);
	    	$stm->execute();
            return 1;
	    }
	    if ($tabela = "ficha") {
	      	$sql = "DELETE FROM ficha WHERE id_ficha = ?"; 
	    	$conn = ConexaoBD::conecta();    
	    	$stm = $conn->prepare($sql);
	    	$stm->bindParam(1, $codigo);
	    	$stm->execute();
                return 1;
	    }
	    } catch (Exception $e) {
              return 0; 
      } //try-catch     
    } //método exclui
    public function lista_ficha(){
        try {
            $conn = ConexaoBD::conecta();
            $res = array();
            $sql  = "SELECT ficha.id_ficha, ficha.culto_data,"
                    . " crianca.nome_crianca, crianca.idade, crianca.res_ali,"
                    . " pais.nome_pais, pais.telefone, pais.telefone_2 FROM ficha"
                    . " INNER JOIN crianca ON ficha.fk_crianca_ficha = crianca.id_crianca"
                    . " INNER JOIN pais ON ficha.fk_pais_ficha = pais.id_pais;";
            $sql  = $conn->query($sql);
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $ficha = new funcao();                
                $ficha->setIdficha($row->id_ficha);
                $ficha->setCulto_data($row->culto_data);
                $ficha->setNocrianca($row->nome_crianca);
                $ficha->setIdade($row->idade);
                $ficha->setRestri($row->res_ali);
                $ficha->setNopais($row->nome_pais);
                $ficha->setTelefone($row->telefone);
                $ficha->setTelefone_2($row->telefone_2);
                $res[] = $ficha;
            }
            return $res;
        } catch(Exception $e){
            echo "Deu Ruim";
            return "ERRO: ".$e->getMessage()."<br><br>";
        }
    }
    public function consulta_ficha($id){
        try {
            $conn = ConexaoBD::conecta();
            $res = array();  
            
            $sql  = "SELECT ficha.id_ficha, ficha.culto_data,"
                    . " crianca.nome_crianca, crianca.idade, crianca.res_ali,"
                    . " pais.nome_pais, pais.telefone, pais.telefone_2 FROM ficha"
                    . " INNER JOIN crianca ON ficha.fk_crianca_ficha = crianca.id_crianca"
                    . " INNER JOIN pais ON ficha.fk_pais_ficha = pais.id_pais;"
                    . " WHERE id_ficha = ".$id;
            $sql  = $conn->query($sql);
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
            	$ficha = new funcao();                
                $ficha->setIdficha($row->id_ficha);
                $ficha->setCulto_data($row->culto_data);
                $ficha->setNocrianca($row->nome_crianca);
                $ficha->setIdade($row->idade);
                $ficha->setRestri($row->res_ali);
                $ficha->setNopais($row->nome_pais);
                $ficha->setTelefone($row->telefone);
                $ficha->setTelefone_2($row->telefone_2);
                $res[] = $ficha;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    public function altera_ficha($id_ficha, $culto_data, $nome_crianca, $idade, $res_ali, $nome_pais, $telefone, $telefone_2){
        try {
            $sql = "UPDATE ficha, crianca, pais
                    SET ficha.id_ficha = ? , ficha.culto_data = ? , crianca.nome_crianca = ? , crianca.idade = ? , crianca.res_ali = ? ,
                    pais.nome_pais = ? , pais.telefone = ? , pais.telefone_2 = ?
                    WHERE id_ficha = ?"; 
            $conn = ConexaoBD::conecta();

            $stm = $conn->prepare($sql);
            $stm->bindParam(1, $id_ficha);
            $stm->bindParam(2, $culto_data);
            $stm->bindParam(3, $nome_crianca);
            $stm->bindParam(4, $idade);
            $stm->bindParam(5, $res_ali);
            $stm->bindParam(6, $nome_pais);
            $stm->bindParam(7, $telefone);
            $stm->bindParam(8, $telefone_2);
            $stm->bindParam(9, $id_ficha);
            $stm->execute();
            return 1; 
	} catch (Exception $e) {
            return 0; 
        } //try-catch     
    }
    public function exclui_ficha($codigo){
        try {
            $sql = "DELETE FROM ficha WHERE id_ficha = ?"; 
	    	$conn = ConexaoBD::conecta();    
	    	$stm = $conn->prepare($sql);
	    	$stm->bindParam(1, $codigo);
	    	$stm->execute();
                return 1;
	    
	    } catch (Exception $e) {
                return 0; 
        }
    }
}