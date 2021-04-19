<?php


namespace projet\vue;
use Slim\Slim;


class VueCompteClient extends VuePrincipale
{
    private $name, $p, $tel, $email, $dateInsc, $solde;
    private $lienVersCompte, $app;
    private $propositions;
    private $proposCONFIRM;
    private $achats;

    public function __construct($id,$n, $p,$t, $e,$d ,$sold, $propos, $proposCONFIRM, $achats)
    {
        $this->app = Slim::getInstance();
        $this->name = $n;
        $this->p = $p;
        $this->tel = $t;
        $this->email = $e;
        $this->dateInsc = $d;
        $this->solde = $sold;
        $this->lienVersCompte = '/ProjetL3CSI/ProjetL3CSI/projet/client/compte/'.$id;
        $this->propositions = $propos;
        $this->proposCONFIRM = $proposCONFIRM;
        $this->achats = $achats;
    }

    public function render() {
        $HTML_Proposition = '';
        if ($this->propositions != null) {
            $HTML_Proposition = '<div class=\"row h-50 align-items-center\">';
            foreach ($this->propositions as $value) {
                $tmp1 = $value['idpropachat'];
                $tmp2 = $value['clientid'];
                $tmp3 = $value['lotid'];
                $tmp4 = $value['propachat_montant'];
                $tmp5 = $value['propachat_date'];
                $tmp6 = $value['propachat_nbmodif'];
                $HTML_Proposition = $HTML_Proposition . <<<END

            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <li class="\">idpropachat : $tmp1</li>
                <li class="\">clientid : $tmp2</li>
                <li class="\">lotid : $tmp3</li>
                <li class="\">propachat_montant : $tmp4</li>
                <li class="\">propachat_date : $tmp5</li>
                <li class="\">propachat_nbmodif : $tmp6</li>
                
                <a href="/ProjetL3CSI/ProjetL3CSI/projet/proposer/achat/" class=\"btn btn-primary\">Modifier cette proposition</a>
                </div>
          </div>
END;
            }
            $HTML_Proposition = $HTML_Proposition . '</div>';
        }

        $HTML_Proposition_2 = '';
        if ($this->proposCONFIRM != null) {
            $HTML_Proposition_2 = '
          <div class=\"row h-50 align-items-center\">  
          <div class="card" style="width: 18rem;">
          <div class="card-body">';
            $params = '';
            foreach ($this->proposCONFIRM as $value) {
                $tmp1 = $value;
                $params = $params .  '/:'. $value;
                $HTML_Proposition_2 = $HTML_Proposition_2 . <<<END
                <li class="\">$tmp1</li>
END;
            }
            $HTML_Proposition_2 = $HTML_Proposition_2 . <<<END
                <a href="/ProjetL3CSI/ProjetL3CSI/projet/valider/propachat$params" class="btn btn-primary">Valider cette proposition</a>
                </div>
          </div></div>
END;
        }

        $HTML_achat='';
        if ($this->achats != null) {
            $HTML_achat = '<div class=\"row h-50 align-items-center\">';
            foreach ($this->achats as $value) {
                $tmp1 = $value['idachat'];
                $tmp2 = $value['achat_montant'];
                $tmp3 = $value['achat_benefice'];
                $tmp4 = $value['lotid'];
                $tmp5 = $value['clientid'];
                $HTML_achat = $HTML_achat . <<<END

            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <li class="\">idachat : $tmp1</li>
                <li class="\">achat_montant : $tmp2</li>
                <li class="\">achat_benefice : $tmp3</li>
                <li class="\">lotid : $tmp4</li>
                <li class="\">clientid : $tmp5</li>
                </div>
          </div>
END;
            }
            $HTML_achat = $HTML_achat . '</div>';
        }

        $menu = self::getMenu2();
        $footer = self::getFooter();
        $html = "
        $menu
        <header class=\"masthead\">
        <div class=\"container h-50\">
         <div class=\"text-center\">
            <h1 style=\"color:white\" class=\"font-weight-light\">Votre compte</h1>
        </div>
        <div class=\"row h-50 align-items-center\">
            <div class=\"card\" style=\"width: 18rem;\">
              <div class=\"card-body\">
                <h5 class=\"card-title\">Vos informations :</h5>
                <li class=\"\">$this->name</li>
                <li class=\"\">$this->p</li>
                <li class=\"\">$this->tel</li>
                <li class=\"\">$this->email</li>
                <li class=\"\">$this->dateInsc</li>
                
                <a href=\"#\" class=\"btn btn-primary\">Mettre à jour les informations</a>
                </div>
          </div>
            <div class=\"card\" style=\"width: 12rem;\">
             <form id=\"f1\" method=\"post\" action=\"$this->lienVersCompte\" enctype=\"multipart/form-data\">
              <div class=\"card-body\">
                <h5 class=\"card-title\">Votre solde :</h5>
                <li class=\"\">$this->solde €</li>
                    <div class=\"form-row\">
                       <input type=\"text\" class=\"form-control\" id=\"validationServer01\" name=\"newSolde\" placeHolder=\"Exemple : 50\" required>
                           <div class=\"valid-feedback\"></div>
                    </div>
                <button class=\"btn btn-primary\" type=\"submit\" name=\"ajouterSolde\">Ajouter solde</button>
              </div>
              </form>
          </div>
        </div>
         <div class=\"text-center\">
            <h1 style=\"color:white\" class=\"font-weight-light\">Vos propositions d'achats</h1>
        </div>
        $HTML_Proposition
         <div class=\"text-center\">
            <h1 style=\"color:white\" class=\"font-weight-light\">Vos propositions d'achats à confimer</h1>
        </div>
        $HTML_Proposition_2
         <div class=\"text-center\">
            <h1 style=\"color:white\" class=\"font-weight-light\">Vos achats passés</h1>
        </div>
        $HTML_achat
        </header>
        $footer
        </div>
";

        echo $html;
    }
}