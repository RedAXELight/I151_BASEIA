<?php
/**
 * Created by PhpStorm.
 * User: Pascal.BENZONANA
 * Date: 08.05.2017
 * Time: 09:15
 * Updated : Nicolas.Glassey
 * Date : 14.02.2018
 */


// ---------------------------------------------
// getBD()
// Fonction : connexion avec le serveur : instancie et renvoie l'objet PDO
// Sortie : $connexion

function getBD()
{
  // connexion au server de BD MySQL et à la BD
  $connexion = new PDO('mysql:host=localhost; dbname=snows', 'root', '');
  // permet d'avoir plus de détails sur les erreurs retournées
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $connexion;
}

// -----------------------------------------------------
// Fonctions liées aux snows

// getSnows()
// Fonction : Récupérer les données des snows
// Sortie : $resultats

function getSnows()
{
  // Connexion à la BD et au serveur
  $connexion = getBD();

  // Cr�ation de la string pour la requ�te
  $requete = "SELECT * FROM tblsurfs ORDER BY disponibilite;";
  // Exécution de la requête
  $resultats = $connexion->query($requete);
  return $resultats;
}

function getLogin($LoginForm, $PasswordForm){

    //Variable pour définir la valeur de l'identification; 1=identifié, 0= non identifié

    // Connexion à la BD et au serveur
    $connexion = getBD();

    // Cr�ation de la string pour la requ�te
    $requeteF = "SELECT login, passwd FROM tblclients WHERE login = '".$LoginForm."' AND '".$PasswordForm."';";
    // Exécution de la requête
    $resultatsF = $connexion->query($requeteF);

    foreach ($resultatsF as $resultat){
        if ($LoginForm == $resultat['login'] && $PasswordForm == $resultat['passwd']){ //si les données dans le formulaire correspondent à ce qu iest dans la BD alors

            @$_SESSION[$LoginForm]; //créée la session correspondante dans le cas ou les infos sont correctes.

        }else{
            session_destroy();      //Sinon, une eventuelle session est détruite et une erreur est retournée

        }
    }

}

