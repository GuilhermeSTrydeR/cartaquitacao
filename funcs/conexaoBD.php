<?php

    //-------------------------------------------------------------------------------------------------
    //local
    //-------------------------------------------------------------------------------------------------

    // $db="localhost";
    // $usuario="root";
    // $password="";
    // $banco="unimedtc_cartaquitacao";

    // global $pdo;

    // try{
    //     $pdo = new PDO("mysql:dbname=".$banco."; host".$db, $usuario, $password);
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //     $sql = $pdo->query("SELECT * FROM unimeds");
    //     $sql->execute();

    //     // verificar o numero de registro cadastrados no banco
    //     // echo $sql->rowCount();

    // }catch(PDOException $e){
    //     echo($e);
    //     exit;

    // }

    //-------------------------------------------------------------------------------------------------
    //producao
    //-------------------------------------------------------------------------------------------------
    
    $db="localhost";
    $dbuser="unimedtc_sa";
    $password="utc1993.";
    $banco="unimedtc_cartaquitacao";

    		

    global $pdo;

    try{
        $pdo = new PDO("mysql:dbname=".$banco."; host".$db, $dbuser, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->query("SELECT * FROM unimeds");
        $sql->execute();

        // verificar o numero de registro cadastrados no banco
        // echo $sql->rowCount();

    }catch(PDOException $e){
        echo($e);
        exit;

    }

?>