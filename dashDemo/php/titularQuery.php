
<?php

require 'conexion.php';
use Laudis\Neo4j\Authentication\Authenticate;
use Laudis\Neo4j\ClientBuilder;
use Laudis\Neo4j\Types\CypherMap;
use Laudis\Neo4j\Databags\Statement;

    $Nombre = $_POST["Nombre"];
    $Apellido = $_POST["Apellido"];
    $Cedula = $_POST["Cedula"];
    $img = "https://www.adservices.de/eng/assets/images/icons/person.png";
   

    $results1 = $client->run('CREATE (a:Titular_de_la_cuenta {Nombre: $Nombre, Apellido: $Apellido, Cedula: $Cedula, img: $img})', 
        ['Nombre' => $Nombre, 'Apellido' => $Apellido,'Cedula' => $Cedula,'img' => $img]);

        header('location: mostrarTitulares.php');

    ?>
