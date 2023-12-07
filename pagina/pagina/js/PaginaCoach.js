document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("btnAgregar").addEventListener('click',
    ()=>{
        
        //Si  guarda en el historial
        //window.location.href='persona.html';
        //La página actual NO se guarda en el historial
        window.location.replace('RegistroEquipos.html');

       
    });

    document.getElementById("btnVolver").addEventListener('click', () => {
        window.location.href = 'PaginaPrincipalCoach.html'; 
    });
    
});