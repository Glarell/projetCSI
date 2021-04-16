<?php

namespace projet\vue;
use Slim\Slim;


class VueCreerLot extends VuePrincipale
{
    private $urlListeCree;
    private $content;

    public function __construct($indice) {
        parent::__construct();
        $app = Slim::getInstance();
        $this->urlListeCree = $app->urlFor('lot_cree');
        switch ($indice) {
            case 0:
                $this->choix1();
                break;
            case 1:
                // creation lot
                $this->choix2();
                break;
            case 2:
                // creation produits
                $this->choix3();
                break;
            case 3:
                // ajout produit to lot
                $this->choix4();
                break;
            case 4:
                $this->choix5();
                break;
        }
    }
    public function choix1 () {
        $this->content = <<<END
                <br>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                           <div class="col-12 text-center">
                           <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Création du lot</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Nom du lot : </label>
                               <input type="text" class="form-control" id="validationServer01" name="nomLot" placeHolder="Exemple : nom du lot" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Prix estimé : </label>
                               <input type="text" class="form-control" id="validationServer01" name="prixEstime" placeHolder="Exemple : prix estimé" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Prix minimum : </label>
                               <input type="text" class="form-control" id="validationServer01" name="prixMin" placeHolder="Exemple : prix minimum" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                           <label for="validationServer01">Date de début de mise en vente</label>
                           <input type="date" class="form-control" id="validationServer01" name="dateDebut" required>
                           <div class="valid-feedback">
                           </div>
                       </div>
                           
                           <div class="form-row">
                           <label for="validationServer01">Date de fin de mise en vente</label>
                           <input type="date" class="form-control" id="validationServer01" name="dateFin" required>
                           <div class="valid-feedback">
                           </div>
                       </div>
                           
                           </div>
                           <button class="btn btn-primary" type="submit" name="creerLot">Créer le lot</button>
                           </form>
                           </div>
                           <br>
                           <br>
                           
                           <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Création des produits</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Nom du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="nomProduit" placeHolder="Exemple : nom du produit" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Description du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="descProduit" placeHolder="Exemple : description du produit" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Type du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="typeProduit" placeHolder="Exemple : choix du type" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           </div>
                           <button class="btn btn-primary" type="submit" name="creerProduit">Créer le produit</button>
                           </form>
                           </div>
                        <br>
                        <br>
                           
                           <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Création d'un nouveau type de produit</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Nouveau type de produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="newTypeProduit" placeHolder="Exemple : type4" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           </div>
                           <button class="btn btn-primary" type="submit" name="creerNewTypeProduit">Créer le type de produit</button>
                           </form>
                           </div>
                        <br>
                        <br>
                        <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Ajout d'un produit à un lot</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Choix du lot : </label>
                               <input type="text" class="form-control" id="validationServer01" name="choixLot" placeHolder="Exemple : id du lot" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Choix du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="choixProduit" placeHolder="Exemple : numero du produit" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Quantité du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="quantite" placeHolder="Exemple : nombre de produits" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           </div>
                           <button class="btn btn-primary" type="submit" name="ajouterProduitLot">Ajouter le produit au lot</button>
                           </form>
                           </div>
                           </div>
                    </div>
                </div>
END;
    }


