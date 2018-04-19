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
  $requete = "SELECT * FROM tblsurfs WHERE active = 1 ORDER BY disponibilite;";
  // Exécution de la requête
  $resultats = $connexion->query($requete);
  return $resultats;
}


//compare les données envoyées par le formulaire avec celle de la bd
function getLogin($post)
{
    // connexion à la BD snows
    $connexion = getBD();

    // Requête pour sélectionner la personne loguée
    if ($post['fUserType'] == 'Client')
    {
        $requete = "SELECT * FROM tblclients WHERE login= '".$post['fLogin']."' AND passwd='".$post['fPass']."';";
    }
    else
    {
        $requete = "SELECT * FROM tblvendeurs WHERE login= '".$post['fLogin']."' AND passwd='".$post['fPass']."';";
    }

    // Exécution de la requête et renvoi des résultats
    $resultats = $connexion->query($requete);
    return $resultats;
}

function AddSnow($post) //Fonction pour l'ajout d'un snow dans la bd
{
    // connexion à la BD snows
    $connexion = getBD();


    $requete = "INSERT INTO tblsurfs (idsurf, marque, boots, type, disponibilite, statut, active) VALUES ('".$post['fID']."','".$post['fMarque']."','".$post['fBoots']."','".$post['fType']."','".$post['fDispo']."', '', '1') ;";

    $resultats = $connexion->query($requete); //Permet de retourner le résultat de la requête (Si par exemple on voulait directement afficher le snow entré cela pourrait être utile)
    return $resultats;
}


//fonction de "suppression" d'un snow
function DeleteSnow($idcible)
{
    //connexion à la bd
    $connexion = getBD();

    $requete = "UPDATE tblsurfs SET active = 0 WHERE idsurf = '".$idcible."';";

    $resultats = $connexion->query($requete);
    return $resultats;
}

//Va chercher les infos d'un seul snow pour la modification
function GetSnow($idcible)
{
    //connexion à la bd
    $connexion = getBD();

    $requete = "SELECT * FROM tblsurfs WHERE idsurf = '".$idcible."';";

    $resultats = $connexion->query($requete);
    return $resultats; //dans ce cas de figure il est utile de retourner la variable resultat
}

//fonction de modification d'un snow
function UpdateSnow($ValModif)
{
    //connexion à la bd
    $connexion = getBD();

    $requete = "UPDATE tblsurfs SET marque = '".$ValModif['fMarque']."', boots = '".$ValModif['fBoots']."', type = '".$ValModif['fType']."', disponibilite = '".$ValModif['fDispo']."' WHERE idsurf = '".$ValModif['fId']."' ;";

    $resultats = $connexion->query($requete);
    return $resultats;
}

