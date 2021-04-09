<?php


namespace projet\vue;


class VueCompteClient extends VuePrincipale
{
    private $name, $tel, $email, $dateInsc, $solde;

    public function __construct($n, $t, $e,$d ,$sold)
    {
        $this->name = $n;
        $this->tel = $t;
        $this->email = $e;
        $this->dateInsc = $d;
        $this->solde = $sold;
    }

    public function render(){
        $menu = self::getMenu2();
        $footer = self::getFooter();
        $html = "
        $menu
        <header class=\"masthead\">
        <div class=\"container h-50\">
        <br><br><br>
         <div class=\"text-center\">
            <h1 style=\"color:white\" class=\"font-weight-light\">Votre compte</h1>
        </div>
        <div class=\"row h-50 align-items-center\">
            <div class=\"card\" style=\"width: 18rem;\">
              <div class=\"card-body\">
                <h5 class=\"card-title\">Vos informations :</h5>
                <li class=\"\">$this->name</li>
                <li class=\"\">$this->tel</li>
                <li class=\"\">$this->email</li>
                <li class=\"\">$this->dateInsc</li>
                <br>
                <a href=\"#\" class=\"btn btn-primary\">Mettre à jour les informations</a>
                </div>
          </div>
            <div class=\"card\" style=\"width: 12rem;\">
              <div class=\"card-body\">
                <h5 class=\"card-title\">Votre solde :</h5>
                <li class=\"\">$this->solde €</li>
                <br>
                <a href=\"#\" class=\"btn btn-primary\">Ajouter solde</a>
              </div>
          </div>
        </div>
        </div>
        </header>
        $footer
";

        echo $html;
    }
}