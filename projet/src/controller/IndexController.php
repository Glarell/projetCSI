<?php


namespace projet\controller;
use projet\index;
use projet\vue\VueAccueil;
use projet\vue\VueCompte;
use projet\vue\VueAccueilClient;
use projet\modele\Client;

class IndexController
{
    public static function interfaceListe(){
        $vue =  new VueAccueil();
        $vue->render();
    }

    public static function interfaceClient($id) {
        $client = Client::where('idclient','=',$id)->first();
        $vue = new VueAccueilClient($client->client_nom, $id);
        $vue->render();
    }
    /*
    public static function creerCompte(){
        $vue = new VueCompte('creerCompte');
        $vue->render();
    }

    public static function confirmCompte(){
        $vue = new VueCompte('confirm');
        $vue->render();
    }*/
}