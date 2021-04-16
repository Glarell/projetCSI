<?php

namespace projet\vue;
use Slim\Slim;


class VuePropAchat extends VuePrincipale
{
    private $urlListeCree;
    private $content;
    private $indice;

    public function __construct($indice) {
        parent::__construct();
        $app = Slim::getInstance();
        $this->urlListeCree = $app->urlFor('proposer_achat_post');
        $this->indice = $indice;
        switch ($this->indice) {
            case 0:
                $this->choix1();
                break;
            case 1:
                $this->choix2();
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
                           <h5 class="card-title">Proposition d'un achat :</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Id du lot : </label>
                               <input type="text" class="form-control" id="validationServer01" name="idLot" placeHolder="Exemple : 1" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Id du client : </label>
                               <input type="text" class="form-control" id="validationServer01" name="idClient" placeHolder="Exemple : 1" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Montant proposé : </label>
                               <input type="text" class="form-control" id="validationServer01" name="montant" placeHolder="Exemple : 10" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                            
                           </div>
                           <button class="btn btn-primary" type="submit" name="creerProp">Créer la proposition</button>
                           </form>
                           </div>
                           <br>
                           <br>
                   
                    </div>
                </div>
            </div>
END;
    }

    public function choix2 () {
        $this->content = <<<END
                <br>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                           <div class="col-12 text-center">
                           <div class="alert alert-danger" role="alert">
                              Un problème est apparu !
                            </div>
                           <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Proposition d'un achat :</h5>
                           <form id="f1" method="post" action="$this->urlListeCree" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Id du lot : </label>
                               <input type="text" class="form-control" id="validationServer01" name="idLot" placeHolder="Exemple : 1" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Id du client : </label>
                               <input type="text" class="form-control" id="validationServer01" name="idClient" placeHolder="Exemple : 1" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Montant proposé : </label>
                               <input type="text" class="form-control" id="validationServer01" name="montant" placeHolder="Exemple : 10" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                            
                           </div>
                           <button class="btn btn-primary" type="submit" name="creerProp">Créer la proposition</button>
                           </form>
                           </div>
                           <br>
                           <br>
                   
                    </div>
                </div>
            </div>
END;
    }

    /**
     * fonction utilisée pour le rendu des vues
     */
    public function render(){
        $menu = self::getMenu2();
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