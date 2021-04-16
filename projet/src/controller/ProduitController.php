<?php
namespace projet\controller;
use projet\modele\Lot;
use projet\modele\Produit;
use projet\vue\VueAfficherLots;
use Slim\Slim;
use Illuminate\Database\Capsule\Manager as DB;
use projet\modele\Client;
use projet\vue\VueAfficherProduits;

class ProduitController
{

    public static function afficherC($id) {
        if (isset($_POST['filter2'])){
            $filtre = $_POST['selecter'];
            $liste_lots = Produit::where('produit_type','=',$filtre)->get();
            $vue = new VueAfficherProduits(0,$liste_lots[0]);
            $vue->render();
        } else {
            $file = parse_ini_file('src/conf/conf.ini');
            $db = new DB();
            $db->addConnection($file);
            $db->setAsGlobal();
            $db->bootEloquent();
            $date = Client::where('client.idclient', '=', $id)->get();
            //echo $date[0]['client_dateinscrit']; //client_dateinscrit
            // filter envente
            $liste_lots = Produit::get();
            $vue = new VueAfficherProduits(0, $liste_lots[0]);
            $vue->render();
        }
    }

    public static function afficherG() {
        if (isset($_POST['filter2'])){
            $filtre = $_POST['selecter'];
            $liste_lots = Produit::where('produit_type','=',$filtre)->get();
            $vue = new VueAfficherProduits(0,$liste_lots[0]);
            $vue->render();
        } else {
            $liste_lots = Produit::get();
            $vue = new VueAfficherProduits(1,$liste_lots);
            $vue->render();
        }
    }
}