
<html>
<head>
<title> csv2 sql</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>
<br>
<h1> CSV a Mysql en segundos </h1>
<p> Este script de Php importará archivos CSV muy grandes a una base de datos MYSQL de manera rápida</p>

</br>
<form class="form-horizontal"action="csv2sql.php" method="post">
    <div class="form-group">
        <label for="mysql" class="control-label col-xs-2">Dirección Mysql Server ó<br>Host name</label>
		<div class="col-xs-3">
        <input type="text" class="form-control" name="mysql" id="mysql" placeholder="">
		</div>
    </div>
	<div class="form-group">
        <label for="username" class="control-label col-xs-2">Username:</label>
		<div class="col-xs-3">
        <input type="text" class="form-control" name="username" id="username" placeholder="">
		</div>
    </div>
	<div class="form-group">
        <label for="password" class="control-label col-xs-2">Password:</label>
		<div class="col-xs-3">
        <input type="text" class="form-control" name="password" id="password" placeholder="">
		</div>
    </div>
	<div class="form-group">
        <label for="db" class="control-label col-xs-2">Nombre de la base de datos:</label>
		<div class="col-xs-3">
        <input type="text" class="form-control" name="db" id="db" placeholder="">
		</div>
    </div>
	
	<div class="form-group">
        <label for="table" class="control-label col-xs-2">Nombre de la tabla:</label>
		<div class="col-xs-3">
        <input type="name" class="form-control" name="table" id="table">
		</div>
    </div>
	<div class="form-group">
        <label for="csvfile" class="control-label col-xs-2">Ruta del archivo CSV: </label>
		<div class="col-xs-3">
        <input type="name" class="form-control" name="ruta" id="ruta">
		</div>
		Ejemplo: C:\Users\Usuario1\Documents\Archivo.csv
    </div>
	<div class="form-group">
	<label for="login" class="control-label col-xs-2"></label>
    <div class="col-xs-3">
    <button type="submit" class="btn btn-primary">Cargar</button>
	</div>
	</div>
</form>
</div>

</body>

<?php 

if(isset($_POST['username'])&&isset($_POST['mysql'])&&isset($_POST['db'])&&isset($_POST['username'])&&isset($_POST['ruta']))
{
$sqlname=$_POST['mysql'];
$username=$_POST['username'];
$table=$_POST['table'];
if(isset($_POST['password']))
{
$password=$_POST['password'];
}
else
{
$password= '';
}
$db=$_POST['db'];
$file1=$_POST['ruta'];
$file=str_replace('\\','/',$file1);
$cons= mysqli_connect("$sqlname", "$username","$password","$db") or die(mysql_error());

$result1=mysqli_query($cons,"select count(*) count from $table");
$r1=mysqli_fetch_array($result1);
$count1=(int)$r1['count'];
//Si el archivo csv no esta separado por comas entonces modifica FIELDS TERMINATED by \',\' 
//Si cada fila del archivo no esta determinada por /n entonces modifica LINES TERMINATED BY \'\n\'

mysqli_query($cons, '
    LOAD DATA INFILE "'.$file.'"
        INTO TABLE '.$table.'
        FIELDS TERMINATED by \',\'
        LINES TERMINATED BY \'\n\'
')or die(mysql_error());

$result2=mysqli_query($cons,"select count(*) count from $table");
$r2=mysqli_fetch_array($result2);
$count2=(int)$r2['count'];

$count=$count2-$count1;
if($count>0)
echo "Exito!";
echo "<b> Se han agregado un total de $count filas a la tabla $table </b> ";

}
else{
echo "Es obligatorio rellenar todos los campos";
}

?>

<h3> Instrucciones </h3>
1.  Abre el archivo.php en tu localhost<br>
2.  Rellena TODOS los campos con tus datos<br>
3.  Click en cargar cuando estes listo  </p>

<h3> Notas:</h3>
1) La tabla en la cual desees importar datos debe soportar archivos .csv <br>
2) Si tu archivo csv no esta separado por comas entonces modifica mysqli_query<br>
3) Si cada fila o renglón no termina cuando se salte una linea (\n) entonces modifica mysqli_query<br>

</html>
