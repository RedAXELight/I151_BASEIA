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
  $connexion = new PDO('mysql:host=localhost; dbname=snows', '[userDB]', '[pwdBD');
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
  $requete = "SELECT * FROM tblsurfs ORDER BY idsurf;";
  // Exécution de la requête
  $resultats = $connexion->query($requete);
  return $resultats;
}