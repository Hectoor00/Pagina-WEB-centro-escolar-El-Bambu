<br><br><br>
<link rel="shortcut icon" href="images/photo.jpg">

<img src="uploads/users/<?php echo $user['image'];?>" alt="user-image"  style="width:100px; margin-top: 70px; top:20Px; left:70px; background-image; color:blue; position:absolute; border-radius:0%; box-shadow:0 0 50px 50px ##3e3e3e">
  <link href="css/bootstrap-responsive.css" rel="stylesheet">


  <br><br>
  <br>
 <ul>
  <li>
    <a href="admin.php">
      <i class="glyphicon glyphicon-home"></i>
      <span>Panel de control</span>
    </a>
  </li>
  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-user"></i>
      <span>Usuario</span>
    </a>
    <ul class="nav submenu">
      <li><a href="group.php">Administrar grupos</a> </li>
      <li><a href="users.php">Administrar usuarios</a> </li>
   </ul>
  </li>
  <li>
    <a href="categorie.php" >
      <i class="glyphicon glyphicon-indent-left"></i>
      <span>Categorías</span>
    </a>
  </li>
  <li>
    <a href="proveedores.php" >
      <i class="glyphicon glyphicon-globe"></i>
      <span>Proveedores</span>
    </a>
  </li>
  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-th-large"></i>
      <span>Productos</span>
    </a>
    <ul class="nav submenu">
      <li><a href="product.php">Lista de productos</a> </li>
      <li><a href="add_product.php">Agregar productos</a> </li>

      <li><a href="compra.php">Lista de compras Producto</a> </li>
      <li><a href="add_compra.php">Compra de Productos</a> </li>
      
   </ul>
  </li>
  
  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-th-list"></i>
       <span>Ventas</span>
      </a>
      <ul class="nav submenu">
         <li><a href="sales.php">Lista de  ventas</a> </li>
         <li><a href="add_sale.php">Agregar venta</a> </li>
     </ul>
  </li>
  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-signal"></i>
       <span>Reporte de ventas</span>
      </a>
      <ul class="nav submenu">
        <li><a href="sales_report.php">Ventas por fecha </a></li>
        <li><a href="monthly_sales.php">Ventas mensuales</a></li>
        <li><a href="daily_sales.php">Ventas diarias</a> </li>
      </ul>
  </li>
</ul>


