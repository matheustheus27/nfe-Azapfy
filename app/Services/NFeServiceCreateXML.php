<?php

namespace App\Services;

use NFePHP\NFe\Make;
use stdClass;
use Exception;

class NFeServiceCreateXML{
    private $config;

    public function __construct($config){
        $this->config = json_encode($config);
    }

    public function CreateNFe($data){
        $nfe = new Make();

        array_key_exists("inf", $data) ? $nfe->taginfNFe($this->CreateInfNFe($data->inf)) : "";
        array_key_exists("id", $data) ? $nfe->tagide($this->CreateIdNFe($data->id)) : "";

        array_key_exists("ref", $data) ? $nfe->tagrefNFe($this->CreateRefNFe($data->ref)) : "";
        array_key_exists("refNF", $data) ? $nfe->tagrefNF($this->CreateRefNF($data->refNF)) : "";
        array_key_exists("refNFP", $data) ? $nfe->tagrefNFP($this->CreateRefNFRP($data->refNFRP)) : "";
        array_key_exists("refCTe", $data) ? $nfe->tagrefCTe($$this->CreateRefCEe($data->refCTe)) : "";

        array_key_exists("emi", $data) ? $nfe->tagemit($this->CreateEmiNFe($data->emi)) : "";
        array_key_exists("emi", $data) ? $nfe->tagenderEmit($this->CreateEndEmiNFe($data->emi)) : "";

        array_key_exists("des", $data) ? $nfe->tagdest($this->CreateDesNFe($data->des)) : "";
        array_key_exists("des", $data) ? $nfe->tagenderDest($this->CreateEndDesNFe($data->des)) : "";

        array_key_exists("prod", $data) ? $nfe->tagprod($this->CreateListProdNFe($data->prod)) : "";
        array_key_exists("prod", $data) ? $nfe->taginfAdProd($this->CreateAddtionalProdInfoNFe($data->prod)) : "";

        array_key_exists("imposto", $data) ? $nfe->tagimposto($this->CreateImpNFe($data->imposto)) : "";
        array_key_exists("ICMS", $data) ? $nfe->tagICMS($this->CreateICMSNFe($data->ICMS)) : "";
        array_key_exists("PIS", $data) ? $nfe->tagPIS($this->CreatePISNFe($data->PIS)) : "";
        array_key_exists("COFINS", $data) ? $nfe->tagCOFINS($this->CreateCOFINSNFe($data->COFINS)) : "";
        array_key_exists("ICMSTot", $data) ? $nfe->tagICMSTot($this->CalculeICMSTotNFe($data->ICMSTot)) : "";

        array_key_exists("transp", $data) ? $nfe->tagtransp($this->CreateTranspNFe($data->transp)) : "";
        array_key_exists("transport", $data) ? $nfe->tagtransporta($this->CreateTransportNFe($data->transport)) : "";
        array_key_exists("vol", $data) ? $nfe->tagvol($this->CreateVolNFe($data->vol)) : "";

        array_key_exists("pag", $data) ? $nfe->tagpag($this->CreatePagNFe($data->pag)) : "";
        array_key_exists("detPag", $data) ? $nfe->tagdetPag($this->CreateDetailPagNFe($data->detPag)) : "";

        array_key_exists("infAdic", $data) ? $nfe->taginfAdic($this->CreateAddtionalInfoNFe($data->infAdic)) : "";
        //array_key_exists() ? : ;

        try {
            $nfe->monta();
            return $nfe->getXML();
        } catch  (Exception $e) {
            dd($e->getMessage());
        }
    } 
    
    private function CreateInfNFe($inf){
        $std = new stdClass();

        $std->versao = array_key_exists("versao", $inf) ? $inf->versao : "";
        $std->Id = array_key_exists("Id", $inf) ? $inf->Id : "";
        $std->pk_nItem = array_key_exists("pk_nItem", $inf) ? $inf->pk_nItem : "";

        return $std;
    }

