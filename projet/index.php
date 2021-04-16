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

$app->get('/liste/afficher/uneliste/:token', function($token){
    ListeController::afficherUneListe($token);
})->name('afficher_une_liste');

$app->post('/liste/afficher/uneliste/:token', function($token){
    ListeController::afficherUneListe($token);
})->name('afficher_une_liste_post');

$app->get('/liste/modifier/uneliste/:token', function($tokenModif){
    ListeController::modifierUneListe($tokenModif);
})->name('modifier_une_liste');

$app->post('/liste/modifier/informationsListe/:tokenModif', function($tokenModif){
    Listecontroller::modificationListe($tokenModif);
})->name('modification_une_liste');

$app->post('/liste/supprimer/:token', function($token){
    ListeController::supprimerListe($token);
})->name('demander_une_liste_ap_supp');

$app->get('/liste/afficher/demande', function(){
    ListeController::demanderListe();
})->name('demander_une_liste');

$app->post('/liste/afficher/demande', function(){
    ListeController::demanderListe();
})->name('demander_une_liste_post');

$app->get('/liste/afficher', function (){
    ListeController::afficherListe();
})->name('afficher_toutes_listes');

$app->get('/liste/afficher/itemdeliste/:no', function($no) {
    ListeController::afficherItemDeListe($no);
})->name('afficher_items_dune_liste');

$app->get('/item/afficheritemid/:id', function($id) {
    ItemController::afficherItemID($id);
})->name('afficher_item_id');

$app->post('/item/afficheritemid/:id', function($id) {
    ItemController::modifierItem($id);
})->name('afficher_item_id_post');

$app->get('/item/afficher', function(){
    ItemController::afficherToutItems();
})->name('afficher_tous_items');

$app->get('/creer/liste', function() {
    ListeController::creerListe();
})->name('creer_liste');

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










$app->post('/confirmation/ajout', function() {
    FormulaireOKController::control3();
})->name('ajout_img');

$app->post('/ajout_item/:tokenModif', function($tokenModif){
    ListeController::ajoutItem($tokenModif);
})->name('ajouter_item_reussi');

$app->get('/modifer/item/:id', function($id){
    ItemController::modifierItemDansListe($id);
})->name('modifier_item_id');

$app->post('/modifier/item/:id', function($id){
    ItemController::modifierItemEnregistrer($id);
})->name('modifier_item_ap_formulaire');

$app->post('/liste/modifier/uneliste/itemSupprime/:id', function($id){
    ItemController::supprimerItem($id);
})->name('supprimer_item');
$app->run();