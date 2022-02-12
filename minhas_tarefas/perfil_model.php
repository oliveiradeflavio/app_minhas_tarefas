<?php

class Perfil{
    private $id;
    private $nome;
    private $email;
    private $usuario;
    private $senha;
    private $perfil_usuario;
    private $foto;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
        return $this;
    }
}

?>