<title>Categoria
</title>
<link rel="shortcut icon" href="images/photo.jpg">
 <?php
  $page_title = 'Lista de categorías';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  
  $all_categories = find_all('proveedores')
?>
<?php
 if(isset($_POST['proveedores'])){
   $req_field = array('categorie-name','tipoProveedor');
   validate_fields($req_field);

   $cat_name = remove_junk($db->escape($_POST['categorie-name']));
   $tipo_proveedor = remove_junk($db->escape($_POST['tipoProveedor']));

   if(empty($errors)){
      $sql  = "INSERT INTO proveedores (nombreProveedor,tipoProveedor)";
      $sql .= " VALUES ('{$cat_name}','{$tipo_proveedor}')";
      if($db->query($sql)){
        $session->msg("s", "Proveedor agregado exitosamente.");
        redirect('proveedores.php',false);
      } else {
        $session->msg("d", "Lo siento, registro falló");
        redirect('proveedores.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('proveedores.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>

  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
   <div class="row">
    <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar Proveedor</span>
         </strong>
        </div>
        <div class="panel-body">
          <form method="post" action="proveedores.php">
            <div class="form-group">
                <input type="text" class="form-control" name="categorie-name" placeholder="Nombre de Proveedor" required>
            </div>

            <select class="form-control" name="tipoProveedor">
                      <option value="">Selecciona tipo de Proveedor</option>
                    
                      <option value="nacional">Nacional</option>
                      <option value="extranjero">Extranjero</option>        
            </select>
            <br>          
            <button type="submit" name="proveedores" class="btn btn-primary">Agregar Proveedor</button>
        </form>
        </div>
      </div>
    </div>
    <div class="col-md-7">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Lista de Proveedores</span>
       </strong>
      </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">Codigo</th>
                    <th>Nombre Proveedor</th>
                    <th>Tipo</th>

                    <th class="text-center" style="width: 100px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($all_categories as $cat):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                    <td><?php echo remove_junk(ucfirst($cat['nombreProveedor'])); ?></td>
                    <th><?php echo remove_junk(ucfirst($cat['tipoProveedor'])); ?></th>
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="edit_categorie.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Editar">
                          <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="delete_proveedor.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar">
                          <span class="glyphicon glyphicon-trash"></span>
                        </a>
                      </div>
                    </td>

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
       </div>
    </div>
    </div>
   </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
