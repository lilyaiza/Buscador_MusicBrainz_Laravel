<style>
    body {
        background-image: url("https://www.wallpaperflare.com/static/164/922/575/headphones-pink-teal-5k-wallpaper-preview.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
//var_dump($data);
?>
<h1>Buscador musical</h1>
<table style='border: 1px solid black' width='40%'>
<tr align="center"><td><b>Nombre</b></td><td><b>Pais</b></td><td><b>Tipo</td></b><td><b>Inicio Carrera</b></td><td><b>Fin carrera</b></td></tr><?php
for ($i=0; $i<sizeof($data); $i++){   
    echo '<tr align="center">';
    echo '<td>'.$data[$i]['name'].'</td>';
    if (isset($data[$i]['country'])){
        echo '<td>'.$data[$i]['country'].'</td>';
    }
    else {
        echo '<td> - </td>';
    }
    if (isset($data[$i]['type'])){
        echo '<td>'.$data[$i]['type'].'</td>';
    }
    else {
        echo '<td> - </td>';
    }
    if (isset($data[$i]['life-span']['begin'])){
        echo '<td>'.$data[$i]['life-span']['begin'].'</td>';
    }
    else {
        echo '<td> - </td>';
    }
    if (isset($data[$i]['life-span']['end'])){
        echo '<td>'.$data[$i]['life-span']['end'].'</td>';
    }
    else {
        echo '<td> - </td>';
    }

    echo '</tr>';
    //dd($data);
}
?>

</body>
</html>
