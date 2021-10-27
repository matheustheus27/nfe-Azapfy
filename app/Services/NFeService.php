<?php

namespace App\Services;

use NFePHP\NFe\Make;
use NFePHP\NFe\Complements;
use NFePHP\NFe\Tools;
use NFePHP\Common\Certificate;
use NFePHP\NFe\Common\Standardize;
use stdClass;

class NFeServiceCreateXML{
    private $config;

    public function __construct($config){
        $this->config = json_encode($config);
    }

    public function CreateNFe($data){
        $nfe = new Make();

        $nfe->taginfNFe($this->CreateInfNFe($data["inf"]));
        $nfe->tagide($this->CreateIdNFe($data["id"]));
        $nfe->tagemit($this->CreateEmiNFe($data["emi"]));
        $nfe->tagenderEmit($this->CreateEndEmiNFe($data["emi"]));
        $nfe->tagdest($this->CreateDesNFe($data["des"]));
        $nfe->tagenderDest($this->CreateEndDesNFe($data["des"]));
        $nfe->tagprod($this->CreateListProdNFe($data["prod"]));
        $nfe->taginfAdProd($this->CreateAddtionalProdInfoNFe($data["prod"]));
        $nfe->tagimposto($this->CreateImpNFe($data["prod"]));
        $nfe->tagICMS($this->CreateICMSNFe($data["prod"]));
        $nfe->tagPIS($this->CreatePISNFe($data["prod"]));
        $nfe->tagCOFINS($this->CreateCOFINSNFe($data["prod"]));
        $nfe->tagICMSTot($this->CalculeICMSTotNFe());
        $nfe->tagtransp($this->CreateTranspNFe());
        $nfe->tagvol($this->CreateVolNFe());
        $nfe->tagpag($this->CreatePagNFe());
        $nfe->tagdetPag($this->CreateDetailPagNFe());
        $nfe->taginfAdic($this->CreateAddtionalInfoNFe());

        try {
            $nfe->monta();
            return $nfe->getXML();
        } catch  (\Exception $e) {
            echo "<pre>";
           print_r($nfe->getErrors());
            echo "</pre>";
        }
    } 
    
    private function CreateInfNFe(){
        $std = new stdClass();

        $std->versao = '4.00';
        $std->Id = "";
        $std->pk_nItem = null;

        return $std;
    }

    private function CreateIdNFe($id){
        $std = new stdClass();

        $std->cUF = $id["cUF"];
        $std->cNF = rand(11111111, 99999999);
        $std->natOp = $id["natOP"];

        $std->mod = $id["mod"];;
        $std->serie = $id["serie"];;
        $std->nNF = $id["nNF"];
        $std->dhEmi = $id["dhEmi"];
        $std->dhSaiEnt = $id["dhSaiEnt"];
        $std->tpNF = $id["tpNF"];
        $std->idDest = $id["idDest"];
        $std->cMunFG = $id["cMunFG"];
        $std->tpImp = $id["tpImp"];
        $std->tpEmis = $id["tpEmis"];
        $std->cDV = $id["cDv"];
        $std->tpAmb = $id["tpAmb"];
        $std->finNFe = $id["fiNFe"];
        $std->indFinal = $id["indFinal"];
        $std->indPres = $id["indPres"];
        $std->indIntermed = $id["procIntermed"];
        $std->procEmi = $id["procEmi"];
        $std->verProc = $id["verProc"];
        $std->dhCont = $id["dhCont"];
        $std->xJust = $id["xJust"];

        return $std;
    }

    private function CreateEmiNFe($emi){
        $std = new stdClass();

        $std->xNome = $emi["xNome"];
        $std->xFant = $emi["xFant"];
        $std->IE = $emi["IE"];
        $std->IEST = $emi["IEST"];
        $std->IM = $emi["IM"];
        $std->CNAE = $emi["CNAE"];
        $std->CRT = $emi["CRT"];
        $std->CNPJ = $emi["CNPJ"];
        $std->CPF = $emi["CPF"];

        return $std;
    }

