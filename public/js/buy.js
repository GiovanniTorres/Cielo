function buying (event) {
    event.preventDefault ()
    /*const w = event.target.getElementById("boton_comprar").parentElement
    console.log (w) ;
    */
   /*
   const articulo = document.getElementById ("articulo")
   const boton_comprar = document.getElementById ("boton_comprar")
   console.log (articulo.contains (boton_comprar))
   */
  /*
    const articulo = document.getElementById ("articulo")
    const boton_comprar = document.getElementById ("boton_comprar")
  if (articulo.contains (boton_comprar)) {
    console.log (boton_comprar.parentElement.parentElement)      
  }*/
  //const boton_comprar = document.getElementById ("boton_comprar")
  //console.log (document.getElementById("boton_comprar").parentElement.parentElement)
  console.log (document.getElementById("articulo"))
}

window.addEventListener ("load",buying)