<?php

namespace projet\vue;
use Slim\Slim;


class VueSupprimerLot extends VuePrincipale
{
    private $content;
    private $un, $deux, $trois, $quatre, $cinq, $six;

    public function __construct() {
        parent::__construct();
        $this->choix1();
    }
    public function choix1 () {
        $this->content = <<<END
                <br>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                           <div class="col-12 text-center">
                           <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Supprimer un lot :</h5>
                           <form id="f1" method="post" action="/ProjetL3CSI/ProjetL3CSI/projet/supprimer/lot/" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Id du lot : </label>
                               <input type="text" class="form-control" id="validationServer01" name="idLot" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                            
                           </div>
                           <button class="btn btn-primary" type="submit" name="supprimer">Supprimer</button>
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