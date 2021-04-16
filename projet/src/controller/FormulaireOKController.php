<?php

namespace projet\controller;

use projet\modele\Client;
use projet\modele\Composition;
use Illuminate\Database\Capsule\Manager as DB;
use projet\modele\Produit;
use projet\vue\VueCreerLot;
use projet\modele\Lot;
class FormulaireOKController
{

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
            } else if (isset($_POST['creerNewTypeProduit'])){
                $newType = $_POST['newTypeProduit'];
                $file = parse_ini_file('src/conf/conf.ini');
                $db = new DB();
                $db->addConnection($file);
                $db->setAsGlobal();
                $db->bootEloquent();
                $db::statement("ALTER TYPE typeproduit add VALUE '$newType'");
                $vue = new VueCreerLot(3);
                $vue->render();
            }
        } catch (\Exception $e) {
            $vue = new VueCreerLot(4);
           $vue->render();
        }
    }
    public static function createAccount() {
        try {
            if (isset($_POST['creer'])){
                $nom = $_POST['nomClient'];
                $prenom = $_POST['prenomClient'];
                $tel = $_POST['telClient'];
                $email = $_POST['emailClient'];
                $client = new Client();
                $client->client_nom = $nom;
                $client->client_prenom = $prenom;
                $client->client_tel = $tel;
                $client->client_email = $email;
                $client->save();
                echo 'succes';
            }
        } catch (\Exception $e) {
            echo 'echec\n' . $e;
        }
    }
}