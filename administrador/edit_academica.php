<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>

<!-- recivir los datos que queremos  en este caso el id de la tabla parvularia -->
<?php
$product = find_by_id('academica',(int)$_GET['id']);
if(!$product){
    $session->msg("d","Missing Nivel Academico id.");
    redirect('categorie.php');
  }
?>

<!-- actualizamos lo que es los datos que queremos de la tabla parvularia -->
<?php
 if(isset($_POST['academica'])){
    $req_fields = array('encargado','texto1', 'texto2' );
    validate_fields($req_fields);

   if(empty($errors)){
       $encargado  = remove_junk($db->escape($_POST['encargado']));
       $texto1 = remove_junk($db->escape($_POST['texto1']));
       $texto2 =remove_junk($db->escape($_POST['texto2']));
       
    
       $query   = "UPDATE academica SET";
       $query  .=" encargado ='{$encargado}', texto1= '{$texto1}',";
       $query  .=" texto2 ='{$texto2}'";
       $query  .=" WHERE id ='{$product['id']}'";
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"Datos han sido actualizados. ");
                 redirect('home.php', false);
               } else {
                 $session->msg('d',' Lo siento, actualización falló.');
                 redirect('edit_academica.php?id='.$product['id'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('edit_academica.php?id='.$product['id'], false);
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
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Editar Datos Niveles Academicos</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-7">


           <form method="post" action="edit_academica.php?id=<?php echo (int)$product['id'] ?>">
              <div class="form-group">

                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="encargado" value="<?php echo remove_junk($product['encargado']);?>">
                  
                  <br>

               </div>
               <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <textarea lass="form-control" name="texto1" value="<?php echo remove_junk($product['texto1']);?>" cols="70" rows="10"><?php echo remove_junk($product['texto1']);?></textarea>
                  <br>
              </div>

              <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <textarea lass="form-control" name="texto2" value="<?php echo remove_junk($product['texto2']);?>" cols="70" rows="10"><?php echo remove_junk($product['texto2']);?></textarea>
                  <br>
              </div>
            </div>  

              <button type="submit" name="academica" class="btn btn-danger">Actualizar</button>
          </form>
         </div>
        </div>
      </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
