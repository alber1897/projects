
let editar=[...document.querySelectorAll(".productos tbody") ];
function ajustarBody(seccion){
  
  for(let i=0;i<editar.length;i++){
    
    if(editar[i].className.slice(6)==seccion.className.slice(7).toLowerCase()){
      editar[i].style.display="table-row-group";
      
    }else{
      editar[i].style.display="none";
      
    }
    
  }
}


function ajustarInicio(){
    for(let i=0;i<editar.length;i++){
        if(editar[i].className.slice(6)!="entrantes"){
            editar[i].style.display="none";
        }
    }
}
ajustarInicio();


//FUNCION LISTADO DE PRODUCTOS A EDITAR
async function cambioProductos() {
  try {
    const response = await fetch("carta.json",{cache: 'no-cache'});
    const datos = await response.json();

    const secciones = Object.keys(datos);

    secciones.forEach((seccion) => {
      datos[seccion].forEach((element) => {
        let introducir = document.querySelector(".editar" + seccion); // Usa el nombre de la sección como clase


        let tr=document.createElement("TR");
        introducir.appendChild(tr);

        let nombre=document.createElement("TD");
        nombre.textContent=element.nombrePlato;
        tr.appendChild(nombre);

        let descripcion=document.createElement("TD");
        descripcion.textContent=element.descripcion;
        tr.appendChild(descripcion);

        let precio=document.createElement("TD");
        precio.textContent=element.precio;
        tr.appendChild(precio);

        let url=document.createElement("TD");
        url.textContent=element.urlImagen;
        tr.appendChild(url);

        let editar=document.createElement("TD");
        editar.classList.add("acciones");
        tr.appendChild(editar);

        let botonEditar=document.createElement("A");
        botonEditar.classList.add("edit-btn");
        botonEditar.setAttribute("id",element.nombrePlato);
        botonEditar.textContent="Editar";
        editar.appendChild(botonEditar);

        let botonEliminar=document.createElement("A");
        botonEliminar.classList.add("remove-btn");
        botonEliminar.setAttribute("id",element.nombrePlato);
        botonEliminar.textContent="Eliminar";
        editar.appendChild(botonEliminar);

        let botonAñadir=document.createElement("A");
        botonAñadir.classList.add("add-btn");
        botonAñadir.setAttribute("id",element.nombrePlato);
        botonAñadir.textContent="Añadir";
        editar.appendChild(botonAñadir);

      });
    });

 
  } catch (error) {
    console.error('Error al cargar los datos:', error);
  }
}
cambioProductos(); 


