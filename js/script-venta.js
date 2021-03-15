let venta = document.querySelector('#venta');
let clave = document.querySelector('#clave');
let unidades = document.querySelector('#unidades');
let respuestaForm = document.querySelector('#respuesta');
let alertaForm = document.querySelector('#alertaForm');
let costo = document.querySelector('#costo');
let costoForm = document.querySelector('#costoForm');
let aceptarVenta = document.querySelector('#aceptarVenta');


venta.addEventListener('click', (e) => {
    e.preventDefault();
    if (clave.value === '' || unidades.value === '') {
        setTimeout(() => {
            respuestaForm.style.display = 'block';
            respuestaForm.classList.remove('invisible');
            alertaForm.textContent = 'Llena todos los campos';
            setTimeout(() => {
                respuestaForm.style.display = 'none';
                respuestaForm.classList.add('invisible');
            }, 2000);
        }, 100);
    } else {
        let datos = new FormData();
        datos.append("clave", clave.value);
        datos.append("unidades", unidades.value);
        fetch('../recibirDatos.php', {
                method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then(data => {
                let precio = data * unidades.value;
                let precioFinal = parseFloat(Math.round(precio * 100) / 100).toFixed(2);
                aceptarVenta.classList.remove('invisible');
                costo.style.display = 'block';
                costo.classList.remove('invisible');
                costoForm.textContent = `El Total de la venta es de: ${precioFinal}`;
            })
    }

});