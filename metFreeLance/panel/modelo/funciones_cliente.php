<?php
function insertUserCliente(){

$usuario = $_POST['usuario'];
$passHash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
$pin=$_POST['pin'];
$direccion=$_POST['direccion'];
$correo=$_POST['correo'];
$fecha=$_POST['fecha'];
$foto=$_FILES['archivo']['name'];
$rol=0;
$conn2=connect();

$stmt = $conn2->prepare("INSERT INTO clientes VALUES (null,?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('ssisssis', $usuario, $passHash, $pin, $direccion, $correo, $fecha, $rol, $foto);
if($stmt->execute()===true){
    $_SESSION['usuario']=$usuario;
    header("Location: me_cliente.php");
}else{
    echo $conn2->connect_error;
    echo "Error en la insercion en la Tabla";
    header("Location: login.php");
    
    $conn2=null;
}
$conn2->close();
}

function getNombre($usuario){
    $conn2=connect();    
    $data=-1;
    if($conn2!=null){
    	$stmt = $conn2->prepare("SELECT * FROM clientes WHERE usuario=?");
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
    	$stmt = $conn2->prepare("SELECT * FROM clientes WHERE usuario=?");
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
function getDireccion($usuario){
    $conn2=connect();    
    $data=-1;
    if($conn2!=null){
    	$stmt = $conn2->prepare("SELECT * FROM clientes WHERE usuario=?");
		$stmt->bind_param('s', $usuario);
	    $stmt->execute();
	    $result=$stmt->get_result();
	    try{
	    	$row=$result->fetch_assoc();
	    }finally{
	    
		    if($result->num_rows>0){
		         $data=$row['direccion'];		
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
    	$stmt = $conn2->prepare("SELECT * FROM clientes WHERE usuario=?");
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
function getFecha($usuario){
    $conn2=connect();    
    $data=-1;
    if($conn2!=null){
    	$stmt = $conn2->prepare("SELECT * FROM clientes WHERE usuario=?");
		$stmt->bind_param('s', $usuario);
	    $stmt->execute();
	    $result=$stmt->get_result();
	    try{
	    	$row=$result->fetch_assoc();
	    }finally{
	    
		    if($result->num_rows>0){
		         $data=$row['fecha'];		
        }
            else{
               
            }
	}
    return $data;
}
}
function setNombreC($usuarioV,$usuarioN){
    $conn2=connect();    
    $stmt = $conn2->prepare("UPDATE clientes SET usuario=? WHERE usuario=?");
    $stmt->bind_param('ss', $usuarioN, $usuarioV);
    $status = $stmt->execute();
  
    if ($status === false) {
        echo "EEEERROR";
      trigger_error($stmt->error, E_USER_ERROR);
    }
   
}
function setPinC($usuarioV,$pin){
    $conn2=connect();    
    $stmt = $conn2->prepare("UPDATE clientes SET pin=? WHERE usuario=?");
    $stmt->bind_param('ss', $pin, $usuarioV);
    $status = $stmt->execute();
  
    if ($status === false) {
      trigger_error($stmt->error, E_USER_ERROR);
    }
    
}
function setFechaC($usuarioV,$fecha){
    $conn2=connect();    
    $stmt = $conn2->prepare("UPDATE clientes SET fecha=? WHERE usuario=?");
    $stmt->bind_param('ss', $fecha, $usuarioV);
    $status = $stmt->execute();
  
    if ($status === false) {
      trigger_error($stmt->error, E_USER_ERROR);
    }
    
}
function setDireccionC($usuarioV,$direccion){
    $conn2=connect();    
    $stmt = $conn2->prepare("UPDATE clientes SET direccion=? WHERE usuario=?");
    $stmt->bind_param('ss', $direccion, $usuarioV);
    $status = $stmt->execute();
  
    if ($status === false) {
      trigger_error($stmt->error, E_USER_ERROR);
    }
    
}
function setCorreoC($usuarioV,$correo){
    $conn2=connect();    
    $stmt = $conn2->prepare("UPDATE clientes SET correo=? WHERE usuario=?");
    $stmt->bind_param('ss', $correo, $usuarioV);
    $status = $stmt->execute();
  
    if ($status === false) {
      trigger_error($stmt->error, E_USER_ERROR);
    }
    
}

function UpdatePasswordC($usuario,$passwordN){
    $conn2=connect();    
    $sw=false;
    $passHash = password_hash($passwordN, PASSWORD_DEFAULT);
    $stmt = $conn2->prepare("UPDATE clientes SET pass=? WHERE usuario=?");
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
function getFotoCliente($usuario){
    $conn2=connect();    
    $data=-1;
    if($conn2!=null){
        $stmt = $conn2->prepare("SELECT * FROM clientes WHERE usuario=?");
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