<?php

namespace projet\vue;
use Slim\Slim;


class VueConfimer extends VuePrincipale
{
    private $content;
    private $un, $deux, $trois, $quatre, $cinq, $six;

    public function __construct($un, $deux, $trois, $quatre, $cinq, $six) {
        parent::__construct();
        $this->un = $un;
        $this->deux = $deux;
        $this->trois = $trois;
        $this->quatre = $quatre;
        $this->cinq = $cinq;
        $this->six = $six;
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
                           <h5 class="card-title">Confimer la proposition d'achat :</h5>
                           <form id="f1" method="post" action="/ProjetL3CSI/ProjetL3CSI/projet/valider/propachat/" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Id du lot : </label>
                               <input type="text" class="form-control" id="validationServer01" name="idLot" value="$this->un" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Id de la proposition : </label>
                               <input type="text" class="form-control" id="validationServer01" name="idProp" value="$this->six" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Nom du lot : </label>
                               <input type="text" class="form-control" id="validationServer01" name="nomlot" value="$this->deux" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Montant proposé : </label>
                               <input type="text" class="form-control" id="validationServer01" name="montant" value="$this->trois" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Date de la proposition : </label>
                               <input type="text" class="form-control" id="validationServer01" name="date" value="$this->quatre" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Etat de la proposition : </label>
                               <input type="text" class="form-control" id="validationServer01" name="etat" value="$this->cinq" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                            
                           </div>
                           <button class="btn btn-primary" type="submit" name="confirmer">confirmer</button>
                           <br>
                           <button class="btn btn-primary" type="submit" name="pas_confimer">refuser</button>
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