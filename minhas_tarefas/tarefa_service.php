<?php
//CRUD - Create, Read, Update, Delete

class TarefaService
{

    private $conexao;
    private $tarefa;

    public function __construct(Conexao $conexao, Tarefa $tarefa)
    {
        $this->conexao = $conexao->conectar(); //link de conexão com o banco de dados
        $this->tarefa = $tarefa;
    }

    //método para inserir uma tarefa no banco de dados
    public function inserir()
    {
        $query = 'INSERT INTO tb_tarefas (id_usuarios, tarefa, data_modificado) VALUES (:id_usuarios, :tarefa, :data_modificado)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_usuarios', $this->tarefa->__get('id_usuarios'));
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->bindValue(':data_modificado', $this->tarefa->__get('data_modificado'));
        $stmt->execute();
    }

    //método para listar todas as tarefas do banco de dados
    public function recuperar()
    {
        if ($this->tarefa->__get('perfil_usuario') == 1) {
            $query = 'SELECT 
            t.id, s.status, t.tarefa, tb_usuarios.nome
                FROM
                        tb_tarefas as t
                LEFT JOIN
                        tb_status as s on (t.id_status = s.id)
                left join 
                        tb_usuarios on (t.id_usuarios = tb_usuarios.id)';

            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else
            $query = 'SELECT 
                        t.id, s.status, t.tarefa
                  FROM
                        tb_tarefas as t
                  LEFT JOIN
                        tb_status as s on (t.id_status = s.id)
                  WHERE t.id_usuarios = :id_usuarios';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_usuarios', $this->tarefa->__get('id_usuarios'));
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //metodo para atualizar uma tarefa no banco de dados
    public function atualizar()
    {

        $query = 'UPDATE tb_tarefas SET tarefa = :tarefa, data_modificado = :data_modificado WHERE id = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->bindValue(':data_modificado', $this->tarefa->__get('data_modificado'));
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        $stmt->execute();
    }

    //metodo para excluir uma tarefa no banco de dados
    public function remover()
    {
        $query = 'DELETE FROM tb_tarefas WHERE id = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        $stmt->execute();
    }

    public function marcarRealizada()
    {
        $query = "update tb_tarefas set id_status = ? where id = ?";
        //$query = "update tb_tarefas set tarefa = :tarefa where id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->tarefa->__get('id_status'));
        // $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->bindValue(2, $this->tarefa->__get('id'));
        // $stmt->bindValue(':id', $this->tarefa->__get('id'));
        return $stmt->execute();
    }
    public function recuperarTarefasRealizadas()
    {
        if ($this->tarefa->__get('perfil_usuario') == 1) {
            $query = "select 
            t.id, s.status, t.tarefa, t.id_usuarios, t.data_cadastrado, t.data_modificado, tb_usuarios.nome
            from 
                tb_tarefas as t
                left join tb_status as s on (t.id_status = s.id)
               	left join tb_usuarios on (t.id_usuarios = tb_usuarios.id)
            where
                t.id_status = :id_status
            order by 
                t.data_modificado asc";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else
            $query = "select 
            t.id, s.status, t.tarefa, t.id_usuarios, t.data_cadastrado, t.data_modificado
            from 
                tb_tarefas as t
                left join tb_status as s on (t.id_status = s.id) 
            where
                t.id_status = :id_status
            and
                t.id_usuarios = :id_usuarios
            order by 
                t.data_modificado asc";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_usuarios', $this->tarefa->__get('id_usuarios'));
        $stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function totalConcluidos()
    {
        if ($this->tarefa->__get('perfil_usuario') == 1) {
            $query = 'select count(*) as id_status from tb_tarefas WHERE id_status = 2';
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ)->id_status;
        } else
            $query = 'select count(*) as id_status from tb_tarefas WHERE id_status = 2 and id_usuarios = :id_usuarios';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_usuarios', $this->tarefa->__get('id_usuarios'));
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ)->id_status;
    }

    public function totalPendentes()
    {
        if ($this->tarefa->__get('perfil_usuario') == 1) {
            $query = 'select count(*) as id_status from tb_tarefas WHERE id_status = 1';
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ)->id_status;
        } else
            $query = 'select count(*) as id_status from tb_tarefas WHERE id_status = 1 and id_usuarios = :id_usuarios';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_usuarios', $this->tarefa->__get('id_usuarios'));
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ)->id_status;
    }
}
?>