<?php

namespace App\Models;

class User {
    private  static $table = 'user';  //Nome da minha Tabela

    public static function select(int $id) {
        //Para nos conectarmos com o BD, usamos o objeto PDO (PHP Data Objects) 
        //que já vem com o PHP
        //Utilizamos o contra-barra "\PDO" pois é uma variável GLOBAL e estamos
        //utilizando o "namespace"
        //O drive que vou utilizar é o mysql (constante que está no meu config.php -> DBDRIVE)
        //Concatenando com o host, + o banco de dados + ", usuário + senha

        $connPdo = new \PDO(DBDRIVE.':host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);
        //Agora posso fazer o que eu quiser no BD (inserir, selecionar etc)
        //Vamos criar um SQL, selecionando todos os dados da tabela "user" inclusive
        //vou utilizar a variável ".self (pois é uma "variavel" ESTÁTICA). Se NÃO fosse,
        //utilizaria o "THIS"
        //O ":" antes do "id" (:id) é para que o PHP faça um tratamento antes ( para não ter
        //nenhum tipo de select "injection" ou nenhum tipo de erro nesse sentido ! O
        //bindValue já faz esse tratamento por "baixo dos panos"
        $sql = 'SELECT * FROM '. self::$table . ' WHERE id = :id';
        //Chamo meu objeto PDO abaixo ($connPdo) , chamo meu método "prepare" 
        //que vai preparar a execução desse SQL (abaixo:)
        $stmt = $connPdo->prepare($sql);
        //e vamos substituir o :id pelo que vier no parâmetro da função -> $id
        // a sintaxe é: "bindValue(o que eu quero substituir , valor do parâmetro que veio na
        //variável $id ), que vai ser o usuário que vai preencher por meio da 
        //"url do navegador " (http://localhost/api2/public_html/api/users/1) . Veja abaixo:
        $stmt->bindValue(':id', $id);
        //e vou executar esse meu script sql, onde ele vai no meu BD ver se existe um usuário
        //com o id informado.
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetch(\PDO::FETCH_ASSOC); //Para não duplicar as infos do retorno
            //assim irá retornar os dados do usuário informado. 
        } else {
            throw new \Exception("Nenhum usuário encontrado");

        }
    }

    public static function selectAll() {
        
        $connPdo = new \PDO(DBDRIVE.':host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);
        $sql = 'SELECT * FROM '. self::$table;
        $stmt = $connPdo->prepare($sql);
        //$stmt->bindValue(':id', $id);          ===> não é necessário
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
        } else {
            throw new \Exception("Nenhum usuário encontrado");

        }
    }
} 