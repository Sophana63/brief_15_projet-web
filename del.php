<?php
  if(!empty($_POST["num_id"])) {
      require('bdd.php');

      $req = $bdd->prepare('DELETE FROM avis WHERE id = :id');
      $req->execute([
      'id' => $_POST["num_id"]
    ]);
    
    header("location: index.php");
    exit();   

    }else{
    echo 'Valeurs non renseingner!';
    }

?>