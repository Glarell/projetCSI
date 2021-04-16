<?php


namespace projet\vue;
use Slim\Slim;


class VueAfficherLots extends VuePrincipale
{
    private $liste_lot;
    private $HTML_Proposition;
    private $indice;

    public function __construct($indice,$lots)
    {
        $this->indice = $indice;
        $this->liste_lot = $lots;
        if ($this->indice == 0) {
            $this->calculLot1();
        } else if ($this->indice == 1) {
            $this->calculLot2();
        } else if ($this->indice == 2) {
            $this->calculLot3();
        }
    }

    public function calculLot1() {
        $tmp = '';
        foreach ($this->liste_lot as $value) {
            $tmp = $tmp . <<<END
            <li class=\"\">$value</li>
END;
        }
            $this->HTML_Proposition = $this->HTML_Proposition . <<<END
            <div class=\"card\" style="color:white">
              <div class=\"card-body\">
                <h5 class=\"card-title\">Titre du lot :</h5>
                $tmp
                <br>
                <a href="/ProjetL3CSI/ProjetL3CSI/projet/proposer/achat/" class=\"btn btn-primary\">Proposer un achat</a>
                </div>
          </div>
                <br>
                <br>
END;
    }

    public function calculLot2() {
        foreach ($this->liste_lot as $value) {
            $this->HTML_Proposition = $this->HTML_Proposition . <<<END
            <div class=\"card\" style="color:white">
              <div class=\"card-body\">
                <h5 class=\"card-title\">Titre du lot :</h5>
                <li class=\"\">$value->idlot</li>
                <li class=\"\">$value->lot_nom</li>
                <li class=\"\">$value->lot_prixestime</li>
                <li class=\"\">$value->lot_prixmin</li>
                <li class=\"\">$value->lot_dated</li>
                <li class=\"\">$value->lot_datef</li>
                <li class=\"\">$value->lot_etat</li>
                <li class=\"\">$value->lot_nbmiseenvente</li>
                <br>
                <a href="beug" class=\"btn btn-primary\">Voir synthèse</a>
                </div>
          </div>
                <br>
                <br>
END;
        }
    }


    public function calculLot3() {
        $tmp1 = $this->liste_lot['lot_nom'];
        $tmp2 = $this->liste_lot['lot_prixestime'];
        $tmp3 = $this->liste_lot['lot_dated'];
        $tmp4 = $this->liste_lot['lot_datef'];
        $this->HTML_Proposition = $this->HTML_Proposition . <<<END
            <div class=\"card\" style="color:white">
              <div class=\"card-body\">
                <h5 class=\"card-title\">Titre du lot :</h5>
                    <li class=\"\">$tmp1</li>
                    <li class=\"\">$tmp2</li>
                    <li class=\"\">$tmp3</li>
                    <li class=\"\">$tmp4</li>
                <br>
                <a href="/ProjetL3CSI/ProjetL3CSI/projet/proposer/achat/" class=\"btn btn-primary\">Proposer un achat</a>
                </div>
          </div>
                <br>
                <br>
END;
    }

    public function render(){
        if ($this->indice == 0) {
            $menu = self::getMenu();
            $footer = self::getFooter();
            $html = "
        $menu
        <header class=\"masthead\">
        <div class=\"container h-50\">
        <br><br><br>
         <div class=\"text-center\">
            <h1 style=\"color:white\" class=\"font-weight-light\">Tous les lots : </h1>
            <br>
            <form id=\"f1\" method=\"post\" action=\"\" enctype=\"multipart/form-data\">
            <select class=\"form-control form-control-lg\" name=\"selecter\">
              <option>En vente</option>
              <option>En attente de mise en vente</option>
              <option>Vendu</option>
              <option>Expiré</option>
              <option>Echec</option>
            </select>
            <br>
                <button class=\"btn btn-primary\" type=\"submit\" name=\"filter\">Valider filtre</button>
            </form>
            <br>
        </div>
        $this->HTML_Proposition
        </div>
        </header>
        $footer
";
        } else if ($this->indice == 2) {
            $menu = self::getMenu();
            $footer = self::getFooter();
            $html = "
        $menu
        <header class=\"masthead\">
        <div class=\"container h-50\">
        <br><br><br>
         <div class=\"text-center\">
            <h1 style=\"color:white\" class=\"font-weight-light\">Tous les lots : </h1>
            <br>
            <form id=\"f1\" method=\"post\" action=\"\" enctype=\"multipart/form-data\">
            <select class=\"form-control form-control-lg\" name=\"selecter\">
              <option>En vente</option>
              <option>En attente de mise en vente</option>
              <option>Vendu</option>
              <option>Expiré</option>
              <option>Echec</option>
            </select>
            <br>
                <button class=\"btn btn-primary\" type=\"submit\" name=\"filter\">Valider filtre</button>
            </form>
            <br>
        </div>
        $this->HTML_Proposition
        </div>
        </header>
        $footer
";
        } else {
            $menu = self::getMenu2();
            $footer = self::getFooter();
            $html = "
        $menu
        <header class=\"masthead\">
        <div class=\"container h-50\">
        <br><br><br>
         <div class=\"text-center\">
            <h1 style=\"color:white\" class=\"font-weight-light\">Tous les lots : </h1>
            <br>
            <form id=\"f1\" method=\"post\" action=\"\" enctype=\"multipart/form-data\">
            <select class=\"form-control form-control-lg\" name=\"selecter\">
              <option>En vente</option>
              <option>En attente de mise en vente</option>
              <option>En attente de confirmation</option>
              <option>Vendu</option>
              <option>Expiré</option>
              <option>Echec</option>
            </select>
            <br>
                <button class=\"btn btn-primary\" type=\"submit\" name=\"filter\">Valider filtre</button>
            </form>
            <br>
        </div>
        $this->HTML_Proposition
        </div>
        </header>
        $footer
";
        }
        echo $html;
    }
}