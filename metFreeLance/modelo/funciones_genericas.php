<?php

function connect(){
	// Datos para conectar a la base de datos.
	$nombreServidor = "localhost";
	$nombreUsuario = "root";
	$passwordBaseDeDatos = "";
	$nombreBaseDeDatos = "proyecto";
	
// Crear conexi�n con la base de datos.
$conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);

if($conn->connect_error){
$conn->close();
$conn=null;
}

return $conn;
}
function comprobar_rol($usuario){
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
		   $data=$row['rol'];		
  }
	  else{
		  $stmt = $conn2->prepare("SELECT * FROM clientes WHERE usuario=?");
		  $stmt->bind_param('s', $usuario);
		  $stmt->execute();
		  $result=$stmt->get_result();
		  try{
			  $row=$result->fetch_assoc();
		  }finally{
		  
			  if($result->num_rows>0){
				   $data=$row['rol'];		
		  } 
	  }
}
return $data;
}
}
}
function checkUsuarioDev($usuario,$pass){
    $conn2=connect();    
    $data=false;
    if($conn2!=null){
    	$stmt = $conn2->prepare("SELECT * FROM desarrolladores WHERE usuario=?");
		$stmt->bind_param('s', $usuario);
	    $stmt->execute();
	    $result=$stmt->get_result();
	    try{
	    	$row=$result->fetch_assoc();
	    }finally{
	    
		    if($result->num_rows>0){
		    	if(password_verify($pass, $row['pass'])){
		    		$data=true;
                }
             
	    	}else{
	    		
	    	}
	    	$conn2->close();
    	}
	}
    return $data;

	}

		function checkUsuarioSolo($usuario){
			$conn2=connect();    
			$data=false;
			if($conn2!=null){
				$stmt = $conn2->prepare("SELECT * FROM desarrolladores WHERE usuario=?");
				$stmt->bind_param('s', $usuario);
				$stmt->execute();
				$result=$stmt->get_result();
				try{
					$row=$result->fetch_assoc();
				}finally{
				
					if($result->num_rows>0){
						
							$data=true;
						
					 
					}else{
						$stmt = $conn2->prepare("SELECT * FROM clientes WHERE usuario=?");
				$stmt->bind_param('s', $usuario);
				$stmt->execute();
				$result=$stmt->get_result();
				try{
					$row=$result->fetch_assoc();
				}finally{
				
					if($result->num_rows>0){
						
							$data=true;
						
					 
					}
					
					}
					$conn2->close();
				}
			}
			return $data;
		
			}
		}
		function checkCorreo($correo){
			$conn2=connect();    
			$data=false;
			if($conn2!=null){
				$stmt = $conn2->prepare("SELECT * FROM desarrolladores WHERE correo=?");
				$stmt->bind_param('s', $correo);
				$stmt->execute();
				$result=$stmt->get_result();
				try{
					$row=$result->fetch_assoc();
				}finally{
				
					if($result->num_rows>0){
						
							$data=true;
						
					 
					}else{
						$stmt = $conn2->prepare("SELECT * FROM clientes WHERE correo=?");
				$stmt->bind_param('s', $correo);
				$stmt->execute();
				$result=$stmt->get_result();
				try{
					$row=$result->fetch_assoc();
				}finally{
				
					if($result->num_rows>0){
						
							$data=true;
						
					 
					}
					
					}
					$conn2->close();
				}
			}
			return $data;
		
			}
		}

function checkUsuarioCliente($usuario,$pass){
    $conn2=connect();    
    $data=false;
    if($conn2!=null){
    	$stmt = $conn2->prepare("SELECT * FROM clientes WHERE usuario=?");
		$stmt->bind_param('s', $usuario);
	    $stmt->execute();
	    $result=$stmt->get_result();
	    try{
	    	$row=$result->fetch_assoc();
	    }finally{
	    
		    if($result->num_rows>0){
		    	if(password_verify($pass, $row['pass'])){
		    		$data=true;
                }
             
	    	}else{
	    		
	    	}
	    	$conn2->close();
    	}
	}
    return $data;
}



function checkPinC($usuario,$pin){
    $conn2=connect();    
    $data=false;
    if($conn2!=null){
    	$stmt = $conn2->prepare("SELECT * FROM clientes WHERE usuario=? AND pin=?");
		$stmt->bind_param('si', $usuario, $pin);
	    $stmt->execute();
	    $result=$stmt->get_result();
	    try{
	    	$row=$result->fetch_assoc();
	    }finally{
	    
		    if($result->num_rows>0){
		    
		    		$data=true;
                
             
	    	}
	    		
	    	$conn2->close();
    	}
	}
    return $data;
}
    