//FUNCION SACAR DESPLEGABLE PARA EDITAR PRODUCTOS
function modificar(plato){
  
  fetch("carta.json").then(response=>{return response.json();}).
    then(datos=>{
      let secciones=Object.keys(datos);

      secciones.forEach(s=>{
        datos[s].forEach(element=>{
         
          if(plato==element.nombrePlato){
            let tabla=document.querySelector(".productos");
            
            
            let form=document.createElement("FORM");
            form.setAttribute("id","miFormulario")
            form.setAttribute("method","post")
            form.setAttribute("action","actualizar.php")
            tabla.appendChild(form);

            //CREAMOS CAMPO ID PRODUCTO A EDITAR
            let labelId=document.createElement("LABEL");
            labelId.setAttribute("for","producto");
            labelId.textContent="Id Producto: ";
            form.appendChild(labelId);
            


            let inputId=document.createElement("INPUT");
            inputId.setAttribute("type","text");
            inputId.setAttribute("id","producto")
            inputId.setAttribute("name","idProducto");
            inputId.setAttribute("readonly",true);
            inputId.setAttribute("value",element.idProducto);
            form.appendChild(inputId);

           //CREAMOS CAMPO ID PRODUCTO A EDITAR
            let labelSeccion=document.createElement("LABEL");
            labelSeccion.setAttribute("for","seccion");
            labelSeccion.textContent="Id Seccion: ";
            form.appendChild(labelSeccion);
            


            let inputSeccion=document.createElement("INPUT");
            inputSeccion.setAttribute("type","text");
            inputSeccion.setAttribute("id","seccion")
            inputSeccion.setAttribute("name","idSeccion")
            inputSeccion.setAttribute("readonly",true);
            inputSeccion.setAttribute("value",element.idSeccion);
            form.appendChild(inputSeccion);


            //CREAMOS CAMPO NOMBRE A EDITAR
            let labelN=document.createElement("LABEL");
            labelN.setAttribute("for","plato");
            labelN.textContent="Nombre del Plato: ";
            form.appendChild(labelN);
            


            let inputN=document.createElement("INPUT");
            inputN.setAttribute("type","text");
            inputN.setAttribute("id","plato");
            inputN.setAttribute("name","nombrePlato")
            inputN.setAttribute("value",plato);
            form.appendChild(inputN);
            

            //CREAMOS CAMPO DESCRIPCION A EDITAR
            let labelD=document.createElement("LABEL");
            labelD.setAttribute("for","descripcion");
            labelD.textContent="Descripcion: ";
            form.appendChild(labelD);
            

            let inputD=document.createElement("INPUT");
            inputD.setAttribute("type","text");
            inputD.setAttribute("id","descripcion");
            inputD.setAttribute("name","descripcion")
            inputD.setAttribute("value",element.descripcion);
            form.appendChild(inputD)

            //CREAMOS CAMPO PRECIO A EDITAR
            let labelP=document.createElement("LABEL");
            labelP.setAttribute("for","precio");
            labelP.textContent="Precio: ";
            form.appendChild(labelP)

            let inputP=document.createElement("INPUT");
            inputP.setAttribute("type","text");
            inputP.setAttribute("id","precio");
            inputP.setAttribute("name","precio")
            inputP.setAttribute("value",element.precio);
            form.appendChild(inputP)

           
            //CREAMOS IMAGEN NOMBRE A EDITAR
            let labelI=document.createElement("LABEL");
            labelI.setAttribute("for","imagen");
            labelI.textContent="Imagen: ";
            form.appendChild(labelI)

            let inputI=document.createElement("INPUT");
            inputI.setAttribute("type","text");
            inputI.setAttribute("id","imagen");
            inputI.setAttribute("name","urlImagen")
            inputI.setAttribute("value",element.urlImagen);
            form.appendChild(inputI)


            //CREAMOS BOTON SUBMIT

            let inputS=document.createElement("INPUT");
            inputS.setAttribute("type","submit");
            inputS.setAttribute("value","Modificar");
            inputS.setAttribute("id","recogerDatos")
            form.appendChild(inputS)
           
          }
          
        })
      })
    })
}

