<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MailerController as MailerController;
use App\Http\Controllers\OTPController as OTPController;

use App\Http\Controllers\Index\LoginController as Login;
use App\Http\Controllers\Index\RegistrationController as Registration;
use App\Http\Controllers\Index\RecoverController as Recover;

// patients controller
use App\Http\Controllers\Patient\ProfileController as PatientProfileController;
use App\Http\Controllers\Patient\EmergencyContactController as PatientEmergencyContactController;
use App\Http\Controllers\Patient\MedicalHistoryController as PatientMedicalHistoryController;
use App\Http\Controllers\Patient\FamilyDetailsController as PatientFamilyDetailsController;
use App\Http\Controllers\Patient\DocumentsController  as PatientDocumentsController;
use App\Http\Controllers\Patient\PasswordController as PatientPasswordController;
// patients controller

Route::post('SendOTP',[OTPController::class, 'compose_mail'])->name('SendOTP');
Route::get('logout',[Login::class, 'logout'])->name('Logout');

Route::prefix('')->group(function(){
    Route::get('',[Login::class, 'index'])->name('Login');
    Route::post('',[Login::class, 'login'])->name('Login');
});

Route::prefix('registration')->group(function(){
    Route::get('',[Registration::class, 'index'])->name('Registration');
    Route::post('',[Registration::class, 'register'])->name('Registration');
});

Route::prefix('recover')->group(function(){
    Route::get('',[Recover::class, 'index'])->name('Recover');
    Route::post('',[Recover::class, 'recover'])->name('Recover');
});


Route::prefix('patient')->group(function(){
// profile
    Route::prefix('')->group(function(){
        Route::get('',[PatientProfileController::class, 'index'])->name('PatientProfile');
        
    });
 
    Route::prefix('emergencycontact')->group(function(){
        Route::get('', [PatientEmergencyContactController::class, 'index'])->name('PatientEmergencyContact');
    });

    Route::prefix('medicalhistory')->group(function(){
        Route::get('', [PatientMedicalHistoryController::class,'index'])->name('PatientMedicalHistory');
    });

    Route::prefix('familydetails')->group(function(){
        Route::get('', [PatientFamilyDetailsController::class, 'index'])->name('PatientFamilyDetails');
    });

    Route::prefix('password')->group(function(){
        Route::get('', [PatientPasswordController::class, 'index'])->name('PatientPassword');
    });
// profile

// documents

    Route::prefix('documents')->group(function(){
        Route::get('',[PatientDocumentsController::class, 'index'])->name('PatientDocuments');
    });
// documents
 });