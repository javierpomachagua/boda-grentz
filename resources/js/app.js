import './bootstrap';

// Fecha objetivo (puede ser cualquier fecha en el futuro)
const fechaObjetivo = new Date("2023-08-12T23:59:59").getTime();

// Actualizar el contador cada segundo
const intervalo = setInterval(function () {
    // Obtener la fecha y hora actual
    const ahora = new Date().getTime();

    // Calcular la diferencia entre la fecha objetivo y la fecha actual
    const diferencia = fechaObjetivo - ahora;

    // Calcular días, horas, minutos y segundos restantes
    const dias = Math.floor(diferencia / (1000 * 60 * 60 * 24));
    const horas = Math.floor(
        (diferencia % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
    );
    const minutos = Math.floor((diferencia % (1000 * 60 * 60)) / (1000 * 60));
    const segundos = Math.floor((diferencia % (1000 * 60)) / 1000);

    // Mostrar los días, horas, minutos y segundos restantes en el contador
    document.getElementById("dias").textContent = dias;
    document.getElementById("horas").textContent = horas;
    document.getElementById("minutos").textContent = minutos;
    document.getElementById("segundos").textContent = segundos;

    // Si la cuenta regresiva termina, mostrar un mensaje o realizar alguna acción
    if (diferencia < 0) {
        clearInterval(intervalo);
        document.getElementById("contador").textContent = "¡Llego el Gran Día!";
    }
}, 1000); // 1000 milisegundos = 1 segundo

////// boton de play //////
const reproductor = document.getElementById("reproductor");
const botonReproducir = document.getElementById("boton-reproducir");

function toggleReproduccion() {
    if (reproductor.paused) {
        reproductor.play();
        botonReproducir.innerHTML = `<ion-icon name="pause" class="btn-music"></ion-icon>`;
    } else {
        reproductor.pause();
        botonReproducir.innerHTML = `<ion-icon name="play" class="btn-music"></ion-icon>`;
    }
}

///// la barra ////

var reproductor2 = document.getElementById("reproductor");
var progreso = document.getElementById("progreso");

reproductor.addEventListener("timeupdate", actualizarBarraReproduccion);

function actualizarBarraReproduccion() {
    var porcentajeProgreso =
        (reproductor.currentTime / reproductor.duration) * 100;
    progreso.style.width = porcentajeProgreso + "%";
}

////// efecto de btn-gifs grande////
