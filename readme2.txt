crear una aplicación con 2 frameworks

laravel = framework para crear aplicaciones y servicios web = back end
- interactuar con la BD

vuejs = interfaces de usuario = front end
- consume la información que laravel sirve desde el backend

PREPARACIÓN DEL ENTORNO DE TRABAJO
instalaciones:
xampp => servidor apache, mysql, php...
composer => administrador de dependencias php => paquetes para laravel
laravel => ver documentación laravel

una vez instalamos proyecto probamos que funciona de inicio

INICIO DE REPOSITORIO EN GIT
git init...

ESTRUCTURA CARPETAS
/app
Los modelos de laravel son los encargados de comunicarse con la BD
/config
Datos de parametrización importantes
/database
Contiene las migraciones (control version de BD digamos), crear datos falsos, etc
/public
Contine un index.php que es por donde entran todas las peticiones
/resources
Tiene /views que es toda la parte de html 
Y tiene /js que es donde vamos a trabajar toda la parte del front end
/routes
Tiene el archivo web.php que es de donde se definen todas las rutas que tiene la aplicación
Tiene el archivo api.php que es para los servicios que vamos a servir
/vendor
Aquí se instalan todas las dependencias necesarias para que funcione el framework
Importante el archivo .env con las configuraciones más importantes.
Importante también el archivo package.json para front end y composer.json para backend

CONFIGURACIÓN A LA BASE DE DATOS
ver .env  ===> bd = miproyectofp

SISTEMA LOG IN / SIGN UP
Laravel viene por defecto con un sistema, solo hay q ejec php artisan make:auth
ojo, falso, esto es para versiones inferiores a 6
estamos en VERSION = '6.0.3'
Con esto se crea una estructura de vistas diferente.
/layour/app es de donde parte todo.
luego tenemos un welcome
y finalmente, con log in, un home
preparamos un poco estas vistas:
1. dejamos el layout con únicamente lo fundamental y común, head y un yield en el body
2. creamos el sistema de autenticación en welcome
para probarlo, hay que crear las migraciones (ojo, error por tipo datos sql, ver provider)

CREAMOS LA VISTA home

MODELOS Y MIGRACIONES
Crear el modelo ya con la migración
Nota: el modelo representa las tablas de una bd, sería Modelo = Empleado, BD = empleados
Al crear el modelo, este referencia a un namespace que simula la ubicación en las carpetas y que permitirá importar clases.
La estructura de la migración inicial que ofrece laravel, es básica, e importa la clase Schema con la que nos permite crear las tablas, ya trae dos campos por defecto: fecha de creación y actualización.
para crear campo, $table->seguido del tipo de campo y nombre.
Importante utilizar soft deletes.

Modelo, migración de clientes (con seeders)
en inicio vamos a trabajar solo con clientes. un crud.
creamos el modelo con la migración.
correr php artisan migrate
En la migración, metemos únicamente campo nombre de prueba, y soft deletes.
Vamos a crear también unos datos fake para poder trabajar (seeders y factory)
php artisan make:seeder ClientesTableSeeder
hay que modificar en databaseseeders la invocación a ClientesTableSeeder
luego, en ClientesTableSeeder usamos el método factory para crear los fake registros
creamos un ClienteFactory.php
ahora migrate:refresh --seed

CONTROLADOR DE CLIENTE
ahora creamos el controlador como "controlador de recursos" para que nos cree todo el sistema de rutas.
de estos métodos: solo vamos a usar:
-index para listar todos los clientes.
-store para subir nuevo cliente
-update para actualizar cliente concreto
-destroy para eliminar cliente concreto
Vamos a trabajar en inicio con index()

RUTAS
para que los métodos del controlador se utilicen, tenemos que crear las rutas en web.php
Rutas en Laravel
Importantes los verbos get (obtener recurso), post (crear nuevo registro), put (actualizar registros), delete(borrar registro).
Las rutas se definen con el verbo, la url y el controlador y método a usar.
Cuando usamos formularios para el envío de datos, estos exigen un token (ver middleware verifycsrftoken).
Cuando usamos put, hay que pasar parámetro para saber cuál es el registro que queremos modificar, el parámetro se pasa con /{}
las rutas se ubican en /routes/web => OJO HTML NO SOPORTA EL MÉTODO PUT

Nota: hasta aquí, si porbamos http://127.0.0.1:8000/clientes efectivamente, devuelve los clientes

TRAER LOS DATOS MEDIANTE AJAX.
Primero creamos la ruta para una nueva vista clientes.blade.php
hay que editar la vista home con los enlaces a esas rutas.

Vista clientes.blade.php
esta vista, es el panel de control de clientes.
de inicio, cuando se llama a esa ruta, usa el verbo get y método index.
instalar npm install --save
npm run dev

Notas para el front end
la línea de conexión entre front end y back end va a ser la siguiente línea que pondremos en la vista raíz
<script src="{{ asset('js/app.js') }}"></script>
/resources/js
En app.js se registran los componentes globales, se importan las dependencias generales y se crea la instancia principal de Vue
1º creamos /resources/views/app.blade.php
y en /routes/web.php mostramos esa view
2ºcrear todas las dependencias que necesita el proyecto => package.json => npm install (previamente instalado nodejs)
esto crea la carpeta node_modules (paralela a la vendor para backend)
3º la instancia principal de vue, referencia a un div con id=app, tenemos que incluir este id en app.blade.php
4º incluimos dentor de app.blade referencia al componente de ejemplo con su tag, vemos que trae el contenido de components/exampleComponent.vue









