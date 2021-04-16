<?php
namespace projet\controller;
use projet\modele\Lot;
use projet\modele\Produit;
use projet\vue\VueAfficherLots;
use projet\vue\VuePropAchat;
use Slim\Slim;
use Illuminate\Database\Capsule\Manager as DB;
use projet\modele\Client;
use projet\vue\VueAfficherProduits;

class Proposition_achatController
{

    public static function create() {
        if (isset($_POST['creerProp'])){
            $idDuLot = $_POST['idLot'];
            $idDuClient = $_POST['idClient'];
            $montant = $_POST['montant'];
            $file = parse_ini_file('src/conf/conf.ini');
            $db = new DB();
            $db->addConnection($file);
            $db->setAsGlobal();
            $db->bootEloquent();
            $res=DB::select('SELECT public."proposition_achat"('. $idDuClient . ',' . $idDuLot . ',' . $montant  .')');
            foreach ($res[0] as $v) {
                if ($v == 0) {
                    $vue = new VuePropAchat(0);
                    $vue->render();
                } else {
                    $vue = new VuePropAchat(1);
                    $vue->render();
                }
            }
        } else {
            $vue = new VuePropAchat(0);
            $vue->render();
        }
    }
}