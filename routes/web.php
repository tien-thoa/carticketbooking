<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', function () {
    return view('home');
});

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
// User

Route::middleware('auth')->group(function () {
    Route::get('user/edit', 'UserController@edit')->name('user.edit');
    Route::post('user/edit', 'UserController@update')->name('user.update');
    Route::get('user/password', 'UserController@passwordEdit')->name('password.edit');
    Route::post('user/password', 'UserController@passwordUpdate')->name('password.update');
    Route::get('user/profileticket', 'UserController@profileticket')->name('user.profileticket');
    Route::get('user/logout', 'UserController@logout')->name('user.logout');
    Route::post('user/Booking/{id}', 'UserController@booking')->name('user.booking');
});
route::get('admin/login',function(){
    return view('admin.login');
});
Route::post('admin/login', 'AdminController@login')->name('admin.login');
Route::middleware(['admin'])->group(function() {
    Route::get('admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');
    // model
    Route::get('/admin/Manager/{model}', 'ManagerUserController@manager')->name('manageruser');
    Route::get('/admin/manager/{model}', 'ManagerTicketController@manager')->name('managerticket');
    Route::get('/admin/managerv/{model}', 'ManagerVehiclesController@manager')->name('managervehicles');
    // search
    Route::post('/admin/Manager/{model}', 'ManagerUserController@manager')->name('manageruser');
    Route::post('/admin/manager/{model}', 'ManagerTicketController@manager')->name('managerticket');
    Route::post('/admin/managerv/{model}', 'ManagerVehiclesController@manager')->name('managervehicles'); 
    // manageruser
    Route::get('/admin/ManagerUser/Edit/{id}', 'ManagerUserController@edit')->name('usermanager.edit');
    Route::post('/admin/ManagerUser/Editpw/{id}', 'ManagerUserController@updatepw')->name('usermanager.updatepw');
    Route::post('/admin/ManagerUser/Edit/{id}', 'ManagerUserController@update')->name('usermanager.update');
    Route::get('/admin/ManagerUser/Create', 'ManagerUserController@create')->name('usermanager.create');
    Route::post('/admin/ManagerUser/Create', 'ManagerUserController@createupdate')->name('usermanager.createupdate');
    Route::get('/admin/ManagerUser/{id}', 'ManagerUserController@delete')->name('usermanager.delete');
    // managerticket
  
    Route::get('/admin/ManagerTicket/Create', 'ManagerTicketController@create')->name('ticket.create');
    Route::post('/admin/ManagerTicket/Create', 'ManagerTicketController@createupdate')->name('ticket.createupdate');
    Route::get('/admin/ManagerTicket/Edit/{id}', 'ManagerTicketController@edit')->name('ticket.edit');
    Route::post('/admin/ManagerTicket/Edit/{id}', 'ManagerTicketController@update')->name('ticket.update');
    Route::get('/admin/Ticket/{id}', 'ManagerTicketController@delete')->name('ticket.delete');
    // managervehicles

    Route::get('/admin/ManagerVehicles/Create', 'ManagerVehiclesController@create')->name('vehicles.create');
    Route::post('/admin/ManagerVehicles/Create', 'ManagerVehiclesController@createupdate')->name('vehicles.createupdate');
    Route::get('/admin/ManagerVehicles/Edit/{id}', 'ManagerVehiclesController@edit')->name('vehicles.edit');
    Route::post('/admin/ManagerVehicles/Edit/{id}', 'ManagerVehiclesController@update')->name('vehicles.update');
    Route::get('/admin/Vehicles/{id}', 'ManagerVehiclesController@delete')->name('vehicles.delete');
    //profileuserbookingticket
    });
// Search
    Route::get('/search_ticket', 'BookingController@search')->name('search_ticket');
    Route::get('/check-test', 'BookingController@check1')->name('check1');
    Route::post('/check-test', 'BookingController@check2')->name('check2');
