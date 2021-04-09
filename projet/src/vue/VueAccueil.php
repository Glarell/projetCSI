<?php


namespace projet\vue;


class VueAccueil extends VuePrincipale
{

    public function render(){
        $menu = self::getMenu();
        $footer = self::getFooter();
        $html = "
$menu
<header class=\"masthead\">
  <div class=\"container h-100\">
    <div class=\"row h-100 align-items-center\">
      <div class=\"col-12 text-center\">
        <h1 style=\"color:white\" class=\"font-weight-light\">Bienvenue sur notre Application d’achat de lots de produits !</h1>
        <p style=\"color:white\" class=\"lead\">Cliquez sur les boutons au dessus pour intéragir.</p>
        <br> 
        <p style=\"color:red\" class=\"lead\">Vous êtes connecté en tant que GESTIONNAIRE</p>
        <br>
        <p style=\"color:whitesmoke\" class=\"lead\">Le but de ce projet est de réaliser une application d’achat de lots de produits. Les lots sont mis en vente par le gestionnaire de l’application pendant un temps limité. Les clients proposent un prix, et à la clôture de la vente, celui qui a proposé le plus gagne le lot.</p>
      </div>
    </div>
  </div>
</header>

$footer
";

        echo $html;
    }
}