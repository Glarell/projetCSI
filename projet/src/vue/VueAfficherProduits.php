<?php


namespace projet\vue;
use Slim\Slim;
use Illuminate\Database\Capsule\Manager as DB;


class VueAfficherProduits extends VuePrincipale
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
        $tmp1 = $this->liste_lot['idproduit'];
        $tmp2 = $this->liste_lot['produit_nom'];
        $tmp3 = $this->liste_lot['produit_description'];
        $tmp4 = $this->liste_lot['produit_type'];
        $this->HTML_Proposition = $this->HTML_Proposition . <<<END
            <div class=\"card\" style="color:white">
              <div class=\"card-body\">
                <h5 class=\"card-title\">Titre du produit :</h5>
                    <li class=\"\">$tmp1</li>
                    <li class=\"\">$tmp2</li>
                    <li class=\"\">$tmp3</li>
                    <li class=\"\">$tmp4</li>
                <br>
                </div>
          </div>
                <br>
                <br>
END;
    }

    public function calculLot2() {
        foreach ($this->liste_lot as $value) {
            $tmp1 =$value['idproduit'];
            $tmp2 = $value['produit_nom'];
            $tmp3 = $value['produit_description'];
            $tmp4 = $value['produit_type'];
            $this->HTML_Proposition = $this->HTML_Proposition . <<<END
            <div class=\"card\" style="color:white">
              <div class=\"card-body\">
                <h5 class=\"card-title\">Titre du produit :</h5>
                <li class=\"\">$tmp1</li>
                <li class=\"\">$tmp2</li>
                <li class=\"\">$tmp3</li>
                <li class=\"\">$tmp4</li>
                <br>
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
                <h5 class=\"card-title\">Titre du produit :</h5>
                    <li class=\"\">$tmp1</li>
                    <li class=\"\">$tmp2</li>
                    <li class=\"\">$tmp3</li>
                    <li class=\"\">$tmp4</li>
                <br>
                </div>
          </div>
                <br>
                <br>
END;
    }

    public function render(){
        $file = parse_ini_file('src/conf/conf.ini');
        $db = new DB();
        $db->addConnection($file);
        $db->setAsGlobal();
        $db->bootEloquent();
        $produit  = $db::table('pg_enum')->where('enumtypid','=',16515)->get(['enumlabel']);
        $menuDeroulant="<select class=\"form-control form-control-lg\" name=\"selecter\">";
        foreach ($produit as $value){
            foreach ($value as $v) {
                $menuDeroulant = $menuDeroulant . "<option>$v</option>";
            }
        }
        $menuDeroulant = $menuDeroulant . '</select>';
        if ($this->indice == 0) {
            $menu = self::getMenu();
            $footer = self::getFooter();
            $html = "
        $menu
        <header class=\"masthead\">
        <div class=\"container h-50\">
        <br><br><br>
         <div class=\"text-center\">
            <h1 style=\"color:white\" class=\"font-weight-light\">Tous les produits : </h1>
            <br>
            <form id=\"f1\" method=\"post\" action=\"\" enctype=\"multipart/form-data\">
            $menuDeroulant
            <br>
                <button class=\"btn btn-primary\" type=\"submit\" name=\"filter2\">Valider filtre</button>
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
            <h1 style=\"color:white\" class=\"font-weight-light\">Tous les produits : </h1>
            <br>
            <form id=\"f1\" method=\"post\" action=\"\" enctype=\"multipart/form-data\">
            $menuDeroulant
            <br>
                <button class=\"btn btn-primary\" type=\"submit\" name=\"filter2\">Valider filtre</button>
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
            <h1 style=\"color:white\" class=\"font-weight-light\">Tous les produits : </h1>
            <br>
            <form id=\"f1\" method=\"post\" action=\"\" enctype=\"multipart/form-data\">
            $menuDeroulant
            <br>
                <button class=\"btn btn-primary\" type=\"submit\" name=\"filter2\">Valider filtre</button>
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