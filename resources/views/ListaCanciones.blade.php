<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!DOCTYPE html>
<html>
<head>
    <title>Canciones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color: pink ">
    <?php 
        echo '<table>';
        echo '<tr align="center"><td><b>Nombre</b></td><td><b>Artista</b></td><td><b>Album</b></td></tr>';
        for ($i=0; $i<sizeof($canciones); $i++){   
            echo '<tr align="center">';
            echo '<td>'.$canciones[$i]['Nombre'].'</td>';
            echo '<td>'.$canciones[$i]['Artista'].'</td>';
            echo '<td>'.$canciones[$i]['Album'].'</td>';
            echo '</tr>';
        }
        echo '</table>';
    ?>

</body>
</html>