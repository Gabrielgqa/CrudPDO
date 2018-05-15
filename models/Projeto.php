<?php
class Projeto
{
    public $nome;
    public $descricao;
    public $data_ini;
    public $data_previsto;
    public $data_fim;
    public $id_usuario;

    function __construct($attributes = array())
    {
        if (!empty($attributes))
        {
            $this->nome = $attributes['nome'];
            $this->descricao = $attributes['descricao'];
            $this->data_ini = $attributes['data_ini'];
            $this->data_previsto = $attributes['data_previsto'];
            $this->data_fim = $attributes['data_fim'];
            $this->id_usuario = $attributes['id_usuario'];
        }
    }

    public function insert($pdo){
        $sth = $pdo->prepare("INSERT INTO tb_projetos(nome,descricao,data_ini,data_previsto,id_usuario) VALUES (:nome,:descricao,:data_ini,:data_previsto,:id_usuario)");
        $sth->BindValue(':nome',$this->nome,PDO::PARAM_STR);
        $sth->BindValue(':descricao',$this->descricao,PDO::PARAM_STR);
        $sth->BindValue(':data_ini',$this->data_ini,PDO::PARAM_STR);
        $sth->BindValue(':data_previsto',$this->data_previsto,PDO::PARAM_STR);
        $sth->BindValue(':id_usuario',$this->id_usuario,PDO::PARAM_INT);
        return $sth->execute();
    }

    public function update($id, $pdo){
        $sth = $pdo->prepare("UPDATE tb_projetos SET nome=:nome, descricao=:descricao, data_previsto=:data_previsto, id_usuario=:id_usuario WHERE id=:id LIMIT 1");
        $sth->BindValue(':id',$id,PDO::PARAM_INT);
        $sth->BindValue(':nome',$this->nome,PDO::PARAM_STR);
        $sth->BindValue(':descricao',$this->descricao,PDO::PARAM_STR);
        $sth->BindValue(':data_previsto',$this->data_previsto,PDO::PARAM_STR);
        $sth->BindValue(':id_usuario',$this->id_usuario,PDO::PARAM_INT);
        return $sth->execute();
    }

    public static function select($id, $pdo){
        $sth = $pdo->prepare("SELECT * FROM tb_projetos WHERE id=:id LIMIT 1");
        $sth->BindValue(':id',$id,PDO::PARAM_INT);
        $sth->execute();
        $array = $sth->fetch(PDO::FETCH_ASSOC);
        return $array;
    }

    public static function selectAll($pdo){
        $sth = $pdo->query("SELECT * FROM tb_projetos ORDER BY nome ASC");
        $sth->execute();
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public static function delete($id,$pdo){
        $sth = $pdo->prepare("DELETE FROM tb_projetos WHERE id=:id LIMIT 1");
        $sth->bindValue(":id", $id, PDO::PARAM_INT);
        return $sth->execute();
    }
    public static function quantidade($pdo){
        $sth = $pdo->query("SELECT * FROM tb_projetos ORDER BY nome ASC");
        $sth->execute();
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        return count($results);
    }
}

?>