<?php


namespace projet\vue;
use Slim\Slim;


class VueResultat extends VuePrincipale
{
    private $envente, $vendu;

    public function __construct($envente, $vendu)
    {
       $this->envente=$envente;
       $this->vendu=$vendu;
    }

    public function render() {
        $HTML_ENVENTE = '';
        $tmp1 = sizeof($this->envente);
        if ($tmp1 > 0) {
            foreach ($this->envente as $value) {

                $HTML_ENVENTE = $HTML_ENVENTE . '
          <div class=\"row h-50 align-items-center\">  
          <div class="card" style="width: 18rem;">
          <div class="card-body">';
                foreach ($value as $v) {
                    $HTML_ENVENTE = $HTML_ENVENTE . <<<END
                <li class="\">$v</li>
END;
                }

                $HTML_ENVENTE = $HTML_ENVENTE . <<<END
                </div>
          </div>
          </div>
<br>
END;
            }
        }
        $HTML_VENDU = '';
        $tmp1 = sizeof($this->vendu);
        if ($tmp1 > 0) {
            foreach ($this->vendu as $value) {
                $HTML_VENDU = $HTML_VENDU . '
          <div class=\"row h-50 align-items-center\">  
          <div class="card" style="width: 18rem;">
          <div class="card-body">';
                foreach ($value as $v ) {
                    $HTML_VENDU = $HTML_VENDU . <<<END
                <li class="\">$v</li>
END;
                }

                $HTML_VENDU = $HTML_VENDU . <<<END
                </div>
          </div>
          </div>
<br>
END;
            }
        }

        $menu = self::getMenu2();
        $footer = self::getFooter();
        $html = "
        $menu
        <header class=\"masthead\">
        <div class=\"container h-50\">
         <div class=\"text-center\">
            <h1 style=\"color:white\" class=\"font-weight-light\">Synthèse des lots en cours de vente</h1>
        </div>
        $HTML_ENVENTE
         <div class=\"text-center\">
            <h1 style=\"color:white\" class=\"font-weight-light\">Synthèse des lots vendus</h1>
        </div>
        $HTML_VENDU
        </header>
        $footer
        </div>
        
";

        echo $html;
    }
}