<?php
   include "conexao.php";
   class usuarioDAO{
       public function cadastrar(usuario $u){
           $sql_usuario = "insert into cadastro (nome, email, senha) 
           values (?, ?, ?)";

           $bd = new Conexao();
           $con = $bd->getConexao();

           $valor_usuario = $con->prepare($sql_usuario);
           $valor_usuario->bindValue(1, $u->getNome());
           $valor_usuario->bindValue(2, $u->getEmail());
           $valor_usuario->bindValue(3, $u->getSenha());

           $resultado_usuario = $valor_usuario->execute();

           if($resultado_usuario){
               return "cadastrado com sucesso";
           }else{
               return "erro ao cadastrar";
           }
       }

       public function deletar(usuario $u){
        //criando a query de cadastro
        $sql_usuario = "delete from cadastro where id_usuario=?";

        //instanciar o objeto de conexão
        $bd = new Conexao();
        $con = $bd->getConexao();

        $valor_usuario = $con->prepare($sql_usuario);
        $valor_usuario->bindValue(1, $u->getId());

        $resultado_usuario = $valor_usuario->execute();

        if($resultado_usuario){
            return "Apagado com sucesso";
        }else{
            return "erro ao apagar";
        }
    }

    public function atualizar(usuario $u){
        //criando a query de cadastro
        $sql_usuario = "update cadastro set nome=?, email=? where id_usuario =?";

        //instanciar o objeto de conexão
        $bd = new Conexao();
        $con = $bd->getConexao();

        $valor_usuario = $con->prepare($sql_usuario);
        $valor_usuario->bindValue(1, $u->getNome());
        $valor_usuario->bindValue(2, $u->getEmail());
        $valor_usuario->bindValue(3, $u->getSenha());  
        
        $resultado_usuario = $valor_usuario->execute();

        if($resultado_usuario){
            return "Atualizado com sucesso";
        }else{
            return "erro ao atualizar";
        }
    }

    public function consultar(){
        $sql = "
select * from cadastro";
        
        //instanciar o objeto de conexão
        $bd = new Conexao();
        $con = $bd->getConexao();

        $valor = $con->prepare($sql);
        $valor->execute();
        if($valor->rowCount()>0){
            $resultado = $valor->fetchAll(\PDO::FETCH_ASSOC);
            return json_encode($resultado);
        }else{
            return "Não existem dados no sistema";
        }
    }
   }