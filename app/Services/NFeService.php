<?php

namespace App\Services;

use NFePHP\NFe\Make;
use stdClass;

class NFeService{
    private $config;

    public function __construct($config){
        $this->config = $config;
    }

    public function CreateNFe(){
        $nfe = new Make();

        $nfe->taginfNFe(CreateInfNFe());
        $nfe->tagide(CreateIdNFe());
        $nfe->tagemit(CreateEmiNFe());
        $nfe->tagenderEmit(CreateEndEmiNFe());
        $nfe->tagdest(CreateDesNFe());
        $nfe->tagenderDest(CreateEndDesNFe());
        $nfe->tagprod(CreateListProdNFe());
        $nfe->taginfAdProd(CreateAddtionalProdInfoNFe());
        $nfe->tagimposto(CreateImpNFe());
        $nfe->tagICMS(CreateICMSNFe());
        $nfe->tagPIS(CreatePISNFe());
        $nfe->tagCOFINS(CreateCOFINSNFe());
        $nfe->tagICMSTot(CalculeICMSTot());
        $nfe->tagtransp(CreateTranspNFe());
        $nfe->tagvol(CreateVolNFe());
        $nfe->tagpag(CreatePagNFe());
        $nfe->tagdetPag(CreateDetailPagNFe());
        $nfe->taginfAdic(CreateAddtionalInfoNFe());

        $nfe->monta();

        return $nfe->getXML();
    } 
    
    private function CreateInfNFe(){
        $std = new stdClass();

        $std->versao = '4.00';
        $std->Id = 'NFe35150271780456000160550010000000021800700082';
        $std->pk_nItem = null;

        return $std;
    }

    private function CreateIdNFe(){
        $std = new stdClass();

        $std->cUF = 43;
        $std->cNF = rand(11111111, 99999999);
        $std->natOp = 'REVENDA DE MERCADORIAS SIMPLES NACIONAL - SC';

        $std->mod = 55;
        $std->serie = 1;
        $std->nNF = 2;
        $std->dhEmi = date("Y-m-d\TH:i:sP");
        $std->dhSaiEnt = date("Y-m-d\TH:i:sP");
        $std->tpNF = 1;
        $std->idDest = 1;
        $std->cMunFG = 3518800;
        $std->tpImp = 1;
        $std->tpEmis = 1;
        $std->cDV = 2;
        $std->tpAmb = 2;
        $std->finNFe = 1;
        $std->indFinal = 0;
        $std->indPres = 0;
        $std->indIntermed = null;
        $std->procEmi = 0;
        $std->verProc = '3.10.31';
        $std->dhCont = null;
        $std->xJust = null;

        return $std;
    }

    private function CreateEmiNFe(){
        $std = new stdClass();

        $std->xNome = "E-Sales Solucoes Oobj";
        $std->xFant = "Oobj";
        $std->IE = "0963233556";
        $std->CRT = "1";
        $std->CNPJ = "07385111000102";

        return $std;
    }

    private function CreateEndEmiNFe(){
        $std = new stdClass();

        $std->xLgr = "PROF ALGACYR MUNHOZ MADER";
        $std->nro = "2800";
        $std->xCpl = "";
        $std->xBairro = "CIC";
        $std->cMun = "4314902";
        $std->xMun = "Porto Alegre";
        $std->UF = "RS";
        $std->CEP = "81310020";
        $std->cPais = "1058";
        $std->xPais = "BRASIL";
        $std->fone = "4121098000";

        return $std;
    }

    private function CreateDesNFe(){
        $std = new stdClass();

        $std->xNome = "E-SALES SOLUÇÕES DE INTEGRAÇÃO LTDA";
        $std->indIEDest = "";
        $std->IE = "0963233556";
        $std->ISUF = "";
        $std->IM = "InsMun";
        $std->email = "";
        $std->CheckCPForCNPJ("07385111000102");

        return $std;
    }

