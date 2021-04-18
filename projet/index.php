<?php

session_start();
require 'vendor/autoload.php' ;
use projet\controller\IndexController;
use projet\controller\LotController;
use projet\controller\FormulaireOKController;
use projet\controller\CompteClientController;
require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use projet\controller\ProduitController;
use projet\controller\Proposition_achatController;

$file = parse_ini_file('src/conf/conf.ini');
$db = new DB();
$db->addConnection($file);
$db->setAsGlobal();
$db->bootEloquent();

$app = new \Slim\Slim();

/* création d'un lot */
$app->get('/creer/lot', function() {
    LotController::creerLot();
})->name('creer_lot');

/* ajout d'un lot dans la bdd via formulaire */
$app->post('/creer/lot', function(){
    FormulaireOKController::create();
})->name('lot_cree');

$app->get('/', function () {
     IndexController::interfaceListe();
})->name('page_index');
/* page client id = 1 */
$app->get('/client/:id', function($id) {
    IndexController::interfaceClient($id);
})->name('page_index_client');

/* page compte client */
$app->get('/client/compte/:id', function($id) {
    CompteClientController::generate($id);
})->name('compte_client');

/* ajout solde */
$app->post('/client/compte/:id', function($id){
    CompteClientController::ajout_solde($id);
})->name('solde_client');

/* création compte */
$app->get('/creer/compte', function () {
    CompteClientController::generateForm();
})->name('creation_compte_client');

/* créer compte */
$app->post('/creer/compte', function () {
    FormulaireOKController::createAccount();
})->name('creer_compte_client');

/* afficher lots */
$app->get('/afficher/lots/client/:id', function ($id) {
    LotController::afficherC($id);
})->name('afficher_lots_client');

/* afficher lots */
$app->get('/afficher/lots/gestionnaire/', function () {
    LotController::afficherG();
})->name('afficher_lots_gestionnaire');

/* gestionnaire afficher lot post filter */
$app->post('/afficher/lots/gestionnaire/', function () {
    LotController::afficherG();
})->name('afficher_lots_gestionnaire_post');

/* client afficher lot post filter */
$app->post('/afficher/lots/client/:id', function ($id) {
    LotController::afficherC($id);
})->name('afficher_lots_clients_post');

/* afficher produits */
$app->get('/afficher/produits/client/:id', function ($id) {
    ProduitController::afficherC($id);
})->name('afficher_produits_client');

/* afficher produits */
$app->get('/afficher/produits/gestionnaire/', function () {
    ProduitController::afficherG();
})->name('afficher_produits_gestionnaire');

/* gestionnaire afficher produits post filter */
$app->post('/afficher/produits/gestionnaire/', function () {
    ProduitController::afficherG();
})->name('afficher_produits_gestionnaire_post');

/* client afficher produits post filter */
$app->post('/afficher/produits/client/:id', function ($id) {
    ProduitController::afficherC($id);
})->name('afficher_produits_clients_post');

/* ajout d'une proposition achat dans la bdd via formulaire */
$app->get('/proposer/achat/', function(){
    Proposition_achatController::create();
})->name('proposer_achat');

/* ajout d'une proposition achat dans la bdd via formulaire POST */
$app->post('/proposer/achat/', function(){
    Proposition_achatController::create();
})->name('proposer_achat_post');

/* confimer prop achat */
$app->get('/valider/propachat/:un/:deux/:trois/:quatre/:cinq/:six', function($un, $deux, $trois, $quatre, $cinq, $six){
    Proposition_achatController::confirmer($un, $deux, $trois, $quatre, $cinq, $six);
})->name('valider_propachat');

/* confimer prop achat */
$app->post('/valider/propachat/', function(){
    Proposition_achatController::confirmer_post();
})->name('valider_propachat_post');

/* resultat vente */
$app->get('/resultat/vente/', function(){

})->name('resultat_vente');

/* supprimer lot */
$app->get('/supprimer/lot/', function(){
    LotController::suppression();
})->name('supprimer_lot');

/* supprimer lot post */
$app->post('/supprimer/lot/', function(){
    LotController::suppression();
})->name('supprimer_lot_post');


$app->run();