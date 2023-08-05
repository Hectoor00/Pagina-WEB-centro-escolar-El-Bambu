<?php
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>

<?php
 // Auto suggetion
    $html = '';
   if(isset($_POST['product_name']) && strlen($_POST['product_name']))

    
   {
     $products = find_product_by_title($_POST['product_name']);
     if($products){
         

        foreach ($products as $product):
           $html .= "<li class=\"list-group-item\">";
           $html .= $product['name'];
           $html .= "</li>";
         endforeach;
      } else {

        $html .= '<li onClick=\"fill(\''.addslashes().'\')\" class=\"list-group-item\">';
        $html .= 'No encontrado';
        $html .= "</li>";

      }

      echo json_encode($html);
   }
  
 ?>
 <?php


 // find all product
  if(isset($_POST['p_name']) && strlen($_POST['p_name']))
  {
    $product_title = remove_junk($db->escape($_POST['p_name']));
    if($results = find_all_product_info_by_title($product_title)){
        foreach ($results as $result) {

          $numeroCliente = mt_rand(1, 999999);

          $precio = $result['sale_price'];

          $html .= "<tr>";

          $html  .= "<td>";
          $html  .= "<input type=\"text\" class=\"form-control\" name=\"cliente\" value=\"".$numeroCliente."\">";
          $html  .= "</td>";


          $html .= "<td id=\"s_name\">".$result['name']."</td>";
          $html .= "<input type=\"hidden\" name=\"s_id\" value=\"{$result['id']}\">";

        

          $html  .= "<td>";
          $html  .= "<input type=\"text\" id=\"precio1\" class=\"form-control\" name=\"price\" value=\"{$result['sale_price']}\">";
          $html  .= "</td>";
          $html .= "<td id=\"s_qty\">";
          $html .= "<input type=\"text\" class=\"form-control\" name=\"quantity\" value=\"1\">";
          $html  .= "</td>";
          $html  .= "<td>";
          $html  .= "<input type=\"text\" class=\"form-control\" name=\"total\" value=\"{$result['sale_price']}\">";
          $html  .= "</td>";
          $html  .= "<td>";
          $html  .= "<button type=\"submit\" name=\"add_sale\" class=\"btn btn-primary\">Agregar</button> <br>";


          
          $html .= "<form action=\"generar_pdf.php\" method=\"POST\" target=\"_blank\">";
          $html .= "<input type=\"hidden\" name=\"cliente\" value=\"" . $numeroCliente . "\">";
          $html .=  "<input type=\"hidden\" name=\"s_name\" value=\"{$result['name']}\">";
          $html .= "<input type=\"hidden\"  name=\"s_id\" value=\"{$result['id']}\">";
          $html .= "<input type=\"hidden\" id=\"precio2\" name=\"price\" value=\"{$result['sale_price']}\">";
          $html .= "<input type=\"hidden\" name=\"quantity\" value=\"1\">";
          $html .= "<input type=\"hidden\" name=\"total\" value=\"{$result['sale_price']}\">";
          $html .= "<button type=\"submit\" name=\"add_sale_pdf\" class=\"btn btn-primary\">Factura</button>";
          $html .= "</form>";
          $html  .= "</td>";
          $html  .= "</tr>";

        }
    } else {
        $html ='<tr><td>El producto no se encuentra registrado en la base de datos</td></tr>';
    }

    echo json_encode($html);
  }
 ?>



