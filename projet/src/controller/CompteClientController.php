<?php

namespace projet\controller;
use projet\modele\Achat;
use projet\modele\Client;
use projet\modele\Proposition_achat;
use projet\vue\VueCompteClient;
use projet\vue\VueCreationCompte;
use Illuminate\Database\Capsule\Manager as DB;

class CompteClientController
{

    public static function generate($id) {
        $client = Client::where('idclient','=',$id)->first();
        $propos = Proposition_achat::where('clientid','=',$id)->get();
        $file = parse_ini_file('src/conf/conf.ini');
        $db = new DB();
        $db->addConnection($file);
        $db->setAsGlobal();
        $db->bootEloquent();
        $proposCONFIRM = $db::table('proposition_achat')
            ->join('lot','lot.idlot','=','proposition_achat.lotid')
            ->where('lot.lot_etat','=','En attente de confirmation')->get(['idlot','lot_nom','propachat_montant','propachat_date','lot_etat', 'proposition_achat.idpropachat']);
        $achats = Achat::where('clientid','=',$id)->get();
        $verif = sizeof($proposCONFIRM);
        $verif_2 = sizeof($propos);
        $verif_3 = sizeof($achats);
        if ($verif == 0 & $verif_2 == 0 & $verif_3 == 0) {
            $vue = new VueCompteClient(
                $id,
                $client->client_nom,
                $client->client_prenom,
                $client->client_tel,
                $client->client_email,
                $client->client_dateInscrit,
                $client->client_solde,
                null,
                null,
                null
            );
            $vue->render();
        } else if ($verif != 0 & $verif_2 == 0 & $verif_3 == 0) {
            $vue = new VueCompteClient(
                $id,
                $client->client_nom,
                $client->client_prenom,
                $client->client_tel,
                $client->client_email,
                $client->client_dateInscrit,
                $client->client_solde,
                null,
                $proposCONFIRM[0],null
            );
            $vue->render();
        } else if ($verif != 0 & $verif_2 != 0 & $verif_3 == 0) {
            $vue = new VueCompteClient(
                $id,
                $client->client_nom,
                $client->client_prenom,
                $client->client_tel,
                $client->client_email,
                $client->client_dateInscrit,
                $client->client_solde,
                $propos,
                $proposCONFIRM[0],null
            );
            $vue->render();
        } else if ($verif == 0 & $verif_2 != 0 & $verif_3 != 0) {
            $vue = new VueCompteClient(
                $id,
                $client->client_nom,
                $client->client_prenom,
                $client->client_tel,
                $client->client_email,
                $client->client_dateInscrit,
                $client->client_solde,
                $propos,
                null,$achats
            );
            $vue->render();
        } else if ($verif != 0 & $verif_2 == 0 & $verif_3 != 0) {
            $vue = new VueCompteClient(
                $id,
                $client->client_nom,
                $client->client_prenom,
                $client->client_tel,
                $client->client_email,
                $client->client_dateInscrit,
                $client->client_solde,
                null,
                $proposCONFIRM[0],$achats
            );
            $vue->render();
        } else if ($verif != 0 & $verif_2 != 0 & $verif_3 != 0) {
            $vue = new VueCompteClient(
                $id,
                $client->client_nom,
                $client->client_prenom,
                $client->client_tel,
                $client->client_email,
                $client->client_dateInscrit,
                $client->client_solde,
                $propos,
                $proposCONFIRM[0],$achats
            );
            $vue->render();
        } else if ($verif == 0 & $verif_2 != 0 & $verif_3 == 0) {
            $vue = new VueCompteClient(
                $id,
                $client->client_nom,
                $client->client_prenom,
                $client->client_tel,
                $client->client_email,
                $client->client_dateInscrit,
                $client->client_solde,
                $propos,
                null, null
            );
            $vue->render();
        }
    }

