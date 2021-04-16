<?php


namespace projet\vue;


class VueCreationCompte extends VuePrincipale
{
    private $content;
    public function __construct()
    {

    }

    public function render(){
        $this->content = <<<END
        <header class=\"masthead\">
          <div class=\"container h-100\">
                <br>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                           <div class="col-12 text-center">
                           <div class="card" style="width: 18rem;">
                           <div class="card-body">
                           <h5 class="card-title">Création du compte</h5>
                           <form id="f1" method="post" action="" enctype="multipart/form-data">
                           
                           <div class="form-row">
                               <label for="validationServer01">Saisir nom : </label>
                               <input type="text" class="form-control" id="validationServer01" name="nomClient" placeHolder="Exemple : Durand" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Saisir prénom : </label>
                               <input type="text" class="form-control" id="validationServer01" name="prenomClient" placeHolder="Exemple : Pierre" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                               <label for="validationServer01">Saisir téléphone : </label>
                               <input type="text" class="form-control" id="validationServer01" name="telClient" placeHolder="Exemple : 0601437768" required>
                               <div class="valid-feedback">
                               </div>
                           </div>
                           
                           <div class="form-row">
                           <label for="validationServer01">Saisir email :</label>
                           <input type="text" class="form-control" id="validationServer01" name="emailClient" placeHolder="Exemple : cesar@fake.fr" required>
                           <div class="valid-feedback">
                           </div>
                       </div>
                           
                           </div>
                           <button class="btn btn-primary" type="submit" name="creer">Créer compte</button>
                           </form>
                           </div>
                           </div>
                    </div>
                </div>
          </div>
        </header>
END;
        $menu = self::getMenu2();
        $footer = self::getFooter();
        $html = "
        $menu 
        $this->content
        $footer
";

        echo $html;
    }
}