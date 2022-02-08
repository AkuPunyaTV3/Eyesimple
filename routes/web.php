

<?php

use App\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/a', function () {
//     echo("a");



// });

// Subjects (start) ----------------

Route::get('/subjects', 'SubjectsController@index')->name('subjects');




Route::get('/subjects/create', 'SubjectsController@create')->name('subjects.create');
Route::post('/subjects/store', 'SubjectsController@store')->name('subjects.store');


Route::get('/subjects/store/{id}', 'SubjectsController@edit')->name('subjects.edit');
Route::post('/subjects/update/{id}', 'SubjectsController@update')->name('subjects.update');

Route::get('/subjects/delete/{id}', 'SubjectsController@destroy')->name('subjects.delete');

//ROLE
Route::get('/roles/role', 'RoleController@index')->name('roles.role');
//Add Role
Route::get('/roles/add_role', 'RoleController@create')->name('roles.add_role');
Route::post('/roles/add_role_create', 'RoleController@store')->name('roles.add_role_create');

//EDIT DELETE ROLE
Route::get('/roles/store/{id}', 'RoleController@edit')->name('roles.edit');
Route::post('/roles/update/{id}', 'RoleController@update')->name('roles.update');

Route::get('/roles/delete/{id}', 'RoleController@destroy')->name('roles.delete');

//Pets LIST
Route::get('/pets', 'PetsController@index')->name('pets');
//PetsName LIST
Route::get('/petsname', 'PetsController@index_petsname')->name('petsname');
//Species  LIST
Route::get('/species', 'PetsController@index_species')->name('species');
//Pets User LIST
Route::get('/pets/users', 'PetsController@index_users')->name('pets.users');
//HTML Coba
Route::get('/HTML', 'HTMLController@index')->name('html');
//HTML Tugas
Route::get('/HTML/tugas', 'HTMLController@index_tugas')->name('html_tugas');


//Add PETS
Route::get('/pets/create', 'PetsController@create')->name('pets.create');
Route::post('/pets/store', 'PetsController@store')->name('pets.store');

//ADD Species
Route::get('/pets/create_species', 'PetsController@create_species')->name('pets.create_species');
Route::post('/pets/store_species', 'PetsController@store_species')->name('pets.store_species');

//ADD PET NAMES
Route::get('/pets/create_petnames', 'PetsController@create_petnames')->name('pets.create_petsname');
Route::post('/pets/store_petnames', 'PetsController@store_petnames')->name('pets.store_petsname');

//DATA TABLE
//roles
Route::post('roles/roles_datatable', 'RoleController@roles_datatable')->name('roles_datatable');
//pets
Route::post('pets_datatable', 'PetsController@pets_datatable')->name('pets_datatable');
//species
Route::post('pets_datatable_species', 'PetsController@pets_datatable_species')->name('pets_datatable_species');
//petsname
Route::post('pets_datatable_petsname', 'PetsController@pets_datatable_petsname')->name('pets_datatable_petsname');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
