
# instrucciones de juan guillermo despues de clonar el proyecto desde github
# me disculpo no alcance a hacer pruebas pues estoy laborando actualmente y debo responder por los objetivos del dia.
# ya que es un proyecto de pruebaTEcnica "pequeño" no vi la necesidad de usar traits, Request u otros

1. asegurese de tener instalado composer el manejador de paquetes para php
2. ejecute  composer install
4. renombre .env.example por .env y asegurese tener esta variable API_KEY=rhGASH5alEghJ1i++9BGkDNVXhfOMCx3T5e5Q6E+VFE=
4. ejectute php artisan key:generate  para generar la llave del proyecto
5. asegurese de tener mysql  o si desea cambie a postgres , sqlite etc. haciendolo en el archivo database.php
6. ejecute php artisan migrate  , para crear la tabla locations en la db
7. ejecute php artisan db:seed para crear data de prueba
8. ejecute php artisan serve   para arrancar la app
9. ya tiene disponible la pagina http://localhost:8000/api/locations  de su pc para probar con postman
9.1. use el archivo api.http que tiene las solicitudes a la api (debe instalar plugin : rest-client  de vscode)

# cree una sola ruta get y no apiResource pues de momento no se usarian esos otros metodos api
