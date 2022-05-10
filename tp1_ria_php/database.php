<?php
# Réalisation pour une base avec une table de pays par contient id / pays / langue
# base pays
# table europe


    function connexion(){
          $username = 'root';
                 $password = 'root';
                 $db = 'tp1_ria';
                 $servername = 'localhost';
                 $port = 3306;
                 $conn='';
                 try {
                     $conn = new PDO("mysql:host=$servername;dbname=tp1_ria", $username, $password);
                     // set the PDO error mode to exception
                     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                     //echo "Connected successfully";
                     }
                 catch(PDOException $e)
                     {
                     echo "Connection failed: " . $e->getMessage();
                     }
                 if (!empty($conn)){
                    return($conn);
                 }

    }
    function get_value()
    {
        $conn=connexion();

        $sql = "SELECT * FROM produits";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result = $stmt->fetchAll();

        return $result;

    }

    function supp_ref($ref){
        $conn=connexion();

        $sql="DELETE FROM produits WHERE id_produit=?";
        $stmt=$conn->prepare($sql);
        $stmt->execute(array($ref));

    }

    function add_product($id, $nom, $description, $prix){
        $conn=connexion();

        $sql="INSERT INTO produits (id_produit, nom, description, prix) VALUES (?,?,?,?)";
        $stmt=$conn->prepare($sql);
        $stmt->execute(array($id, $nom, $description, $prix));
    }

    ?>