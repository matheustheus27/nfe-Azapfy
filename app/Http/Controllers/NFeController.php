<?php

namespace App\Http\Controllers;

use App\Models\NFeModel;
use Illuminate\Http\Request;
use App\Services\NFeServiceCreateXML;
use App\Services\NFeServicePrintDA;
use Attribute;

class NFeController extends Controller
{
    public function makexml(Request $request){
        $nfe = new NFeServiceCreateXML($request->Config);
        
        return $nfe->CreateNFe($request->NFe);
    }

    public function render(Request $request){
        $da = new NFeServicePrintDA($request->nfe); 
        
        header('Content-Type: application/pdf');
        echo $da->GenerateDanfe();
    }

    public function register(Request $request){
        $nfe = new NFeServiceCreateXML($request->Config);

        return $nfe->RegisterNFe($request->urlCetificate, $request->passCertificate, $request->urlXml);
    }

    public function save(Request $request){ 
        $id = rand('00000', '99999');

        $xml = $this->xmlToArray($request->nfe);
        NFeModel::on('justice')->Create(['NFe' => $xml['NFe'], 'protNFe' => $xml['protNFe']]);
    }

    public function update(Request $request){
        $nfe = $this->find($request);
        
        $xml = $this->xmlToArray($request->nfe);

        $nfe->NFe = $xml['NFe'];
        $nfe->protNFe = $xml['protNFe'];

       $nfe->save();
    }

    public function find(Request $request){
        $nfe = NFeModel::on('justice')->where('protNFe.infProt.chNFe', $request->id)->first();

        return $nfe;
    }

    public function delete(Request $request){
        NFeModel::on('justice')->delete($request->nfe);
    }

    function xmlToArray($req){
        $XML = file_get_contents($req);
        $XMLString = simplexml_load_string($XML, "SimpleXMLElement", LIBXML_NOCDATA);
        $JSON = json_encode($XMLString);
        $ARRAY = json_decode($JSON,TRUE);

        return $ARRAY;
    }
}
