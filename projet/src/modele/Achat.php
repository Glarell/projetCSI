<?php
namespace projet\modele;
class Achat extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'public.produit';
    protected $primaryKey = 'idproduit';
    public $timestamps = false;

    public function lots() {
        return $this->belongsTo('projet\modele\Lot','lotidf');
    }

    public function clients() {
        return $this->belongsTo('projet\modele\Client','clientid');
    }
}