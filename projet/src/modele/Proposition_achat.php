<?php
namespace projet\modele;
class Proposition_achat extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'public.proposition_achat';
    protected $primaryKey = 'idpropachat';
    public $timestamps = false;

    public function lots() {
        return $this->belongsTo('projet\modele\Lot','lotid');
    }

    public function clients() {
        return $this->belongsTo('projet\modele\Client','clientid');
    }
}