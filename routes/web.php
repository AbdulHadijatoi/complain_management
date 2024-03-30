<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\ContractorController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\SettingController;
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

// Example Routes
Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class,'showAdminLogin'])->name('login');
    Route::get('login', [LoginController::class,'showAdminLogin'])->name('showAdminLogin');
    Route::post('login-post', [LoginController::class,'login'])->name('loginPost');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [AdminController::class,'dashboard'])->name('dashboard');
    
    Route::group(['prefix'=>'complaints'], function () {
        Route::get('/', [ComplaintController::class,'index'])->name('listComplaints');
        Route::get('filter/{status}', [ComplaintController::class,'filteredList'])->name('filteredComplainList');
        Route::get('create', [ComplaintController::class,'create'])->name('createComplaint');
        Route::get('show/{id}', [ComplaintController::class,'show'])->name('showComplaint');
        Route::post('store', [ComplaintController::class,'store'])->name('storeComplaint');
        Route::get('edit/{id}', [ComplaintController::class,'edit'])->name('editComplaint');
        Route::put('update/{id}', [ComplaintController::class,'update'])->name('updateComplaint');
        Route::post('assign-to-contractor', [ComplaintController::class,'assignToContractor'])->name('assignToContractor');
        Route::delete('delete/{id}', [ComplaintController::class, 'destroy'])->name('deleteComplaint');
    });
    Route::group(['prefix'=>'contractors'], function () {
        Route::get('/', [ContractorController::class,'listContractors'])->name('listContractors');
        Route::get('create', [ContractorController::class,'createContractor'])->name('createContractor');
        Route::post('store', [ContractorController::class,'storeContractor'])->name('storeContractor');
        Route::get('{id}/edit', [ContractorController::class,'editContractor'])->name('editContractor');
        Route::put('update', [ContractorController::class,'updateContractor'])->name('updateContractor');
    });

    Route::prefix('settings')->group(function () {
        // Routes for Comunas
        Route::get('/', [SettingController::class,'index'])->name('settings');
        Route::post('/comunas', [SettingController::class,'updateComunas'])->name('updateComunas');
        Route::delete('/comunas/{id}', [SettingController::class,'deleteComunas'])->name('deleteComunas');
    
        // Routes for Sectors
        Route::post('/sectors', [SettingController::class,'updateSectors'])->name('updateSectors');
        Route::delete('/sectors/{id}', [SettingController::class,'deleteSectors'])->name('deleteSectors');

        // Routes for Populations
        Route::post('/populations', [SettingController::class,'updatePopulations'])->name('updatePopulations');
        Route::delete('/populations/{id}', [SettingController::class,'deletePopulations'])->name('deletePopulations');
    
        // Routes for Type of Faults
        Route::post('/type-of-faults', [SettingController::class,'updateTypeOfFaults'])->name('updateTypeOfFaults');
        Route::delete('/type-of-faults/{id}', [SettingController::class,'deleteTypeOfFaults'])->name('deleteTypeOfFaults');

        Route::get('getSectorsByComuna', [SettingController::class, 'getSectorsByComuna'])->name('getSectorsByComuna');
        Route::get('getPopulationsBySector', [SettingController::class, 'getPopulationsBySector'])->name('getPopulationsBySector');

        // Update Comuna
        Route::put('/update-comuna', [SettingController::class, 'updateComuna'])->name('updateComuna');

        // Update Sector
        Route::put('/update-sector', [SettingController::class, 'updateSector'])->name('updateSector');

        // Update Population
        Route::put('/update-population', [SettingController::class, 'updatePopulation'])->name('updatePopulation');

        // Update Type of Fault
        Route::put('/update-fault', [SettingController::class, 'updateFault'])->name('updateFault');

        // Delete Comuna
        Route::delete('/delete-comuna/{id}', [SettingController::class, 'deleteComuna'])->name('deleteComuna');

        // Delete Sector
        Route::delete('/delete-sector/{id}', [SettingController::class, 'deleteSector'])->name('deleteSector');

        // Delete Population
        Route::delete('/delete-population/{id}', [SettingController::class, 'deletePopulation'])->name('deletePopulation');

        // Delete Type of Fault
        Route::delete('/delete-fault/{id}', [SettingController::class, 'deleteFault'])->name('deleteFault');
    });
   

    Route::post('logout', [LoginController::class,'logout'])->name('logout');
});













Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');


