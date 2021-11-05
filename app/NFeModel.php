<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class NFeModel extends Model
{
    protected $table = 'xmlsNFe';

    protected $requiredTags = [
        "infNFe",
        
        "ide",
        "emit",
        "enderEmit",
        "dest",
        "enderDest",
        "prod",
        "imposto",
        "ICMSTot"
    ];

    protected $ide = [
        "cUF",
        "cNF",
        "natOp",
        "mod", 
        "serie",
        "nNF",
        "dhEmi",
        "dhSaiEnt",
        "tpNF",
        "idDest",
        "cMunFG",
        "tpImp",
        "tpEmis",
        "cDV"

    ];

    public function getRequiredTags(){
        return $this->requiredTags;
    }

    public function getIde(){

    }
}
