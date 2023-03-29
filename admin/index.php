<?php
    //aqui estamos dando inicio na sessão com session_start();
    session_start();
    /*require"../config.php"; estamos trazendo o aequivo config.php para 
    nosso index.php  porque no config.php traz nossa conexão com o banco de dados*/
    require"../config.php";
?>

<!--doctype html é a versão em atual que esta o html-->
<!DOCTYPE html>
<!--Aqui em lang é a linguem em que vai estar nossa aplicação-->
<html lang="pt-br">

<head>
    <!--aqui em head irá carregar toda nossa documentação, 
    css, metas para SEO,fontes,scrips js,jquery,bootstrap,bibliotecas e etc.-->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    

    <!-- Nesta tag base estamos mostrando onde estamos no caso primeiro vem a 
    string http:// que é o inicio da URL após vem ao server que é uma varial existente global
no PHP por fim o script name tbm outra varialvel global do PHP -->
    <base href="<?php echo "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["SCRIPT_NAME"]; ?>">

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="js/lightbox-plus-jquery.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript" src="vendor/summernote/summernote.min.js"></script>
    <script type="text/javascript" src="vendor/summernote/summernote-bs4.min.js"></script>
    <script src="vendor/summernote/lang/summernote-pt-BR.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


    <!-- Outros Javascript -->
    <script src="js/parsley.min.js"></script>

    <script src="js/jquery.inputmask.min.js"></script>
    <script src="js/bindings/inputmask.binding.js"></script>
    <script src="js/jquery.maskMoney.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">

    <link rel="stylesheet" type="text/css" href="vendor/summernote/summernote.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    </script>



</head>

<body id="page-top">
    <?php

        
        //Puxando o arquico externo funcoes.php
        require "funcoes.php";

        /**Neste if começa dizer que se a sessão de usuario que foi 
         * criada NÃO estiver acessada ela vai cair na pagina login.php
         * Se a sessão estiver definida ela vai trazer o arquivo header.php
         * Depos vai verificar se o parametro (param) que é pego por get
         * a variavel $page recebe p explode que pega o param e tranforma ela em um array
         * pasta, pagina,id
         * e finaliza essa verificação reoganizando o codigo tem tres partes em um string $page = "{$pasta}/{$pagina}";
         * 

         */
        if(!isset($_SESSION["usuario"])){
            require"paginas/login.php";
        } else{


            require"header.php";
           if(isset($_GET["param"])){
                $page = explode("/",$_GET["param"]);
                $pasta = $page[0] ?? NULL;
                $pagina = $page[1] ?? NULL;
                $id = $page[2] ?? NULL;

                $page = "{$pasta}/{$pagina}";
           }
           /*Neste if, Depois que passou pelo anterior, verifica se o arquivo pego
           pela variavel $page existe, caso ela exite vai pegar a funsão require e trazer o arquivo 
           ja atualizado,se não existir vai trazer uma pagina de erro e depois carrega o arquivo 
           footer que é o rodapé da pagina geralmente */
           if(file_exists("{$page}.php")){
                require"{$page}.php";
           }else{
                require"paginas/erro.php";
           }


           require"footer.php";
        }


    ?>
</body>

</html>