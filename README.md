# Csv a MySQL 
Importa GRANDES archivos de CSV de forma muy rápida con este script de PHP.

## Información 📄

Script de php basado en el archivo del usuario [sanathp](https://github.com/sanathp) pero actualizado para que funcione en versiones más nuevas de Mysql.

## Instrucciones 📋

1. Antes de usar el Script debes verificar que tienes activado la variable _local_infile_. Sino escribe:
```
SET GLOBAL local_infile = 1;
```

2.  Busca el archivo my.ini o my.cnf (**el nombre depende del servidor que estés ocupando**), que es el archivo donde configuras MySQL. Si no sabes dónde está puedes leer [starckoverflow](https://stackoverflow.com/questions/2482234/how-do-i-find-the-mysql-my-cnf-location). Dentro del archivo modifica la siguiente variable:
```
secure_file_priv="RUTA" ----------------------> secure_file_priv=""
```
Esta variable LIMITA desde que directorios puedes cargar datos*.

3. Cargar el archivo .php en tu localhost.

## * NOTA 💥
Es muy importante que tengas permisos privilegiados para realizar dicho cambio.
