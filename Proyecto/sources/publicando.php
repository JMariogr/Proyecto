
        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Publicar</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">
           
            <form name="formulario-publica" class="form-horizontal" action="index.php?action=publica" onsubmit="return validatePublicar()" enctype="multipart/form-data" method="POST">
              <fieldset>
                <div id="legend">
                  <legend class="">Publicar Atículo en la web</legend>
                </div>
                <div class="col-lg-12">
                  <div class="col-lg-6">

                    <div class="control-group">
                  <!-- Username -->
                  <label class="control-label"  for="name-product">Nombre</label>
                  <div class="controls">
                    <input type="text" id="name-product" name="name-product" placeholder="" class="input-xlarge">
                    
                  </div>
                </div>
             
                <div class="control-group">
                  <!-- E-mail -->
                  <label class="control-label" for="modelo">Modelo</label>
                  <div class="controls">
                    <input type="text" id="modelo" name="modelo" placeholder="" class="input-xlarge">
                    
                  </div>
                </div>
             
                <div class="control-group">
                  <!-- Password-->
                  <label class="control-label" for="precio">Precio</label>
                  <div class="controls">
                    <input type="number" id="precio" name="precio" placeholder="" class="input-xlarge">
                   
                  </div>
                </div>

                  </div>
                  <div class="col-lg-6">
                    <div class="control-group">
                  <!-- Password -->
                  <label class="control-label" for="descripcion">Descripcion</label>
                  <div class="controls">
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" style="width: 50%;
    margin: 0 auto;"></textarea>
                    
                  </div>
                </div>

                <div class="control-group">
                  <!-- CP -->
                  <label class="control-label"  for="categoria">Categoría</label>
                  <div class="controls">
                    <select name="categoria" id="categoria">
                    <?php 
                    $sentencia = $mi_bd -> prepare('SELECT DISTINCT categoria FROM producto');
                    $sentencia->execute();

                      while ($row = $sentencia -> fetch ()) {
                        $cat = "'" . $row['categoria'] ."'";
                      echo '<option value='.$cat.'>'. $row['categoria'] . '</option>';
                      }
                    ?>
                    </select>
                  </div>
                </div>

                <div class="control-group">
                <label class="control-label"  for="categoria">Imagen</label>
                <div class="controls">

                <input id="uploadFile" placeholder="Choose File" disabled="disabled" />
                  <div class="fileUpload btn btn-primary">

                      <span>Subir Imagen</span>
                      <input id="uploadBtn" name="fileToUpload" id="fileToUpload" type="file" class="upload" />

                  </div>
                  <p> Tamaño recomendado 600x500 px </p>
                  </div>
                </div>
 
                
                  </div>

                </div>

                <!-- Button -->
                  <div class="controls">
                    <button type="submit" class="btn-lg btn-success" style="margin:0 auto;">Publicar</button>
                  </div>

                
              </fieldset>
            </form>

            <div id="error-aviso" style="display:none;" class="alerta">   
             </div>

        </div>
        <!-- /.row -->


<script>
document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
</script>
