<?php
class Tarefa
{
    public $nome;
    public $descricao;
    public $data_ini;
    public $data_fim;
    public $id_usuario;
    public $id_projeto;

    function __construct($attributes = array())
    {
        if (!empty($attributes))
        {
            $this->nome = $attributes['nome'];
            $this->descricao = $attributes['descricao'];
            $this->data_ini = $attributes['data_ini'];
            $this->data_fim = empty($attributes['data_fim']) ? null : $attributes['data_fim'];
            $this->id_usuario = $attributes['id_usuario'];
            $this->id_projeto = empty($attributes['id_projeto']) ? null : $attributes['id_projeto'];
        }
    }

    public function insert($pdo){
        $sth = $pdo->prepare("INSERT INTO tb_tarefas(nome,descricao,data_ini,id_usuario, id_projeto) VALUES (:nome,:descricao,:data_ini,:id_usuario, :id_projeto)");
        $sth->BindValue(':nome',$this->nome,PDO::PARAM_STR);
        $sth->BindValue(':descricao',$this->descricao,PDO::PARAM_STR);
        $sth->BindValue(':data_ini',$this->data_ini,PDO::PARAM_STR);
        $sth->BindValue(':id_usuario',$this->id_usuario,PDO::PARAM_INT);
        $sth->BindValue(':id_projeto',$this->id_projeto,PDO::PARAM_INT);
        return $sth->execute();
    }

    public function update($id, $pdo){
        $sth = $pdo->prepare("UPDATE tb_tarefas SET nome=:nome, descricao=:descricao, data_ini=:data_ini, data_fim=:data_fim, id_usuario=:id_usuario, id_projeto=:id_projeto WHERE id=:id LIMIT 1");
        $sth->BindValue(':id',$id,PDO::PARAM_INT);
        $sth->BindValue(':nome',$this->nome,PDO::PARAM_STR);
        $sth->BindValue(':descricao',$this->descricao,PDO::PARAM_STR);
        $sth->BindValue(':data_ini',$this->data_ini,PDO::PARAM_STR);
        $sth->BindValue(':data_fim',$this->data_fim,PDO::PARAM_STR);
        $sth->BindValue(':id_usuario',$this->id_usuario,PDO::PARAM_INT);
        $sth->BindValue(':id_projeto',$this->id_projeto,PDO::PARAM_INT);
        return $sth->execute();
    }

    public static function select($id, $pdo){
        $sth = $pdo->prepare("SELECT * FROM tb_tarefas WHERE id=:id LIMIT 1");
        $sth->BindValue(':id',$id,PDO::PARAM_INT);
        $sth->execute();
        $array = $sth->fetch(PDO::FETCH_ASSOC);
        return $array;
    }

    public static function selectAllBySetor($setor, $pdo){
        $sth = $pdo->prepare("SELECT t.* FROM tb_tarefas t INNER JOIN tb_usuarios u on u.id = t.id_usuario WHERE u.setor = :setor");
        $sth->BindValue(':setor',$setor,PDO::PARAM_INT);
        $sth->execute();
        $array = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

    public static function selectAllByUsuario($id, $pdo){
        $sth = $pdo->prepare("SELECT t.* FROM tb_tarefas t INNER JOIN tb_usuarios u on u.id = t.id_usuario WHERE u.id = :id");
        $sth->BindValue(':id', $id,PDO::PARAM_INT);
        $sth->execute();
        $array = $sth->fetchAll(PDO::FETCH_ASSOC);
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

    public static function quantidade($pdo){
        $sth = $pdo->query("SELECT * FROM tb_tarefas ORDER BY nome ASC");
        $sth->execute();
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        return count($results);
    }
}

?>
