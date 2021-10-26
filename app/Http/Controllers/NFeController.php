<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NFeServiceCreateXML;

class NFeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 201;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nfe_serviceCreate = new NFeServiceCreateXML([
            "atualizacao"=>date('Y-m-d h:i:s'),
            "tpAmb"=> 2,
            "razaosocial" => "RAZAO SOCIAL DO EMISSOR",
            "cnpj" => "99999999999999", // PRECISA SER VÁLIDO
            "ie" => '999999999999', // PRECISA SER VÁLIDO
            "siglaUF" => "SP",
            "schemes" => "PL_009_V4",
            "versao" => '4.00',
            "tokenIBPT" => "AAAAAAA",
            "CSC" => "GPB0JBWLUR6HWFTVEAS6RJ69GPCROFPBBB8G",
            "CSCid" => "000002",
            "aProxyConf" => [
                "proxyIp" => "",
                "proxyPort" => "",
                "proxyUser" => "",
                "proxyPass" => ""
            ]
        ]);

        $nfe_serviceRegister  = new NFeServiceRegisterXML([
            "atualizacao"=>date('Y-m-d h:i:s'),
            "tpAmb"=> 2,
            "razaosocial" => "RAZAO SOCIAL DO EMISSOR",
            "cnpj" => "99999999999999", // PRECISA SER VÁLIDO
            "ie" => '999999999999', // PRECISA SER VÁLIDO
            "siglaUF" => "SP",
            "schemes" => "PL_009_V4",
            "versao" => '4.00',
            "tokenIBPT" => "AAAAAAA",
            "CSC" => "GPB0JBWLUR6HWFTVEAS6RJ69GPCROFPBBB8G",
            "CSCid" => "000002",
            "aProxyConf" => [
                "proxyIp" => "",
                "proxyPort" => "",
                "proxyUser" => "",
                "proxyPass" => ""
            ]
        ]);

        /*
        //info
        $std = new stdClass();

        $std->versao = '4.00';
        $std->Id = "";
        $std->pk_nItem = null;

        //id
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
        
        */

        //Teste de Parâmetro
        $nfe = [

            "id" => [
                "cUF" => "31",
                "natOp" => 'VENDA MERC. ADQ/RECEB. DE TERC. - REGIME DE ST',
                "mod" => "55",
                "serie" => "1",
                "nNF" => "000613785",
                "dhEmi" => "07-10-2021T03:00:00",
                "dhSaiEnt" => "08-10-2021T10:00:00",
                "tpNF" => "1",
                "idDest" => "1",
                "cMunFG" => "3106705",
                "tpImp" => "1",
                "tpEmi" => "1",
                "cDV" => "8",
                "tpAmb" => "2",
                "finNFe" => "1",
                "indFinal" => "0",
                "indPres" => "0",
                "indIntermed" => null,
                "procEmi" => "0",
                "verProc" => "3.0",
                "dhCont" => null,
                "xJust" => null,
            ],

            "emi"=>[
                "" => "",
                "" => "",
                "" => "",
                "" => "",
                "" => "",
                
            ]
            
        ];





        header('Content-Type: text/xml; charset=UTF-8');
        return $nfe_serviceCreate->CreateNFe();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