    public function choix2() {
        $this->content = <<<END
                <br>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                           <div class="col-12 text-center">
                           <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Création du lot</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Nom du lot : </label>
                               <input type="text" class="form-control" id="validationServer01" name="nomLot" placeHolder="Exemple : nom du lot" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Prix estimé : </label>
                               <input type="text" class="form-control" id="validationServer01" name="prixEstime" placeHolder="Exemple : prix estimé" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Prix minimum : </label>
                               <input type="text" class="form-control" id="validationServer01" name="prixMin" placeHolder="Exemple : prix minimum" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                           <label for="validationServer01">Date de début de mise en vente</label>
                           <input type="date" class="form-control" id="validationServer01" name="dateDebut" required>
                           <div class="valid-feedback">
                           </div>
                       </div>
                           
                           <div class="form-row">
                           <label for="validationServer01">Date de fin de mise en vente</label>
                           <input type="date" class="form-control" id="validationServer01" name="dateFin" required>
                           <div class="valid-feedback">
                           </div>
                       </div>
                           
                           </div>
                           <div class="alert alert-primary" role="alert">Lot créé avec succès !</div>
                           <button class="btn btn-primary" type="submit" name="creer">Créer le lot</button>
                           </form>
                           </div>
                           <br>
                           <br>
                           
                           <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Création des produits</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Nom du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="nomProduit" placeHolder="Exemple : nom du produit" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Description du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="descProduit" placeHolder="Exemple : description du produit" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Type du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="typeProduit" placeHolder="Exemple : choix du type" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           </div>
                           <button class="btn btn-primary" type="submit" name="creer">Créer le produit</button>
                           </form>
                           </div>
                        <br>
                        <br>
                        
                           <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Création d'un nouveau type de produit</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Nouveau type de produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="newTypeProduit" placeHolder="Exemple : type4" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           </div>
                           <button class="btn btn-primary" type="submit" name="creerNewTypeProduit">Créer le type de produit</button>
                           </form>
                           </div>
                        <br>
                        <br>
                        <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Ajout d'un produit à un lot</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Choix du lot : </label>
                               <input type="text" class="form-control" id="validationServer01" name="choixLot" placeHolder="Exemple : id du lot" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Choix du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="choixProduit" placeHolder="Exemple : numero du produit" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Quantité du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="quantite" placeHolder="Exemple : nombre de produits" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           </div>
                           <button class="btn btn-primary" type="submit" name="ajouterProduitLot">Ajouter le produit au lot</button>
                           </form>
                           </div>
                           </div>
                    </div>
                </div>
END;
    }
    public function choix3() {
        $this->content = <<<END
                <br>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                           <div class="col-12 text-center">
                           <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Création du lot</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Nom du lot : </label>
                               <input type="text" class="form-control" id="validationServer01" name="nomLot" placeHolder="Exemple : nom du lot" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Prix estimé : </label>
                               <input type="text" class="form-control" id="validationServer01" name="prixEstime" placeHolder="Exemple : prix estimé" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Prix minimum : </label>
                               <input type="text" class="form-control" id="validationServer01" name="prixMin" placeHolder="Exemple : prix minimum" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                           <label for="validationServer01">Date de début de mise en vente</label>
                           <input type="date" class="form-control" id="validationServer01" name="dateDebut" required>
                           <div class="valid-feedback">
                           </div>
                       </div>
                           
                           <div class="form-row">
                           <label for="validationServer01">Date de fin de mise en vente</label>
                           <input type="date" class="form-control" id="validationServer01" name="dateFin" required>
                           <div class="valid-feedback">
                           </div>
                       </div>
                           
                           </div>
                           <button class="btn btn-primary" type="submit" name="creer">Créer le lot</button>
                           </form>
                           </div>
                           <br>
                           <br>
                           
                           <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Création des produits</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Nom du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="nomProduit" placeHolder="Exemple : nom du produit" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Description du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="descProduit" placeHolder="Exemple : description du produit" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Type du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="typeProduit" placeHolder="Exemple : choix du type" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           </div>
                           <button class="btn btn-primary" type="submit" name="creer">Créer le produit</button>
                           <div class="alert alert-primary" role="alert">Produit créé avec succès !</div>
                           </form>
                           </div>
                        <br>
                        <br>
                        
                           <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Création d'un nouveau type de produit</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Nouveau type de produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="newTypeProduit" placeHolder="Exemple : type4" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           </div>
                           <button class="btn btn-primary" type="submit" name="creerNewTypeProduit">Créer le type de produit</button>
                           </form>
                           </div>
                        <br>
                        <br>
                        <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Ajout d'un produit à un lot</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Choix du lot : </label>
                               <input type="text" class="form-control" id="validationServer01" name="choixLot" placeHolder="Exemple : id du lot" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Choix du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="choixProduit" placeHolder="Exemple : numero du produit" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Quantité du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="quantite" placeHolder="Exemple : nombre de produits" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           </div>
                           <button class="btn btn-primary" type="submit" name="ajouterProduitLot">Ajouter le produit au lot</button>
                           </form>
                           </div>
                           </div>
                    </div>
                </div>
END;
    }


