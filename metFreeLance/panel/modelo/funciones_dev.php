<?php
function insertUserDev(){

$usuario = $_POST['usuario'];
$passHash = password_hash($_POST['clave'], PASSWORD_DEFAULT);
$pin=$_POST['pin'];
$ciudad=$_POST['ciudad'];
$correo=$_POST['correo'];
$fecha=$_POST['fecha'];
$lenguaje=$_POST['lenguaje'];
$precio=$_POST['precio'];
$foto=$_FILES['archivo']['name'];
$rol=0;
$conn2=connect();

$stmt = $conn2->prepare("INSERT INTO desarrolladores VALUES (null,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('ssissssiis', $usuario, $passHash, $pin, $ciudad, $correo, $fecha, $lenguaje, $precio,$rol, $foto);
if($stmt->execute()===true){
    $_SESSION['usuario']=$usuario;
    header("Location: me_dev.php");
}else{
    echo $conn2->connect_error;
    echo "Error en la insercion en la Tabla";
   
    
    $conn2=null;
}
$conn2->close();
}
function getNombre($usuario){
    $conn2=connect();    
    $data=-1;
    if($conn2!=null){
    	$stmt = $conn2->prepare("SELECT * FROM desarrolladores WHERE usuario=?");
		$stmt->bind_param('s', $usuario);
	    $stmt->execute();
	    $result=$stmt->get_result();
	    try{
	    	$row=$result->fetch_assoc();
	    }finally{
	    
		    if($result->num_rows>0){
		         $data=$row['usuario'];		
        }
            else{
               
            }
	}
    return $data;
}
}
function getPin($usuario){
    $conn2=connect();    
    $data=-1;
    if($conn2!=null){
    	$stmt = $conn2->prepare("SELECT * FROM desarrolladores WHERE usuario=?");
		$stmt->bind_param('s', $usuario);
	    $stmt->execute();
	    $result=$stmt->get_result();
	    try{
	    	$row=$result->fetch_assoc();
	    }finally{
	    
		    if($result->num_rows>0){
		         $data=$row['pin'];		
        }
            else{
               
            }
	}
    return $data;
}
}

function getCiudad($usuario){
    $conn2=connect();    
    $data=-1;
    if($conn2!=null){
    	$stmt = $conn2->prepare("SELECT * FROM desarrolladores WHERE usuario=?");
		$stmt->bind_param('s', $usuario);
	    $stmt->execute();
	    $result=$stmt->get_result();
	    try{
	    	$row=$result->fetch_assoc();
	    }finally{
	    
		    if($result->num_rows>0){
		         $data=$row['ciudad'];		
        }
            else{
               
            }
	}
    return $data;
}
}
function getPrecio($usuario){
    $conn2=connect();    
    $data=-1;
    if($conn2!=null){
    	$stmt = $conn2->prepare("SELECT * FROM desarrolladores WHERE usuario=?");
		$stmt->bind_param('s', $usuario);
	    $stmt->execute();
	    $result=$stmt->get_result();
	    try{
	    	$row=$result->fetch_assoc();
	    }finally{
	    
		    if($result->num_rows>0){
		         $data=$row['precio'];		
        }
            else{
               
            }
	}
    return $data;
}
}
function getLenguaje($usuario){
    $conn2=connect();    
    $data=-1;
    if($conn2!=null){
    	$stmt = $conn2->prepare("SELECT * FROM desarrolladores WHERE usuario=?");
		$stmt->bind_param('s', $usuario);
	    $stmt->execute();
	    $result=$stmt->get_result();
	    try{
	    	$row=$result->fetch_assoc();
	    }finally{
	    
		    if($result->num_rows>0){
		         $data=$row['lenguaje'];		
        }
            else{
               
            }
	}
    return $data;
}
}
function getCorreo($usuario){
    $conn2=connect();    
    $data=-1;
    if($conn2!=null){
    	$stmt = $conn2->prepare("SELECT * FROM desarrolladores WHERE usuario=?");
		$stmt->bind_param('s', $usuario);
	    $stmt->execute();
	    $result=$stmt->get_result();
	    try{
	    	$row=$result->fetch_assoc();
	    }finally{
	    
		    if($result->num_rows>0){
		         $data=$row['correo'];		
        }
            else{
               
            }
	}
    return $data;
}
}



function setNombreD($usuarioV,$usuarioN){
    $conn2=connect();    
    $stmt = $conn2->prepare("UPDATE desarrolladores SET usuario=? WHERE usuario=?");
    $stmt->bind_param('ss', $usuarioN, $usuarioV);
    $status = $stmt->execute();
  
    if ($status === false) {
      trigger_error($stmt->error, E_USER_ERROR);
    }
   
}
function setPinD($usuarioV,$pin){
    $conn2=connect();    
    $stmt = $conn2->prepare("UPDATE desarrolladores SET pin=? WHERE usuario=?");
    $stmt->bind_param('ss', $pin, $usuarioV);
    $status = $stmt->execute();
  
    if ($status === false) {
      trigger_error($stmt->error, E_USER_ERROR);
    }
    
}
function setFechaD($usuarioV,$fecha){
    $conn2=connect();    
    $stmt = $conn2->prepare("UPDATE desarrolladores SET fecha=? WHERE usuario=?");
    $stmt->bind_param('ss', $fecha, $usuarioV);
    $status = $stmt->execute();
  
    if ($status === false) {
      trigger_error($stmt->error, E_USER_ERROR);
    }
    
}
function setCiudadD($usuarioV,$ciudad){
    $conn2=connect();    
    $stmt = $conn2->prepare("UPDATE desarrolladores SET ciudad=? WHERE usuario=?");
    $stmt->bind_param('ss', $ciudad, $usuarioV);
    $status = $stmt->execute();
  
    if ($status === false) {
      trigger_error($stmt->error, E_USER_ERROR);
    }
    
}
function setCorreoD($usuarioV,$correo){
    $conn2=connect();    
    $stmt = $conn2->prepare("UPDATE desarrolladores SET correo=? WHERE usuario=?");
    $stmt->bind_param('ss', $correo, $usuarioV);
    $status = $stmt->execute();
  
    if ($status === false) {
      trigger_error($stmt->error, E_USER_ERROR);
    }
    
}
function setPrecioD($usuarioV,$precio){
    $conn2=connect();    
    $stmt = $conn2->prepare("UPDATE desarrolladores SET precio=? WHERE usuario=?");
    $stmt->bind_param('ss', $precio, $usuarioV);
    $status = $stmt->execute();
  
    if ($status === false) {
      trigger_error($stmt->error, E_USER_ERROR);
    }
    
}
function setLenguajeD($usuarioV,$lenguaje){
    $conn2=connect();    
    $stmt = $conn2->prepare("UPDATE desarrolladores SET lenguaje=? WHERE usuario=?");
    $stmt->bind_param('ss', $lenguaje, $usuarioV);
    $status = $stmt->execute();
  
    if ($status === false) {
      trigger_error($stmt->error, E_USER_ERROR);
    }
    
}

function UpdatePasswordD($usuario,$passwordN){
    $conn2=connect();    
    $sw=false;
    $passHash = password_hash($passwordN, PASSWORD_DEFAULT);
    $stmt = $conn2->prepare("UPDATE desarrolladores SET pass=? WHERE usuario=?");
    $stmt->bind_param('ss', $passHash, $usuario);
    $status = $stmt->execute();
  
    if ($status === false) {
      trigger_error($stmt->error, E_USER_ERROR);
    }
    else{
        $sw=true;
    }
  return $sw;
}
function getFotoDev($usuario){
    $conn2=connect();    
    $data=-1;
    if($conn2!=null){
        $stmt = $conn2->prepare("SELECT * FROM desarrolladores WHERE usuario=?");
        $stmt->bind_param('s', $usuario);
        $stmt->execute();
        $result=$stmt->get_result();
        try{
            $row=$result->fetch_assoc();
        }finally{
        
            if($result->num_rows>0){
                 $data=$row['foto'];		
        }
            else{
               
            }
    }
    return $data;
}
}

?>