    private function CreateEndDesNFe(){
        $std = new stdClass();

        $std->xLgr = "AV. FRANÇA";
        $std->nro = "1162";
        $std->xCpl = "";
        $std->xBairro = "NAVEGANTES";
        $std->cMun = "4314902";
        $std->xMun = "PORTO ALEGRE";
        $std->UF = "RS";
        $std->CEP = "44096486";
        $std->cPais = "1058";
        $std->xPais = "BRASIL";
        $std->fone = "7536230233";

        return $std;
    }

    private function CreateListProdNFe(){
        $std = new stdClass();

        $std->item = 1;
        $std->cProd = "4450";
        $std->cEAN = "SEM GTIN";
        $std->cBarra = "";
        $std->xProd = "SISTEMA DE LINHA DE VIDA HORIZONTAIS RETRÁTEIS DE FÁCIL INSTALAÇÃO COM CAPACIDADE PARA DOIS OPERÁRIOS 18,3M DE CABO DE A";
        $std->NCM = "44170010";
        $std->cBenef = "";
        $std->EXTIPI = "";
        $std->CFOP = "5405";
        $std->uCom = "PÇ";
        $std->qCom = "1";
        $std->vUnCom = "4298.43";
        $std->vProd = "4298.43";
        $std->cEANTrib = "";
        $std->cBarraTrib = "";
        $std->uTrib = "PÇ";
        $std->qTrib = "1";
        $std->vUnTrib = "4298.43";
        $std->vFrete = "";
        $std->vSeg = "";
        $std->vDesc = "";
        $std->vOutro = "";
        $std->indTot = "1";
        $std->xPed = "-1023368";
        $std->nItemPed = "";
        $std->nFCI = "";
    }

    private function CreateAddtionalProdInfoNFe(){
        $std = new stdClass();

        $std->item = 1;
        $std->infAdProd = 'informacao adicional do item';

        return $std;
    }

    private function CreateImpNFe(){
        $std = new stdClass();

        $std->item = 1;
        $std->vTotTrib = 0.00;

        return $std;
    }

    private function CreateICMSNFe(){
        $std = new stdClass();

        $std->item = 1;
        $std->orig = "";
        $std->CST = "";
        $std->modBC = "";
        $std->vBC = "4298.43";
        $std->pICMS = "";
        $std->vICMS = "171.94";
        $std->pFCP = "";
        $std->vFCP = "";
        $std->vBCFCP = "";
        $std->modBCST = "";
        $std->pMVAST = "";
        $std->pRedBCST = "";
        $std->vBCST = "";
        $std->pICMSST = "";
        $std->vICMSST = "";
        $std->vBCFCPST = "";
        $std->pFCPST = "";
        $std->vFCPST = "";
        $std->vICMSDeson = "";
        $std->motDesICMS = "";
        $std->pRedB = "";
        $std->vICMSOp = "";
        $std->pDif = "";
        $std->vICMSDif = "";
        $std->vBCSTRe = "";
        $std->pST = "";
        $std->vICMSSTRet = "";
        $std->vBCFCPSTRet = "";
        $std->pFCPSTRet = "";
        $std->vFCPSTRet = "";
        $std->pRedBCEfet = "";
        $std->vBCEfet = "";
        $std->pICMSEfet = "";
        $std->vICMSEfet = "";
        $std->vICMSSubstituto = "";
        $std->vICMSSTDeson = "";
        $std->motDesICMSST = "";
        $std->pFCPDif = "";
        $std->vFCPDif = "";
        $std->vFCPEfet = "";

        return $std;
    }

    private function CreatePISNFe(){
        $std = new stdClass();

        $std->item = 1;
        $std->CST = '07';
        $std->vBC = null;
        $std->pPIS = null;
        $std->vPIS = null;
        $std->qBCProd = null;
        $std->vAliqProd = null;

        return $std;
    }

    private function CreateCOFINSNFe(){
        $std = new stdClass();

        $std->item = 1;
        $std->CST = '07';
        $std->vBC = null;
        $std->pCOFINS = null;
        $std->vCOFINS = null;
        $std->qBCProd = null;
        $std->vAliqProd = null;

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