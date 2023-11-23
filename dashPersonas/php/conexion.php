<?php
require '../vendor/autoload.php';



$client = Laudis\Neo4j\ClientBuilder::create()->withDriver('default', 'bolt://neo4j:12345678@localhost?database=demo2')->build();



/*
    $nombre = $_POST["nombre"];
    $cedula = $_POST["cedula"];
    $edad = $_POST["edad"];
    $cedulaP = $_POST["cedulaP"];
    $cedulaM = $_POST["cedulaM"];
    $genero = $_POST["genero"];


    //$results = $client->run('CREATE (e:Empresa {RUC:"551",NombreEmpresa:"Radical",Direccion:"Quito"})');
    //$results1 = $client->run('CREATE (p:Persona {nombre:$nombre})',['nombre' -> 'abcd']);
   
    $results = $client->runStatements([
        Statement::create('CREATE (p:Persona {nombre: $nombre, cedula: $cedula, edad: $edad, cedulaP: $cedulaP, cedulaM: $cedulaM, genero: $genero })', 
        ['nombre' => $nombre, 'cedula' => $cedula, 'edad' => $edad, 'cedulaP' => $cedulaP, 'cedulaM' => $cedulaM, 'genero' => $genero])
    ]);

    $results1 = $client->run('MATCH (p:Persona) RETURN p');
  /*  
    echo "Personas";
    echo "<br>";
    foreach ($results1 as $result) {
        // Returns a Node Persona
        $node = $result->get('p');
        //echo $node->getProperty('nombre');
        echo "<br>";
    }
    */

//    echo '<script language="javascript">alert("Ingreso Exitoso");window.location.href="../index.html"</script>';

?>
