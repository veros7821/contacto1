<form action="contacto.php" method="post">
  <div class="elem-group">
    <label for="name">Ingrese su nombre</label>
    <input type="text" id="name" name="visitante" placeholder="Nombre" pattern=[A-Z\sa-z]{3,20} required>
  </div>
  <div class="elem-group">
    <label for="email">Su E-mail</label>
    <input type="email" id="email" name="visitante_email" placeholder="usuario@gmail.com" required>
  </div>
  <div class="elem-group">
    <label for="title">Motivo para contactarnos</label>
    <input type="text" id="title" name="visitante_asunto" required placeholder="Asunto" pattern=[A-Za-z0-9\s]{1,30}>
  </div>
  <div class="elem-group">
    <label for="message">Su mensaje</label>
    <textarea id="message" name="visitante_mensaje" placeholder="Escriba su mensaje" required></textarea>
  </div>
  <button type="submit">Enviar mensaje</button>
</form>
