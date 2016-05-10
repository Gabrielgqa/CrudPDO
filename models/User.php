<?php
//Funções relacionadas às páginas que interagem com os usuários.
class User
{
    public $nome;
    public $cargo;
    public $idade;

    function __construct($attributes = array())
    {
        if (!empty($attributes))
        {
            $this->nome = $attributes['nome'];
            $this->cargo = $attributes['cargo'];
            $this->idade = $attributes['idade'];
        }
    }

    public function insert($pdo){
        $sth = $pdo->prepare("INSERT INTO infojuniores(nome,cargo,idade) VALUES (:nome,:cargo,:idade)");
        $sth->BindValue(':nome',$this->nome,PDO::PARAM_STR);
        $sth->BindValue(':cargo',$this->cargo,PDO::PARAM_STR);
        $sth->BindValue(':idade',$this->idade,PDO::PARAM_INT);
        return $sth->execute();
    }

    public function update($id, $pdo){
        $sth = $pdo->prepare("UPDATE infojuniores SET nome=:nome, cargo=:cargo, idade=:idade WHERE id=:id LIMIT 1");
        $sth->BindValue(':id',$id,PDO::PARAM_INT);
        $sth->BindValue(':nome',$this->nome,PDO::PARAM_STR);
        $sth->BindValue(':cargo',$this->cargo,PDO::PARAM_STR);
        $sth->BindValue(':idade',$this->idade,PDO::PARAM_INT);
        return $sth->execute();
    }

    public static function select($id, $pdo){
        $sth = $pdo->prepare("SELECT id, nome, cargo, idade FROM infojuniores WHERE id=:id LIMIT 1");
        $sth->BindValue(':id',$id,PDO::PARAM_INT);
        $sth->execute();
        $array = $sth->fetch(PDO::FETCH_ASSOC);
        return $array;
    }

    public static function selectAll($pdo){
        $sth = $pdo->query("SELECT * FROM infojuniores ORDER BY nome ASC");
        $sth->execute();
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public static function delete($id,$pdo){
        $sth = $pdo->prepare("DELETE FROM infojuniores WHERE id=:id LIMIT 1");
        $sth->bindValue(":id", $id, PDO::PARAM_INT);
        return $sth->execute();
    }
}

?>