    private function CreateEndEmiNFe($endEmi){
        $std = new stdClass();

        $std->xLgr = $endEmi["xLgr"];
        $std->nro = $endEmi["nro"];
        $std->xCpl = $endEmi["xCpl"];
        $std->xBairro = $endEmi["xBairro"];
        $std->cMun = $endEmi["cMun"];
        $std->xMun = $endEmi["xMun"];
        $std->UF = $endEmi["UF"];
        $std->CEP = $endEmi["CEP"];
        $std->cPais = $endEmi["cPais"];
        $std->xPais = $endEmi["xPais"];
        $std->fone = $endEmi["fone"];

        return $std;
    }

    private function CreateDesNFe($des){
        $std = new stdClass();

        $std->xNome = $des["xNome"];
        $std->indIEDest = $des["indIEDest"];
        $std->IE = $des["IE"];
        $std->ISUF = $des["ISUF"];
        $std->IM = $des["IM"];
        $std->email = $des["email"];
        $std->CNPJ = $des["CNPJ"];
        $std->CPF = $des["CPF"];
        $std->idEstrangeiro = $des["idEstrangeiro"];

        return $std;
    }

    private function CreateEndDesNFe($endDes){
        $std = new stdClass();

        $std->xLgr = $endDes["xLgr"];
        $std->nro = $endDes["nro"];
        $std->xCpl = $endDes["xCpl"];
        $std->xBairro = $endDes["xBairro"];
        $std->cMun = $endDes["cMun"];
        $std->xMun = $endDes["xMun"];
        $std->UF = $endDes["UF"];
        $std->CEP = $endDes["CEP"];
        $std->cPais = $endDes["cPais"];
        $std->xPais = $endDes["xPais"];
        $std->fone = $endDes["fone"];

        return $std;
    }

    private function CreateListProdNFe($prods){
        $std = new stdClass();

        foreach($prods as $prod){
            $std->item = $prod["item"];
            $std->cProd = $prod["cProd"];
            $std->cEAN = $prod["cEAN"];
            $std->cBarra = $prod["cBarra"];
            $std->xProd = $prod["xProd"];
            $std->NCM = $prod["NCM"];
            $std->cBenef = $prod["cBenef"];
            $std->EXTIPI = $prod[""];
            $std->CFOP = $prod["EXTIPI"];
            $std->uCom = $prod["uCom"];
            $std->qCom = $prod["qCom"];
            $std->vUnCom = $prod["vUnCom"];
            $std->vProd = $prod["vProd"];
            $std->cEANTrib = $prod["cEANTrib"];
            $std->cBarraTrib = $prod["cBarraTrib"];
            $std->uTrib = $prod["uTrib"];
            $std->qTrib = $prod["qTrib"];
            $std->vUnTrib = $prod["vUnTrib"];
            $std->vFrete = $prod["vFrete"];
            $std->vSeg = $prod["vSeg"];
            $std->vDesc = $prod["vDesc"];
            $std->vOutro = $prod["vOutro"];
            $std->indTot = $prod["indTot"];
            $std->xPed = $prod["xPed"];
            $std->nItemPed = $prod["nItemPed"];
            $std->nFCI = $prod["nFCI"];
        }

        return $std;
    }

    private function CreateAddtionalProdInfoNFe($prods){
        $std = new stdClass();
        foreach($prods as $prod){
            $std->item = $prod["item"];
            $std->infAdProd = $prod["infAdProd"];
        }

        return $std;
    }

    private function CreateImpNFe($prods){
        $std = new stdClass();
        foreach($prods as $prod){
            $std->item = $prod["item"];
            $std->vTotTrib = $prod["vTotTrib"];
        }
        
        return $std;
    }