    private function CreateIdNFe($id){
        $std = new stdClass();

        $std->cUF = array_key_exists("cUF", $id) ? $id->cUF : "";
        $std->cNF = array_key_exists("cNF", $id) ? $id->cNF : rand(11111111, 99999999);
        $std->natOp = array_key_exists("natOp", $id) ? $id->natOp : "";

        $std->mod = array_key_exists("mod", $id) ? $id->mod : "";
        $std->serie = array_key_exists("serie", $id) ? $id->serie : "";
        $std->nNF = array_key_exists("nNF", $id) ? $id->nNF : "";
        $std->dhEmi = array_key_exists("dhEmi", $id) ? $id->dhEmi : "";
        $std->dhSaiEnt = array_key_exists("dhSaiEnt", $id) ? $id->dhSaiEnt : "";
        $std->tpNF = array_key_exists("tpNF", $id) ? $id->tpNF : "";
        $std->idDest = array_key_exists("idDest", $id) ? $id->idDest : "";
        $std->cMunFG = array_key_exists("cMunFG", $id) ? $id->cMunFG : "";
        $std->tpImp = array_key_exists("tpImp", $id) ? $id->tpImp : "";
        $std->tpEmis = array_key_exists("tpEmis", $id) ? $id->tpEmis : "";
        $std->cDV = array_key_exists("cDV", $id) ? $id->cDV : "";
        $std->tpAmb = array_key_exists("tpAmb", $id) ? $id->tpAmb : "";
        $std->finNFe = array_key_exists("finNFe", $id) ? $id->finNFe : "";
        $std->indFinal = array_key_exists("indFinal", $id) ? $id->indFinal : "";
        $std->indPres = array_key_exists("indPres", $id) ? $id->indPres : "";
        $std->indIntermed = array_key_exists("indIntermed", $id) ? $id->indIntermed : "";
        $std->procEmi = array_key_exists("procEmi", $id) ? $id->procEmi : "";
        $std->verProc = array_key_exists("verProc", $id) ? $id->verProc : "";
        $std->dhCont = array_key_exists("dhCont", $id) ? $id->dhCont : "";
        $std->xJust = array_key_exists("xJust", $id) ? $id->xJust : "";

        return $std;
    }

    private function CreateRefNFe($ref){
        $std = new stdClass();

        $std->refNFe = array_key_exists("cUF", $ref) ? $ref->refNFe : "";
        
        return $std;
    }

    private function CreateRefNF($refNF){
        $std = new stdClass();

        $std->cUF =  array_key_exists("cUF", $refNF) ? $refNF->cUF : "";
        $std->AAMM =  array_key_exists("AAMM", $refNF) ? $refNF->AAMM : "";
        $std->CNPJ =  array_key_exists("CNPJ", $refNF) ? $refNF->CNPJ : "";
        $std->mod =  array_key_exists("mod", $refNF) ? $refNF->mod : "";
        $std->serie =  array_key_exists("serie", $refNF) ? $refNF->serie : "";
        $std->nNF =  array_key_exists("nNF", $refNF) ? $refNF->nNF : "";

        return $std;
    }

    private function CreateRefNFRP($refNFP){
        $std = new stdClass();

        $std->cUF =  array_key_exists("cUF", $refNFP) ? $refNFP->cUF : "";
        $std->AAMM =  array_key_exists("AAMM", $refNFP) ? $refNFP->AAMM : "";
        $std->CNPJ =  array_key_exists("CNPJ", $refNFP) ? $refNFP->CNPJ : "";
        $std->CPF = array_key_exists("CPF", $refNFP) ? $refNFP->CPF : "";;
        $std->IE = array_key_exists("IE", $refNFP) ? $refNFP->IE : "";
        $std->mod =  array_key_exists("mod", $refNFP) ? $refNFP->mod : "";
        $std->serie =  array_key_exists("serie", $refNFP) ? $refNFP->serie : "";
        $std->nNF =  array_key_exists("nNF", $refNFP) ? $refNFP->nNF : "";

        return $std;
    }

    private function CreaterefCTe($refCT){
        $std = new stdClass();

        $std->refCTe = array_key_exists("nNF", $refCT) ? $refCT->nNF : "";
    }

