<?php

require 'conexion.php';
use Laudis\Neo4j\Authentication\Authenticate;
use Laudis\Neo4j\ClientBuilder;
use Laudis\Neo4j\Types\CypherMap;
use Laudis\Neo4j\Databags\Statement;


    //$cedula = $_GET['id'];
  
    $results1 = $client->run("MATCH (p:Titular_de_la_cuenta) WHERE p.Cedula =  '".$_GET['id']."' DETACH DELETE p");

    //echo '<script language="javascript">alert("Elimado");window.location.href="mostrarPersonas.php"</script>';
    header('location: mostrarTitulares.php');
    ?>

<?php

?>