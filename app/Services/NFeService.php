<?php

namespace App\Services;

use NFePHP\NFe\Make;

class NFeService{
    private $config;

    public function __construct($config){
        /*$config = [
            "atualizacao" => "2015-10-02 06:01:21",
            "tpAmb" => 2,
            "razaosocial" => "Fake Materiais de construção Ltda",
            "siglaUF" => "SP",
            "cnpj" => "00716345000119",
            "schemes" => "PL_008i2",
            "versao" => "3.10",
            "tokenIBPT" => "AAAAAAA",
            "CSC" => "GPB0JBWLUR6HWFTVEAS6RJ69GPCROFPBBB8G",
            "CSCid" => "000002",
        ];
        
        $json = json_encode($config);*/

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
        $nfe->tagprod(CreateListProd());
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

    private function CreateListProd(){
        $std = new stdClass();

        $std->item = 1; //item da NFe
        $std->cProd;
        $std->cEAN;
        $std->cBarra;
        $std->xProd;
        $std->NCM;
        $std->cBenef;
        $std->EXTIPI;
        $std->CFOP;
        $std->uCom;
        $std->qCom;
        $std->vUnCom;
        $std->vProd;
        $std->cEANTrib;
        $std->cBarraTrib;
        $std->uTrib;
        $std->qTrib;
        $std->vUnTrib;
        $std->vFrete;
        $std->vSeg;
        $std->vDesc;
        $std->vOutro;
        $std->indTot;
        $std->xPed;
        $std->nItemPed;
        $std->nFCI;
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