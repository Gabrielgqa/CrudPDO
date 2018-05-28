<?php
class Comentario
{
    public $id_tarefa;
    public $id_usuario;
    public $data;
    public $comentario;

    function __construct($attributes = array())
    {
        if (!empty($attributes))
        {
            $this->id_tarefa = $attributes['id_tarefa'];
            $this->id_usuario = $attributes['id_usuario'];
            $this->data = $attributes['data'];
            $this->comentario = $attributes['comentario'];
        }
    }

    public function insert($pdo){
        $sth = $pdo->prepare("INSERT INTO tb_tarefas_comentarios(id_tarefa,id_usuario,data,comentario) VALUES (:id_tarefa,:id_usuario,:data,:comentario)");
        $sth->BindValue(':id_tarefa',$this->id_tarefa,PDO::PARAM_INT);
        $sth->BindValue(':id_usuario',$this->id_usuario,PDO::PARAM_INT);
        $sth->BindValue(':data',$this->data,PDO::PARAM_STR);
        $sth->BindValue(':comentario',$this->comentario,PDO::PARAM_STR);
        return $sth->execute();
    }

    public function update($id, $pdo){
        $sth = $pdo->prepare("UPDATE tb_tarefas_comentarios SET id_tarefa=:id_tarefa, id_usuario=:id_usuario, data=:data, comentario=:comentario,WHERE id=:id LIMIT 1");
        $sth->BindValue(':id_tarefa',$this->id_tarefa,PDO::PARAM_INT);
        $sth->BindValue(':id_usuario',$this->id_usuario,PDO::PARAM_INT);
        $sth->BindValue(':data',$this->data,PDO::PARAM_STR);
        $sth->BindValue(':comentario',$this->comentario,PDO::PARAM_STR);
        return $sth->execute();
    }

    public static function selectAll($pdo){
        $sth = $pdo->query("SELECT * FROM tb_tarefas_comentarios ORDER BY data ASC");
        $sth->execute();
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public static function delete($id,$pdo){
        $sth = $pdo->prepare("DELETE FROM tb_tarefas_comentarios WHERE id=:id LIMIT 1");
        $sth->bindValue(":id", $id, PDO::PARAM_INT);
        return $sth->execute();
    }
}

?>
