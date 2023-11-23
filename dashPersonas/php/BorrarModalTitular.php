

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $node->getProperty('Cedula'); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">    
                <h4 class="modal-title" id="myModalLabel">Borrar Titular</h4>
              
            </div>
            <div class="modal-body">	
            	<p class="text-center">Está seguro de Borrar Titular: </p>
                <h3 class="text-center"><?php echo $node->getProperty('Nombre');
                                              echo " ";
                                              echo $node->getProperty('Apellido'); ?></h3>
                <p class="text-center">con cédula:</p>
				<h3 class="text-center"><?php echo $node->getProperty('Cedula'); ?></h3>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="borrarTitular.php?id=<?php echo $node->getProperty('Cedula'); ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Sí</a>
            </div>

        </div>
    </div>
</div>


