<form class="reserva-contacto" method="post" >
    <h2>Realiza una Reservación</h2>
    <div class="campo">
        <input type="text" name="nombre" placeholder="Nombre" required>
    </div>

    <div class="campo">
        <input type="date" name="fecha" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
    </div>

    <div class="campo">
        <input type="time" name="hora" required pattern="[0-9]{2}:[0-9]{2}">
    </div>

    <div class="campo">
        <input type="email" name="correo" placeholder="Correo" required>
    </div>

    <div class="campo">
        <input type="tel" name="telefono" placeholder="Teléfono" required>
    </div>                    

    <div class="campo">
        <textarea type="mensaje" name="mensaje" placeholder="Mensaje" required></textarea>
    </div>

    <input type="submit" name="enviar" value="enviar" class="button">   
    <input type="hidden" name="oculto" value="1">
</form>