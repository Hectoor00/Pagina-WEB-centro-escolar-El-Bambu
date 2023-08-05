<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $proveedor =  find_by_id('proveedores',(int)$_GET['id']);
  if(!$proveedor){
    $session->msg("d","ID del Proveedor falta.");
    redirect('proveedores.php');
  }
?>
<?php
  $delete_id = delete_by_id('proveedores',(int)$proveedor['id']);
  if($delete_id){
      $session->msg("s","Proveedor eliminado");
      redirect('proveedores.php');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('proveedores.php');
  }
?>