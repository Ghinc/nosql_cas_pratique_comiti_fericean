<?php

require "database.php";

    function get_price($name) {
        $products=get_value();
        foreach($products as $product){


            if ($product['nom'] == $name) {
                return $product['prix'];
            }

        }
    }

    function aff_tout(){

            $conn=connexion();
            $sql="SELECT * FROM produits";
            $stmt=$conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            return $result;

    }

    ?>
