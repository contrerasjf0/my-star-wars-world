<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;

use App\Character;
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

    public function listMyCharacters(){
         $characters = Character::all();

        return view('characters.listMyCharacters', ['characters' => $characters]);
    }

    public function create(){

        return view('characters.create');
    }

    public function destroy($id){
        $character = Character::find($id);

        $character->delete();

        //Character::destroy($id);

        return redirect()->route('listMyCharacters');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3|max:100',
            'specie' => 'required|min:3|max:50',
            'gender' => 'required|alpha',
            'height' => 'numeric|digits_between:2,3',
            'eyes_color' => 'alpha|min:3|max:30',
            'skin_color' => 'alpha|min:3|max:30',
            'hair_color' => 'alpha|min:3|max:100',
            'birth_year' => 'alpha_num',
            'mass' => 'numeric|digits_between:2,4',
            'image' => 'required'
        ]);

        if ($validator->fails()){
                return redirect()->route('create')
                            ->withErrors($validator)
                            ->withInput();
        }

        $character = new Character();

        $character->name = $request->input('name');
        $character->specie = $request->input('specie');
        $character->gender =  $request->input('gender');
        $character->height = $request->input('height');
        $character->eyes_color = $request->input('eyes_color');
        $character->skin_color = $request->input('skin_color');
        $character->hair_color = $request->input('hair_color');
        $character->birth_year = $request->input('birth_year');
        $character->mass = $request->input('mass');
        $character->image= $request->input('image');

        $character->save();

        return redirect('/');
        
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

    public function showMyCharacter($id){
        $characterData = Character::findOrFail($id);
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

