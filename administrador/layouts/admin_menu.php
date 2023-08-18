<br><br><br>
<link rel="shortcut icon" href="images/photo.jpg">

<img src="uploads/users/<?php echo $user['image'];?>" alt="user-image"  style="width:100px; margin-top: 70px; top:20Px; left:70px; background-image; color:blue; position:absolute; border-radius:0%; box-shadow:0 0 50px 50px ##3e3e3e">
  <link href="css/bootstrap-responsive.css" rel="stylesheet">


  <br><br>
  <br>
 <ul>
  <!-- <li>
    <a href="admin.php">
      <i class="glyphicon glyphicon-home"></i>
      <span>Panel de control</span>
    </a>
  </li> -->
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
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-th-list"></i>
       <span>Niveles Academicos</span>
      </a>
      <ul class="nav submenu">
         <li><a href="edit_academica.php?id=1">Parvularia</a> </li>
         <li><a href="edit_academica.php?id=2">Primer Ciclo</a> </li>
     </ul>
  </li>
</ul>


