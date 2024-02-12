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

			function getClientes(){
				$conn2=connect();    
				if ($stmt = $conn2->prepare("SELECT id_cliente,usuario,pin,direccion,correo,fecha,rol,foto from clientes")) {
						$stmt->execute();
						
						$stmt->bind_result($id, $usuario, $pin,$direccion,$correo,$fecha,$rol,$foto);
						
						while ($stmt->fetch()) {
							
							printf(" 
							
							
							<tr>
							<th>$id</th>
							<td>$usuario</td>
							<td>$pin</td>
							<td>$direccion</td>
							<td>$correo</td>
							<td>$fecha</td>
							<td>$rol</td>
                            <td>$foto</td>
                            <td><a href='cambiar_cliente.php?user=$usuario'><button class='buttonPe'></button></a></td>
                            <td><a href='borrarC.php?user=$usuario'><button class='buttonPb'></button></a></td>
							</tr>
							
							");
						}
						// Cerramos la sentencia preparada
						$stmt->close();
					}
            }
            function getDevs(){
				$conn2=connect();    
				if ($stmt = $conn2->prepare("SELECT id_dev,usuario,pin,ciudad,correo,lenguaje,precio,rol,foto from desarrolladores")) {
						$stmt->execute();
						
						$stmt->bind_result($id, $usuario, $pin,$ciudad,$correo,$lenguaje,$precio,$rol,$foto);
						
						while ($stmt->fetch()) {
							
							printf(" 
							
							
							<tr>
							<th>$id</th>
							<td>$usuario</td>
							<td>$pin</td>
							<td>$ciudad</td>
							<td>$correo</td>
                            <td>$lenguaje</td>
                            <td>$precio</td>
							<td>$rol</td>
                            <td>$foto</td>
                            <td><a href='cambiar_dev.php?user=$usuario'><button class='buttonPe'></button></a></td>
                            <td><a href='borrarD.php?user=$usuario'><button class='buttonPb'></button></a></td>
							</tr>
							
							");
						}
						// Cerramos la sentencia preparada
						$stmt->close();
					}
            }
            function getMensajes(){
				$conn2=connect();    
				if ($stmt = $conn2->prepare("SELECT id_mensaje,id_cliente,id_dev,asunto,contenido from mensajes")) {
						$stmt->execute();
						
						$stmt->bind_result($id, $idC,$idF,$asunto,$contenido);
						
						while ($stmt->fetch()) {
                            $rem=getUsuarioC($idC);
                            $dest=getUsuarioD($idF);
							printf(" 
							
							
							<tr>
							<th>$id</th>
							<td>$rem</td>
							<td>$dest</td>
							<td>$asunto</td>
							<td>$contenido</td>
							
                            <td><a href='borrarM.php?msg=$id'><button class='buttonPb'></button></a></td>
                            
							</tr>
							
							");
						}
						// Cerramos la sentencia preparada
						$stmt->close();
					}
            }
            function getUsuarioD($id){
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
            function getUsuarioC($id){
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
            
            function getPedidos(){
				$conn2=connect();    
				if ($stmt = $conn2->prepare("SELECT id_pedido,id_cliente,id_dev,fecha,entregado from pedidos")) {
						$stmt->execute();
						
						$stmt->bind_result($id, $idC,$idF,$fecha,$entre);
						
						while ($stmt->fetch()) {
                            $entregado="";
                            if($entre==0){$entregado="No";}else{$entregado="Si";};
                            $rem=getUsuarioC($idC);
                            $dest=getUsuarioD($idF);
							printf(" 
							
							
							<tr>
							<th>$id</th>
							<td>$rem</td>
							<td>$dest</td>
							<td>$fecha</td>
                            <td>$entregado</td>
							
							<td><a href='borrarP.php?pd=$id'><button class='buttonPb'></button></a></td>
							</tr>
							
							");
						}
						// Cerramos la sentencia preparada
						$stmt->close();
					}
			}
			
			function subirFoto($archivo,$tipo,$tamano,$temp){
				
				if (isset($archivo) && $archivo != "") {
		
				  if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
					 echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
					 - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
				  }
				  else {
				
					 if (move_uploaded_file($temp, '../img-users/'.$archivo)) {
					
						 insertUserCliente();
						 header('Location: index.php');
					 }
		   }
	   }
		   }
		   
		   function subirFotoD($archivo,$tipo,$tamano,$temp){
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
				
					 insertUserDev();
					 header('Location: devs.php');
				 }
		}
		}
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

		
		function borrarUserC($usuario){
			$conn2=connect();    
			$stmt = $conn2->prepare("DELETE FROM clientes WHERE  usuario=?");
			$stmt->bind_param('s', $usuario);
			$status = $stmt->execute();
		  
			if ($status === false) {
			  trigger_error($stmt->error, E_USER_ERROR);
			}
			
		}
		function borrarUserD($usuario){
			$conn2=connect();    
			$stmt = $conn2->prepare("DELETE FROM desarrolladores WHERE  usuario=?");
			$stmt->bind_param('s', $usuario);
			$status = $stmt->execute();
		  
			if ($status === false) {
			  trigger_error($stmt->error, E_USER_ERROR);
			}
			
		}
		function borrarMensaje($mensaje){
			$conn2=connect();    
			$stmt = $conn2->prepare("DELETE FROM mensajes WHERE  id_mensaje=?");
			$stmt->bind_param('i', $mensaje);
			$status = $stmt->execute();
		  
			if ($status === false) {
			  trigger_error($stmt->error, E_USER_ERROR);
			}
			
		}
		function borrarPedido($pedido){
			$conn2=connect();    
			$stmt = $conn2->prepare("DELETE FROM pedidos WHERE  id_pedido=?");
			$stmt->bind_param('s', $pedido);
			$status = $stmt->execute();
		  
			if ($status === false) {
			  trigger_error($stmt->error, E_USER_ERROR);
			}
			
		}
?>