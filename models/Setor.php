<?php
class Setor
{
    public $nome;

    function __construct($attributes = array())
    {
        if (!empty($attributes))
        {
            $this->nome = $attributes['nome'];
        }
    }

    public function insert($pdo){
        $sth = $pdo->prepare("INSERT INTO tb_setores(nome) VALUES (:nome)");
        $sth->BindValue(':nome',$this->nome,PDO::PARAM_STR);
        return $sth->execute();
    }

    public function update($id, $pdo){
        $sth = $pdo->prepare("UPDATE tb_setores SET nome=:nome WHERE id=:id LIMIT 1");
        $sth->BindValue(':id',$id,PDO::PARAM_INT);
        $sth->BindValue(':nome',$this->nome,PDO::PARAM_STR);
        return $sth->execute();
    }

    public static function select($id, $pdo){
        $sth = $pdo->prepare("SELECT * FROM tb_setores WHERE id=:id LIMIT 1");
        $sth->BindValue(':id',$id,PDO::PARAM_INT);
        $sth->execute();
        $array = $sth->fetch(PDO::FETCH_ASSOC);
        return $array;
    }

    public static function selectAll($pdo){
        $sth = $pdo->query("SELECT * FROM tb_setores ORDER BY nome ASC");
        $sth->execute();
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public static function delete($id,$pdo){
        $sth = $pdo->prepare("DELETE FROM tb_setores WHERE id=:id LIMIT 1");
        $sth->bindValue(":id", $id, PDO::PARAM_INT);
        return $sth->execute();
    }
    public static function quantidade($pdo){
        $sth = $pdo->query("SELECT * FROM tb_setores ORDER BY nome ASC");
        $sth->execute();
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        return count($results);
    }
}

?>