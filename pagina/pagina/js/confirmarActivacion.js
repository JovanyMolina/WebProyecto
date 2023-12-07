let mdlConfirmacionActivar;



mdlConfirmacionActivar = document.getElementById('mdlConfirmacionActivar')
mdlConfirmacionActivar.addEventListener('show.bs.modal', event => {
    let clave=event.relatedTarget.value;
    //Cargar el nombre de la persona a eliminar tomado de la primera celda
    document.getElementById("id_Concurso").innerText=
    event.relatedTarget.closest("tr").children[1].innerText;
    
    //Cargar la clave en el value del botón "SI"
    document.getElementById("btnConfirmarActivacion").value=clave;
});
    
   



function confirmarConcurso(btn){
    //Colocar en el span el nombre de quien eliminar
    const mdlEliminar = new bootstrap.Modal('#mdlConfirmacionActivar', {
        backdrop:'static'
    });
    mdlEliminar.show(btn);
}