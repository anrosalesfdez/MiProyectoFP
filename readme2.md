## DIARIO DE TRABAJO

### PREPARACIÓN DEL ENTORNO DE TRABAJO
1. Instalaciones. Requisitos:
xampp => servidor apache, mysql, php...
composer => administrador de dependencias php => paquetes para laravel
laravel => ver documentación laravel
npm => administrador de dependencias vueJS

una vez instalamos proyecto probamos que funciona de inicio

2. Inicio repositorio GITHUB
git init...

3. Estructura de carpetas en el proyecto
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

4. Configuración de la base de datos
ver .env  ===> bd = miproyectofp

5. Sistema log in / sign up
php artisan ui vue --auth

6. Adaptación de vistas:
/layour/app.blade es de donde parte todo. Tiene un head, yield('content)
welcome.blade extends app. Aquí monta el sistema de autenticación.
home.blade extends app
Para probar el sistema hasta aquí, tenemos que crear las migraciones.
Ojo, error por tipo datos sql, ver provider.

7. Crear modelo Cliente y migraciones.
php artisan make:model Cliente -m //incluye ya la creación de la migración
Nota: el modelo representa las tablas de una bd, sería Modelo = Empleado, BD = empleados
Al crear el modelo, este referencia a un namespace que simula la ubicación en las carpetas y que permitirá importar clases.
La estructura de la migración inicial que ofrece laravel, es básica, e importa la clase Schema con la que nos permite crear las tablas, ya trae dos campos por defecto: fecha de creación y actualización.
para crear campo, $table->seguido del tipo de campo y nombre.
Importante utilizar soft deletes.

- MODELO Y MIGRACION DE CLIENTE
En inicio vamos a trabajar solo con clientes. un crud.
creamos el modelo con la migración.
correr php artisan migrate
En la migración, metemos únicamente campo nombre de prueba, y soft deletes.
Vamos a crear también unos datos fake para poder trabajar (seeders y factory)
php artisan make:seeder ClientesTableSeeder
hay que modificar en databaseseeders la invocación a ClientesTableSeeder
luego, en ClientesTableSeeder usamos el método factory para crear los fake registros
creamos un ClienteFactory.php
ahora migrate:refresh --seed

- CONTROLADOR DE CLIENTE
ahora creamos el controlador como "controlador de recursos" para que nos cree todo el sistema de rutas.
de estos métodos: solo vamos a usar:
-index para listar todos los clientes.
-store para subir nuevo cliente
-update para actualizar cliente concreto
-destroy para eliminar cliente concreto
Vamos a trabajar en inicio con index()

- RUTAS
para que los métodos del controlador se utilicen, tenemos que asociar a las rutas en web.php un controlador y método a emplear.
LARAVEL
Las rutas se definen con el verbo, la url y el controlador y método a usar.
Por ahora, así llamaremos a las vistas básicas del menú vertical.
Rutas en Laravel
Importantes los verbos get (obtener recurso), post (crear nuevo registro), put (actualizar registros), delete(borrar registro).
Cuando usamos formularios para el envío de datos, estos exigen un token (ver middleware verifycsrftoken).
Cuando usamos put, hay que pasar parámetro para saber cuál es el registro que queremos modificar, el parámetro se pasa con /{}
RUTAS PARA VUE
Es más sencillo.
Se crea una ruta como un resource, trabajamos con la librería AXIOS para conectar con la bd. Por tanto, ya no se usan forms con el action y method. Evita problema de que html no soporte put.
Al ser un resource, en función del verbo que se emplee en la request, se ejecuta un método determinado del controlador.
interesante ejecutar php artisan routes:list

TRAER LOS DATOS MEDIANTE AXIOS.
Primero creamos la ruta para una nueva vista clientes.blade.php => ruta en web.php
Esta ruta se activa con el botón "clientes" de la nav vertical.
Esa vista, contiene una etiqueta de VUE <clientes> y requiere de la creación del componente "clientes.vue" y ahí, en el front end tiene el ajax que tira del controlador.

- Notas para el front end
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