    private function CreateEmiNFe($emi){
        $std = new stdClass();

        $std->xNome = array_key_exists("xNome", $emi) ? $emi->xNome : "";
        $std->xFant = array_key_exists("xFant", $emi) ? $emi->xFant : "";
        $std->IE = array_key_exists("IE", $emi) ? $emi->IE : "";
        $std->IEST = array_key_exists("IEST", $emi) ? $emi->IEST : "";
        $std->IM = array_key_exists("IM", $emi) ? $emi->IM : "";
        $std->CNAE = array_key_exists("CNAE", $emi) ? $emi->CNAE : "";
        $std->CRT = array_key_exists("CRT", $emi) ? $emi->CRT : "";
        $std->CNPJ = array_key_exists("CNPJ", $emi) ? $emi->CNPJ : "";
        $std->CPF = array_key_exists("CPF", $emi) ? $emi->CPF : "";

        return $std;
    }

    private function CreateEndEmiNFe($endEmi){
        $std = new stdClass();

        $std->xLgr = array_key_exists("xLgr", $endEmi) ? $endEmi->xLgr : "";
        $std->nro = array_key_exists("nro", $endEmi) ? $endEmi->nro : "";
        $std->xCpl = array_key_exists("xCpl", $endEmi) ? $endEmi->xCpl : "";
        $std->xBairro = array_key_exists("xBairro", $endEmi) ? $endEmi->xBairro : "";
        $std->cMun = array_key_exists("cMun", $endEmi) ? $endEmi->cMun : "";
        $std->xMun = array_key_exists("xMun", $endEmi) ? $endEmi->xMun : "";
        $std->UF = array_key_exists("UF", $endEmi) ? $endEmi->UF : "";
        $std->CEP = array_key_exists("CEP", $endEmi) ? $endEmi->CEP : "";
        $std->cPais = array_key_exists("cPais", $endEmi) ? $endEmi->cPais : "";
        $std->xPais = array_key_exists("xPais", $endEmi) ? $endEmi->xPais : "";
        $std->fone = array_key_exists("fone", $endEmi) ? $endEmi->fone : "";

        return $std;
    }

    private function CreateDesNFe($des){
        $std = new stdClass();

        $std->xNome = array_key_exists("xNome", $des) ? $des->xNome : "";
        $std->indIEDest = array_key_exists("indIEDest", $des) ? $des->indIEDest : "";
        $std->IE = array_key_exists("IE", $des) ? $des->IE : "";
        $std->ISUF = array_key_exists("ISUF", $des) ? $des->ISUF : "";
        $std->IM = array_key_exists("IM", $des) ? $des->IM : "";
        $std->email = array_key_exists("email", $des) ? $des->email : "";
        $std->CNPJ = array_key_exists("CNPJ", $des) ? $des->CNPJ : "";
        $std->CPF = array_key_exists("CPF", $des) ? $des->CPF : "";
        $std->idEstrangeiro = array_key_exists("idEstrangeiro", $des) ? $des->idEstrangeiro : "";

        return $std;
    }

    private function CreateEndDesNFe($endDes){
        $std = new stdClass();

        $std->xLgr = array_key_exists("xLgr", $endDes) ? $endDes->xLgr : "";
        $std->nro = array_key_exists("nro", $endDes) ? $endDes->nro : "";
        $std->xCpl = array_key_exists("xCpl", $endDes) ? $endDes->xCpl : "";
        $std->xBairro = array_key_exists("xBairro", $endDes) ? $endDes->xBairro : "";
        $std->cMun = array_key_exists("cMun", $endDes) ? $endDes->cMun : "";
        $std->xMun = array_key_exists("xMun", $endDes) ? $endDes->xMun : "";
        $std->UF = array_key_exists("UF", $endDes) ? $endDes->UF : "";
        $std->CEP = array_key_exists("CEP", $endDes) ? $endDes->CEP : "";
        $std->cPais = array_key_exists("cPais", $endDes) ? $endDes->cPais : "";
        $std->xPais = array_key_exists("xPais", $endDes) ? $endDes->xPais : "";
        $std->fone = array_key_exists("fone", $endDes) ? $endDes->fone : "";

        return $std;
    }

