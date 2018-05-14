<?php
class Tarefa
{
    public $nome;
    public $descricao;
    public $data_ini;
    public $data_fim;
    public $id_usuario;
    public $id_tarefa;

    function __construct($attributes = array())
    {
        if (!empty($attributes))
        {
            $this->nome = $attributes['nome'];
            $this->descricao = $attributes['descricao'];
            $this->data_ini = $attributes['data_ini'];
            $this->data_fim = $attributes['data_fim'];
            $this->id_usuario = $attributes['id_usuario'];
            $this->id_tarefa = $attributes['id_tarefa'];
        }
    }

    public function insert($pdo){
        $sth = $pdo->prepare("INSERT INTO tb_tarefas(nome,descricao,data_ini,data_fim,id_usuario) VALUES (:nome,:descricao,:data_ini,:data_fim,:id_usuario)");
        $sth->BindValue(':nome',$this->nome,PDO::PARAM_STR);
        $sth->BindValue(':descricao',$this->descricao,PDO::PARAM_STR);
        $sth->BindValue(':data_ini',$this->data_ini,PDO::PARAM_STR);
        $sth->BindValue(':data_fim',$this->data_fim,PDO::PARAM_STR);
        $sth->BindValue(':id_usuario',$this->id_usuario,PDO::PARAM_INT);
        $sth->BindValue(':id_tarefa',$this->id_tarefa,PDO::PARAM_INT);
        return $sth->execute();
    }

    public function update($id, $pdo){
        $sth = $pdo->prepare("UPDATE tb_tarefas SET nome=:nome, descricao=:descricao, data_ini=:data_ini, data_fim=:data_fim, id_usuario=:id_usuario, id_tarefa=:id_tarefa WHERE id=:id LIMIT 1");
        $sth->BindValue(':nome',$this->nome,PDO::PARAM_STR);
        $sth->BindValue(':descricao',$this->descricao,PDO::PARAM_STR);
        $sth->BindValue(':data_ini',$this->data_ini,PDO::PARAM_STR);
        $sth->BindValue(':data_fim',$this->data_fim,PDO::PARAM_STR);
        $sth->BindValue(':id_usuario',$this->id_usuario,PDO::PARAM_INT);
        $sth->BindValue(':id_tarefa',$this->id_tarefa,PDO::PARAM_INT);
        return $sth->execute();
    }

    public static function select($id, $pdo){
        $sth = $pdo->prepare("SELECT * FROM tb_tarefas WHERE id=:id LIMIT 1");
        $sth->BindValue(':id',$id,PDO::PARAM_INT);
        $sth->execute();
        $array = $sth->fetch(PDO::FETCH_ASSOC);
        return $array;
    }

    public static function selectAll($pdo){
        $sth = $pdo->query("SELECT * FROM tb_tarefas ORDER BY nome ASC");
        $sth->execute();
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public static function delete($id,$pdo){
        $sth = $pdo->prepare("DELETE FROM tb_tarefas WHERE id=:id LIMIT 1");
        $sth->bindValue(":id", $id, PDO::PARAM_INT);
        return $sth->execute();
    }
}

?>
