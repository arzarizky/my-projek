<?php

use Illuminate\Support\Facades\Route;

//Namespace Auth
use App\Http\Controllers\Auth\LoginController;

//Namespace Admin
use App\Http\Controllers\Admin\AdminController;

//Namespace User
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\IisController;
use App\Http\Controllers\User\AlproController;
use App\Http\Controllers\User\NetworkController;
use App\Http\Controllers\User\DatabaseController;
use App\Http\Controllers\User\FraudController;
use App\Http\Controllers\User\SecurityController;
use App\Http\Controllers\User\SummaryController;

use App\Http\Controllers\User\JadwalController;

use App\Http\Controllers\User\IncidentController;

use App\Http\Controllers\User\KontakController;

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




Route::group(['namespace' => 'Admin','middleware' => 'auth','prefix' => 'admin'],function(){
	
	Route::get('/',[AdminController::class,'index'])->name('admin')->middleware(['can:admin']);

	//Route Rescource
	Route::resource('/user','UserController')->middleware(['can:admin']);

	//Route View
	
	Route::view('/404-page','admin.404-page')->name('404-page');
	Route::view('/blank-page','admin.blank-page')->name('blank-page');
	Route::view('/buttons','admin.buttons')->name('buttons');
	Route::view('/cards','admin.cards')->name('cards');
	Route::view('/utilities-colors','admin.utilities-color')->name('utilities-colors');
	Route::view('/utilities-borders','admin.utilities-border')->name('utilities-borders');
	Route::view('/utilities-animations','admin.utilities-animation')->name('utilities-animations');
	Route::view('/utilities-other','admin.utilities-other')->name('utilities-other');
	Route::view('/chart','admin.chart')->name('chart');
	Route::view('/tables','admin.tables')->name('tables');
	

});

Route::group(['namespace' => 'User','middleware' => 'auth' ,'prefix' => 'user'],function(){

	Route::get('/',[UserController::class,'index'])->name('user');
	Route::get('/profile',[ProfileController::class,'index'])->name('profile');
	Route::patch('/profile/update/{user}',[ProfileController::class,'update'])->name('profile.update');
});

