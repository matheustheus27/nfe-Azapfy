<?php

namespace App\Services;

use NFePHP\NFe\Complements;
use NFePHP\NFe\Tools;
use NFePHP\Common\Certificate;
use NFePHP\NFe\Common\Standardize;

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