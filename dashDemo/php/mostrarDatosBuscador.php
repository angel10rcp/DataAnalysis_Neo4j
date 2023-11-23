<?php  require 'conexion.php'; ?>

<?php
         $buscardor = $client->run("MATCH (p:Titular_de_la_cuenta) WHERE p.Cedula =  '".$_POST['buscar']."' return p");
         foreach ($buscardor as $result) {
            $node = $result->get('p');
            }

            $buscardor2 = $client->run("MATCH (p:Titular_de_la_cuenta) WHERE p.Cedula =  '".$_POST['buscar2']."'  return p");
            foreach ($buscardor2 as $result2) {
               $node2 = $result2->get('p');
               }
          ?>

<div class="container mt-5">              
        <div class="container-fluid"> 
        <h5><strong>Datos de la Persona 1</strong></h5> 
        	<hr/>                 
                    <div class="row align-items-start">
                        <div class="col">
                        <label><strong>Nombre:</strong></label>
                        <label><?php echo $node->getProperty('Nombre'); ?></label>
                        </div>
                        
                        <div class="col">
                        <label><strong>Apellido:</strong></label>
                        <label><?php echo $node->getProperty('Apellido'); ?></label>
                        </div>

                        <div class="w-100"></div>

                        <div class="col">
                        <label><strong>Fecha de Nacimiento:</strong></label>
                        <label><?php echo $node->getProperty('FechaNacimiento'); ?></label>
                        </div>

                        <div class="col">
                        <label><strong>Género:</strong></label>
                        <label><?php echo $node->getProperty('Genero');?></label>
                        </div>

                                      
                    </div>	           
        </div>
        <hr/> 
        <div class="container-fluid"> 
        <h5>Datos del Padre</h5> 
        	<hr/>                 
                    <div class="row align-items-start">
                    <div class="col">
                        <label><strong>Cédula del padre:</strong></label>
                        <label><?php echo $node->getProperty('CedulaPadre'); $variable=$node->getProperty('CedulaPadre'); ?></label>
                        <?php /*$buscardor3 = $client->run("MATCH (p:Person) WHERE p.cedula =  '".$variable."'  return p");
                                                    foreach ($buscardor3 as $result3) {
                                                    $node3 = $result3->get('p');
                                                    
                                                    } */
                                                    ?>
                       
                    <!--    <div class="col">
                        <label><strong>Nombres del padre:</strong></label>
                        <label><?php //echo $node3->getProperty('nombres');echo $node3->getProperty('apellidos'); ?></label>   -->                    
                        </div>
                    </div>           
        </div>
        <hr/> 
        <div class="container-fluid"> 
        <h5>Datos de la Madre</h5> 
        	<hr/>                 
                    <div class="row align-items-start">
                        <div class="col">
                        <label><strong>Cédula de la madre:</strong></label>
                        <label><?php echo $node->getProperty('CedulaMadre'); ?></label>
                        </div>
                    </div>	           
        </div>
        <br>
        <br>
        <br>
        <div class="container-fluid"> 
        <h5><strong>Datos de la Persona 2</strong></h5> 
        	<hr/>                 
                    <div class="row align-items-start">
                        <div class="col">
                        <label><strong>Nombre:</strong></label>
                        <label><?php echo $node2->getProperty('Nombre'); ?></label>
                        </div>
                        
                        <div class="col">
                        <label><strong>Apellido:</strong></label>
                        <label><?php echo $node2->getProperty('Apellido'); ?></label>
                        </div>

                        <div class="w-100"></div>

                        <div class="col">
                        <label><strong>Fecha de Nacimiento:</strong></label>
                        <label><?php echo $node2->getProperty('FechaNacimiento'); ?></label>
                        </div>

                        <div class="col">
                        <label><strong>Género:</strong></label>
                        <label><?php echo $node2->getProperty('Genero'); ?></label>
                        </div>

                
                        
                    </div>	           
        </div>
        <hr/> 
        <div class="container-fluid"> 
        <h5>Datos del Padre</h5> 
        	<hr/>                 
                    <div class="row align-items-start">
                        <div class="col">
                        <label><strong>Cédula del padre:</strong></label>
                        <label><?php echo $node2->getProperty('CedulaPadre'); ?></label>
                        </div>
                    </div>	           
        </div>
        <hr/> 
        <div class="container-fluid"> 
        <h5>Datos de la Madre</h5> 
        	<hr/>                 
                    <div class="row align-items-start">
                        <div class="col">
                        <label><strong>Cédula de la madre:</strong></label>
                        <label><?php echo $node2->getProperty('CedulaMadre'); ?></label>
                        </div>
                    </div>	           
        </div>
</div>

<hr/> 
<hr/> 

        <form action="crearRelacion.php" method="post">

        <h3 class="h3 mb-0 text-gray-800"> Persona 1 seleccionada: </h3>
        <input class="form-control" type="text" id="persona1" name="persona1" value="<?php echo $node->getProperty('Nombre'); ?>" readonly><br><br>

        <h3 class="h3 mb-0 text-gray-800"> Persona 2 seleccionada: </h3>
        <input class="form-control" type="text" id="persona2" name="persona2" value="<?php echo $node2->getProperty('Nombre'); ?>" readonly><br><br>

        <h3 class="h3 mb-0 text-gray-800"> Tipo de relación: </h3>                                
        <p>Seleccione el tiempo de relación con la persona:</p>
        <p>Tipo de relación:
        <select name="relacion" id="select" >
            <option value="0">Seleccione:</option>
            <option value="COMO_HERMANO">COMO_HERMANO</option>    
            <option value="COMO_AMIGO">COMO_AMIGO</option>    
            <option value="COMO_PADRE">COMO_PADRE</option>    
            <option value="COMO_MADRE">COMO_MADRE</option> 
            <option value="COMO_SOCIO">COMO_SOCIO</option>     
        </select>
        </p>

        <button class="btn btn-primary">Enviar</button>
 </form>

