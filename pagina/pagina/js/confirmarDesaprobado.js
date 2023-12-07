let mdlConfirmacionDesaprobado;



mdlConfirmacionDesaprobado = document.getElementById('mdlConfirmacionDesaprobar')

mdlConfirmacionDesaprobado.addEventListener('show.bs.modal', event => {
        let clave=event.relatedTarget.value;
        //Cargar el nombre de la persona a eliminar tomado de la primera celda
        document.getElementById("equipoIdDe").innerText=
        event.relatedTarget.closest("tr").children[1].innerText;
        
        //Cargar la clave en el value del botón "SI"
        document.getElementById("btnConfirmarDesaprobar").value=clave;
    });
    
   



function confirmarDe(btn){
    //Colocar en el span el nombre de quien eliminar
    const mdlEliminar = new bootstrap.Modal('#mdlConfirmacionDesaprobar', {
        backdrop:'static'
    });
    mdlEliminar.show(btn);
}