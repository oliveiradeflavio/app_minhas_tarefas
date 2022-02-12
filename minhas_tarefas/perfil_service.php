<?php

    class PerfilService{
        private $conexao;
        private $perfil;

        public function __construct(Conexao $conexao, Perfil $perfil){
            $this->conexao = $conexao->conectar();
            $this->perfil = $perfil;
        }
        
        public function recuperar(){
            $query = 'select * from tb_usuarios where nome = :usuario';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':usuario', $this->perfil->__get('usuario'));
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

    }

?>