let mdlConfirmacionDe;



mdlConfirmacionDe = document.getElementById('mdlConfirmacionDesactivacion')
mdlConfirmacionDe.addEventListener('show.bs.modal', event => {
    let clave=event.relatedTarget.value;
    //Cargar el nombre de la persona a eliminar tomado de la primera celda
    document.getElementById("id_Desactivar").innerText=
    event.relatedTarget.closest("tr").children[1].innerText;
    
    //Cargar la clave en el value del botón "SI"
    document.getElementById("btnConfirmarDesactivacion").value=clave;
});
    
   



function confirmarConcursoDesactivar(btn){
    //Colocar en el span el nombre de quien eliminar
    const mdlEliminar = new bootstrap.Modal('#mdlConfirmacionDesactivacion', {
        backdrop:'static'
    });
    mdlEliminar.show(btn);
}