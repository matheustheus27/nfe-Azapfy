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

        $this->CheckAttribute("inf", $data) ? $nfe->taginfNFe($this->CreateInfNFe($data->inf)) : "";
        $this->CheckAttribute("id", $data) ? $nfe->tagide($this->CreateIdNFe($data->id)) : "";

        $this->CheckAttribute("ref", $data) ? $nfe->tagrefNFe($this->CreateRefNFe($data->ref)) : "";
        $this->CheckAttribute("refNF", $data) ? $nfe->tagrefNF($this->CreateRefNF($data->refNF)) : "";
        $this->CheckAttribute("refNFP", $data) ? $nfe->tagrefNFP($this->CreateRefNFRP($data->refNFRP)) : "";
        $this->CheckAttribute("refCTe", $data) ? $nfe->tagrefCTe($$this->CreateRefCEe($data->refCTe)) : "";

        $this->CheckAttribute("emi", $data) ? $nfe->tagemit($this->CreateEmiNFe($data->emi)) : "";
        $this->CheckAttribute("emi", $data) ? $nfe->tagenderEmit($this->CreateEndEmiNFe($data->emi)) : "";

        $this->CheckAttribute("des", $data) ? $nfe->tagdest($this->CreateDesNFe($data->des)) : "";
        $this->CheckAttribute("des", $data) ? $nfe->tagenderDest($this->CreateEndDesNFe($data->des)) : "";

        $this->CheckAttribute("prod", $data) ? $nfe->tagprod($this->CreateListProdNFe($data->prod)) : "";
        $this->CheckAttribute("prod", $data) ? $nfe->taginfAdProd($this->CreateAddtionalProdInfoNFe($data->prod)) : "";

        $this->CheckAttribute("imposto", $data) ? $nfe->tagimposto($this->CreateImpNFe($data->imposto)) : "";
        $this->CheckAttribute("ICMS", $data) ? $nfe->tagICMS($this->CreateICMSNFe($data->ICMS)) : "";
        $this->CheckAttribute("PIS", $data) ? $nfe->tagPIS($this->CreatePISNFe($data->PIS)) : "";
        $this->CheckAttribute("COFINS", $data) ? $nfe->tagCOFINS($this->CreateCOFINSNFe($data->COFINS)) : "";
        $this->CheckAttribute("ICMSTot", $data) ? $nfe->tagICMSTot($this->CalculeICMSTotNFe($data->ICMSTot)) : "";

        $this->CheckAttribute("transp", $data) ? $nfe->tagtransp($this->CreateTranspNFe($data->transp)) : "";
        $this->CheckAttribute("transport", $data) ? $nfe->tagtransporta($this->CreateTransportNFe($data->transport)) : "";
        $this->CheckAttribute("vol", $data) ? $nfe->tagvol($this->CreateVolNFe($data->vol)) : "";

        $this->CheckAttribute("pag", $data) ? $nfe->tagpag($this->CreatePagNFe($data->pag)) : "";
        $this->CheckAttribute("detPag", $data) ? $nfe->tagdetPag($this->CreateDetailPagNFe($data->detPag)) : "";

        $this->CheckAttribute("infAdic", $data) ? $nfe->taginfAdic($this->CreateAddtionalInfoNFe($data->infAdic)) : "";
        //$this->CheckAttribute() ? : ;

        try {
            $nfe->monta();
            return $nfe->getXML();
        } catch  (Exception $e) {
            dd($e->getMessage());
        }
    } 
    
    private function CreateInfNFe($inf){
        $std = new stdClass();

        $std->versao = $this->CheckAttribute("versao", $inf) ? $inf->versao : "";
        $std->Id = $this->CheckAttribute("Id", $inf) ? $inf->Id : "";
        $std->pk_nItem = $this->CheckAttribute("pk_nItem", $inf) ? $inf->pk_nItem : "";

        return $std;
    }

    private function CreateIdNFe($id){
        $std = new stdClass();

        $std->cUF = $this->CheckAttribute("cUF", $id) ? $id->cUF : "";
        $std->cNF = $this->CheckAttribute("cNF", $id) ? $id->cNF : rand(11111111, 99999999);
        $std->natOp = $this->CheckAttribute("natOp", $id) ? $id->natOp : "";

        $std->mod = $this->CheckAttribute("mod", $id) ? $id->mod : "";
        $std->serie = $this->CheckAttribute("serie", $id) ? $id->serie : "";
        $std->nNF = $this->CheckAttribute("nNF", $id) ? $id->nNF : "";
        $std->dhEmi = $this->CheckAttribute("dhEmi", $id) ? $id->dhEmi : "";
        $std->dhSaiEnt = $this->CheckAttribute("dhSaiEnt", $id) ? $id->dhSaiEnt : "";
        $std->tpNF = $this->CheckAttribute("tpNF", $id) ? $id->tpNF : "";
        $std->idDest = $this->CheckAttribute("idDest", $id) ? $id->idDest : "";
        $std->cMunFG = $this->CheckAttribute("cMunFG", $id) ? $id->cMunFG : "";
        $std->tpImp = $this->CheckAttribute("tpImp", $id) ? $id->tpImp : "";
        $std->tpEmis = $this->CheckAttribute("tpEmis", $id) ? $id->tpEmis : "";
        $std->cDV = $this->CheckAttribute("cDV", $id) ? $id->cDV : "";
        $std->tpAmb = $this->CheckAttribute("tpAmb", $id) ? $id->tpAmb : "";
        $std->finNFe = $this->CheckAttribute("finNFe", $id) ? $id->finNFe : "";
        $std->indFinal = $this->CheckAttribute("indFinal", $id) ? $id->indFinal : "";
        $std->indPres = $this->CheckAttribute("indPres", $id) ? $id->indPres : "";
        $std->indIntermed = $this->CheckAttribute("indIntermed", $id) ? $id->indIntermed : "";
        $std->procEmi = $this->CheckAttribute("procEmi", $id) ? $id->procEmi : "";
        $std->verProc = $this->CheckAttribute("verProc", $id) ? $id->verProc : "";
        $std->dhCont = $this->CheckAttribute("dhCont", $id) ? $id->dhCont : "";
        $std->xJust = $this->CheckAttribute("xJust", $id) ? $id->xJust : "";

        return $std;
    }

    private function CreateRefNFe($ref){
        $std = new stdClass();

        $std->refNFe = $this->CheckAttribute("cUF", $ref) ? $ref->refNFe : "";
        
        return $std;
    }

    private function CreateRefNF($refNF){
        $std = new stdClass();

        $std->cUF =  $this->CheckAttribute("cUF", $refNF) ? $refNF->cUF : "";
        $std->AAMM =  $this->CheckAttribute("AAMM", $refNF) ? $refNF->AAMM : "";
        $std->CNPJ =  $this->CheckAttribute("CNPJ", $refNF) ? $refNF->CNPJ : "";
        $std->mod =  $this->CheckAttribute("mod", $refNF) ? $refNF->mod : "";
        $std->serie =  $this->CheckAttribute("serie", $refNF) ? $refNF->serie : "";
        $std->nNF =  $this->CheckAttribute("nNF", $refNF) ? $refNF->nNF : "";

        return $std;
    }

    private function CreateRefNFRP($refNFP){
        $std = new stdClass();

        $std->cUF =  $this->CheckAttribute("cUF", $refNFP) ? $refNFP->cUF : "";
        $std->AAMM =  $this->CheckAttribute("AAMM", $refNFP) ? $refNFP->AAMM : "";
        $std->CNPJ =  $this->CheckAttribute("CNPJ", $refNFP) ? $refNFP->CNPJ : "";
        $std->CPF = $this->CheckAttribute("CPF", $refNFP) ? $refNFP->CPF : "";;
        $std->IE = $this->CheckAttribute("IE", $refNFP) ? $refNFP->IE : "";
        $std->mod =  $this->CheckAttribute("mod", $refNFP) ? $refNFP->mod : "";
        $std->serie =  $this->CheckAttribute("serie", $refNFP) ? $refNFP->serie : "";
        $std->nNF =  $this->CheckAttribute("nNF", $refNFP) ? $refNFP->nNF : "";

        return $std;
    }

    private function CreaterefCTe($refCT){
        $std = new stdClass();

        $std->refCTe = $this->CheckAttribute("nNF", $refCT) ? $refCT->nNF : "";
    }

    private function CreateEmiNFe($emi){
        $std = new stdClass();

        $std->xNome = $this->CheckAttribute("xNome", $emi) ? $emi->xNome : "";
        $std->xFant = $this->CheckAttribute("xFant", $emi) ? $emi->xFant : "";
        $std->IE = $this->CheckAttribute("IE", $emi) ? $emi->IE : "";
        $std->IEST = $this->CheckAttribute("IEST", $emi) ? $emi->IEST : "";
        $std->IM = $this->CheckAttribute("IM", $emi) ? $emi->IM : "";
        $std->CNAE = $this->CheckAttribute("CNAE", $emi) ? $emi->CNAE : "";
        $std->CRT = $this->CheckAttribute("CRT", $emi) ? $emi->CRT : "";
        $std->CNPJ = $this->CheckAttribute("CNPJ", $emi) ? $emi->CNPJ : "";
        $std->CPF = $this->CheckAttribute("CPF", $emi) ? $emi->CPF : "";

        return $std;
    }

    private function CreateEndEmiNFe($endEmi){
        $std = new stdClass();

        $std->xLgr = $this->CheckAttribute("xLgr", $endEmi) ? $endEmi->xLgr : "";
        $std->nro = $this->CheckAttribute("nro", $endEmi) ? $endEmi->nro : "";
        $std->xCpl = $this->CheckAttribute("xCpl", $endEmi) ? $endEmi->xCpl : "";
        $std->xBairro = $this->CheckAttribute("xBairro", $endEmi) ? $endEmi->xBairro : "";
        $std->cMun = $this->CheckAttribute("cMun", $endEmi) ? $endEmi->cMun : "";
        $std->xMun = $this->CheckAttribute("xMun", $endEmi) ? $endEmi->xMun : "";
        $std->UF = $this->CheckAttribute("UF", $endEmi) ? $endEmi->UF : "";
        $std->CEP = $this->CheckAttribute("CEP", $endEmi) ? $endEmi->CEP : "";
        $std->cPais = $this->CheckAttribute("cPais", $endEmi) ? $endEmi->cPais : "";
        $std->xPais = $this->CheckAttribute("xPais", $endEmi) ? $endEmi->xPais : "";
        $std->fone = $this->CheckAttribute("fone", $endEmi) ? $endEmi->fone : "";

        return $std;
    }

    private function CreateDesNFe($des){
        $std = new stdClass();

        $std->xNome = $this->CheckAttribute("xNome", $des) ? $des->xNome : "";
        $std->indIEDest = $this->CheckAttribute("indIEDest", $des) ? $des->indIEDest : "";
        $std->IE = $this->CheckAttribute("IE", $des) ? $des->IE : "";
        $std->ISUF = $this->CheckAttribute("ISUF", $des) ? $des->ISUF : "";
        $std->IM = $this->CheckAttribute("IM", $des) ? $des->IM : "";
        $std->email = $this->CheckAttribute("email", $des) ? $des->email : "";
        $std->CNPJ = $this->CheckAttribute("CNPJ", $des) ? $des->CNPJ : "";
        $std->CPF = $this->CheckAttribute("CPF", $des) ? $des->CPF : "";
        $std->idEstrangeiro = $this->CheckAttribute("idEstrangeiro", $des) ? $des->idEstrangeiro : "";

        return $std;
    }

    private function CreateEndDesNFe($endDes){
        $std = new stdClass();

        $std->xLgr = $this->CheckAttribute("xLgr", $endDes) ? $endDes->xLgr : "";
        $std->nro = $this->CheckAttribute("nro", $endDes) ? $endDes->nro : "";
        $std->xCpl = $this->CheckAttribute("xCpl", $endDes) ? $endDes->xCpl : "";
        $std->xBairro = $this->CheckAttribute("xBairro", $endDes) ? $endDes->xBairro : "";
        $std->cMun = $this->CheckAttribute("cMun", $endDes) ? $endDes->cMun : "";
        $std->xMun = $this->CheckAttribute("xMun", $endDes) ? $endDes->xMun : "";
        $std->UF = $this->CheckAttribute("UF", $endDes) ? $endDes->UF : "";
        $std->CEP = $this->CheckAttribute("CEP", $endDes) ? $endDes->CEP : "";
        $std->cPais = $this->CheckAttribute("cPais", $endDes) ? $endDes->cPais : "";
        $std->xPais = $this->CheckAttribute("xPais", $endDes) ? $endDes->xPais : "";
        $std->fone = $this->CheckAttribute("fone", $endDes) ? $endDes->fone : "";

        return $std;
    }

    private function CreateListProdNFe($prods){
        $std = new stdClass();

        foreach($prods as $prod){
            $std->item = $this->CheckAttribute("item", $prod) ? $prod->item : "";
            $std->cProd = $this->CheckAttribute("cProd", $prod) ? $prod->cProd : "";
            $std->cEAN = $this->CheckAttribute("cEAN", $prod) ? $prod->cEAN : "";
            $std->cBarra = $this->CheckAttribute("cBarra", $prod) ? $prod->cBarra : "";
            $std->xProd = $this->CheckAttribute("item", $prod) ? $prod->item : "";
            $std->NCM = $this->CheckAttribute("NCM", $prod) ? $prod->NCM : "";
            $std->cBenef = $this->CheckAttribute("cBenef", $prod) ? $prod->cBenef : "";
            $std->EXTIPI = $this->CheckAttribute("EXTIPI", $prod) ? $prod->EXTIPI : "";
            $std->CFOP = $this->CheckAttribute("CFOP", $prod) ? $prod->CFOP : "";
            $std->uCom = $this->CheckAttribute("uCom", $prod) ? $prod->uCom : "";
            $std->qCom = $this->CheckAttribute("qCom", $prod) ? $prod->qCom : "";
            $std->vUnCom = $this->CheckAttribute("vUnCom", $prod) ? $prod->vUnCom : "";
            $std->vProd = $this->CheckAttribute("vProd", $prod) ? $prod->vProd : "";
            $std->cEANTrib = $this->CheckAttribute("cEANTrib", $prod) ? $prod->cEANTrib : "";
            $std->cBarraTrib = $this->CheckAttribute("cBarraTrib", $prod) ? $prod->cBarraTrib : "";
            $std->uTrib = $this->CheckAttribute("uTrib", $prod) ? $prod->uTrib : "";
            $std->qTrib = $this->CheckAttribute("qTrib", $prod) ? $prod->qTrib : "";
            $std->vUnTrib = $this->CheckAttribute("vUnTrib", $prod) ? $prod->vUnTrib : "";
            $std->vFrete = $this->CheckAttribute("vFrete", $prod) ? $prod->vFrete : "";
            $std->vSeg = $this->CheckAttribute("vSeg", $prod) ? $prod->vSeg : "";
            $std->vDesc = $this->CheckAttribute("vDesc", $prod) ? $prod->vDesc : "";
            $std->vOutro = $this->CheckAttribute("vOutro", $prod) ? $prod->vOutro : "";
            $std->indTot = $this->CheckAttribute("indTot", $prod) ? $prod->indTot : "";
            $std->xPed = $this->CheckAttribute("xPed", $prod) ? $prod->xPed : "";
            $std->nItemPed = $this->CheckAttribute("nItemPed", $prod) ? $prod->nItemPed : "";
            $std->nFCI = $this->CheckAttribute("nFCI", $prod) ? $prod->nFCI : "";
        }

        return $std;
    }

    private function CreateAddtionalProdInfoNFe($prods){
        $std = new stdClass();

        foreach($prods as $prod){
            $std->item = $this->CheckAttribute("item", $prod) ? $prod->item : "";
            $std->infAdProd = $this->CheckAttribute("infAdProd", $prod) ? $prod->infAdProd : "";
        }

        return $std;
    }

    private function CreateImpNFe($impostos){
        $std = new stdClass();
        foreach($impostos as $imposto){
            $std->item =  $this->CheckAttribute("item", $imposto) ? $imposto->item : "";
            $std->vTotTrib = $this->CheckAttribute("vTotTrib", $imposto) ? $imposto->vTotTrib : "";
        }
        
        return $std;
    }

    private function CreateICMSNFe($icms){
        $std = new stdClass();

        foreach($icms as $icmsItem){
            $std->item = $this->CheckAttribute("item", $icmsItem) ? $icmsItem->item : "";
            $std->orig = $this->CheckAttribute("orig", $icmsItem) ? $icmsItem->orig : "";
            $std->CST = $this->CheckAttribute("CST", $icmsItem) ? $icmsItem->CST : "";
            $std->modBC = $this->CheckAttribute("modBC", $icmsItem) ? $icmsItem->modBC : "";
            $std->vBC = $this->CheckAttribute("vBC", $icmsItem) ? $icmsItem->vBC : "";
            $std->pICMS = $this->CheckAttribute("pICMS", $icmsItem) ? $icmsItem->pICMS : "";
            $std->vICMS = $this->CheckAttribute("vICMS", $icmsItem) ? $icmsItem->vICMS : "";
            $std->pFCP = $this->CheckAttribute("pFCP", $icmsItem) ? $icmsItem->pFCP : "";
            $std->vFCP = $this->CheckAttribute("vFCP", $icmsItem) ? $icmsItem->vFCP : "";
            $std->vBCFCP = $this->CheckAttribute("vBCFCP", $icmsItem) ? $icmsItem->vBCFCP : "";
            $std->modBCST = $this->CheckAttribute("modBCST", $icmsItem) ? $icmsItem->modBCST : "";
            $std->pMVAST = $this->CheckAttribute("pMVAST", $icmsItem) ? $icmsItem->pMVAST : "";
            $std->pRedBCST = $this->CheckAttribute("pRedBCST", $icmsItem) ? $icmsItem->pRedBCST : "";
            $std->vBCST = $this->CheckAttribute("vBCST", $icmsItem) ? $icmsItem->vBCST : "";
            $std->pICMSST = $this->CheckAttribute("pICMSST", $icmsItem) ? $icmsItem->pICMSST : "";
            $std->vICMSST = $this->CheckAttribute("vICMSST", $icmsItem) ? $icmsItem->vICMSST : "";
            $std->vBCFCPST = $this->CheckAttribute("vBCFCPST", $icmsItem) ? $icmsItem->vBCFCPST : "";
            $std->pFCPST = $this->CheckAttribute("pFCPST", $icmsItem) ? $icmsItem->pFCPST : "";
            $std->vFCPST = $this->CheckAttribute("vFCPST", $icmsItem) ? $icmsItem->vFCPST : "";
            $std->vICMSDeson = $this->CheckAttribute("vICMSDeson", $icmsItem) ? $icmsItem->vICMSDeson : "";
            $std->motDesICMS = $this->CheckAttribute("motDesICMS", $icmsItem) ? $icmsItem->motDesICMS : "";
            $std->pRedBC = $this->CheckAttribute("pRedBC", $icmsItem) ? $icmsItem->pRedBC : "";
            $std->vICMSOp = $this->CheckAttribute("vICMSOp", $icmsItem) ? $icmsItem->vICMSOp : "";
            $std->pDif = $this->CheckAttribute("pDif", $icmsItem) ? $icmsItem->pDif : "";
            $std->vICMSDif = $this->CheckAttribute("vICMSDif", $icmsItem) ? $icmsItem->vICMSDif : "";
            $std->vBCSTRet = $this->CheckAttribute("vBCSTRet", $icmsItem) ? $icmsItem->vBCSTRet : "";
            $std->pST = $this->CheckAttribute("pST", $icmsItem) ? $icmsItem->pST : "";
            $std->vICMSSTRet = $this->CheckAttribute("vICMSSTRet", $icmsItem) ? $icmsItem->vICMSSTRet : "";
            $std->vBCFCPSTRet = $this->CheckAttribute("vBCFCPSTRet", $icmsItem) ? $icmsItem->vBCFCPSTRet : "";
            $std->pFCPSTRet = $this->CheckAttribute("pFCPSTRet", $icmsItem) ? $icmsItem->pFCPSTRet : "";
            $std->vFCPSTRet = $this->CheckAttribute("vFCPSTRet", $icmsItem) ? $icmsItem->vFCPSTRet : "";
            $std->pRedBCEfet = $this->CheckAttribute("pRedBCEfet", $icmsItem) ? $icmsItem->pRedBCEfet : "";
            $std->vBCEfet = $this->CheckAttribute("vBCEfet", $icmsItem) ? $icmsItem->vBCEfet : "";
            $std->pICMSEfet = $this->CheckAttribute("pICMSEfet", $icmsItem) ? $icmsItem->pICMSEfet : "";
            $std->vICMSEfet = $this->CheckAttribute("vICMSEfet", $icmsItem) ? $icmsItem->vICMSEfet : "";
            $std->vICMSSubstituto = $this->CheckAttribute("vICMSSubstituto", $icmsItem) ? $icmsItem->vICMSSubstituto : "";
            $std->vICMSSTDeson = $this->CheckAttribute("vICMSSTDeson", $icmsItem) ? $icmsItem->vICMSSTDeson : "";
            $std->motDesICMSST = $this->CheckAttribute("motDesICMSST", $icmsItem) ? $icmsItem->motDesICMSST : "";
            $std->pFCPDif = $this->CheckAttribute("pFCPDif", $icmsItem) ? $icmsItem->pFCPDif : "";
            $std->vFCPDif = $this->CheckAttribute("vFCPDif", $icmsItem) ? $icmsItem->vFCPDif : "";
            $std->vFCPEfet = $this->CheckAttribute("vFCPEfet", $icmsItem) ? $icmsItem->vFCPEfet : "";
        }

        return $std;
    }

    private function CreatePISNFe($pis){
        $std = new stdClass();

        foreach($pis as $pisItem){
            $std->item = $this->CheckAttribute("item", $pisItem) ? $pisItem->item : "";
            $std->CST = $this->CheckAttribute("CST", $pisItem) ? $pisItem->CST : "";
            $std->vBC = $this->CheckAttribute("vBC", $pisItem) ? $pisItem->vBC : "";
            $std->pPIS = $this->CheckAttribute("pPIS", $pisItem) ? $pisItem->pPIS : "";
            $std->vPIS = $this->CheckAttribute("vPIS", $pisItem) ? $pisItem->vPIS : "";
            $std->qBCProd = $this->CheckAttribute("qBCProd", $pisItem) ? $pisItem->qBCProd : "";
            $std->vAliqProd = $this->CheckAttribute("vAliqProd", $pisItem) ? $pisItem->vAliqProd : "";
        }

        return $std;
    }

    private function CreateCOFINSNFe($cofins){
        $std = new stdClass();

        foreach($cofins as $cofinsItem){
            $std->item = $this->CheckAttribute("item", $cofinsItem) ? $cofinsItem->item : "";
            $std->CST = $this->CheckAttribute("CST", $cofinsItem) ? $cofinsItem->CST : "";
            $std->vBC = $this->CheckAttribute("vBC", $cofinsItem) ? $cofinsItem->vBC : "";
            $std->pCOFINS = $this->CheckAttribute("pCOFINS", $cofinsItem) ? $cofinsItem->pCOFINS : "";
            $std->vCOFINS = $this->CheckAttribute("vCOFINS", $cofinsItem) ? $cofinsItem->vCOFINS : "";
            $std->qBCProd = $this->CheckAttribute("qBCProd", $cofinsItem) ? $cofinsItem->qBCProd : "";
            $std->vAliqProd = $this->CheckAttribute("vAliqProd", $cofinsItem) ? $cofinsItem->vAliqProd : "";
        }
        
        return $std;
    }

    private function CalculeICMSTotNFe($icmsTot){
        $std = new stdClass();

        $std->vBC = $this->CheckAttribute("vBC", $icmsTot) ? $icmsTot->vBC : "";
        $std->vICMS = $this->CheckAttribute("vICMS", $icmsTot) ? $icmsTot->vICMS : "";
        $std->vICMSDeson = $this->CheckAttribute("vICMSDeson", $icmsTot) ? $icmsTot->vICMSDeson : "";
        $std->vFCP = $this->CheckAttribute("vFCP", $icmsTot) ? $icmsTot->vFCP : "";
        $std->vBCST = $this->CheckAttribute("vBCST", $icmsTot) ? $icmsTot->vBCST : "";
        $std->vST = $this->CheckAttribute("vST", $icmsTot) ? $icmsTot->vST : "";
        $std->vFCPST = $this->CheckAttribute("vFCPST", $icmsTot) ? $icmsTot->vFCPST : "";
        $std->vFCPSTRet = $this->CheckAttribute("vFCPSTRet", $icmsTot) ? $icmsTot->vFCPSTRet : "";
        $std->vProd = $this->CheckAttribute("vProd", $icmsTot) ? $icmsTot->vProd : "";
        $std->vFrete = $this->CheckAttribute("vFrete", $icmsTot) ? $icmsTot->vFrete : "";
        $std->vSeg = $this->CheckAttribute("vSeg", $icmsTot) ? $icmsTot->vSeg : "";
        $std->vDesc = $this->CheckAttribute("vDesc", $icmsTot) ? $icmsTot->vDesc : "";
        $std->vII = $this->CheckAttribute("vII", $icmsTot) ? $icmsTot->vII : "";
        $std->vIPI = $this->CheckAttribute("vIPI", $icmsTot) ? $icmsTot->vIPI : "";
        $std->vIPIDevol = $this->CheckAttribute("vIPIDevol", $icmsTot) ? $icmsTot->vIPIDevol : "";
        $std->vPIS = $this->CheckAttribute("vPIS", $icmsTot) ? $icmsTot->vPIS : "";
        $std->vCOFINS = $this->CheckAttribute("vCOFINS", $icmsTot) ? $icmsTot->vCOFINS : "";
        $std->vOutro = $this->CheckAttribute("vOutro", $icmsTot) ? $icmsTot->vOutro : "";
        $std->vNF = $this->CheckAttribute("vNF", $icmsTot) ? $icmsTot->vNF : "";
        $std->vTotTrib = $this->CheckAttribute("vTotTrib", $icmsTot) ? $icmsTot->vTotTrib : "";

        return $std;
    }

    private function CreateTranspNFe($transp){
        $std = new stdClass();

        $std->modFrete = $this->CheckAttribute("modFrete", $transp) ? $transp->modFrete : "";

        return $std;
    }

    private function CreateTransportNFe($transport){
        $std = new stdClass();

        $std->xNome = $this->CheckAttribute("xNome", $transport) ? $transport->xNome : "";
        $std->IE = $this->CheckAttribute("IE", $transport) ? $transport->IE : "";
        $std->xEnder = $this->CheckAttribute("xEnder", $transport) ? $transport->xEnder : "";
        $std->xMun = $this->CheckAttribute("xMun", $transport) ? $transport->xMun : "";
        $std->UF = $this->CheckAttribute("UF", $transport) ? $transport->UF : "";
        $std->CNPJ = $this->CheckAttribute("CNPJ", $transport) ? $transport->CNPJ : "";
        $std->CPF = $this->CheckAttribute("CPF", $transport) ? $transport->CPF : "";

        return $std;
    }

    private function CreateVolNFe($vol){
        $std = new stdClass();

        $std->item = $this->CheckAttribute("item", $vol) ? $vol->item : "";
        $std->qVol = $this->CheckAttribute("qVol", $vol) ? $vol->qVol : "";
        $std->esp = $this->CheckAttribute("esp", $vol) ? $vol->esp : "";
        $std->marca = $this->CheckAttribute("marca", $vol) ? $vol->marca : "";
        $std->nVol = $this->CheckAttribute("nVol", $vol) ? $vol->nVol : "";
        $std->pesoL = $this->CheckAttribute("pesoL", $vol) ? $vol->pesoL : "";
        $std->pesoB = $this->CheckAttribute("pesoB", $vol) ? $vol->pesoB : "";

        return $std;
    }

    private function CreatePagNFe($pag){
        $std = new stdClass();

        $std->vTroco = $this->CheckAttribute("vTroco", $pag) ? $pag->vTroco : "";

        return $std;
    }

    private function CreateDetailPagNFe($detPag){
        $std = new stdClass();

        $std->tPag = $this->CheckAttribute("tPag", $detPag) ? $detPag->tPag : "";
        $std->vPag = $this->CheckAttribute("vPag", $detPag) ? $detPag->vPag : "";
        $std->CNPJ = $this->CheckAttribute("CNPJ", $detPag) ? $detPag->CNPJ : "";
        $std->tBand = $this->CheckAttribute("tBand", $detPag) ? $detPag->tBand : "";
        $std->cAut = $this->CheckAttribute("cAut", $detPag) ? $detPag->cAut : "";
        $std->tpIntegra = $this->CheckAttribute("tpIntegra", $detPag) ? $detPag->tpIntegra : "";
        $std->indPag = $this->CheckAttribute("indPag", $detPag) ? $detPag->indPag : "";

        return $std;
    }

    private function CreateAddtionalInfoNFe($infAdic){
        $std = new stdClass();

        $std->infAdFisco = $this->CheckAttribute("infAdFisco", $infAdic) ? $infAdic->infAdFisco : "";
        $std->infCpl = $this->CheckAttribute("infAdFisco", $infAdic) ? $infAdic->infCpl : "";
        return $std;
    }

    private function CheckAttribute($info, $array){
        return array_key_exists($info, $array);
    }
}