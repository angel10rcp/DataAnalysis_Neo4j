<?php
require 'conexion.php';

/*
$cedula = $_POST["persona1"];
$cedula2 = $_POST["persona2"];
$relacion = $_POST["relacion"];


echo $_POST["persona1"];
echo $_POST["persona2"];
echo $_POST["relacion"];
*/
//$cedula = "1";
//$nombre = "Daniel";

//$results1 = $client->run("MATCH (p1:Persona), (p2:Persona) WHERE p1.cedula =  '4'  AND  p2.nombre =  'Angel' MERGE (p1)-[r:COMO_HERMANO]->(p2)");
//$results1 = $client->run("MATCH (p1:Persona), (p2:Persona) WHERE p1.cedula =  '".$persona1."'  AND  p2.nombre =  '".$persona2."' MERGE (p1)-[r:COMO_HERMANO]->(p2)");

//echo $persona1;
//echo $persona2;
//echo $relacion;

//$results1 = $client->run("MATCH (p1:Persona), (p2:Persona) WHERE p1.cedula =  '".$_POST['persona1']."'  AND  p2.nombre =  '".$_POST['persona2']."' MERGE (p1)-[r:COMO_HERMANO]->(p2)");
 
 //       header('location: mostrarTitulares.php');

    //    $results1 = $client->run("MATCH (p1:Persona), (p2:Persona) WHERE p1.cedula =  '".$_POST['persona1']."'  AND  p2.nombre =  '".$_POST['persona2']."' MERGE (p1)-[:COMO_Numero_de_telefono]->(p2)");
    //    header('location: mostrarTitulares.php');

 
    $results1 = $client->run("MATCH (a:Person), (b:Person) WHERE a.nombres = '".$_POST['persona1']."' AND  b.nombres = '".$_POST['persona2']."' 
    MERGE (b)-[r:".$_POST['relacion']."]->(a)");

    header("Location: buscarTitulares.php");


?>
