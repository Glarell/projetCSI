<?php

namespace projet\vue;

use Slim\Slim;

class VuePrincipale
{
    private $app;
    private $lienAccueil, $lienAfficherUneListe, $lienCreerLot, $lienVersClient;
    private $URLbootstrapCSS;
    private $URLbootstrapJS;
    private $URLpersoCSS;
    private $URLimages;


    public function __construct()
    {
    }

    /*
    * permet l'obtention du menu de navigation
    */

    /**
     * retourne l'app de slim
     * @return Slim|null
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * permet d'obtenir l'url vers les images
     * @return string
     */
    public function getURLimages(): string
    {
        return $this->URLimages;
    }

    /*
    * fonction permet de recuperer facilement le footer
    */

    protected function getMenu()
    {
        $this->app = Slim::getInstance();
        $this->lienAccueil = $this->app->urlFor('page_index');
        $this->lienCreerLot = $this->app->urlFor('creer_lot');
        $this->lienVersClient = $this->app->urlFor('page_index_client');

        $this->URLimages = $this->app->request->getRootUri() . '/img/';
        $this->URLbootstrapCSS = $this->app->request->getRootUri() . '/public/bootstrap.css';
        $this->URLbootstrapJS = $this->app->request->getRootUri() . '/public/boostrap.min.js';
        $this->URLpersoCSS = $this->app->request->getRootUri() . '/public/css_perso.css';
        return <<<END
        <!DOCTYPE HTML>
        <html>
            <head>
                <link rel="stylesheet" href="$this->URLbootstrapCSS">
                <link rel="stylesheet" href="$this->URLpersoCSS">
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            </head>
            <body>
                <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
                  <div class="container">
                    <a class="navbar-brand" href="$this->lienAccueil">Application d’achat de lots de produits</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                      <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                          <a class="nav-link" href="$this->lienAccueil">Accueil</a>
                        </li>
                  <li class="nav-item">
                    <a class="nav-link" href="$this->lienCreerLot">Créer un lot</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="/ProjetL3CSI/ProjetL3CSI/projet/supprimer/lot">Supprimer un lot</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="/ProjetL3CSI/ProjetL3CSI/projet/client/1">Client</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="/ProjetL3CSI/ProjetL3CSI/projet/afficher/lots/gestionnaire">Voir lots</a>
                  </li>
                  
                   <li class="nav-item">
                    <a class="nav-link" href="/ProjetL3CSI/ProjetL3CSI/projet/afficher/produits/gestionnaire">Voir produits</a>
                  </li>
                                    
                  <li class="nav-item">
                    <a class="nav-link" href="/ProjetL3CSI/ProjetL3CSI/projet/resultat/vente/gestionnaire/">Résultat vente</a>
                  </li>
                                    
                  <li class="nav-item">
                    <a class="nav-link" href="/ProjetL3CSI/ProjetL3CSI/projet/creer/compte">S'inscrire</a>
                  </li>
                      </ul>
                    </div>
                  </div>
                </nav>
                </header>
END;
    }

    protected function getMenu2()
    {
        $this->app = Slim::getInstance();
        $this->lienAccueil = $this->app->urlFor('page_index');
        $this->lienCreerLot = $this->app->urlFor('creer_lot');

        $this->URLimages = $this->app->request->getRootUri() . '/img/';
        $this->URLbootstrapCSS = $this->app->request->getRootUri() . '/public/bootstrap.css';
        $this->URLbootstrapJS = $this->app->request->getRootUri() . '/public/boostrap.min.js';
        $this->URLpersoCSS = $this->app->request->getRootUri() . '/public/css_perso.css';
        $this->lienVersClient = $this->app->urlFor('page_index');
        return <<<END
        <!DOCTYPE HTML>
        <html>
            <head>
                <link rel="stylesheet" href="$this->URLbootstrapCSS">
                <link rel="stylesheet" href="$this->URLpersoCSS">
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            </head>
            <body>
                <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
                  <div class="container">
                    <a class="navbar-brand" href="$this->lienAccueil">Application d’achat de lots de produits</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                      <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                          <a class="nav-link" href="$this->lienAccueil">Accueil</a>
                        </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/ProjetL3CSI/ProjetL3CSI/projet/client/compte/1">Mon compte</a>
                      </li>
                  <li class="nav-item">
                    <a class="nav-link" href="$this->lienVersClient">Gestionnaire</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="/ProjetL3CSI/ProjetL3CSI/projet/afficher/lots/client/1">Voir lots</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="/ProjetL3CSI/ProjetL3CSI/projet/afficher/produits/client/1">Voir produits</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="/ProjetL3CSI/ProjetL3CSI/projet/proposer/achat/">Proposer un achat</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="/ProjetL3CSI/ProjetL3CSI/projet/resultat/vente/client/">Résultat vente</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="/ProjetL3CSI/ProjetL3CSI/projet/creer/compte">S'inscrire</a>
                  </li>
                      </ul>
                    </div>
                  </div>
                </nav>
                </header>
END;
    }

    protected function getFooter()
    {
        return '<script src="$this->URLbootstrapJS"></script>
              <div class="card-body">
                <h5 class="card-title">Auteurs</h5>
                <p class="card-text">BENDAHMANE Arwa - MOGENOT Dorian - TONDON César</p>
              </div>
            </body>
        </html> ';
    }
}