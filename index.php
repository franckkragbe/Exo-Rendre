<?php
session_start();

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/PersonneController.php";
$personnelController = new PersonneController;

try{
    if(empty($_GET['page'])){
        require "views/accueil.view.php";
    } else {
        $url = explode("/", filter_var($_GET['page']),FILTER_SANITIZE_URL);

        switch($url[0]){
            case "accueil" : require "views/accueil.view.php";
            break;
            case "personnels" : 
                if(empty($url[1])){
                    $personnelController ->afficherPersonnels();
                } else if($url[1] === "l") {
                    $personnelController ->afficherPersonnel($url[2]);
                } else if($url[1] === "a") {
                    $personnelController ->ajoutPersonnel();
                } else if($url[1] === "m") {
                    $personnelController ->modificationPersonnel($url[2]);
                } else if($url[1] === "s") {
                    $personnelController ->suppressionPersonnel($url[2]);
                } else if($url[1] === "av") {
                    $personnelController ->ajoutPersonnelValidation();
                } else if($url[1] === "mv") {
                    $personnelController->modificationPersonnelValidation();
                }
                else {
                    throw new Exception("La page n'existe pas");
                }
            break;
            default : throw new Exception("La page n'existe pas");
        }
    }
}
catch(Exception $e){
    $msg = $e->getMessage();
    require "views/error.view.php";
}
