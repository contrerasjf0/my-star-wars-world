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

    public function showApi($id){

        $characterData = $this->queryToApi('GET', $this->baseUrl . "people/$id/");
        $characterData = $this->imagesCharactersDirectory->setToCharacter($characterData);
        $arrayResult = array();

        if(count($characterData['films'])){
            foreach ($characterData['films'] as $film) {
                $filmTitle = ($this->queryToApi('GET', $film))['title'];
                array_push($arrayResult, $filmTitle);
            }

            $characterData['films'] = $arrayResult;
            $arrayResult = array();
        }
        
        if(count($characterData['species'])){
            foreach ($characterData['species'] as $specie) {
                $specieName = ($this->queryToApi('GET', $specie))['name'];
                array_push($arrayResult, $specieName);
            }

            $characterData['species'] = $arrayResult[0];
            $arrayResult = array();
        }

        if(count($characterData['vehicles'])){
            foreach ($characterData['vehicles'] as $vehicle) {
                $vehicleName = ($this->queryToApi('GET', $vehicle))['name'];
                array_push($arrayResult, $vehicleName);
            }

            $characterData['vehicles'] = $arrayResult;
            $arrayResult = array();
        }

        if(count($characterData['starships'])){
            foreach ($characterData['starships'] as $starship) {
                $startshipName = ($this->queryToApi('GET', $starship))['name'];
                array_push($arrayResult, $startshipName);
            }
            $characterData['starships'] = $arrayResult;
            $arrayResult = array();
        }

        return view('characters.show', ['character' => $characterData]);
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

