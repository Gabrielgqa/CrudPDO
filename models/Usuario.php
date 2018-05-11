<?php
class Usuario
{
    public $nome;
    public $email;
    public $senha;
    public $tipo;
    public $setor;
    public $ativo;

    function __construct($attributes = array())
    {
        if (!empty($attributes))
        {
            $this->nome = $attributes['nome'];
            $this->email = $attributes['email'];
            $this->senha = $attributes['senha'];
            $this->tipo = $attributes['tipo'];
            $this->setor = $attributes['setor'];
            $this->ativo = $attributes['ativo'];
        }
    }

    public function insert($pdo){
        $sth = $pdo->prepare("INSERT INTO tb_usuarios(nome,email,senha,tipo,setor,ativo) VALUES (:nome,:email,:senha,:tipo,:setor,:ativo)");
        $sth->BindValue(':nome',$this->nome,PDO::PARAM_STR);
        $sth->BindValue(':email',$this->email,PDO::PARAM_STR);
        $sth->BindValue(':senha',md5($this->senha),PDO::PARAM_STR);
        $sth->BindValue(':tipo',$this->tipo,PDO::PARAM_INT);
        $sth->BindValue(':setor',$this->setor,PDO::PARAM_INT);
        $sth->BindValue(':ativo', 1,PDO::PARAM_INT);
        return $sth->execute();
    }

    public function update($id, $pdo){
        $sth = $pdo->prepare("UPDATE tb_usuarios SET nome=:nome, email=:email, senha=:senha, tipo=:tipo, setor=:setor WHERE id=:id LIMIT 1");
        $sth->BindValue(':nome',$this->nome,PDO::PARAM_STR);
        $sth->BindValue(':email',$this->email,PDO::PARAM_STR);
        $sth->BindValue(':senha',$this->senha,PDO::PARAM_STR);
        $sth->BindValue(':tipo',$this->tipo,PDO::PARAM_INT);
        $sth->BindValue(':setor',$this->setor,PDO::PARAM_INT);
        return $sth->execute();
    }

    public static function select($id, $pdo){
        $sth = $pdo->prepare("SELECT * FROM tb_usuarios WHERE id=:id LIMIT 1");
        $sth->BindValue(':id',$id,PDO::PARAM_INT);
        $sth->execute();
        $array = $sth->fetch(PDO::FETCH_ASSOC);
        return $array;
    }

    public static function selectAll($pdo){
        $sth = $pdo->query("SELECT * FROM tb_usuarios ORDER BY nome ASC");
        $sth->execute();
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public static function delete($id,$pdo){
        $sth = $pdo->prepare("DELETE FROM tb_usuarios WHERE id=:id LIMIT 1");
        $sth->bindValue(":id", $id, PDO::PARAM_INT);
        return $sth->execute();
    }

    public static function mudaAtivo($ativo, $id,$pdo){
        $sth = $pdo->prepare("UPDATE tb_usuarios SET ativo=:ativo WHERE id=:id LIMIT 1");
        $sth->bindValue(":ativo", $ativo, PDO::PARAM_INT);
        $sth->bindValue(":id", $id, PDO::PARAM_INT);
        return $sth->execute();
    }
}

?>