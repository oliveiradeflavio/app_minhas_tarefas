<?php

    class CadastroUsuarioService{
        private $conexao;
        private $cad_usuario;

        public function __construct(Conexao $conexao, CadastroUsuario $cad_usuario){
            $this->conexao = $conexao->conectar();
            $this->cad_usuario = $cad_usuario;
        }

        public function inserir(){
            $query = 'insert into tb_usuarios (nome, email, usuario, senha, foto) values (:nome, :email, :usuario, :senha, :foto)';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome', $this->cad_usuario->__get('nome'));
            $stmt->bindValue(':email', $this->cad_usuario->__get('email'));
            $stmt->bindValue(':usuario', $this->cad_usuario->__get('usuario'));
            $stmt->bindValue(':senha', $this->cad_usuario->__get('senha'));
            $stmt->bindValue(':foto', $this->cad_usuario->__get('foto'));
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function recuperar(){
            $query = 'select * from tb_usuarios';
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function remover(){
            $query = 'delete from tb_usuarios where id = :id';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id', $this->cad_usuario->__get('id'));
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function editarUsuario(){
            $query = 'update tb_usuarios set nome = :nome, email = :email, usuario = :usuario, senha = :senha where id = :id';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome', $this->cad_usuario->__get('nome'));
            $stmt->bindValue(':email', $this->cad_usuario->__get('email'));
            $stmt->bindValue(':usuario', $this->cad_usuario->__get('usuario'));
            $stmt->bindValue(':senha', $this->cad_usuario->__get('senha'));
            $stmt->bindValue(':id', $this->cad_usuario->__get('id'));
            $stmt->execute();
        }
    }

?>