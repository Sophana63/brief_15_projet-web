<?php
  if(!empty($_POST["firstname"] && $_POST["lastname"] &&$_POST["email"] &&$_POST["subject"])) {
      require('bdd.php');
      $req = $bdd->prepare('INSERT INTO contact(nom,prenom,email,message) VALUES (?,?,?,?)');
      $req->execute([
      $nom = $_POST["firstname"],
      $prenom = $_POST["lastname"],
      $email = $_POST["email"],
      $message = $_POST["subject"]
    ]);
    
    header("location: index.php");
    exit();   

    }else{
    echo 'Valeurs non renseingner!';
    }

?>