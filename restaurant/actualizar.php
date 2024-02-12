<?php
    $idProducto = $_POST['idProducto'];
    $idSeccion = $_POST['idSeccion'];
    $nombre = $_POST['nombrePlato'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $urlImagen = $_POST['urlImagen'];
    

   


    $data = file_get_contents("carta.json");
    $products = json_decode($data, true);
     
    foreach ($products as &$product) {
        foreach ($product as &$x) {
            if ($x['idProducto'] == $idProducto && $x['idSeccion'] == $idSeccion) {
                $x['nombrePlato'] = $nombre;
                $x['descripcion'] = $descripcion;
                $x['precio'] = $precio;
                $x['urlImagen'] = $urlImagen;
                echo $x['nombrePlato'];
            }
        }
    }
    
    $json_updated = json_encode($products, JSON_PRETTY_PRINT);
    file_put_contents("carta.json", $json_updated);

    header("Location: /cpanel.php", TRUE, 301);
    exit();
?>