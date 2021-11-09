<?php

namespace App\Services;

use App\NFeModel;
use Exception;

class NFeDBService extends NFeModel{
      protected $connection = 'azapfy3';

      #region Register | Update
      public function RegisterNFe($xml){
         try{
            $NFe = $this->DecodeXML($xml);

            if($this->FindSpecificNFe($this->SearchID($NFe)) == 404){
               NFeModel::create($NFe);
               return 201;
            }else{
              $this->UpdateNFe($NFe);
              return 200;
           } 
         }catch(Exception $e){
            dd($e->getMessage());
         }
      }

      public function UpdateNFe($xml){
         try{
            $NFe = $this->DecodeXML($xml);

            if($this->FindSpecificNFe($this->SearchID($NFe)) != 404){
               NFeModel::update($NFe);
               return 200;
            }else{
               $this->RegisterNFe($NFe);
               return 201;
            } 
         }catch(Exception $e){
            dd($e->getMessage());
         }
      }
      #endregion
      
      #region Find
      public function FindSpecificNFe($Id){
         try{
            $return = NFeModel::where('NFe.infNFe.@attributes.Id', $Id)->get()->toArray();

            if(!empty($return)){
               return $return;
            }else{
               return 404;
            }
         }catch(Exception $e){
            dd($e->getMessage());
         }
      }

      public function FindAllNFe(){
         try{
            return NFeModel::get();
         }catch(Exception $e){
            dd($e->getMessage());
         }
      }
      #endregion

      #region Delete
      public function DeleteSpecificNFe($Id){
         try{
            $remove = $this->FindSpecificNFe($Id);

            if($remove != 404){
               NFeModel::where('NFe.infNFe.@attributes.Id', $Id)->delete();
               return 200;
            }else{
               return 400;
            }
         }catch(Exception $e){
            dd($e->getMessage());
         }
      }
      #endregion


      #region Auxiliary Functions
      private function SearchID($ID){
         $ID = $ID['NFe'];
         $ID = $ID['infNFe'];
         $ID = $ID['@attributes'];
         $ID = $ID["Id"];

         return $ID;
      }

      private function DecodeXML($XML){
         $XMLString = simplexml_load_string($XML, "SimpleXMLElement", LIBXML_NOCDATA);
         $JSON = json_encode($XMLString);
         $ARRAY = json_decode($JSON,TRUE);

         return $ARRAY;
      }
      #endregion
}