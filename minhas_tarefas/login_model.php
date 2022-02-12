<?php 

    class Login{
        private $id;
        private $nome;
        private $usuario;
        private $senha;
        private $perfil_usuario;

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
            return $this;
        }
    }


?>