<?php
class Conexao{
    private static $instancia;

    public static function getConexao(){
        if(!isset(self::$instancia)){
            self::$instancia = new PDO('mysql:host=localhost; dbname=Usuario; charset=utf8','root', '');
            return self::$instancia;
        }else{
            return self::$instancia;
        }
    }

}