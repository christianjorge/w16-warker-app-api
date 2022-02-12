<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadesController;
use App\Http\Controllers\PostosController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
 * Para alimentação do crud web utilizei o método resource que permite criar o crud mais simples, uma só rota
 * vários tipos de chamadas. Detalhadamente em https://laravel.com/docs/8.x/controllers#resource-controllers
 * Example:
 *
 *  Verb	    URI	                    Action	Route Name
    GET	        /photos	                index	photos.index
    GET	        /photos/create	        create	photos.create
    POST	    /photos	                store	photos.store
    GET	        /photos/{photo}	        show	photos.show
    GET	        /photos/{photo}/edit	edit	photos.edit
    PUT/PATCH	/photos/{photo}	        update	photos.update
    DELETE	    /photos/{photo}	        destroy	photos.destroy
 * */


Route::redirect('/', '/postos');
Route::resources([
    'cidades' => CidadesController::class,
    'postos' => PostosController::class,
]);