function checkPinD($usuario,$pin){
    $conn2=connect();    
    $data=false;
    if($conn2!=null){
    	$stmt = $conn2->prepare("SELECT * FROM desarrolladores WHERE usuario=? AND pin=?");
		$stmt->bind_param('si', $usuario, $pin);
	    $stmt->execute();
	    $result=$stmt->get_result();
	    try{
	    	$row=$result->fetch_assoc();
	    }finally{
	    
		    if($result->num_rows>0){
		    
		    		$data=true;
                
             
	    	}
	    	$conn2->close();
    	}
	}
    return $data;
}
    function busquedaRandom(){
		$conn2=connect();    
		if ($stmt = $conn2->prepare("SELECT id_dev, usuario, foto FROM desarrolladores ORDER BY RAND() LIMIT 0,4")) {
				$stmt->execute();
				
				$stmt->bind_result($id, $usuario, $foto);
				
				while ($stmt->fetch()) {
					
					printf(" 
					
					<div class='info-pers'>
					<a href='perfil.php?id=$id' value='$id'>
					<img src='/img-users/$foto'>
					<h4>$usuario</h4>
					</a>
					</div>
					
					");
				}
				// Cerramos la sentencia preparada
				$stmt->close();
			}
	}
	function busquedaRandom2(){
		$conn2=connect();    
		if ($stmt = $conn2->prepare("SELECT id_dev, usuario, foto FROM desarrolladores ORDER BY RAND() LIMIT 0,4")) {
				$stmt->execute();
				
				$stmt->bind_result($id, $usuario, $foto);
				
				while ($stmt->fetch()) {
					
					printf(" 
					
					<div class='info-pers'>
					<a href='vista/perfil.php?id=$id' value='$id'>
					<img src='/img-users/$foto'>
					<h4>$usuario</h4>
					</a>
					</div>
					
					");
				}
				// Cerramos la sentencia preparada
				$stmt->close();
			}
	}
/***************OBTENCION DE DATOS POR ID************************* */

	function getCiudadId($id){
		$conn2=connect();    
		$data=-1;
		if($conn2!=null){
			$stmt = $conn2->prepare("SELECT * FROM desarrolladores WHERE id_dev=?");
			$stmt->bind_param('s', $id);
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
	function getPrecioId($id){
		$conn2=connect();    
		$data=-1;
		if($conn2!=null){
			$stmt = $conn2->prepare("SELECT * FROM desarrolladores WHERE id_dev=?");
			$stmt->bind_param('s', $id);
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
	function getLenguajeId($id){
		$conn2=connect();    
		$data=-1;
		if($conn2!=null){
			$stmt = $conn2->prepare("SELECT * FROM desarrolladores WHERE id_dev=?");
			$stmt->bind_param('s', $id);
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
	function getFechaId($id){
		$conn2=connect();    
		$data=-1;
		if($conn2!=null){
			$stmt = $conn2->prepare("SELECT * FROM desarrolladores WHERE id_dev=?");
			$stmt->bind_param('s', $id);
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
	function getNombreId($id){
		$conn2=connect();    
		$data=-1;
		if($conn2!=null){
			$stmt = $conn2->prepare("SELECT * FROM desarrolladores WHERE id_dev=?");
			$stmt->bind_param('s', $id);
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
	function getFotoId($id){
		$conn2=connect();    
		$data=-1;
		if($conn2!=null){
			$stmt = $conn2->prepare("SELECT * FROM desarrolladores WHERE id_dev=?");
			$stmt->bind_param('s', $id);
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
	function getFotoIdC($id){
		$conn2=connect();    
		$data=-1;
		if($conn2!=null){
			$stmt = $conn2->prepare("SELECT * FROM clientes WHERE id_cliente=?");
			$stmt->bind_param('i', $id);
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

	function busquedaCiudad($ciudad){
		$conn2=connect();    
		if ($stmt = $conn2->prepare("SELECT id_dev, usuario, foto FROM desarrolladores where ciudad='$ciudad'")) {
				$stmt->execute();
				
				$stmt->bind_result($id, $usuario, $foto);
				
				while ($stmt->fetch()) {
					
					printf(" 
					<div class='busqueda'> 
					<div class='info-perf'>
							
								<img src='/img-users/$foto'>
								<h4>$usuario</h4>
								<a href='perfil.php?id=$id'><button type='button' class='button-perf'>Ver Perfil</button></a>
								   
					</div>
		  </div>
					
					
					");
				}
				// Cerramos la sentencia preparada
				$stmt->close();
			}
	}

	function subirFoto($archivo,$tipo,$tamano,$temp){
		 //Recogemos el archivo enviado por el formulario
		
		 //Si el archivo contiene algo y es diferente de vacio
		 if (isset($archivo) && $archivo != "") {
			//Obtenemos algunos datos necesarios sobre el archivo
			
			//Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
		   if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
			  echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
			  - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
		   }
		   else {
			  //Si la imagen es correcta en tamaño y tipo
			  //Se intenta subir al servidor
			  if (move_uploaded_file($temp, '../img-users/'.$archivo)) {

				 
				  insertUserCliente();
				  
			  }
	}
}
	}


	
	function busquedaSearcher($ciudad, $precio, $lenguaje){
		$conn2=connect();    
		if ($stmt = $conn2->prepare("SELECT id_dev, usuario, foto FROM desarrolladores where ciudad='$ciudad' AND precio='$precio' AND lenguaje='$lenguaje'")) {
				$stmt->execute();
				
				$stmt->bind_result($id, $usuario, $foto);
				
				while ($stmt->fetch()) {
					
					printf(" 
					<div class='busqueda'> 
					<div class='info-perf'>
							
								<img src='/img-users/$foto'>
								<h4>$usuario</h4>
								<a href='vista/perfil.php?id=$id'><button type='button' class='button-perf'>Ver Perfil</button></a>
								   
					</div>
		  </div>
					
					
					");
				}
				// Cerramos la sentencia preparada
				$stmt->close();
			}
	}

	function pedido($cliente,$dev,$fecha){

		
		$rol=0;
		$conn2=connect();
		
		$stmt = $conn2->prepare("INSERT INTO pedidos VALUES (null,?, ?, ?,0)");
		$stmt->bind_param('sss', $cliente, $dev, $fecha);
		if($stmt->execute()===true){
			echo '<script language="javascript">alert("Pedido realizado correctamente");</script>';
			header("Location: /perfil.php?id=$dev");
		}else{
			echo $conn2->connect_error;
			echo '<script language="javascript">alert("No pudo realizarse el pedido");</script>';
		   
			
			$conn2=null;
		}
		$conn2->close();
		}
		function getUsuarioId($usuario){
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
						 $data=$row['id_cliente'];		
				}
					else{
					   
					}
			}
			return $data;
		}
		}
		function enviarMensaje($cliente,$dev,$asunto,$contenido){

		
			$rol=0;
			$conn2=connect();
			
			$stmt = $conn2->prepare("INSERT INTO mensajes VALUES (null,?, ?, ?,?)");
			$stmt->bind_param('ssss', $cliente, $dev, $asunto,$contenido);
			if($stmt->execute()===true){
				echo '<script language="javascript">alert("Mensaje enviado correctamente");</script>';
				header("Location: /perfil.php?id=$dev");
			}else{
				echo $conn2->connect_error;
				echo '<script language="javascript">alert("No pudo enviarse el mensaje");</script>';
			   
				
				$conn2=null;
			}
			$conn2->close();
			}

			function getMensajeC($usuario){
				$conn2=connect(); 
				$id=getUsuarioId($usuario);

				if ($stmt = $conn2->prepare("SELECT id_cliente, asunto, contenido FROM mensajes where id_dev='$id'")) {
						$stmt->execute();
						
						$stmt->bind_result($id2, $asunto, $mensaje);
						
						while ($stmt->fetch()) {
							$nombre=getUsuarioById($id2);
							$foto=getFotoIdC($id2);
							printf(" 
					<div class='busqueda'> 
					<div class='info-perf'>
							
								<img src='/img-users/$foto'>
								<h4>$nombre</h4>
								<p>Asunto: $asunto<br>
								Mensaje: $mensaje</p> 
					</div>
		  </div>
					
					
					");
						
						}
						// Cerramos la sentencia preparada
						$stmt->close();
					}else{
						printf("error");
					}
			}
			
			function getMensaje($usuario){
				$conn2=connect(); 
				$id=getUsuarioIdDev($usuario);

				if ($stmt = $conn2->prepare("SELECT id_dev, asunto, contenido FROM mensajes where id_cliente='$id'")) {
						$stmt->execute();
						
						$stmt->bind_result($id2, $asunto, $mensaje);
						
						while ($stmt->fetch()) {
							$nombre=getUsuarioByIdDev($id2);
							$foto=getFotoId($id2);
							printf(" 
					<div class='busqueda'> 
					<div class='info-perf'>
							
								<img src='/img-users/$foto'>
								<h4>$nombre</h4>
								<p>Asunto: $asunto<br>
								Mensaje: $mensaje</p> 
					</div>
		  </div>
					
					
					");
						
						}
						// Cerramos la sentencia preparada
						$stmt->close();
					}else{
						printf("error");
					}
			}
			function getUsuarioById($id){
				$conn2=connect();    
				$data=-1;
				if($conn2!=null){
					$stmt = $conn2->prepare("SELECT * FROM clientes WHERE id_cliente=?");
					$stmt->bind_param('i', $id);
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
			function getUsuarioByIdDev($id){
				$conn2=connect();    
				$data=-1;
				if($conn2!=null){
					$stmt = $conn2->prepare("SELECT * FROM desarrolladores WHERE id_dev=?");
					$stmt->bind_param('i', $id);
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
			function getUsuarioIdDev($usuario){
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
							 $data=$row['id_dev'];		
					}
						else{
						   
						}
				}
				return $data;
			}
			}
			function busquedaRandomIndex(){
				$conn2=connect();    
				if ($stmt = $conn2->prepare("SELECT id_dev, usuario, foto FROM desarrolladores ORDER BY RAND() LIMIT 0,4")) {
						$stmt->execute();
						
						$stmt->bind_result($id, $usuario, $foto);
						
						while ($stmt->fetch()) {
							
							printf(" 
							
							<div class='info-pers'>
							<a href='perfil.php?id=$id' value='$id'>
							<img src='img-users/$foto'>
							<h4>$usuario</h4>
							</a>
							</div>
							
							");
						}
						// Cerramos la sentencia preparada
						$stmt->close();
					}
			}

			function menuOut(){
				return "<a href='index.php'>Inicio</a>
				<a href='vista/login.php'>Login</a>
				<a href='vista/pre-registro.php'>Registrate</a>
				<a href='vista/contacto.php'>Contacto</a>";
			}
			function menuOut2(){
				return "<a href='../index.php'>Inicio</a>
				<a href='login.php'>Login</a>
				<a href='pre-registro.php'>Registrate</a>
				<a href='contacto.php'>Contacto</a>";
			}
			

			function getPedido($usuario){
				$conn2=connect(); 
				$id=getUsuarioIdDev($usuario);

				if ($stmt = $conn2->prepare("SELECT id_cliente, fecha, entregado FROM pedidos where id_dev='$id'")) {
						$stmt->execute();
						
						$stmt->bind_result($id2, $fecha, $entregado);
						
						while ($stmt->fetch()) {
							$nombre=getUsuarioById($id2);
							$foto=getFotoIdC($id2);
							printf(" 
					<div class='busqueda'> 
					<div class='info-perf'>
							
								<img src='/img-users/$foto'>
								<h4>$nombre</h4>
								<p>Fecha Limite: $fecha<br></p> 
					</div>
		  </div>
					
					
					");
						
						}
						// Cerramos la sentencia preparada
						$stmt->close();
					}else{
						printf("error");
					}
			}



			function checkUsuarioMenu($usuario){
				$conn2=connect();    
				if($conn2!=null){
					$stmt = $conn2->prepare("SELECT * FROM desarrolladores WHERE usuario=?");
					$stmt->bind_param('s', $usuario);
					$stmt->execute();
					$result=$stmt->get_result();
					try{
						$row=$result->fetch_assoc();
					}finally{
					
						if($result->num_rows>0){
							
							return "<a href='../index.php'>Inicio</a>
							<a href='vista/me_dev.php'>Mis datos</a>
							<a href='vista/cambiar_dev.php'>Cambiar datos</a>
							<a href='vista/me_pedidos.php'>Mis Pedidos</a>
							<a href='vista/me_mensajes.php'>Mis Mensajes</a>
							<a href='vista/contacto.php'>Contacto</a>
							<a href='vista/logout.php'>Salir</a>";
							
						 
						}else {
							$stmt = $conn2->prepare("SELECT * FROM clientes WHERE usuario=?");
					$stmt->bind_param('s', $usuario);
					$stmt->execute();
					$result=$stmt->get_result();
					try{
						$row=$result->fetch_assoc();
					}finally{
					
						if($result->num_rows>0){
							
						return "<a href='../index.php'>Inicio</a>
						<a href='vista/me_cliente.php'>Mis datos</a>
						<a href='vista/cambiar_cliente.php'>Cambiar datos</a>
						<a href='vista/me_mensajesc.php'>Mis Mensajes</a>
						<a href='vista/contacto.php'>Contacto</a>
						<a href='vista/logout.php'>Salir</a>";
							
						 
						}
						
						}
						$conn2->close();
					}
				}
			
				}
			}

?>