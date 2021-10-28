<?php  

namespace App\Services;

use NFePHP\DA\NFe\Danfe;
use Exception;

class NFeServicePrintDA{
    private $danfe;

    public function __construct($xml){

       try{
            $this->danfe = new Danfe($xml);
       } catch(Exception $e){
            dd($e->getMessage(), $e->getLine(), $e->getFile(), $xml);
       }
    }

    public function GenerateDanfe(){
        try{
            return $this->danfe->render();
        }catch(Exception $e){
            dd($e->getMessage());
        }
        
    }
}