<?php
namespace projet\controller;
use projet\modele\Lot;
use projet\vue\VueAfficherLots;
use Slim\Slim;
use Illuminate\Database\Capsule\Manager as DB;
use projet\vue\VueCreerLot;
use projet\modele\Client;

class LotController
{
    public static function creerLot()
    {
        $vue = new VueCreerLot(0);
        $vue->render();
    }

    public static function afficherC($id) {
        if (isset($_POST['filter'])){
            $filtre = $_POST['selecter'];
            $liste_lots = Lot::where('lot_etat','=',$filtre)->get();
            $vue = new VueAfficherLots(2,$liste_lots[0]);
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
            $liste_lots = $db::table('public.lot')
                ->where('lot_etat', '=', 'En vente')
                ->where('lot_dated', '>=', $date[0]['client_dateinscrit'])->get();
            $vue = new VueAfficherLots(0, $liste_lots[0]);
            $vue->render();
        }
    }

    public static function afficherG() {
        if (isset($_POST['filter'])){
            $filtre = $_POST['selecter'];
            $liste_lots = Lot::where('lot_etat','=',$filtre)->get();
            $vue = new VueAfficherLots(1,$liste_lots);
            $vue->render();
        } else {
            $liste_lots = Lot::get();
            $vue = new VueAfficherLots(1,$liste_lots);
            $vue->render();
        }
    }
}