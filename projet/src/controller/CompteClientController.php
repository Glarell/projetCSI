<?php

namespace projet\controller;
use projet\modele\Client;
use projet\modele\Proposition_achat;
use projet\vue\VueCompteClient;
use projet\vue\VueCreationCompte;

class CompteClientController
{

    public static function generate($id) {
        $client = Client::where('idclient','=',$id)->first();
        $propos = Proposition_achat::where('clientid','=',$id)->get();
        $vue = new VueCompteClient(
            $id,
            $client->client_nom,
            $client->client_tel,
            $client->client_email,
            $client->client_dateInscrit,
            $client->client_solde,
            $propos
        );
        $vue->render();
    }

    public static function ajout_solde($id) {
        try {
            $client = Client::where('idclient','=',$id)->first();
            $propos = Proposition_achat::get();
            if (isset($_POST['ajouterSolde'])){
                $newSolde = $_POST['newSolde'];
                $client->client_solde = $client->client_solde + $newSolde;
                $client->save();
                $vue = new VueCompteClient(
                    $id,
                    $client->client_nom,
                    $client->client_tel,
                    $client->client_email,
                    $client->client_dateInscrit,
                    $client->client_solde,
                    $propos
                );
                $vue->render();
            }
        } catch (\Exception $e) {
            $client = Client::where('idclient','=',$id)->first();
            $propos = Proposition_achat::get();
            $vue = new VueCompteClient(
                $id,
                $client->client_nom,
                $client->client_tel,
                $client->client_email,
                $client->client_dateInscrit,
                $client->client_solde,
                $propos
            );
            $vue->render();
        }
    }

    public static function generateForm() {
        $vue = new VueCreationCompte();
        $vue->render();
    }
}