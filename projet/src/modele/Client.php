<?php
namespace projet\modele;
class Client extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'public.client';
    protected $primaryKey = 'idclient';
    public $timestamps = false;
}