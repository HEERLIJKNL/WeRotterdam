<?php namespace App\Src\Buckaroo;


class Banks
{
    private $list = [
        "ABNANL2A" => "ABN AMRO",
        "ASNBNL21" => "ASN Bank",
        "FRBKNL2L" => "Friesland Bank",
        "INGBNL2A" => "ING",
        "RABONL2U" => "Rabobank",
        "SNSBNL2A" => "SNS Bank",
        "RBRBNL21" => "RegioBank"
    ];

    public function all(){
        return $this->list;
    }
}