    public function choix4() {
        $this->content = <<<END
                <br>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                           <div class="col-12 text-center">
                           <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Création du lot</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Nom du lot : </label>
                               <input type="text" class="form-control" id="validationServer01" name="nomLot" placeHolder="Exemple : nom du lot" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Prix estimé : </label>
                               <input type="text" class="form-control" id="validationServer01" name="prixEstime" placeHolder="Exemple : prix estimé" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Prix minimum : </label>
                               <input type="text" class="form-control" id="validationServer01" name="prixMin" placeHolder="Exemple : prix minimum" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                           <label for="validationServer01">Date de début de mise en vente</label>
                           <input type="date" class="form-control" id="validationServer01" name="dateDebut" required>
                           <div class="valid-feedback">
                           </div>
                       </div>
                           
                           <div class="form-row">
                           <label for="validationServer01">Date de fin de mise en vente</label>
                           <input type="date" class="form-control" id="validationServer01" name="dateFin" required>
                           <div class="valid-feedback">
                           </div>
                       </div>
                           
                           </div>
                           <button class="btn btn-primary" type="submit" name="creer">Créer le lot</button>
                           </form>
                           </div>
                           <br>
                           <br>
                           
                           <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Création des produits</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Nom du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="nomProduit" placeHolder="Exemple : nom du produit" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Description du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="descProduit" placeHolder="Exemple : description du produit" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Type du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="typeProduit" placeHolder="Exemple : choix du type" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           </div>
                           <button class="btn btn-primary" type="submit" name="creer">Créer le produit</button>
                           </form>
                           </div>
                        <br>
                        <br>
                        
                           <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Création d'un nouveau type de produit</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Nouveau type de produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="newTypeProduit" placeHolder="Exemple : type4" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           </div>
                           <button class="btn btn-primary" type="submit" name="creerNewTypeProduit">Créer le type de produit</button>
                           </form>
                           </div>
                        <br>
                        <br>
                        <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Ajout d'un produit à un lot</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Choix du lot : </label>
                               <input type="text" class="form-control" id="validationServer01" name="choixLot" placeHolder="Exemple : id du lot" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Choix du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="choixProduit" placeHolder="Exemple : numero du produit" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Quantité du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="quantite" placeHolder="Exemple : nombre de produits" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           </div>
                           <div class="alert alert-primary" role="alert">Produit ajouté avec succès !</div>
                           <button class="btn btn-primary" type="submit" name="ajouterProduitLot">Ajouter le produit au lot</button>
                           </form>
                           </div>
                           </div>
                    </div>
                </div>
END;
    }


    public function choix5() {
        $this->content = <<<END
                <br>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                           <div class="col-12 text-center">
                           <div class="alert alert-danger" role="alert">Une erreur est survenue, veuillez réessayer ...</div>
                           <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Création du lot</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Nom du lot : </label>
                               <input type="text" class="form-control" id="validationServer01" name="nomLot" placeHolder="Exemple : nom du lot" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Prix estimé : </label>
                               <input type="text" class="form-control" id="validationServer01" name="prixEstime" placeHolder="Exemple : prix estimé" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Prix minimum : </label>
                               <input type="text" class="form-control" id="validationServer01" name="prixMin" placeHolder="Exemple : prix minimum" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                           <label for="validationServer01">Date de début de mise en vente</label>
                           <input type="date" class="form-control" id="validationServer01" name="dateDebut" required>
                           <div class="valid-feedback">
                           </div>
                       </div>
                           
                           <div class="form-row">
                           <label for="validationServer01">Date de fin de mise en vente</label>
                           <input type="date" class="form-control" id="validationServer01" name="dateFin" required>
                           <div class="valid-feedback">
                           </div>
                       </div>
                           
                           </div>
                           <button class="btn btn-primary" type="submit" name="creer">Créer le lot</button>
                           </form>
                           </div>
                           <br>
                           <br>
                           
                           <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Création des produits</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Nom du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="nomProduit" placeHolder="Exemple : nom du produit" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Description du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="descProduit" placeHolder="Exemple : description du produit" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Type du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="typeProduit" placeHolder="Exemple : choix du type" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           </div>
                           <button class="btn btn-primary" type="submit" name="creer">Créer le produit</button>
                           </form>
                           </div>
                        <br>
                        <br>
                        
                           <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Création d'un nouveau type de produit</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Nouveau type de produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="newTypeProduit" placeHolder="Exemple : type4" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           </div>
                           <button class="btn btn-primary" type="submit" name="creerNewTypeProduit">Créer le type de produit</button>
                           </form>
                           </div>
                        <br>
                        <br>
                        <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Ajout d'un produit à un lot</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Choix du lot : </label>
                               <input type="text" class="form-control" id="validationServer01" name="choixLot" placeHolder="Exemple : id du lot" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Choix du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="choixProduit" placeHolder="Exemple : numero du produit" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Quantité du produit : </label>
                               <input type="text" class="form-control" id="validationServer01" name="quantite" placeHolder="Exemple : nombre de produits" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           </div>
                           <button class="btn btn-primary" type="submit" name="ajouterProduitLot">Ajouter le produit au lot</button>
                           </form>
                           </div>
                           </div>
                    </div>
                </div>
END;
    }
    /**
     * fonction utilisée pour le rendu des vues
     */
    public function render(){
        $menu = self::getMenu();
        $footer = self::getFooter();
        $html = "
              $menu
                <div class=\"container h-100\">
                    <div class=\"row h-100 align-items-center\">
                           <div class=\"col-12 text-center\">
                                $this->content
                           </div>
                    </div>
                </div>
              $footer";
        echo $html;
    }
}