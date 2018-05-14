<?php
class Usuario
{
    public $nome;
    public $email;
    public $senha;
    public $tipo;
    public $setor;
    public $ativo;

    const TIPO_ADMIN = 1;
    const TIPO_CHEFE = 2;
    const TIPO_COLABORADOR = 3;

    function __construct($attributes = array())
    {
        if (!empty($attributes))
        {
            $this->nome = $attributes['nome'];
            $this->email = $attributes['email'];
            $this->senha = array_key_exists('senha', $attributes) ? $attributes['senha'] : null;
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
        $sth = $pdo->prepare("UPDATE tb_usuarios SET nome=:nome, email=:email, tipo=:tipo, setor=:setor, ativo=:ativo WHERE id=:id LIMIT 1");
        $sth->BindValue(':id',$id,PDO::PARAM_INT);
        $sth->BindValue(':nome',$this->nome,PDO::PARAM_STR);
        $sth->BindValue(':email',$this->email,PDO::PARAM_STR);
        $sth->BindValue(':tipo',$this->tipo,PDO::PARAM_INT);
        $sth->BindValue(':setor',$this->setor,PDO::PARAM_INT);
        $sth->BindValue(':ativo',$this->ativo,PDO::PARAM_INT);
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

    public static function login($email, $senha, $pdo) {
        $sth = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = :email AND senha = :senha LIMIT 1");
        $sth->BindValue(':email', $email, PDO::PARAM_STR);
        $sth->BindValue(':senha',$senha, PDO::PARAM_STR);
        $sth->execute();
        $array = $sth->fetch(PDO::FETCH_ASSOC);
        return $array;
    }
}

?>