    private function CreateListProdNFe($prods){
        $std = new stdClass();

        foreach($prods as $prod){
            $std->item = array_key_exists("item", $prod) ? $prod->item : "";
            $std->cProd = array_key_exists("cProd", $prod) ? $prod->cProd : "";
            $std->cEAN = array_key_exists("cEAN", $prod) ? $prod->cEAN : "";
            $std->cBarra = array_key_exists("cBarra", $prod) ? $prod->cBarra : "";
            $std->xProd = array_key_exists("item", $prod) ? $prod->item : "";
            $std->NCM = array_key_exists("NCM", $prod) ? $prod->NCM : "";
            $std->cBenef = array_key_exists("cBenef", $prod) ? $prod->cBenef : "";
            $std->EXTIPI = array_key_exists("EXTIPI", $prod) ? $prod->EXTIPI : "";
            $std->CFOP = array_key_exists("CFOP", $prod) ? $prod->CFOP : "";
            $std->uCom = array_key_exists("uCom", $prod) ? $prod->uCom : "";
            $std->qCom = array_key_exists("qCom", $prod) ? $prod->qCom : "";
            $std->vUnCom = array_key_exists("vUnCom", $prod) ? $prod->vUnCom : "";
            $std->vProd = array_key_exists("vProd", $prod) ? $prod->vProd : "";
            $std->cEANTrib = array_key_exists("cEANTrib", $prod) ? $prod->cEANTrib : "";
            $std->cBarraTrib = array_key_exists("cBarraTrib", $prod) ? $prod->cBarraTrib : "";
            $std->uTrib = array_key_exists("uTrib", $prod) ? $prod->uTrib : "";
            $std->qTrib = array_key_exists("qTrib", $prod) ? $prod->qTrib : "";
            $std->vUnTrib = array_key_exists("vUnTrib", $prod) ? $prod->vUnTrib : "";
            $std->vFrete = array_key_exists("vFrete", $prod) ? $prod->vFrete : "";
            $std->vSeg = array_key_exists("vSeg", $prod) ? $prod->vSeg : "";
            $std->vDesc = array_key_exists("vDesc", $prod) ? $prod->vDesc : "";
            $std->vOutro = array_key_exists("vOutro", $prod) ? $prod->vOutro : "";
            $std->indTot = array_key_exists("indTot", $prod) ? $prod->indTot : "";
            $std->xPed = array_key_exists("xPed", $prod) ? $prod->xPed : "";
            $std->nItemPed = array_key_exists("nItemPed", $prod) ? $prod->nItemPed : "";
            $std->nFCI = array_key_exists("nFCI", $prod) ? $prod->nFCI : "";
        }

        return $std;
    }

    private function CreateAddtionalProdInfoNFe($prods){
        $std = new stdClass();

        foreach($prods as $prod){
            $std->item = array_key_exists("item", $prod) ? $prod->item : "";
            $std->infAdProd = array_key_exists("infAdProd", $prod) ? $prod->infAdProd : "";
        }

        return $std;
    }

    private function CreateImpNFe($impostos){
        $std = new stdClass();
        foreach($impostos as $imposto){
            $std->item =  array_key_exists("item", $imposto) ? $imposto->item : "";
            $std->vTotTrib = array_key_exists("vTotTrib", $imposto) ? $imposto->vTotTrib : "";
        }
        
        return $std;
    }

