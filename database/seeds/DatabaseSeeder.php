<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $url = "http://musicbrainz.org/ws/2/artist?query=Enric";
        $c = curl_init( $url );
        curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Accept:application/json','User-Agent:Laravel/5.7'));
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($c);
        $dades = json_decode($res,true);
        $data = $dades['artists'];       
        for ($i=0; $i<sizeof($data); $i++){ 
            
            $country = '-';
            $type = '-';
            $inicio = '-';
            $fin = '-';

            if (isset($data[$i]['country'])){
                $country = $data[$i]['country'];
            }
            if (isset($data[$i]['type'])){
                $type = $data[$i]['type'];
            }
            if (isset($data[$i]['life-span']['begin'])){
                $inicio = $data[$i]['life-span']['begin'];
            }
            if (isset($data[$i]['life-span']['end'])){
                $fin = $data[$i]['life-span']['end'];
            }
            DB::table('artistas')->insert([
                'Nombre' => $data[$i]['name'],
                'Pais' => $country,
                'Tipo' => $type,
                'FechaInicio' => $inicio,
                'FechaFin' => $fin,
            ]);
        }

        $url2 = "http://musicbrainz.org/ws/2/recording?query=Yaiza";

        $c = curl_init( $url2 );
        curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Accept:application/json','User-Agent:Laravel/5.7'));
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($c);
        $dades = json_decode($res,true);
        $data = $dades['recordings'];       
        for ($i=0; $i<sizeof($data); $i++){ 
            //var_dump($data[$i]);
            $title = '-';
            $artista = '-';
            $album = '-';

            if (isset($data[$i]['title'])){
                $title = $data[$i]['title'];
            }
            if (isset($data[$i]['artist-credit'][0]['artist']['name'])){
                $artista = $data[$i]['artist-credit'][0]['artist']['name'];
            }
            if (isset($data[$i]['releases'][0]['title'])){
                $album = $data[$i]['releases'][0]['title'];
            }
            
            DB::table('canciones')->insert([
                'Nombre' => $title,
                'Artista' => $artista,
                'Album' => $album,
            ]);
        }
    }
}
