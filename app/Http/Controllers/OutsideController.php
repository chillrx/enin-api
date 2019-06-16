<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutsideController extends Controller
{

    public function getCNPJ(Request $request)
    {
        $client = new \GuzzleHttp\Client([
            "base_uri"=>"https://www.receitaws.com.br/"
        ]);
        $q = 'v1/cnpj/'.$request->get('cnpj');
        $res = $client->request('GET', $q);

        $obj = json_decode($res->getBody());

        return response()->json($obj);
    }

    public function getCEP(Request $request)
    {
        $client = new \GuzzleHttp\Client([
            "base_uri"=>"http://cep.republicavirtual.com.br/"
        ]);
        $q = 'web_cep.php?formato=json&cep='.$request->get('cep');
        $res = $client->request('GET', $q);

        $obj = json_decode($res->getBody());

        return response()->json($obj);
    }

}