    private function CreateICMSNFe($icms){
        $std = new stdClass();

        foreach($icms as $icmsItem){
            $std->item = array_key_exists("item", $icmsItem) ? $icmsItem->item : "";
            $std->orig = array_key_exists("orig", $icmsItem) ? $icmsItem->orig : "";
            $std->CST = array_key_exists("CST", $icmsItem) ? $icmsItem->CST : "";
            $std->modBC = array_key_exists("modBC", $icmsItem) ? $icmsItem->modBC : "";
            $std->vBC = array_key_exists("vBC", $icmsItem) ? $icmsItem->vBC : "";
            $std->pICMS = array_key_exists("pICMS", $icmsItem) ? $icmsItem->pICMS : "";
            $std->vICMS = array_key_exists("vICMS", $icmsItem) ? $icmsItem->vICMS : "";
            $std->pFCP = array_key_exists("pFCP", $icmsItem) ? $icmsItem->pFCP : "";
            $std->vFCP = array_key_exists("vFCP", $icmsItem) ? $icmsItem->vFCP : "";
            $std->vBCFCP = array_key_exists("vBCFCP", $icmsItem) ? $icmsItem->vBCFCP : "";
            $std->modBCST = array_key_exists("modBCST", $icmsItem) ? $icmsItem->modBCST : "";
            $std->pMVAST = array_key_exists("pMVAST", $icmsItem) ? $icmsItem->pMVAST : "";
            $std->pRedBCST = array_key_exists("pRedBCST", $icmsItem) ? $icmsItem->pRedBCST : "";
            $std->vBCST = array_key_exists("vBCST", $icmsItem) ? $icmsItem->vBCST : "";
            $std->pICMSST = array_key_exists("pICMSST", $icmsItem) ? $icmsItem->pICMSST : "";
            $std->vICMSST = array_key_exists("vICMSST", $icmsItem) ? $icmsItem->vICMSST : "";
            $std->vBCFCPST = array_key_exists("vBCFCPST", $icmsItem) ? $icmsItem->vBCFCPST : "";
            $std->pFCPST = array_key_exists("pFCPST", $icmsItem) ? $icmsItem->pFCPST : "";
            $std->vFCPST = array_key_exists("vFCPST", $icmsItem) ? $icmsItem->vFCPST : "";
            $std->vICMSDeson = array_key_exists("vICMSDeson", $icmsItem) ? $icmsItem->vICMSDeson : "";
            $std->motDesICMS = array_key_exists("motDesICMS", $icmsItem) ? $icmsItem->motDesICMS : "";
            $std->pRedBC = array_key_exists("pRedBC", $icmsItem) ? $icmsItem->pRedBC : "";
            $std->vICMSOp = array_key_exists("vICMSOp", $icmsItem) ? $icmsItem->vICMSOp : "";
            $std->pDif = array_key_exists("pDif", $icmsItem) ? $icmsItem->pDif : "";
            $std->vICMSDif = array_key_exists("vICMSDif", $icmsItem) ? $icmsItem->vICMSDif : "";
            $std->vBCSTRet = array_key_exists("vBCSTRet", $icmsItem) ? $icmsItem->vBCSTRet : "";
            $std->pST = array_key_exists("pST", $icmsItem) ? $icmsItem->pST : "";
            $std->vICMSSTRet = array_key_exists("vICMSSTRet", $icmsItem) ? $icmsItem->vICMSSTRet : "";
            $std->vBCFCPSTRet = array_key_exists("vBCFCPSTRet", $icmsItem) ? $icmsItem->vBCFCPSTRet : "";
            $std->pFCPSTRet = array_key_exists("pFCPSTRet", $icmsItem) ? $icmsItem->pFCPSTRet : "";
            $std->vFCPSTRet = array_key_exists("vFCPSTRet", $icmsItem) ? $icmsItem->vFCPSTRet : "";
            $std->pRedBCEfet = array_key_exists("pRedBCEfet", $icmsItem) ? $icmsItem->pRedBCEfet : "";
            $std->vBCEfet = array_key_exists("vBCEfet", $icmsItem) ? $icmsItem->vBCEfet : "";
            $std->pICMSEfet = array_key_exists("pICMSEfet", $icmsItem) ? $icmsItem->pICMSEfet : "";
            $std->vICMSEfet = array_key_exists("vICMSEfet", $icmsItem) ? $icmsItem->vICMSEfet : "";
            $std->vICMSSubstituto = array_key_exists("vICMSSubstituto", $icmsItem) ? $icmsItem->vICMSSubstituto : "";
            $std->vICMSSTDeson = array_key_exists("vICMSSTDeson", $icmsItem) ? $icmsItem->vICMSSTDeson : "";
            $std->motDesICMSST = array_key_exists("motDesICMSST", $icmsItem) ? $icmsItem->motDesICMSST : "";
            $std->pFCPDif = array_key_exists("pFCPDif", $icmsItem) ? $icmsItem->pFCPDif : "";
            $std->vFCPDif = array_key_exists("vFCPDif", $icmsItem) ? $icmsItem->vFCPDif : "";
            $std->vFCPEfet = array_key_exists("vFCPEfet", $icmsItem) ? $icmsItem->vFCPEfet : "";
        }

        return $std;
    }

