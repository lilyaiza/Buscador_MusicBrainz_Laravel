<?php
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use DB;

class musicsController extends Controller {

    public function getResultados(Request $request){

        if ($request->consulta){
            $url = "http://musicbrainz.org/ws/2/artist?query=".$request->input('consulta');
        }
        else {
            $url = "http://musicbrainz.org/ws/2/artist?query=Nirvana";
        }

        // inicialitzem la crida cURL
        //$url = "http://musicbrainz.org/ws/2/artist?query=".$request->input('consulta');
        $c = curl_init( $url );
        
        // Ajustem headers perquè ens retorni la info en format JSON
        // tb afegim User-Agent (identificador de client, si no Musicbrainz no funciona)
        curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Accept:application/json','User-Agent:Laravel/5.7'));
        // ajustos perquè ens retorni les dades sobre una variable
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        
        // cridem per obtenir les dades
        $res = curl_exec($c);
        
        // transformem les dades a un array associatiu de PHP
        $dades = json_decode($res,true);

        return view("resultado", array('data'=>$dades['artists']));
    }

    public function getCanciones(Request $request){

        $cancion = DB::table('canciones')->select('Nombre','Artista','Album')->get();
        $canciones = json_decode($cancion,true);
        return view("ListaCanciones", compact('canciones'));
    }

}