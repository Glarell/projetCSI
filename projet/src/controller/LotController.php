<?php
namespace projet\controller;
use Slim\Slim;
use projet\vue\VueCreerLot;

class LotController
{
    public static function creerLot()
    {
        $vue = new VueCreerLot(0);
        $vue->render();
    }
}