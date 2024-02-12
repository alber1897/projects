<?php
    $idProducto=$_POST['idProducto'];
    $idSeccion = $_POST['idSeccion'];
    
    $data = file_get_contents("carta.json");
    $products = json_decode($data, true);
     
    foreach ($products as &$product) {
        foreach($product as &$x){
            if($idSeccion==$x['idSeccion']){
                $indice=[$x['idProducto']];
            }
        }
    }


     unset($products[$idSeccion][$idProducto-1]);

    
    // Actualizar el archivo 'carta.json' con el nuevo contenido
    $json_updated = json_encode($products, JSON_PRETTY_PRINT);
    file_put_contents("carta.json", $json_updated);

    header("Location: /cpanel.php", TRUE, 301);
    exit();
?>