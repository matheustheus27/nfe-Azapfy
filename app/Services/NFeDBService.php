<?php

namespace App\Services;


use Illuminate\Support\Facades\Schema;
use App\NFeModel;

class NFeDBService extends NFeModel{
      protected $connection = 'mongodb';

      public function CreateNFe($NFe){
         Schema::create($NFe);
      }

      public function FindSpecificNFe($Id){
         return NFeModel::where('Id', $Id)->first();
      }

      public function FindAllNFe(){
         return NFeModel::get();
      }

}