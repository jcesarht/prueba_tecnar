"# prueba_tecnar" 

Para Intalar la aplicación. 
primero debe tener un servidor apache y mysql, o XAmpp/lampp instalado

Paso 1. Descargar el componente codeinither en el pc desde esta direccion

https://github.com/jcesarht/prueba_tecnar.git
 * Hacer click en el botón code>>Download
 luego descomprimir el archivo comprimido descargarlo y subirlo al servidor o localhost

una vez colocado en el directorio raiz del servidor, ir al archivo application/config/database.php y buscar la variable $db['default'], cambiar los atributos 
hostname' => 'localhost/host de la base de datos',
'username' => 'root / de la base de datos',
'password' => 'password de la base de datos',
'database' => 'nombre de la base de datos',
_______________

importar la base de datos

el paquete trae consigo un archivo llamado tecnar.sql en la carpeta raiz del proyecto, se debe importar ese archivo a la base de datos mysql de la preferencia del desarrollador


Por ultimo entra a la url, desde un equipo local es http://localhost/prueba_tecnar
o www.example.com/prueba_tecnar, reemplaza www.example.com por tu dominio.

___________________
para acceder a la aplicación primero se debe crear un usuario en el pantallazo principal. haciendo clic en "aquí" que queda en la parte inferior del formulario de login.

