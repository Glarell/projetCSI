<?php

namespace projet\controller;
use projet\modele\Client;
use projet\vue\VueCompteClient;

class CompteClientController
{

    public static function generate($id) {
        $client = Client::where('idclient','=',$id)->first();
        $vue = new VueCompteClient($client->client_nom,
            $client->client_tel,
            $client->client_email,
            $client->client_dateInscrit,
            $client->client_solde
        );
        $vue->render();
    }
}