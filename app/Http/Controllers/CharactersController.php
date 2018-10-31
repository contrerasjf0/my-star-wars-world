<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;

use App\Directories\ImagesCharactersDirectory;


class CharactersController extends Controller
{
 
    public $defaultMethod = 'GET';
    public $baseUrl = 'https://swapi.co/api/';

    public function __construct() {
        $this->imagesCharactersDirectory = new ImagesCharactersDirectory();
    }

    public function index()
    {
        $characters = $this->queryToApi();
        $characters = $this->imagesCharactersDirectory->setToCharacter($characters['results']);
        
        return view('characters.list', ['characters' => $characters]);
    }


    private function queryToApi($method = 'GET', $url = 'https://swapi.co/api/people/'){
        try {
 
            $client = new GuzzleHttpClient();
  
            $apiRequest = $client->request($method, $url);  
            $dataStringJson= $apiRequest->getBody()->getContents();
            return json_decode($dataStringJson, true);
            
       } catch (RequestException $re) {
          return [
              'errorCode' => 500,
              'message' => 'Problems with the API'
          ];
       }

    }


}

