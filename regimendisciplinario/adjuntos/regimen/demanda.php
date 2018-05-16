<doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Formulario de demanda</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <form method="post" class="formulario" multipart/form-data action="validacion.php">
                <input type="text" placeholder="Nombre de demandado" name="Nombre_demandado">
                <input type="text" placeholder="Apellidos" name="apellido">
                <input type="date">
                <input type="email" placeholder="Correo de demandado" name="correo">
                <input type="tel" placeholder="Número de teléfono de demandado" name="tel">
                <label>Nombre de la empresa:</label>
                <select>
                    <option>Empresa 1</option>
                    <option>Empresa 2</option>
                    <option>Empresa 3</option>
                </select>
                <label>Subir Documentos</label>
                <input type="file" multiple>
                <label>¿Causa de demanda?</label>
                <input type="text" name="demanda">
                <textarea rows="10" cols="50"></textarea>
                <input type="submit" value="Enviar">
            </form>
        </body>
    </html>