//FUNCION SACAR DESPLEGABLE PARA ELIMINAR PRODUCTOS
function eliminar(plato){
  
  fetch("carta.json").then(response=>{return response.json();}).
    then(datos=>{
      let secciones=Object.keys(datos);

      secciones.forEach(s=>{
        datos[s].forEach(element=>{
         
          if(plato==element.nombrePlato){
            let tabla=document.querySelector(".productos");
            
            
            let form=document.createElement("FORM");
            form.setAttribute("id","miFormulario")
            form.setAttribute("method","post")
            form.setAttribute("action","eliminar.php")
            tabla.appendChild(form);

            //CREAMOS CAMPO ID PRODUCTO A EDITAR
            let labelId=document.createElement("LABEL");
            labelId.setAttribute("for","producto");
            labelId.textContent="Id Producto: ";
            form.appendChild(labelId);
            


            let inputId=document.createElement("INPUT");
            inputId.setAttribute("type","text");
            inputId.setAttribute("id","producto")
            inputId.setAttribute("name","idProducto");
            inputId.setAttribute("readonly",true);
            inputId.setAttribute("value",element.idProducto);
            form.appendChild(inputId);

           //CREAMOS CAMPO ID PRODUCTO A EDITAR
            let labelSeccion=document.createElement("LABEL");
            labelSeccion.setAttribute("for","seccion");
            labelSeccion.textContent="Id Seccion: ";
            form.appendChild(labelSeccion);
            


            let inputSeccion=document.createElement("INPUT");
            inputSeccion.setAttribute("type","text");
            inputSeccion.setAttribute("id","seccion")
            inputSeccion.setAttribute("name","idSeccion")
            inputSeccion.setAttribute("readonly",true);
            inputSeccion.setAttribute("value",element.idSeccion);
            form.appendChild(inputSeccion);


            //CREAMOS CAMPO NOMBRE A EDITAR
            let labelN=document.createElement("LABEL");
            labelN.setAttribute("for","plato");
            labelN.textContent="Nombre del Plato: ";
            form.appendChild(labelN);
            


            let inputN=document.createElement("INPUT");
            inputN.setAttribute("type","text");
            inputN.setAttribute("id","plato");
            inputN.setAttribute("name","nombrePlato")
            inputN.setAttribute("readonly",true);
            inputN.setAttribute("value",plato);
            form.appendChild(inputN);
            

            //CREAMOS CAMPO DESCRIPCION A EDITAR
            let labelD=document.createElement("LABEL");
            labelD.setAttribute("for","descripcion");
            labelD.textContent="Descripcion: ";
            form.appendChild(labelD);
            

            let inputD=document.createElement("INPUT");
            inputD.setAttribute("type","text");
            inputD.setAttribute("id","descripcion");
            inputD.setAttribute("name","descripcion");
            inputD.setAttribute("readonly",true);
            inputD.setAttribute("value",element.descripcion);
            form.appendChild(inputD)

            //CREAMOS CAMPO PRECIO A EDITAR
            let labelP=document.createElement("LABEL");
            labelP.setAttribute("for","precio");
            labelP.textContent="Precio: ";
            form.appendChild(labelP)

            let inputP=document.createElement("INPUT");
            inputP.setAttribute("type","text");
            inputP.setAttribute("id","precio");
            inputP.setAttribute("name","precio")
            inputP.setAttribute("readonly",true);
            inputP.setAttribute("value",element.precio);
            form.appendChild(inputP)

           
            //CREAMOS IMAGEN NOMBRE A EDITAR
            let labelI=document.createElement("LABEL");
            labelI.setAttribute("for","imagen");
            labelI.textContent="Imagen: ";
            form.appendChild(labelI)

            let inputI=document.createElement("INPUT");
            inputI.setAttribute("type","text");
            inputI.setAttribute("id","imagen");
            inputI.setAttribute("name","urlImagen")
            inputI.setAttribute("readonly",true);
            inputI.setAttribute("value",element.urlImagen);
            form.appendChild(inputI)


            //CREAMOS BOTON SUBMIT

            let inputS=document.createElement("INPUT");
            inputS.setAttribute("type","submit");
            inputS.setAttribute("value","Confirmar eliminacion");
            form.appendChild(inputS)
           
          }
          
        })
      })
    })
}

