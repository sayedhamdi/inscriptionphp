<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .error{
        color:red;
    }
    .success{
        color:green;
    }
    </style>
</head>
<body>
<?php

    //etablir une connection avec la base de donnée
    try {
        $user = "root";
        $pass = "";
        $database = new PDO('mysql:host=localhost;dbname=jeu', $user, $pass);
        
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    $nom =  $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    echo "nom : ".$nom."<br>";
    echo "prenom : ".$prenom."<br>";
    echo "email : ".$email."<br>";
    if ($password == "" || $email == "" || $prenom == "" || $nom == "") { 
        echo "<span class='error'>there are emty fields </span><br>";
    }
    else{
        try{
            $options = [
                'cost' => 12,
            ];

            $hash = password_hash($password, PASSWORD_BCRYPT, $options);
            $hashed_password =  password_hash($password, PASSWORD_BCRYPT, $options);
            $sql = "INSERT INTO joueur (nom, prenom, email, password) VALUES ('$nom', '$prenom', '$email', '$hashed_password')";
            $database->query($sql); 
            echo "<span class='success'>formulaire fully submitted<span>";
            header("location: index.php");
        }catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
       
    }
?>
</body>
</html>
