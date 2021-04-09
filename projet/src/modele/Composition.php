<?php
namespace projet\modele;
class Composition extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'public.composition';
    protected $primaryKey = ['produitid','lotid'];
    public $timestamps = false;
    public $incrementing = false;

    public function lots() {
        return $this->belongsTo('projet\modele\Lot','lotid');
    }

    public function produits() {
        return $this->hasMany('projet\modele\Produit','produitid');
    }
}