//FUNCION SACAR DESPLEGABLE PARA AÑADIR PRODUCTOS
function aniadir(plato){
  
  fetch("carta.json").then(response=>{return response.json();}).
    then(datos=>{
      let secciones=Object.keys(datos);

      secciones.forEach(s=>{
        datos[s].forEach(element=>{
         
          if(plato==element.nombrePlato){
            let tabla=document.querySelector(".productos");
            
            
            let form=document.createElement("FORM");
            form.setAttribute("id","miFormulario")
            form.setAttribute("method","post")
            form.setAttribute("action","aniadir.php")
            tabla.appendChild(form);


           //CREAMOS CAMPO ID PRODUCTO A EDITAR
            let labelSeccion=document.createElement("LABEL");
            labelSeccion.setAttribute("for","seccion");
            labelSeccion.textContent="Seccion: ";
            form.appendChild(labelSeccion);
            


            let inputSeccion=document.createElement("SELECT");
            inputSeccion.setAttribute("type","text");
            inputSeccion.setAttribute("id","seccion")
            inputSeccion.setAttribute("name","idSeccion")
            form.appendChild(inputSeccion);

            let entrantes=document.createElement("OPTION");
            entrantes.setAttribute("value","entrantes");
            entrantes.textContent="ENTRANTES";
            inputSeccion.appendChild(entrantes);

            let patatas=document.createElement("OPTION");
            patatas.setAttribute("value",2);
            patatas.textContent="PATATAS";
            inputSeccion.appendChild(patatas);
            
            let alitas=document.createElement("OPTION");
            alitas.setAttribute("value",3);
            alitas.textContent="ALITAS";
            inputSeccion.appendChild(alitas);

            let compartir=document.createElement("OPTION");
            compartir.setAttribute("value",4);
            compartir.textContent="COMPARTIR";
            inputSeccion.appendChild(compartir);

            let ensaladas=document.createElement("OPTION");
            ensaladas.setAttribute("value",5);
            ensaladas.textContent="ENSALADAS";
            inputSeccion.appendChild(ensaladas);

            let hamburguesas=document.createElement("OPTION");
            hamburguesas.setAttribute("value",6);
            hamburguesas.textContent="HAMBURGUESAS";
            inputSeccion.appendChild(hamburguesas);

            let postres=document.createElement("OPTION");
            postres.setAttribute("value",7);
            postres.textContent="POSTRES";
            inputSeccion.appendChild(postres);

            //CREAMOS CAMPO NOMBRE A AÑADIR
            let labelN=document.createElement("LABEL");
            labelN.setAttribute("for","plato");
            labelN.textContent="Nombre del Plato: ";
            form.appendChild(labelN);
            


            let inputN=document.createElement("INPUT");
            inputN.setAttribute("type","text");
            inputN.setAttribute("id","plato");
            inputN.setAttribute("name","nombrePlato")
            form.appendChild(inputN);
            

            //CREAMOS CAMPO DESCRIPCION A AÑADIR
            let labelD=document.createElement("LABEL");
            labelD.setAttribute("for","descripcion");
            labelD.textContent="Descripcion: ";
            form.appendChild(labelD);
            

            let inputD=document.createElement("INPUT");
            inputD.setAttribute("type","text");
            inputD.setAttribute("id","descripcion");
            inputD.setAttribute("name","descripcion")
            form.appendChild(inputD)

            //CREAMOS CAMPO PRECIO A AÑADIR
            let labelP=document.createElement("LABEL");
            labelP.setAttribute("for","precio");
            labelP.textContent="Precio: ";
            form.appendChild(labelP)

            let inputP=document.createElement("INPUT");
            inputP.setAttribute("type","text");
            inputP.setAttribute("id","precio");
            inputP.setAttribute("name","precio")
            form.appendChild(inputP)

           
            //CREAMOS IMAGEN NOMBRE A AÑADIR
            let labelI=document.createElement("LABEL");
            labelI.setAttribute("for","imagen");
            labelI.textContent="Imagen: ";
            form.appendChild(labelI)

            let inputI=document.createElement("INPUT");
            inputI.setAttribute("type","text");
            inputI.setAttribute("id","imagen");
            inputI.setAttribute("name","urlImagen")
            form.appendChild(inputI)


            //CREAMOS BOTON SUBMIT

            let inputS=document.createElement("INPUT");
            inputS.setAttribute("type","submit");
            inputS.setAttribute("value","Añadir Plato");
            form.appendChild(inputS)
           
          }
          
        })
      })
    })
}

// function recogerDatos(){
  

//   const formData = new FormData(document.getElementById('miFormulario'));
//   const data = {};

//   formData.forEach((value, key) => {
//       data[key] = value;
//   });


// }

// function changeData(n){
//   fetch("carta.json").then(response=>{return response.json();}).
//   then(datos=>{
//     let secciones=Object.keys(datos);
    
//     secciones.forEach(s=>{
//       datos[s].forEach(element=>{
        
//         if(n.id==element.idProducto && n.idS==element.idSeccion){
          
//         response.json(element.nombrePlato=n.nombrePlato1);
//         element.descripcion=n.descripcion;
//         element.precio=n.precio;
//       }
//       })
//     })

//   })
// }



document.addEventListener("click",e=>{
  const secciones=[".seccionEntrantes",".seccionPatatas",".seccionAlitas",".seccionCompartir",".seccionEnsaladas",".seccionHamburguesas",".seccionPostres"]

  if(secciones.includes("."+e.target.className)){
    document.querySelector(".productos table").style.display="table-row-group";
    if(document.querySelector(".productos form")){
      document.querySelector(".productos form").remove();
    }
    
    ajustarBody(e.target)
  }
  
  else if(e.target.className=="edit-btn"){
    
    document.querySelector(".productos table").style.display="none";
    modificar(e.target.id);
    
  }

  // else if(e.target.id=="recogerDatos"){
  //   document.querySelector("form").addEventListener("submit",x=>{
      
  //     const dataF= Object.fromEntries(new FormData(x.target))
  //     changeData(dataF);
  //   })
  // }
  else if(e.target.className=="add-btn"){
    
    document.querySelector(".productos table").style.display="none";
    aniadir(e.target.id);
    
  }
  else if(e.target.className=="remove-btn"){
    
    document.querySelector(".productos table").style.display="none";
    eliminar(e.target.id);
    
  }
});

