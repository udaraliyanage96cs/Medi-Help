<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\ReportController;
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


Route::get('/signout',function(){
    Auth::logout();
    return redirect('/');
});


Route::get('/darkmode/{id}',[UserController::class,'setCookie']);
Route::get('/getDarkValue',[UserController::class,'getDarkValue']);


Route::get('/accessdenide',[UserController::class,'accessdenide']);
Route::post('/signup',[UserController::class,'signup']);


Route::middleware(['CheckAuth'])->group(function () {

    Route::get('/home',[UserController::class,'home'])->name('home');

    Route::middleware(['RollValidator'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::prefix('staff')->group(function () { 
                Route::get('/',[UserController::class,'staff'])->name('staff');
                Route::get('/add',[UserController::class,'staffAddView']);
                Route::get('/edit/{id}',[UserController::class,'staffEditView']);
                Route::get('/delete/{id}',[UserController::class,'staffDelete']);
                Route::post('/edit/{id}',[UserController::class,'staffEdit']);
                Route::post('/add',[UserController::class,'staffAdd']);
            });
        });
    });

    Route::middleware(['RoleValidatorStaff'])->group(function () {
        $admin_staff_groups = ['admin', 'doctor','cashier','pharmasist'];
        foreach ($admin_staff_groups as $admin_staff_group) {
            Route::prefix($admin_staff_group)->group(function () use ($admin_staff_group) {
                Route::prefix('patient')->group(function () {  
                    Route::get('/',[UserController::class,'patient'])->name('patient');
                    Route::get('/add',[UserController::class,'patientAddView']);
                    Route::post('/add',[UserController::class,'patientAdd']);
                    Route::get('/view/{id}',[UserController::class,'patientProfileView'])->name('profile');
                    Route::get('/edit/{id}',[UserController::class,'patientEditView']);
                    Route::post('/edit/{id}',[UserController::class,'patientEdit']);
                    Route::get('/puid/{id}',[UserController::class,'patientPuid']);

                    Route::prefix('reports')->group(function () {  
                        Route::get('/add/{id}',[ReportController::class,'reportsAddView']);
                        Route::post('/add/{id}',[ReportController::class,'reportsAdd']);
                    });
                });
                Route::prefix('ticket')->group(function () {  
                    Route::get('/',[TicketController::class,'ticket'])->name('ticket');
                    Route::get('/add/{id}',[TicketController::class,'ticketAdd']);
                    Route::get('/channels/{date}',[TicketController::class,'channels']);
                    Route::get('/getspecific/{date}',[TicketController::class,'getspecific']);
                    Route::post('/add',[TicketController::class,'ticketAddAJAX']);
                });
                Route::prefix('recipts')->group(function () { 
                    Route::get('/',[ChannelController::class,'recipts'])->name('reciptslist');
                    Route::get('/view/{id}',[ChannelController::class,'reciptsView'])->name('reciptView');
                    Route::get('/filter/{date}',[ChannelController::class,'reciptsFilter']);
                    Route::get('/price/{id}',[ChannelController::class,'reciptsStaff']);
                    Route::post('/price/{id}',[ChannelController::class,'reciptsStaffAdd']);
                });
                
            });
        }
    });

    Route::middleware(['ValidatorDoctor'])->group(function () {
        $admin_staff_groups = ['admin', 'doctor','cashier','pharmasist'];
        foreach ($admin_staff_groups as $admin_staff_group) {
            Route::prefix($admin_staff_group)->group(function () use ($admin_staff_group) { 
                Route::prefix('channels')->group(function () {  
    
                    Route::get('/',[ChannelController::class,'channels']);
                    Route::get('/add',[ChannelController::class,'channelAddView']);
                    Route::post('/add',[ChannelController::class,'channelAdd']);
                    Route::get('/view/{id}',[ChannelController::class,'channelSingleView']);
                    Route::get('/edit/{id}',[ChannelController::class,'channelEditView']);
                    Route::post('/edit/{id}',[ChannelController::class,'channelEdit']);
    
                    Route::prefix('recipts')->group(function () {  
                        Route::get('/add/{id}',[ChannelController::class,'reciptsAddView']);
                        Route::get('/edit/{id}',[ChannelController::class,'reciptsEditView']);
                        Route::post('/add/{id}',[ChannelController::class,'reciptsAdd']);
                        Route::post('/edit/{id}',[ChannelController::class,'reciptsEdit']);
                        
                    });
                });
    
                
            });
        }
    });
    
});