    public static function ajout_solde($id) {
        $file = parse_ini_file('src/conf/conf.ini');
        $db = new DB();
        $db->addConnection($file);
        $db->setAsGlobal();
        $db->bootEloquent();
        try {
            $achats = Achat::where('clientid','=',$id)->get();
            $client = Client::where('idclient','=',$id)->first();
            $propos = Proposition_achat::where('clientid','=',$id)->get();
            $proposCONFIRM = $db::table('proposition_achat')
                ->join('lot','lot.idlot','=','proposition_achat.lotid')
                ->where('lot.lot_etat','=','En attente de confirmation')->get(['idlot','lot_nom','propachat_montant','propachat_date','lot_etat', 'proposition_achat.idpropachat']);
            if (isset($_POST['ajouterSolde'])){
                $newSolde = $_POST['newSolde'];
                $client->client_solde = $client->client_solde + $newSolde;
                $client->save();
                $verif = sizeof($proposCONFIRM);
                $verif_2 = sizeof($propos);
                $verif_3 = sizeof($achats);
                if ($verif == 0 & $verif_2 == 0 & $verif_3 == 0) {
                    $vue = new VueCompteClient(
                        $id,
                        $client->client_nom,
                        $client->client_prenom,
                        $client->client_tel,
                        $client->client_email,
                        $client->client_dateInscrit,
                        $client->client_solde,
                        null,
                        null,
                        null
                    );
                    $vue->render();
                } else if ($verif != 0 & $verif_2 == 0 & $verif_3 == 0) {
                    $vue = new VueCompteClient(
                        $id,
                        $client->client_nom,
                        $client->client_prenom,
                        $client->client_tel,
                        $client->client_email,
                        $client->client_dateInscrit,
                        $client->client_solde,
                        null,
                        $proposCONFIRM[0],null
                    );
                    $vue->render();
                } else if ($verif != 0 & $verif_2 != 0 & $verif_3 == 0) {
                    $vue = new VueCompteClient(
                        $id,
                        $client->client_nom,
                        $client->client_prenom,
                        $client->client_tel,
                        $client->client_email,
                        $client->client_dateInscrit,
                        $client->client_solde,
                        $propos,
                        $proposCONFIRM[0],null
                    );
                    $vue->render();
                } else if ($verif == 0 & $verif_2 != 0 & $verif_3 != 0) {
                    $vue = new VueCompteClient(
                        $id,
                        $client->client_nom,
                        $client->client_prenom,
                        $client->client_tel,
                        $client->client_email,
                        $client->client_dateInscrit,
                        $client->client_solde,
                        $propos,
                        null,$achats
                    );
                    $vue->render();
                } else if ($verif != 0 & $verif_2 == 0 & $verif_3 != 0) {
                    $vue = new VueCompteClient(
                        $id,
                        $client->client_nom,
                        $client->client_prenom,
                        $client->client_tel,
                        $client->client_email,
                        $client->client_dateInscrit,
                        $client->client_solde,
                        null,
                        $proposCONFIRM[0],$achats
                    );
                    $vue->render();
                } else if ($verif != 0 & $verif_2 != 0 & $verif_3 != 0) {
                    $vue = new VueCompteClient(
                        $id,
                        $client->client_nom,
                        $client->client_prenom,
                        $client->client_tel,
                        $client->client_email,
                        $client->client_dateInscrit,
                        $client->client_solde,
                        $propos,
                        $proposCONFIRM[0],$achats
                    );
                    $vue->render();
                } else if ($verif == 0 & $verif_2 != 0 & $verif_3 == 0) {
                    $vue = new VueCompteClient(
                        $id,
                        $client->client_nom,
                        $client->client_prenom,
                        $client->client_tel,
                        $client->client_email,
                        $client->client_dateInscrit,
                        $client->client_solde,
                        $propos,
                        null, null
                    );
                    $vue->render();
                }
            }
        } catch (\Exception $e) {
            $achats = Achat::where('clientid','=',$id)->get();
            $client = Client::where('idclient','=',$id)->first();
            $propos = Proposition_achat::where('clientid','=',$id)->get();
            $proposCONFIRM = $db::table('proposition_achat')
                ->join('lot','lot.idlot','=','proposition_achat.lotid')
                ->where('lot.lot_etat','=','En attente de confirmation')->get(['idlot','lot_nom','propachat_montant','propachat_date','lot_etat', 'proposition_achat.idpropachat']);
            $verif = sizeof($proposCONFIRM);
            $verif_2 = sizeof($propos);
            $verif_3 = sizeof($achats);
            if ($verif == 0 & $verif_2 == 0 & $verif_3 == 0) {
                $vue = new VueCompteClient(
                    $id,
                    $client->client_nom,
                    $client->client_prenom,
                    $client->client_tel,
                    $client->client_email,
                    $client->client_dateInscrit,
                    $client->client_solde,
                    null,
                    null,
                    null
                );
                $vue->render();
            } else if ($verif != 0 & $verif_2 == 0 & $verif_3 == 0) {
                $vue = new VueCompteClient(
                    $id,
                    $client->client_nom,
                    $client->client_prenom,
                    $client->client_tel,
                    $client->client_email,
                    $client->client_dateInscrit,
                    $client->client_solde,
                    null,
                    $proposCONFIRM[0],null
                );
                $vue->render();
            } else if ($verif != 0 & $verif_2 != 0 & $verif_3 == 0) {
                $vue = new VueCompteClient(
                    $id,
                    $client->client_nom,
                    $client->client_prenom,
                    $client->client_tel,
                    $client->client_email,
                    $client->client_dateInscrit,
                    $client->client_solde,
                    $propos,
                    $proposCONFIRM[0],null
                );
                $vue->render();
            } else if ($verif == 0 & $verif_2 != 0 & $verif_3 != 0) {
                $vue = new VueCompteClient(
                    $id,
                    $client->client_nom,
                    $client->client_prenom,
                    $client->client_tel,
                    $client->client_email,
                    $client->client_dateInscrit,
                    $client->client_solde,
                    $propos,
                    null,$achats
                );
                $vue->render();
            } else if ($verif != 0 & $verif_2 == 0 & $verif_3 != 0) {
                $vue = new VueCompteClient(
                    $id,
                    $client->client_nom,
                    $client->client_prenom,
                    $client->client_tel,
                    $client->client_email,
                    $client->client_dateInscrit,
                    $client->client_solde,
                    null,
                    $proposCONFIRM[0],$achats
                );
                $vue->render();
            } else if ($verif != 0 & $verif_2 != 0 & $verif_3 != 0) {
                $vue = new VueCompteClient(
                    $id,
                    $client->client_nom,
                    $client->client_prenom,
                    $client->client_tel,
                    $client->client_email,
                    $client->client_dateInscrit,
                    $client->client_solde,
                    $propos,
                    $proposCONFIRM[0],$achats
                );
                $vue->render();
            } else if ($verif == 0 & $verif_2 != 0 & $verif_3 == 0) {
                $vue = new VueCompteClient(
                    $id,
                    $client->client_nom,
                    $client->client_prenom,
                    $client->client_tel,
                    $client->client_email,
                    $client->client_dateInscrit,
                    $client->client_solde,
                    $propos,
                    null, null
                );
                $vue->render();
            }
        }
    }

    public static function generateForm() {
        $vue = new VueCreationCompte();
        $vue->render();
    }
}