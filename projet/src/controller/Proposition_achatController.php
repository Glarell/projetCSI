<?php
namespace projet\controller;
use projet\modele\Lot;
use projet\modele\Produit;
use projet\vue\VueAfficherLots;
use projet\vue\VueConfimer;
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

    public static function confirmer($un, $deux, $trois, $quatre, $cinq, $six) {
            $un = str_replace(':','',$un);
            $deux = str_replace(':','',$deux);
            $trois = str_replace(':','',$trois);
            $quatre = str_replace(':','',$quatre);
            $cinq = str_replace(':','',$cinq);
            $six = str_replace(':','',$six);
            $vue = new VueConfimer($un, $deux, $trois, $quatre, $cinq, $six);
            $vue->render();
    }

    public static function confirmer_post() {
        if (isset($_POST['confirmer'])){
            $id = $_POST['idProp'];
            $m = $_POST['montant'];
            $file = parse_ini_file('src/conf/conf.ini');
            $db = new DB();
            $db->addConnection($file);
            $db->setAsGlobal();
            $db->bootEloquent();
            $res=DB::select('SELECT public."confimer_propachat_lot"('. 0 . ',' . $id . ',' . $m  .')');
            $tmp = 0;
            foreach ($res[0] as $v) {
                $tmp = $v;
            }
            if ($tmp == 0) {
                echo 'fait.';
            } else if ($tmp == 1) {
                echo 'erreur';
            } else if ($tmp == 2) {
                echo 'recherche dun autre gagnant de la prop';
            }
        } else if (isset($_POST['pas_confimer'])){
            $id = $_POST['idProp'];
            $m = $_POST['montant'];
            $file = parse_ini_file('src/conf/conf.ini');
            $db = new DB();
            $db->addConnection($file);
            $db->setAsGlobal();
            $db->bootEloquent();
            $res=DB::select('SELECT public."confimer_propachat_lot"('. 1 . ',' . $id . ',' . $m  .')');
            $tmp = 0;
            foreach ($res[0] as $v) {
                $tmp = $v;
            }
            if ($tmp == 0) {
                echo 'fait.';
            } else if ($tmp == 1) {
                echo 'erreur';
            } else if ($tmp == 2) {
                echo 'recherche dun autre gagnant de la prop';
            }
        }
    }
}