    private function CreateICMSNFe($prods){
        $std = new stdClass();

        foreach($prods as $prod){
            $std->item = $prod["item"];
            $std->orig = $prod["orig"];
            $std->CST = $prod["CST"];
            $std->modBC = $prod["modBC"];
            $std->vBC = $prod["vBC"];
            $std->pICMS = $prod["pICMS"];
            $std->vICMS = $prod["vICMS"];
            $std->pFCP = $prod["pFCP"];
            $std->vFCP = $prod["vFCP"];
            $std->vBCFCP = $prod["vBCFCP"];
            $std->modBCST = $prod["modBCST"];
            $std->pMVAST = $prod["pMVAST"];
            $std->pRedBCST = $prod["pRedBCST"];
            $std->vBCST = $prod["vBCST"];
            $std->pICMSST = $prod["pICMSST"];
            $std->vICMSST = $prod["vICMSST"];
            $std->vBCFCPST = $prod["vBCFCPST"];
            $std->pFCPST = $prod["pFCPST"];
            $std->vFCPST = $prod["vFCPST"];
            $std->vICMSDeson = $prod["vICMSDeson"];
            $std->motDesICMS = $prod["motDesICMS"];
            $std->pRedBC = $prod["pRedBC"];
            $std->vICMSOp = $prod["vICMSOp"];
            $std->pDif = $prod["pDif"];
            $std->vICMSDif = $prod["vICMSDif"];
            $std->vBCSTRet = $prod["vBCSTRet"];
            $std->pST = $prod["pST"];
            $std->vICMSSTRet = $prod["vICMSSTRet"];
            $std->vBCFCPSTRet = $prod["vBCFCPSTRet"];
            $std->pFCPSTRet = $prod["pFCPSTRet"];
            $std->vFCPSTRet = $prod["vFCPSTRet"];
            $std->pRedBCEfet = $prod["pRedBCEfet"];
            $std->vBCEfet = $prod["vBCEfet"];
            $std->pICMSEfet = $prod["pICMSEfet"];
            $std->vICMSEfet = $prod["vICMSEfet"];
            $std->vICMSSubstituto = $prod["vICMSSubstituto"];
            $std->vICMSSTDeson = $prod["vICMSSTDeson"];
            $std->motDesICMSST = $prod["motDesICMSST"];
            $std->pFCPDif = $prod["pFCPDif"];
            $std->vFCPDif = $prod["vFCPDif"];
            $std->vFCPEfet = $prod["vFCPEfet"];
        }

        return $std;
    }

    private function CreatePISNFe($prods){
        $std = new stdClass();

        foreach($prods as $prod){
            $std->item = $prod["item"];
            $std->CST = $prod["CST"];
            $std->vBC = $prod["vBC"];
            $std->pPIS = $prod["pPIS"];
            $std->vPIS = $prod["vPIS"];
            $std->qBCProd = $prod["qBCProd"];
            $std->vAliqProd = $prod["vAliqProd"];
        }

        return $std;
    }

    private function CreateCOFINSNFe($prods){
        $std = new stdClass();

        foreach($prods as $prod){
            $std->item = $prod["item"];
            $std->CST = $prod["CST"];
            $std->vBC = $prod["vBC"];
            $std->pCOFINS = $prod["pCOFINS"];
            $std->vCOFINS = $prod["vCOFINS"];
            $std->qBCProd = $prod["qBCProd"];
            $std->vAliqProd = $prod["vAliqProd"];
        }
        
        return $std;
    }

