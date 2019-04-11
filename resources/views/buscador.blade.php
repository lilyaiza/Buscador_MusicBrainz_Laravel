<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
    body {
        background-color: pink;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artistas</title>
</head>
<body>
    <form action="{{action('musicsController@getResultados')}}">
        <label>Buscar artista: </label><input type"text" name="consulta">
        <button type="submit" class="btn btn-dark">Buscar</button>
    </form>


    <a href="/canciones">Ir a canciones</a>
</body>
</html>

<?php
 
// mostrem nom ($dades ja és un array associatiu PHP)
//var_dump($dades); 
// $dades["aliases"][0]["name"];

/*@foreach ($res as $dada){
    {{$dada['aliases']}}
}
@endforeach*/


?>

<div id="datos">
    <table>
        <tr id="nombre">
            
        </tr>
    </table>
</div>
<script>

</script>