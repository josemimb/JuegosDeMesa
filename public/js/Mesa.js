function Mesa (id, nombre, ancho, alto, x, y){
    this.id = id;
    this.nombre = nombre;
    this.ancho = ancho;
    this.alto = alto;
    this.x = x;
    this.y = y;
}

//metodoo sincroniza el contenio de tBody con los alumnos
//en la situacion actual
Mesa.prototype.pinta=function(sala, almacen){
    var tBodyInnerHTML = "";
    var tamano=this.alumnos.length;
    for(let i=0; i< tamano ;i++){
        tBodyInnerHTML+=this.alumnos[i].toFila(i);
    }
    this.tabla.innerHTML=tBodyInnerHTML;
}