    private function CalculeICMSTotNFe(){
        $std = new stdClass();

        $std->vBC = 1000.00;
        $std->vICMS = 1000.00;
        $std->vICMSDeson = 1000.00;
        $std->vFCP = 1000.00;
        $std->vBCST = 1000.00;
        $std->vST = 1000.00;
        $std->vFCPST = 1000.00;
        $std->vFCPSTRet = 1000.00;
        $std->vProd = 1000.00;
        $std->vFrete = 1000.00;
        $std->vSeg = 1000.00;
        $std->vDesc = 1000.00;
        $std->vII = 1000.00;
        $std->vIPI = 1000.00;
        $std->vIPIDevol = 1000.00;
        $std->vPIS = 1000.00;
        $std->vCOFINS = 1000.00;
        $std->vOutro = 1000.00;
        $std->vNF = 1000.00;
        $std->vTotTrib = 1000.00;

        return $std;
    }

    private function CreateTranspNFe(){
        $std = new stdClass();

        $std->modFrete = 1;

        return $std;
    }

    private function CreateVolNFe(){
        $std = new stdClass();

        $std->item = 1;
        $std->qVol = 2;
        $std->esp = 'caixa';
        $std->marca = 'OLX';
        $std->nVol = '11111';
        $std->pesoL = 10.50;
        $std->pesoB = 11.00;

        return $std;
    }

    private function CreatePagNFe(){
        $std = new stdClass();
        $std->vTroco = null;

        return $std;
    }

    private function CreateDetailPagNFe(){
        $std = new stdClass();
        $std->tPag = '03';
        $std->vPag = 200.00;
        $std->CNPJ = '12345678901234';
        $std->tBand = '01';
        $std->cAut = '3333333';
        $std->tpIntegra = 1;
        $std->indPag = '0';

        return $std;
    }

    private function CreateAddtionalInfoNFe(){
        $std = new stdClass();
        $std->infAdFisco = 'informacoes para o fisco';
        $std->infCpl = 'informacoes complementares';

        return $std;
    }

    private function CheckCPForCNPJ($std, $info){
        if(strlen($info) == 11){
            $std->CPF = $info;
        }else{
            $std->CNPJ = $info;
        } 

        return $std;
    }
}

class NFeServiceRegisterXML{
    private $config;

    public function __construct($config){
        $this->config = json_encode($config);
    }

    public function RegisterNFe($urlCetificate, $passCertificate, $urlXml){
        $digitalCertificate = file_get_contents($urlCetificate);
        $xml = simplexml_load_file($urlXml);

        $decodeCertificate = $this->DecodeCertificate($digitalCertificate, $passCertificate);

        $xmlSigned = $this->SignNFe($decodeCertificate, $xml);
        $receipt = $this->SendBatchNFe($decodeCertificate, $xmlSigned);

        $protocol = $this->ConsultReceipt($decodeCertificate, $receipt);

        $xmlProtocoled = $this->GenerateProtocoledNFe($xmlSigned, $protocol);

        return $xmlProtocoled;
    }

    private function SignNFe($decodeCertificate, $xml){

        try {
            return $decodeCertificate->signNFe($xml);
        } catch (\Exception $e) {
            exit($e->getMessage());
        }
    }

    private function SendBatchNFe($decodeCertificate, $xmlSigned){

        try {
            $idLote = str_pad(100, 15, '0', STR_PAD_LEFT);
            $resp = $decodeCertificate->sefazEnviaLote([$xmlSigned], $idLote);
        
            $st = new Standardize();
            $std = $st->toStd($resp);

            if ($std->cStat != 103) {
                exit("[$std->cStat] $std->xMotivo");
            }

            return $std->infRec->nRec;
        } catch (\Exception $e) {
            exit($e->getMessage());
        }
    }

    private function GenerateProtocoledNFe($xmlSigned, $protocol){
        try {
            return Complements::toAuthorize($xmlSigned, $protocol);
        } catch (\Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    private function DecodeCertificate($digitalCertificate, $passCertificate){
        return new Tools($this->config, Certificate::readPfx($digitalCertificate, $passCertificate));
    }

    private function ConsultReceipt($decodeCertificate, $receipt){
        try {
            return $decodeCertificate->sefazConsultaRecibo($receipt);
        } catch (\Exception $e) {
            exit($e->getMessage());
        }
    }
}