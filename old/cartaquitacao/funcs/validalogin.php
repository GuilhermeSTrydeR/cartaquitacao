<?php 

	session_start(); 
    include('validaCnpj.php');


    //o cnpj
    $cnpj = $_GET['cnpj'];


    //nessa parte serao tiradas as mascaras dos inputs que vieram por POST
    $cnpj = str_replace(".", "", $cnpj);
    $cnpj = str_replace("-", "", $cnpj);
    $cnpj = str_replace("/", "", $cnpj);

    $_SESSION['cnpj'] = $cnpj;


    // se o cnpj não existir(matematicamente) sera exibido a tela de erro e retornado a pagina inicial
    if(validar_cnpj($cnpj) === false){
        
        echo "<script>alert('O CNPJ inserido é Inválido!, por favor digite novamente.');</script>";
        $url = '../';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
        
    }
    else{
        header('Location: ../enviar.php');
        exit();
    }
?>    
