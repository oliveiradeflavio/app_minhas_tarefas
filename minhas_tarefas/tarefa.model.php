<?php

class Tarefa{

    private $id;
    private $id_status;
    private $id_usuarios;
    private $tarefa;
    private $data_cadastro;
    private $data_modificado;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
        return $this;
    }
}
?>