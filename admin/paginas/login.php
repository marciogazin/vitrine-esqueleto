<?php

   

    if($_POST){
        $login = $_POST["login"] ?? NULL;
        $senha = $_POST["senha"] ?? NULL;

        $sql = "SELECT id, nome, login, senha from usuario WHERE login= :login AND ativo ='S' limit 1";

        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(":login", $login);
        $consulta->execute();

        $dados = $consulta->fetch(PDO::FETCH_OBJ);
        //verificando se usuario existe 
        
        if(!isset($dados->id)){
            mensagemErro("Usuario Nao encontrado ou inativo");
        } else if(!password_verify($senha, $dados->senha)){
            mensagemErro("senha incorreta");
        }

        $_SESSION["usuario"] = array ([
            "id" => $dados->id,
            "nome" => $dados->nome,
              "login" => $dados->login
        ]);

        echo "<script>location.href='paginas/home'</script>";
        exit;
        
    }




?>


<div class="login">
    <h1 class="text-center">Efetuar Login</h1>
    <form method="POST">
        <label for="login">Login</label>
        <input type="text" name="login" id="login" class="form-control" require placeholder="Por favor preencha esta campo">

        <br>

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" class="form-control" require placeholder="Por favor preencha este campo">
        <br>

        <button type="submit" class="btn btn-success w-100">Efetuar Login</button>
        
    </form>
</div>