//iis
Route::group(['namespace' => 'User','middleware' => 'auth' ,'prefix' => 'iis'],function(){

	// Security and Fraud Route
	Route::get('/',[IisController::class,'index'])->name('iis');
	Route::post('/create', [IisController::class, 'create'])->name('iis.create');
	Route::get('/edit/{security_fraud}', [IisController::class, 'edit'])->name('iis.edit');
	Route::post('/update/{security_fraud}', [IisController::class, 'update'])->name('iis.update');
	Route::get('/delete/{security_fraud}', [IisController::class, 'destroy'])->name('iis.destroy');

	// Alpro's Route
	Route::get('alpro',[AlproController::class,'index'])->name('iis.alpro');

	Route::get('ip_addresses',[AlproController::class,'getIpAddresses'])->name('iis.alpro.ip_addresses');
	Route::get('hostname_alpros/{ip_address}',[AlproController::class,'getHostnameAlprosbyIpAddress'])->name('iis.alpro.hostname_alpros');

	Route::post('alpro',[AlproController::class,'store'])->name('iis.alpro.store');
	Route::get('alpro/{alpro}/edit',[AlproController::class,'edit'])->name('iis.alpro.edit');
	Route::put('alpro/{alpro}', [AlproController::class, 'update'])->name('iis.alpro.update');
	Route::delete('alpro/{alpro}', [AlproController::class, 'destroy'])->name('iis.alpro.destroy');

	// Network's Route
	Route::get('network',[NetworkController::class,'index'])->name('iis.network');
	
	Route::get('interconnections',[NetworkController::class,'getInterconnections'])->name('iis.network.interconnections');
	Route::get('names/{interconnection}',[NetworkController::class,'getNamesbyInterconnection'])->name('iis.network.names');

	Route::post('network',[NetworkController::class,'store'])->name('iis.network.store');
	Route::get('network/{network}/edit',[NetworkController::class,'edit'])->name('iis.network.edit');
	Route::put('network/{network}', [NetworkController::class, 'update'])->name('iis.network.update');
	Route::delete('network/{network}', [NetworkController::class, 'destroy'])->name('iis.network.destroy');

	// Database's Route
	Route::get('database',[DatabaseController::class,'index'])->name('iis.database');
	Route::get('dbmses',[DatabaseController::class,'getDbmses'])->name('iis.database.dbmses');
    Route::get('hostnames/{dbms}', [DatabaseController::class, 'getHostnamesbyDbms'])->name('iis.database.hostnames');
    Route::get('activities/{hostname}', [DatabaseController::class, 'getActivitiesbyHostname'])->name('iis.database.activities');

	Route::post('database', [DatabaseController::class, 'store'])->name('iis.database.store');
	Route::get('database/{database}/edit',[DatabaseController::class,'edit'])->name('iis.database.edit');
	Route::put('database/{database}', [DatabaseController::class, 'update'])->name('iis.database.update');
	Route::delete('database/{database}', [DatabaseController::class, 'destroy'])->name('iis.database.destroy');


	// Fraud's Route
	Route::get('fraud',[FraudController::class,'index'])->name('iis.fraud');
	Route::post('fraud', [FraudController::class, 'store'])->name('iis.fraud.store');
	Route::get('fraud/{fraud}/edit',[FraudController::class,'edit'])->name('iis.fraud.edit');
	Route::put('fraud/{fraud}', [FraudController::class, 'update'])->name('iis.fraud.update');
	Route::delete('fraud/{fraud}', [FraudController::class, 'destroy'])->name('iis.fraud.destroy');
	
	// Security's Route
	Route::get('security',[SecurityController::class,'index'])->name('iis.security');
	Route::post('security', [SecurityController::class, 'store'])->name('iis.security.store');
	Route::get('security/{security}/edit',[SecurityController::class,'edit'])->name('iis.security.edit');
	Route::put('security/{security}', [SecurityController::class, 'update'])->name('iis.security.update');
	Route::delete('security/{security}', [SecurityController::class, 'destroy'])->name('iis.security.destroy');
	
	// Summary's Route
	Route::get('summary',[SummaryController::class,'index'])->name('iis.summary');

});

//jadwal
Route::group(['namespace' => 'User','middleware' => 'auth' ,'prefix' => 'jadwal'],function(){

	Route::get('/',[JadwalController::class,'index'])->name('jadwal');

});
//kontak
Route::group(['namespace' => 'User','middleware' => 'auth' ,'prefix' => 'kontak'],function(){

	Route::get('/',[KontakController::class,'index'])->name('kontak');

});

//incident
Route::group(['namespace' => 'User','middleware' => 'auth' ,'prefix' => 'incident'],function(){

	Route::get('/',[IncidentController::class,'index'])->name('incident');
	Route::post('/', [IncidentController::class, 'store'])->name('incident.store');
	Route::get('/{incident}/edit', [IncidentController::class, 'edit'])->name('incident.edit');
	Route::put('/{incident}', [IncidentController::class, 'update'])->name('incident.update');
	Route::delete('/{incident}', [IncidentController::class, 'destroy'])->name('incident.destroy');

});


Route::group(['namespace' => 'Auth','middleware' => 'guest'],function(){
	Route::view('/','auth.login')->name('login');
	Route::post('/',[LoginController::class,'authenticate'])->name('login.post');
});

// Other
Route::view('/beranda','beranda');
Route::view('/register','auth.register')->name('register');
Route::view('/forgot-password','auth.forgot-password')->name('forgot-password');
Route::get('/logout',function(){
	return redirect()->to('/')->with(Auth::logout());
})->name('logout');
