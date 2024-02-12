<?php

    $idSeccion = $_POST['idSeccion'];
    $nombre = $_POST['nombrePlato'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $urlImagen = $_POST['urlImagen'];
    
    $data = file_get_contents("carta.json");
    $products = json_decode($data, true);
     
    foreach ($products as &$product) {
        foreach($product as &$x){
            if($idSeccion==$x['idSeccion']){
                $indice=[$x['idProducto']];
            }
        }
    }
    $indiceMasAlto = max(($indice));
    

    $nuevoProducto = array(
        'idProducto' => $indiceMasAlto + 1, // Asignar el próximo 'idProducto'
        'idSeccion' => $idSeccion,
        'nombrePlato' => $nombre,
        'descripcion' => $descripcion,
        'precio' => $precio,
        'urlImagen' => $urlImagen
    );
    
    array_push($products[$idSeccion], $nuevoProducto);

    
    // Actualizar el archivo 'carta.json' con el nuevo contenido
    $json_updated = json_encode($products, JSON_PRETTY_PRINT);
    file_put_contents("carta.json", $json_updated);

    header("Location: /cpanel.php", TRUE, 301);
    exit();
?>