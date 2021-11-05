<?php

use Illuminate\Support\Facades\Schema;
use App\NFeModel;

class NFeDBService extends NFeModel{
    protected $connection = 'mongodb';

    public function CreateNFe($NFe){
       Schema::create('NFe', function($collection){
            
       });
    }

    public function FindSpecificNFe($nNF){
       return NFeModel::collection('xmls')->where('nNF', $nNF)->first();
    }

    public function FindAllNFe($nNF){
      return NFeModel::collection('xmls')->get();
   }

}