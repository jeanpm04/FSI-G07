document.getElementById("formularioReserva").addEventListener("submit", function(event) {
    event.preventDefault();

    const nombre = document.getElementById("nombre").value;
    const apellido = document.getElementById("apellido").value;
    const dni = document.getElementById("dni").value;
    const correoElectronico = document.getElementById("correoElectronico").value;
    const fechaLlegada = document.getElementById("fechaLlegada").value;
    const tipoHabitacion = document.getElementById("tipoHabitacion").value;
    const numeroDias = document.getElementById("numeroDias").value;

    const resultadoReserva = realizarReserva(nombre, apellido, dni, correoElectronico, fechaLlegada, tipoHabitacion, numeroDias);

    mostrarResultado(resultadoReserva);
});

function realizarReserva(nombre, apellido, dni, correoElectronico, fechaLlegada, tipoHabitacion, numeroDias) {
    return {
        exito: true,
        mensaje: "Reserva exitosa"
    };
}

function mostrarResultado(resultado) {
    const resultadoDiv = document.getElementById("resultado");
    resultadoDiv.innerHTML = `<p>${resultado.mensaje}</p>`;
}
