<?php 

	session_start(); 
    include('validaCnpj.php');
    $v = new Valida();


    //o cnpj
    $cnpj = $_GET['cnpj'];


    //nessa parte serao tiradas as mascaras dos inputs que vieram por POST
    $cnpj = str_replace(".", "", $cnpj);
    $cnpj = str_replace("-", "", $cnpj);
    $cnpj = str_replace("/", "", $cnpj);

    $_SESSION['cnpj'] = $cnpj;



    echo($v->validar_cnpj($cnpj));
    echo '<br>';
    echo($v->validar_unimed($cnpj));
    
    if(($v->validar_cnpj($cnpj) == false || $v->validar_cnpj($cnpj) == true) && $v->validar_unimed($cnpj) == false){
        
        echo "<script>alert('O CNPJ inserido é Inválido!, por favor digite novamente.');</script>";
        $url = '../';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
    }
    else{

        header('Location: ../enviar.php');
        exit();

    }


?>    
