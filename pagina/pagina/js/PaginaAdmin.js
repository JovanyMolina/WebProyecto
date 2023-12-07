/*document.addEventListener("DOMContentLoaded",()=>{
    let personas=[];
    if(localStorage.getItem('personas')){
        personas=JSON.parse(localStorage.getItem('personas'));
    }
   
});

function llenarTabla(datos){
    let tbody=document.querySelector("#tblPersonas tbody"),fila,celda;
    tbody.innerHTML='';
    let x,y,z;
    x=y=z=3;
    datos.forEach(persona => {
        fila=document.createElement('tr');

        celda=document.createElement('td');
        celda.appendChild(document.createTextNode("1"));
        fila.appendChild(celda);

        
        
        let btnAver=document.createElement('button'),
        bntArpobar=document.createElement('button'),
        bntGanador=document.createElement('button'),
        bntGeneradorUserPasswors=document.createElement('button'),
        btnListaEquipo=document.createElement('button');
//        btnEditar.className="btn btn-primary";
  //      btnEliminar.className="btn btn-danger";
        btnAver.innerText='Ver';
        bntArpobar.innerText='Verificar';
        bntGanador.innerText='Verificar';
        bntGeneradorUserPasswors.innerText='Descargar';
        btnListaEquipo.innerText='btnListaEquipo';


        btnAver.addEventListener('click',()=>{
            sessionStorage.setItem('usuarioID',persona.usuario);
            window.location.replace('GestionDeUsuarios.html');
        });


        
        celda=document.createElement('td');
        celda.appendChild(btnAver);
        fila.appendChild(celda);
        tbody.appendChild(fila);
    
        celda=document.createElement('td');
        celda.appendChild(bntArpobar);
        fila.appendChild(celda);
        tbody.appendChild(fila);
        
        celda=document.createElement('td');
        celda.appendChild(bntGanador);
        fila.appendChild(celda);
        tbody.appendChild(fila);


        celda=document.createElement('td');
        celda.appendChild(document.createTextNode("dd//ss/dd"));
        fila.appendChild(celda);

        celda=document.createElement('td');
        celda.appendChild(bntGeneradorUserPasswors);
        fila.appendChild(celda);
        tbody.appendChild(fila);

        celda=document.createElement('td');
        celda.appendChild(btnListaEquipo);
        fila.appendChild(celda);
        tbody.appendChild(fila);
        
        celda=document.createElement('td');
        celda.appendChild(document.createTextNode("@gamil.com"));
        fila.appendChild(celda);


    });
}


let mdlConfirmacion;

document.addEventListener('DOMContentLoaded',()=>{
    $("#lista").DataTable({
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [0,1,2]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [0,1,2]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [0,1,2]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0,1,2]
                }
            },
            'colvis'
        ],
        stateSave: true,
        columnDefs: [
            { orderable: false, targets: -1 }
        ],
        order: [[1, 'asc'],[2,'desc']]
    });

    mdlConfirmacion = document.getElementById('mdlConfirmacion')
    mdlConfirmacion1.addEventListener('show.bs.modal', event => {
        let clave=event.relatedTarget.value;
        //Cargar el nombre de la persona a eliminar tomado de la primera celda
        document.getElementById("spnPersona").innerText=
        event.relatedTarget.closest("tr").children[0].innerText;
        
        //Cargar la clave en el value del botón "SI"
        document.getElementById("btnConfirmar").value=clave;
    });

});

function confirmar(btn){
    //Colocar en el span el nombre de quien eliminar
    const mdlEliminar = new bootstrap.Modal('#mdlConfirmacion', {
        backdrop:'static'
    });
    mdlEliminar.show(btn);
}
*/