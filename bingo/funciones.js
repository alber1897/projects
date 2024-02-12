function rellenarCarton(n,p){
    for(i=0;i<n;i++){
        let ubicacion= document.querySelector(".cartones");
     


        let carton=document.createElement("DIV");
        carton.className="carton";
        ubicacion.appendChild(carton);

        let titulo=document.createElement("DIV");
        titulo.className="bingoCarton";
        titulo.textContent="CARTON"; 
        carton.appendChild(titulo);

        for(let k=0;k<p;k++){

            let divPosicion=document.createElement("DIV");
            divPosicion.className="divPosicion"+k;
            divPosicion.innerText="P"+Math.floor(Math.random() * (100 - 0 + 1) + 0);
            carton.appendChild(divPosicion);
        }
    }
    let disable=document.querySelector("#formulario");

    disable.style.display="none";
}

let contador = 10;
let respuestaEnviada = false;

function actualizarContador() {
  let pCont = document.querySelector("#contador");

  function mostrarTiempoAgotado() {


    // Verifica si ya se envió una respuesta
    if (!respuestaEnviada) {
      sacarPregunta();
      respuestaEnviada = true;
      contador=10;
    }
  }

  if (contador <= 0) {
    mostrarTiempoAgotado();
  } else {
    pCont.innerHTML = "QUEDAN " + contador + " SEGUNDOS";
    contador--;
  }
}
 

 function sacarPregunta(){
    fetch('preguntas.json').then(resultado=>{return resultado.json();})
    .then(datos=>{
      respuestaEnviada=false;
      limpiarOpciones();
      let preguntaAleatoria=Math.floor(Math.random()*(11));
      
      let preguntas = datos.preguntas_respuestas;
      
      
      
        
        let pregunta=document.querySelector("#tPregunta");
        console.log(pregunta);
        pregunta.innerHTML=preguntas[preguntaAleatoria].pregunta;

        let introRespuesta=document.querySelector("#seleccionar");
          preguntas[preguntaAleatoria].opciones.forEach(element => {

              
              
              let opcion=document.createElement("INPUT");
              
              opcion.setAttribute("type","radio");
              opcion.setAttribute("name","respuesta");

              introRespuesta.appendChild(opcion);
            

              let label = document.createElement("label");
              

              let texto = document.createTextNode(' ' + element + '');
              label.className="respuestas";
              label.appendChild(texto); // Añade el texto al label
              introRespuesta.appendChild(label);
              
              let salto=document.createElement("BR")
              introRespuesta.appendChild(salto)

          });
          let enviar=document.createElement("INPUT");
          enviar.setAttribute("type","submit");
          enviar.setAttribute("value","Enviar respuesta");
          introRespuesta.appendChild(enviar);
          
    })
 }
 
 function limpiarOpciones() {
  let introRespuesta = document.querySelector("#seleccionar");
  introRespuesta.innerHTML = ''; // Limpiar el contenido
}


let jugadores=document.querySelector("#formulario").addEventListener("submit",e=>{
    e.preventDefault();
    
    let valor=document.querySelector("#players");
    let valor1=document.querySelector("#answers");
    rellenarCarton(valor.value,valor1.value);
    sacarPregunta();
    setInterval(actualizarContador, 1000); 
})