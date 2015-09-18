<html>
<head><title>Ejemplo de formulario sencillo</title></head>
<body>
 
<h3>AppTareas</h3>
    <div id="Inisesion">
	    <form action="iniciosesion.php" method="post">
		    <table>
			    <tr>
				    <td><label>Usuario: </label></td>
				    <td>Contrase&ntilde;a: </td>
			    </tr>
			    <tr>
				    <td><input type="text" name="txtusuario" value="" required="required" placeholder="Usuario"/></td>
				    <td><input type="password" name="txtpass" value="" required="required" placeholder="Contrase&ntilde;a"/></td>
				    <td><input type="submit" name="btIniSesion" value="Iniciar sesion" /></td>
			    </tr>
			    <tr><td><p>Si no estas registrado puedes hacerlo desde <a href="form_registro.php" onclick="">aqu&iacute;.</a></p></td></tr>
		    </table>
	    </form>
    </div>
</form> 
</body>
</html>