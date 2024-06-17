<?php
    $errorUserJaExiste = false;
    if(isset($_POST["submit"])){
        if (empty($_POST) or (empty($_POST["user"]) or (empty($_POST ["password"])))){
        print "<script>location.href='index.php'; </script>";
        }
        include('conexão.php');

        $user = $_POST["user"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM alunos WHERE user = '{$user}' AND password = '{$password}'";

        $res = $conn->query($sql) or die($conn->error);
        $row = $res->fetch_object();
        $qtd = $res->num_rows;

        if($qtd > 0) {
        echo <<<HTML
        <script>window.location.href='home.php'; </script>
        HTML;
        }
        else{
            $errorUserJaExiste = true;
        }
    }
?>

