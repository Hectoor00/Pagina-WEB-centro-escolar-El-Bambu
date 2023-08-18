<?php
  $page_title = 'Lista de productos';
  require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
  //  page_require_level(2);
  $parvularia = join_parvularia_table();

 // Verificar si se obtuvieron datos
if (!empty($parvularia)) {
  // Supongamos que quieres obtener el valor del campo 'nombre' de la primera fila
  $texto1 = $parvularia[0]['texto1'];
  $texto2 = $parvularia[0]['texto2'];

  $texto1_array=explode("\n", $texto1);
  $texto2_array=explode(",", $texto2);

} else {
  echo "No se encontraron datos en la tabla.";
}
?>

<?php include_once('../layouts/header_pages.php'); ?>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-6">
        <h2>Tercer Ciclo</h2>
        <img src="https://i.ibb.co/NKW3Ydp/IMG-0540.jpg" class="img-responsive" alt="Imagen">
            
            <?php foreach ($parvularia as $parvularia):?>
              <div class="col-md-6">
              <h2>encargado</h2>
              <?php echo remove_junk($parvularia['encargado']); ?>
              </div>
              <?php endforeach; ?>
              <ul class="grid effect" id="grid">
          <li></li> 
        </ul>
            
        </div>
        <div class="col-md-6">
            <!-- <h2>Texto 1</h2> -->
              <?php
                // Mostrar las palabras en forma de lista
                foreach ($texto1_array as $texto1) {
                  echo '<p class="text-justify">' . $texto1 . '</p>';
                }
                ?>
            <h2>Le Ofrecemos</h2>
            <ul class="list-group">
                <?php
                // Mostrar las palabras en forma de lista
                foreach ($texto2_array as $palabra) {
                    echo '<li class="list-group-item">' . $palabra . '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>



<?php include_once('../layouts/footer_pages.php'); ?>
    
</body>
</html>