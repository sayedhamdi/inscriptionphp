<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border=1>
        <thead >
            <tr>
            <th>id</th>
            <th>Nom</th>
            <th>prenom</th>
            <th>email</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        
        // requete tjib les post mel base donnée 
        // yethatou fi variable
        /*$todo = array("aghsel el ma3oun","nadhem bitek","ekhdem exercice math");
        for($i = 0; $i <count($todo) ; $i++){
            echo "<li>".$todo[$i]."</li>";
        }
        echo "</ul>";*/
        
        try {
            $user = "root";
            $pass = "";
            $database = new PDO('mysql:host=localhost;dbname=jeu', $user, $pass);
            
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        $sql = "select * from joueur";
        $rows = $database->query($sql);
        foreach($rows as $row){
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["nom"]."</td>";
            echo "<td>".$row["prenom"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "</tr>";
        }



        

    ?>

        </tbody>
    </table>
   
   <a href="formulaire_inscription.php"><button>ajouter joueur</button></a>
</body>
</html>