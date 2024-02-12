
function obtenerEntrantes(){
  fetch("carta.json").then(resultado=>{return resultado.json();})
        .then(datos=>{
          const secciones = Object.keys(datos); // Obtiene todas las secciones del JSON

          secciones.forEach((seccion) => {
            datos[seccion].forEach((element) => {
              let introducir = document.querySelector(".productos" + seccion); // Usa el nombre de la sección como clase
              let contenidoPlato = document.createElement("DIV");
              contenidoPlato.classList.add("contenidoPlato");
              introducir.appendChild(contenidoPlato);

            let imgProducto=document.createElement("DIV");
            imgProducto.classList.add("imgProducto");
            contenidoPlato.appendChild(imgProducto);

            let imagen=document.createElement("IMG");
            imagen.src=element.urlImagen;
            imgProducto.appendChild(imagen);

            let descripcionProducto=document.createElement("DIV");
            descripcionProducto.classList.add("descripcionProducto");
            contenidoPlato.appendChild(descripcionProducto);

            let nombreProducto=document.createElement("H3");
            nombreProducto.textContent=element.nombrePlato;
            descripcionProducto.appendChild(nombreProducto);

            // let precio=document.createElement("P");
            // precio.textContent=element.precio;
            // descripcionProducto.appendChild(precio);

            let ingredientes=document.createElement("P");
            ingredientes.textContent=element.descripcion;
            descripcionProducto.appendChild(ingredientes);
          });
        })
          
        })
  
}
obtenerEntrantes();








let todas=[...document.querySelectorAll(".productoSecciones div") ];

function ajustarInicio(){
  for(let i=0;i<todas.length;i++){
   
      if(todas[i].className.slice(9)!="entrantes"){
          todas[i].style.display="none";
      }
  }
}
ajustarInicio();

document.addEventListener("DOMContentLoaded", ()=>{
  const secciones=document.querySelector(".seccionesCajas")
  secciones.addEventListener("click",element=>{
  
    for(let i=0;i<todas.length;i++){

        if(todas[i].className.slice(9)==element.target.className.slice(7).toLowerCase()){
          todas[i].style.display="grid";
        }else{
          todas[i].style.display="none";
        }
    }
  })
});
