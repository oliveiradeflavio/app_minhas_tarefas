<?php

class LoginService{
    private $conexao;
    private $login;

    public function __construct(Conexao $conexao, Login $login){
        $this->conexao = $conexao->conectar();
        $this->login = $login;
    }

    public function recuperar(){

        $query = 'select * from tb_usuarios where usuario = :usuario and senha = :senha';
        try{
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':usuario', $this->login->__get('usuario'));
        $stmt->bindValue(':senha', $this->login->__get('senha'));
        
           $stmt->execute();
           return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        catch(PDOException $e){
            echo "PDOException: " .$e->getMessage();
                  
        }catch(Exception $e){
            echo "Exception: " .$e->getMessage();
        }
    
    }
}


?>