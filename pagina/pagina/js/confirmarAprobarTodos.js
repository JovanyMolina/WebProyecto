let mdlConfirmacionAprobarTodos;



mdlConfirmacionAprobarTodos = document.getElementById('mdlConfirmacionAprobarTodos')

mdlConfirmacionAprobarTodos.addEventListener('show.bs.modal', event => {
        let clave=event.relatedTarget.value;
        //Cargar el nombre de la persona a eliminar tomado de la primera celda
        document.getElementById("equipoIdA").innerText=
        event.relatedTarget.closest("tr").children[1].innerText;
        
        //Cargar la clave en el value del botón "SI"
        document.getElementById("btnConfirmarAprobar").value=clave;
    });
    
   



function confirmarAll(btn){
    //Colocar en el span el nombre de quien eliminar
    const mdlEliminar = new bootstrap.Modal('#mdlConfirmacionAprobarTodos', {
        backdrop:'static'
    });
    mdlEliminar.show(btn);
}