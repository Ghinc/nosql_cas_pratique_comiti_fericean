<?php

//header("Content-Type:application/json");
require "data.php";
require "exemple_user.php";


    if(!empty($_GET['name'])) {

        $name=$_GET['name'];
        $price = get_price($name);

        if(empty($price)) {
             response(200,"Product Not Found",NULL);
             echo "null";
             echo " oui mais non";

        }
         else {

           echo "oui mais oui";

        }
    }

    else {

        response(400,"Invalid Request",NULL);


    }

    if (isset($_POST['name'])){


        $name = $_POST['name'];
        $price = get_price($name);
        $response = response(200, $name, $price);
        $result = json_decode($response);
        echo "le prix est :";
        echo $result->data;
    }

    if(isset($_POST['assup'])){

        $assupp=$_POST['assup'];
        supp_ref($assupp);

    }

    if(isset($_POST['id_aaj']) && isset($_POST['nom_aaj'])&& isset($_POST['prix_aaj']) && isset($_POST['desc_aaj'])){
        echo $_POST['nom_aaj'];
        $id=$_POST['id_aaj'];
        $nom=$_POST['nom_aaj'];
        $prix=$_POST['prix_aaj'];
        $desc=$_POST['desc_aaj'];
        add_product($id, $nom, $desc, $prix);
    }


    function response($status, $status_message, $data) {
        header("HTTP/1.1 ".$status);
        $response['status']=$status;
        $response['status_message']=$status_message;
        $response['data']=$data;
        $json_response = json_encode($response);
        return($json_response);
    }

    function affich_prix($reponse){
        $obj=json_decode($reponse);
        echo "Le prix est       ";
        print $obj->{'data'};
    }

    function full_response($status, $status_message, $id, $nom, $desc){
        header("HTTP/1.1 ".$status);
        $response['status']=$status;
        $response['status_message']=$status_message;
        $response['id']=$id;
        $response['nom']=$nom;
        $response['desc']=$desc;
        $json_response = json_encode($response);
        return($json_response);
    }



?>