    private function CreatePISNFe($pis){
        $std = new stdClass();

        foreach($pis as $pisItem){
            $std->item = array_key_exists("item", $pisItem) ? $pisItem->item : "";
            $std->CST = array_key_exists("CST", $pisItem) ? $pisItem->CST : "";
            $std->vBC = array_key_exists("vBC", $pisItem) ? $pisItem->vBC : "";
            $std->pPIS = array_key_exists("pPIS", $pisItem) ? $pisItem->pPIS : "";
            $std->vPIS = array_key_exists("vPIS", $pisItem) ? $pisItem->vPIS : "";
            $std->qBCProd = array_key_exists("qBCProd", $pisItem) ? $pisItem->qBCProd : "";
            $std->vAliqProd = array_key_exists("vAliqProd", $pisItem) ? $pisItem->vAliqProd : "";
        }

        return $std;
    }

    private function CreateCOFINSNFe($cofins){
        $std = new stdClass();

        foreach($cofins as $cofinsItem){
            $std->item = array_key_exists("item", $cofinsItem) ? $cofinsItem->item : "";
            $std->CST = array_key_exists("CST", $cofinsItem) ? $cofinsItem->CST : "";
            $std->vBC = array_key_exists("vBC", $cofinsItem) ? $cofinsItem->vBC : "";
            $std->pCOFINS = array_key_exists("pCOFINS", $cofinsItem) ? $cofinsItem->pCOFINS : "";
            $std->vCOFINS = array_key_exists("vCOFINS", $cofinsItem) ? $cofinsItem->vCOFINS : "";
            $std->qBCProd = array_key_exists("qBCProd", $cofinsItem) ? $cofinsItem->qBCProd : "";
            $std->vAliqProd = array_key_exists("vAliqProd", $cofinsItem) ? $cofinsItem->vAliqProd : "";
        }
        
        return $std;
    }

    private function CalculeICMSTotNFe($icmsTot){
        $std = new stdClass();

        $std->vBC = array_key_exists("vBC", $icmsTot) ? $icmsTot->vBC : "";
        $std->vICMS = array_key_exists("vICMS", $icmsTot) ? $icmsTot->vICMS : "";
        $std->vICMSDeson = array_key_exists("vICMSDeson", $icmsTot) ? $icmsTot->vICMSDeson : "";
        $std->vFCP = array_key_exists("vFCP", $icmsTot) ? $icmsTot->vFCP : "";
        $std->vBCST = array_key_exists("vBCST", $icmsTot) ? $icmsTot->vBCST : "";
        $std->vST = array_key_exists("vST", $icmsTot) ? $icmsTot->vST : "";
        $std->vFCPST = array_key_exists("vFCPST", $icmsTot) ? $icmsTot->vFCPST : "";
        $std->vFCPSTRet = array_key_exists("vFCPSTRet", $icmsTot) ? $icmsTot->vFCPSTRet : "";
        $std->vProd = array_key_exists("vProd", $icmsTot) ? $icmsTot->vProd : "";
        $std->vFrete = array_key_exists("vFrete", $icmsTot) ? $icmsTot->vFrete : "";
        $std->vSeg = array_key_exists("vSeg", $icmsTot) ? $icmsTot->vSeg : "";
        $std->vDesc = array_key_exists("vDesc", $icmsTot) ? $icmsTot->vDesc : "";
        $std->vII = array_key_exists("vII", $icmsTot) ? $icmsTot->vII : "";
        $std->vIPI = array_key_exists("vIPI", $icmsTot) ? $icmsTot->vIPI : "";
        $std->vIPIDevol = array_key_exists("vIPIDevol", $icmsTot) ? $icmsTot->vIPIDevol : "";
        $std->vPIS = array_key_exists("vPIS", $icmsTot) ? $icmsTot->vPIS : "";
        $std->vCOFINS = array_key_exists("vCOFINS", $icmsTot) ? $icmsTot->vCOFINS : "";
        $std->vOutro = array_key_exists("vOutro", $icmsTot) ? $icmsTot->vOutro : "";
        $std->vNF = array_key_exists("vNF", $icmsTot) ? $icmsTot->vNF : "";
        $std->vTotTrib = array_key_exists("vTotTrib", $icmsTot) ? $icmsTot->vTotTrib : "";

        return $std;
    }

