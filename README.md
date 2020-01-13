#Instalación

Una vez descargado o clonado el proyecto:

**1-** En consola, dentro de la ruta del proyecto ejecutar el *"composer install"*.

**2-** Generar el archivo *.env* en la raíz del proyecto. Se puede usar como ejemplo el archivo *.env.example* ya incluído.

**3-** Ejecutar en consola *"php artisan key:generate"*.

**4-** Symlink del directorio storage *"php artisan storage:link"*.

**5-** Crear una base de datos MySql con el nombre según lo configurado en *.env*.

**6-** Correr en consola *"php artisan migrate"*.

**7-** Finalmente, este proyecto cuenta con seeders para cargar datos iniciales en la base de datos.
Ejecutar *"php artisan db:seed"* para ello. Se cargan datos en todas las tablas, con excepción de la tabla
users. Deberá crearse el usuario a través de la opción Register el proyecto.
