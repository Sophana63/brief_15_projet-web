<?php

if (isset($_POST['pseudo']) && isset($_POST['message'])) {  
    $pseudo = $_POST['pseudo'];
    $message = str_replace("'", "\'", $_POST['message']);
    $date = date("Y-m-d H:i:s");
   
    require_once("class/MyPdoLocal.php");
    $pdo = new MyPDO();
    $pdo -> reqFetchAll("
        INSERT INTO avis(pseudo, avis, date) VALUES ('" .$pseudo. "','" .$message. "','" .$date. "')
    "); 

    header("location: index.php");
    exit();   

}
?>
