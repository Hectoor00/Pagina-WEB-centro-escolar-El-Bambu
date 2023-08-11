<?php
  $page_title = 'Lista de productos';
  require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
  //  page_require_level(2);
  $parvularia = join_parvularia_table();
?>

<?php include_once('../layouts/header_pages.php'); ?>



<?php foreach ($parvularia as $parvularia):?>
<h2>encargado</h2>
<?php echo remove_junk($parvularia['encargado']); ?>
<?php endforeach; ?>


<?php include_once('../layouts/footer.php'); ?>
    
</body>
</html>