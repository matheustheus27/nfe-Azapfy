<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class NFeModel extends Eloquent
{
    protected $table = 'nfe_test';

    protected $requiredTags = [
        'infNFe',
        
        'ide',
        'emit',
        'enderEmit',
        'dest',
        'enderDest',
        'det',
        'imposto',
        'total'
    ];

    protected $fillable = [
        'infNFe',
        
        'ide',
        'emit',
        'enderEmit',
        'dest',
        'enderDest',
        'autXML',
        'det',
        'imposto',
        'total',
        'transp',
        'cobr',
        'infAdic',
        'Signature',
        'protNFe',
        'NFe'

    ];

    protected $hidden = [
        "_id",
        "updated_at",
        "created_at"
    ];

    protected $ide = [
        'cUF',
        'cNF',
        'natOp',
        'mod', 
        'serie',
        'nNF',
        'dhEmi',
        'dhSaiEnt',
        'tpNF',
        'idDest',
        'cMunFG',
        'tpImp',
        'tpEmis',
        'cDV',
        'tpAmb',
        'finNFe',
        'indFinal',
        'indPres',
        'indIntermed',
        'procEmi',
        'verProc',
    ];

    #region EMITENTE
    protected $emit = [
        'CNPJ',
        'xNome',
        'xFant',
        'enderEmit',
        'IE',
        'IM',
        'CNAE',
        'CRT',
    ];

    protected $enderEmit = [
        'xLgr',
        'nro',
        'xBairro',
        'cMun',
        'xMun',
        'UF',
        'CEP',
        'cPais',
        'xPais',
        'fone',
    ];
    #endregion

    #region DESTINATARIO
    protected $dest = [
        'CNPJ',
        'xNome',
        'enderDest',
        'indIEDest',
        'IE',
        'email',
    ];

    protected $enderDest = [
        'xLgr',
        'nro',
        'xCpl',
        'xBairro',
        'cMun',
        'xMun',
        'UF',
        'CEP',
        'cPais',
        'xPais',
        'fone',
    ];
    #endregion

    protected $autXML = [
        'CPF',
        'CNPJ',
    ];

    #region PRODUTOS
    protected $det = [
        'nItem',
        'prod',
        'imposto',
        'infAdProd',
    ];

    protected $prod = [
        'cProd',
        'cEAN',
        'xProd',
        'NCM',
        'CEST',
        'CFOP',
        'uCom',
        'qCom',
        'vUnCom',
        'vProd',
        'cEANTrib',
        'uTrib',
        'qTrib',
        'vUnTrib',
        'vOutro',
        'indTot',
        'xPed',
        'nItemPed',
        'rastro',       
    ];

    protected $rastro = [
        'nLote',
        'qLote',
        'dFab',
        'dVal',
    ];

    protected $imposto = [
        'vTotTrib',
        'ICMS',
        'PIS',
        'COFINS',   
    ];
    

    #region ICMS
    protected $ICMS = [
        'ICMS00',
        'ICMS10',
        'ICMS20',
        'ICMS30',
        'ICMS40',
        'ICMS41',
        'ICMS50',
        'ICMS51',
        'ICMS60',
        'ICMS70',
        'ICMS90',
    ];
    protected $possibleICMS = [
        'item',
        'orig',
        'CST',
        'modBC',
        'vBC',
        'pICMS',
        'vICMS',
        'pFCP',
        'vFCP',
        'vBCFCP',
        'modBCST',
        'pMVAST',
        'pRedBCST',
        'vBCST',
        'pICMSST',
        'vICMSST',
        'vBCFCPST',
        'pFCPST',
        'vFCPST',
        'vICMSDeson',
        'motDesICMS',
        'pRedBC',
        'vICMSOp',
        'pDif',
        'vICMSDif',
        'vBCSTRet',
        'pST',
        'vICMSSTRet',
        'vBCFCPSTRet',
        'pFCPSTRet',
        'vFCPSTRet',
        'pRedBCEfet',
        'vBCEfet',
        'pICMSEfet',
        'vICMSEfet',
        'vICMSSubstituto',
        'vICMSSTDeson',
        'motDesICMSST',
        'pFCPDif',
        'vFCPDif',
        'vFCPEfet',
    ];
    #endregion

    #region PIS
    protected $PIS = [
        'PISAliq',
        'PISNT',
    ];
    protected $possiblePIS = [
        'item',
        'CST',
        'vBC',
        'pPIS',
        'vPIS',
        'qBCProd',
        'vAliqProd',
    ];
    #endregion

    #region COFINS
    protected $COFINS = [
        'COFINSAliq',
        'COFINSNT',
    ];
    protected $possibleCOFINS = [
        'item',
        'CST',
        'vBC',
        'pCOFINS',
        'vCOFINS',
        'qBCProd',
        'vAliqProd',
    ];
    #endregion

    #region IPI
    protected $IPI = [
        'item',
        'clEnq',
        'CNPJProd',
        'cSelo',
        'qSelo',
        'cEnq',
        'CST',
        'vIPI',
        'vBC',
        'pIPI',
        'qUnid',
        'vUnid',
        'IPITrib',
        'IPINT',
    ];
    protected $IPINT = [
        'CST',
    ];
    protected $IPITrib = [
        'CST',
        'vBC',
        'pIPI',
        'vIPI',
    ];
    #endregion

    #endregion
   
    #region TOTAL
    protected $total = [
        'ICMSTot'
    ];
    protected $ICMSTot = [
        'vBC',
        'vICMS',
        'vICMSDeson',
        'vBCST',
        'vST',
        'vProd',
        'vFrete',
        'vSeg',
        'vDesc',
        'vII',
        'vIPI',
        'vPIS',
        'vCOFINS',
        'vOutro',
        'vNF',
        'vIPIDevol',
        'vTotTrib',
        'vFCP',
        'vFCPST',
        'vFCPSTRet',
        'vFCPUFDest',
        'vICMSUFDest',
        'vICMSUFRemet',
    ];
    #endregion

    #region TRANSPORTADORA
    protected $transp = [
        'modFrete',
        'transporta',
        'vol',
    ];
    protected $transporta = [
        'xNome',
        'IE',
        'xEnder',
        'xMun',
        'UF',
        'CNPJ', 
        'CPF',
    ];
    protected $vol = [
        'item',
        'qVol',
        'esp',
        'marca',
        'nVol',
        'pesoL',
        'pesoB',
    ];
    #endregion

    #region COBRANÇA
    protected $cobr = [
        'fat',
        'dup',
    ];
    protected $fat = [
        'nFat',
        'vOrig',
        'vDesc',
        'vLiq',
    ];
    protected $dup = [
        'nDup',
        'dVenc',
        'vDup',
    ];
    #endregion
    
    #region PAGAMENTO
    protected $pag = [
        'vTroco',
        'detPag',
    ];
    protected $detPag = [
        'indPag',
        'tPag',
        'vPag',
        'CNPJ',
        'tBand',
        'cAut',
        'tpIntegra',
    ];
    #endregion
    
    protected $infAdic = [
        'infCpl',
        'infAdFisco',
    ];

    #region GETTERS
    public function GetRequiredTags(){
        return $this->requiredTags;
    }

    public function GetIde(){
        return $this->ide;
    }

    public function GetEmit(){
        return $this->emit;
    }

    public function GetEnderEmit(){
        return $this->enderEmit;
    }

    public function GetDest(){
        return $this->dest;
    }

    public function GetEnderDest(){
        return $this->enderDest;
    }

    public function GetautXML(){
        return $this->autXML;
    }

    public function GetDet(){
        return $this->det;
    }

    public function GetProd(){
        return $this->prod;
    }

    public function GetRastro(){
        return $this->rastro;
    }

    public function GetImposto(){
        return $this->imposto;
    }

    public function GetTotal(){
        return $this->total;
    }

    public function GetICMSTot(){
        return $this->ICMSTot;
    }

    public function GetTransp(){
        return $this->transp;
    }

    public function GetTransporta(){
        return $this->transporta;
    }

    public function GetVol(){
        return $this->vol;
    }

    public function GetFat(){
        return $this->fat;
    }

    public function GetCobr(){
        return $this->cobr;
    }

    public function GetDup(){
        return $this->dup;
    }

    public function GetInfAdic(){
        return $this->infAdic;
    }
    #endregion

    #region SETTERS
    public function SetRequiredTags($requiredTags){
        $this->requiredTags = $requiredTags;
    }

    public function SetIde($ide){
        $this->ide = $ide;
    }

    public function setEmit($emit){
        $this->emit = $emit;
    }

    public function SetEnderEmit($enderEmit){
        $this->enderEmit = $enderEmit;
    }

    public function SetDest($dest){
        $this->dest = $dest;
    }

    public function SetEnderDest($enderDest){
        $this->enderDest = $enderDest;
    }

    public function SetautXML($autXML){
        $this->autXML = $autXML;
    }

    public function SetDet(){
        $this->det;
    }

    public function SetProd($prod){
        $this->prod = $prod;
    }

    public function SetRastro($rastro){
        $this->rastro = $rastro;
    }

    public function SetImposto($imposto){
        $this->imposto = $imposto;
    }

    public function SetTotal($total){
        $this->total = $total;
    }

    public function SetICMSTot($ICMSTot){
        $this->ICMSTot = $ICMSTot;
    }

    public function SetTransp($transp){
        $this->transp = $transp =  $transp;
    }

    public function SetTransporta($transporta){
        $this->transporta = $transporta;
    }

    public function SetVol($vol){
        $this->vol = $vol;
    }

    public function SetFat($fat){
        $this->fat = $fat;
    }

    public function SetCobr($cobr){
        $this->cobr = $cobr;
    }

    public function SetDup($dup){
        $this->dup = $dup;
    }

    public function SetInfAdic($infAdic){
        $this->infAdic = $infAdic;
    }
    #endregion
}