    private function CreateTranspNFe($transp){
        $std = new stdClass();

        $std->modFrete = array_key_exists("modFrete", $transp) ? $transp->modFrete : "";

        return $std;
    }

    private function CreateTransportNFe($transport){
        $std = new stdClass();

        $std->xNome = array_key_exists("xNome", $transport) ? $transport->xNome : "";
        $std->IE = array_key_exists("IE", $transport) ? $transport->IE : "";
        $std->xEnder = array_key_exists("xEnder", $transport) ? $transport->xEnder : "";
        $std->xMun = array_key_exists("xMun", $transport) ? $transport->xMun : "";
        $std->UF = array_key_exists("UF", $transport) ? $transport->UF : "";
        $std->CNPJ = array_key_exists("CNPJ", $transport) ? $transport->CNPJ : "";
        $std->CPF = array_key_exists("CPF", $transport) ? $transport->CPF : "";

        return $std;
    }

    private function CreateVolNFe($vol){
        $std = new stdClass();

        $std->item = array_key_exists("item", $vol) ? $vol->item : "";
        $std->qVol = array_key_exists("qVol", $vol) ? $vol->qVol : "";
        $std->esp = array_key_exists("esp", $vol) ? $vol->esp : "";
        $std->marca = array_key_exists("marca", $vol) ? $vol->marca : "";
        $std->nVol = array_key_exists("nVol", $vol) ? $vol->nVol : "";
        $std->pesoL = array_key_exists("pesoL", $vol) ? $vol->pesoL : "";
        $std->pesoB = array_key_exists("pesoB", $vol) ? $vol->pesoB : "";

        return $std;
    }

    private function CreatePagNFe($pag){
        $std = new stdClass();

        $std->vTroco = array_key_exists("vTroco", $pag) ? $pag->vTroco : "";

        return $std;
    }

    private function CreateDetailPagNFe($detPag){
        $std = new stdClass();

        $std->tPag = array_key_exists("tPag", $detPag) ? $detPag->tPag : "";
        $std->vPag = array_key_exists("vPag", $detPag) ? $detPag->vPag : "";
        $std->CNPJ = array_key_exists("CNPJ", $detPag) ? $detPag->CNPJ : "";
        $std->tBand = array_key_exists("tBand", $detPag) ? $detPag->tBand : "";
        $std->cAut = array_key_exists("cAut", $detPag) ? $detPag->cAut : "";
        $std->tpIntegra = array_key_exists("tpIntegra", $detPag) ? $detPag->tpIntegra : "";
        $std->indPag = array_key_exists("indPag", $detPag) ? $detPag->indPag : "";

        return $std;
    }

    private function CreateAddtionalInfoNFe($infAdic){
        $std = new stdClass();

        $std->infAdFisco = array_key_exists("infAdFisco", $infAdic) ? $infAdic->infAdFisco : "";
        $std->infCpl = array_key_exists("infAdFisco", $infAdic) ? $infAdic->infCpl : "";
        return $std;
    }
}