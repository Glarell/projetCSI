<?php

namespace projet\controller;

use projet\modele\Composition;
use projet\modele\Produit;
use projet\vue\VueCreerLot;
use projet\modele\Lot;
class FormulaireOKController
{
    /*
    * fonction pour creer une liste
    */
   /* public static function control(){
        if (isset($_POST['creer'])){
            $l = new Liste();
            $tokenGenerated = "";
            $token = openssl_random_pseudo_bytes(32);
            $token = bin2hex($token);
            $tokenGenerated = $token;
  
            $tokenModifGenerated = "";
            $tokenModif = openssl_random_pseudo_bytes(32);
            $tokenModif = bin2hex($tokenModif);
            $tokenModifGenerated = $tokenModif;
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $date =  $_POST['expiration'];
            $dateCourante = date("Y") . "-" . date("m") ."-" . date("d");
            if ($date < $dateCourante) {
                $vue =  new VueCreerListe("erreurDate");
                $vue->render();
            } else {
            $titre = filter_var($titre, FILTER_SANITIZE_SPECIAL_CHARS);
            $titre = filter_var($titre, FILTER_SANITIZE_STRING);
            $description = filter_var($description, FILTER_SANITIZE_SPECIAL_CHARS);
            $description = filter_var($description, FILTER_SANITIZE_STRING);
            $date = filter_var($date, FILTER_SANITIZE_SPECIAL_CHARS);
            $date = filter_var($date, FILTER_SANITIZE_STRING);
            if (isset($_POST['liste_publique'])) {
                $l->public = 1;
            } else 
                $l->public = null;
            $l->titre = $titre;
            $l->description = $description;
            $l->expiration = $date;
            $l->user_id = null;
            $l->token = $tokenGenerated;
            $l->tokenModif = $tokenModifGenerated;
            $res = $l->save();
            $vue =  new VueListeCree($l);
            $vue->render();
            }
          }
        
    }*/


    public static function create() {
        try {
            if (isset($_POST['creerLot'])){
                $vue = new VueCreerLot(1);
                $nomLot = $_POST['nomLot'];
                $prixEstime = $_POST['prixEstime'];
                $prixMin = $_POST['prixMin'];
                $dateDebut = $_POST['dateDebut'];
                $dateFin = $_POST['dateFin'];
                $lot = new Lot();
                $lot->lot_nom = $nomLot;
                $lot->lot_prixestime = $prixEstime;
                $lot->lot_prixmin = $prixMin;
                $lot->lot_dated = $dateDebut;
                $lot->lot_datef = $dateFin;
                //$lot->lot_etat = 'En attente de mise en vente';
                $lot->save();
                $vue->render();
            } else if (isset($_POST['creerProduit'])){
                $nomProduit = $_POST['nomProduit'];
                $descProduit = $_POST['descProduit'];
                $typeProduit = $_POST['typeProduit'];
                $produit = new Produit();
                $produit->produit_nom = $nomProduit;
                $produit->produit_description = $descProduit;
                $produit->produit_type = $typeProduit;
                $produit->save();
                $vue = new VueCreerLot(2);
                $vue->render();
            } else if (isset($_POST['ajouterProduitLot'])){
                $choixLot = $_POST['choixLot'];
                $choixProduit = $_POST['choixProduit'];
                $quantite = $_POST['quantite'];
                $composition = new Composition();
                $composition->composition_quantite = $quantite;
                $composition->produitid = $choixProduit;
                $composition->lotid = $choixLot;
                $composition->save();
                $vue = new VueCreerLot(3);
                $vue->render();
            }
        } catch (\Exception $e) {
            $vue = new VueCreerLot(4);
           $vue->render();
        }
    }
}