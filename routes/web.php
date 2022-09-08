<?php

use Illuminate\Support\Facades\Route;
// global controllers
    use App\Http\Controllers\MailerController as MailerController;
    use App\Http\Controllers\OTPController as OTPController;
    use App\Http\Controllers\Documents as Documents;

    //index
    use App\Http\Controllers\Index\LoginController as Login;
    use App\Http\Controllers\Index\RegistrationController as Registration;
    use App\Http\Controllers\Index\RecoverController as Recover;

    //populate select
    use App\Http\Controllers\PopulateSelectController as PopulateSelectController;
// global controllers

// patients controllers
    //profile
    use App\Http\Controllers\Patient\Profile\ProfileController as PatientProfileController;
    use App\Http\Controllers\Patient\Profile\EmergencyContactController as PatientEmergencyContactController;
    use App\Http\Controllers\Patient\Profile\MedicalHistoryController as PatientMedicalHistoryController;
    use App\Http\Controllers\Patient\Profile\FamilyDetailsController as PatientFamilyDetailsController;
    use App\Http\Controllers\Patient\Profile\AssessmentDiagnosisController as PatientAssessmentDiagnosisController;
    use App\Http\Controllers\Patient\Profile\PasswordController as PatientPasswordController;
    
    // documents
    use App\Http\Controllers\Patient\Document\UploadsController as PatientUploadsController;
    use App\Http\Controllers\Patient\Document\PrescriptionsController as PatientPrescriptionsController;

    // vaccination insurance
    use App\Http\Controllers\Patient\VaccinationInsuranceController as PatientVaccinationInsuranceController;
// patients controllers

// admin controllers
    use App\Http\Controllers\Admin\Configuration\Inventory\EquipmentController as AdminConfigurationInventoryEquipmentController;

    use App\Http\Controllers\Admin\User\PatientController as AdminUserPatientController;
    use App\Http\Controllers\Admin\User\PersonnelController as AdminUserPersonnelController;

    use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

    use App\Http\Controllers\Admin\Inventory\Equipment\AllController as AdminInventoryEquipmentAllController;
    use App\Http\Controllers\Admin\Inventory\Equipment\PerProductController as AdminInventoryEquipmentPerProductController;

    use App\Http\Controllers\Admin\Report\EquipmentController as AdminReportEquipmentController;
// admin controllers

//global routes
Route::prefix('')->group(function(){
    //remove this send otp and logout before inserting middleware
    Route::post('SendOTP',[OTPController::class, 'compose_mail'])->name('SendOTP');
    Route::get('logout',[Login::class, 'logout'])->name('Logout');
    //login
    Route::prefix('')->group(function(){
        Route::get('',[Login::class, 'index'])->name('Login');
        Route::post('',[Login::class, 'login'])->name('Login');
    });
    //registration
    Route::prefix('registration')->group(function(){
        Route::get('',[Registration::class, 'index'])->name('Registration');
        Route::post('',[Registration::class, 'register'])->name('Registration');
    });
    //forgot password
    Route::prefix('recover')->group(function(){
        Route::get('',[Recover::class, 'index'])->name('Recover');
        Route::post('',[Recover::class, 'recover'])->name('Recover');
    });

    //populate
    Route::prefix('populate')->group(function(){
        //address
        Route::get('province',[PopulateSelectController::class, 'province'])->name('GetProvince');
        Route::get('municipality/{prov_code}', [PopulateSelectController::class, 'municipality'])->name('GetMunicipality');
        Route::get('barangay/{mun_code}', [PopulateSelectController::class, 'barangay'])->name('GetBarangay');
        // grade level, department, program
        Route::get('gradelevel', [PopulateSelectController::class, 'grade_level'])->name('GetGradeLevel');
        Route::get('department/{gl_id}',[PopulateSelectController::class, 'department'])->name('GetDepartment');
        Route::get('program/{dept_id}',[PopulateSelectController::class, 'program'])->name('GetProgram');
    });
});
//global routes

//patient routes
Route::prefix('patient')->group(function(){
    // profile
        Route::prefix('')->group(function(){
            Route::get('',[PatientProfileController::class, 'index'])->name('PatientProfile');
            Route::post('updatepic',[PatientProfileController::class, 'update_pic'])->name('UpdatePatientPic');
            Route::post('updateprofile', [PatientProfileController::class, 'update_profile'])->name('UpdatePatientProfile');
        });
    
        Route::prefix('emergencycontact')->group(function(){
            Route::get('', [PatientEmergencyContactController::class, 'index'])->name('PatientEmergencyContact');
            Route::post('', [PatientEmergencyContactController::class, 'update_emergency_contact'])->name('UpdatePatientEmergencyContact');
        });

        Route::prefix('medicalhistory')->group(function(){
            Route::get('', [PatientMedicalHistoryController::class,'index'])->name('PatientMedicalHistory');
            Route::post('', [PatientMedicalHistoryController::class,'update_medical_history'])->name('UpdatePatientMedicalHistory');
        });

        Route::prefix('familydetails')->group(function(){
            Route::get('', [PatientFamilyDetailsController::class, 'index'])->name('PatientFamilyDetails');
            Route::post('', [PatientFamilyDetailsController::class, 'update_family_details'])->name('UpdatePatientFamilyDetails');
        });

        Route::prefix('assessmentdiagnosis')->group(function(){
            Route::get('', [PatientAssessmentDiagnosisController::class, 'index'])->name('PatientAssessmentDiagnosis');
            Route::post('', [PatientAssessmentDiagnosisController::class, 'update_assessment_diagnosis'])->name('UpdatePatientAssessmentDiagnosis');
        });

        Route::prefix('password')->group(function(){
            Route::get('', [PatientPasswordController::class, 'index'])->name('PatientPassword');
            Route::post('', [PatientPasswordController::class, 'update_password'])->name('UpdatePatientPassword');
        });
    // profile

    // documents
        Route::prefix('uploads')->group(function(){
            Route::get('',[PatientUploadsController::class, 'index'])->name('PatientUploads');
            Route::post('',[PatientUploadsController::class, 'upload'])->name('PatientUploads');
        });

        Route::prefix('prescriptions')->group(function(){
            Route::get('',[PatientPrescriptionsController::class, 'index'])->name('PatientPrescriptions');
        });
    // documents

    //vaccination insurance
        Route::prefix('vaccinationinsurance')->group(function(){
            Route::get('', [PatientVaccinationInsuranceController::class, 'index'])->name('PatientVaccinationInsurance');
        });
    //vaccination insurance
});
//patient routes

//admin routes
Route::prefix('admin')->group(function(){

    //dashboard
    Route::get('', [AdminDashboardController::class, 'index'])->name('AdminDashboard');

    //users
    Route::prefix('users')->group(function(){

        Route::prefix('patient')->group(function(){
            Route::get('', [AdminUserPatientController::class, 'index'])->name('AdminUserPatient');
            Route::get('/{id}', [AdminUserPatientController::class, 'view_patient_details'])->name('AdminViewPatientDetails');
            Route::get('updateaccountstatus/{id}',[AdminUserPatientController::class, 'update_account_status'])->name('AdminUpdatePatientAccountStatus');
        });
        
        Route::prefix('personnel')->group(function(){
            Route::get('', [AdminUserPersonnelController::class, 'index'])->name('AdminUserPersonnel');
        });
    });
    //users

    // inventory
    Route::prefix('inventory')->group(function(){

        Route::prefix('equipment')->group(function(){

            Route::prefix('all')->group(function(){
                Route::get('', [AdminInventoryEquipmentAllController::class, 'index'])->name('AdminInventoryEquipmentAll');
            });
            
            Route::prefix('perproduct')->group(function(){
                Route::get('', [AdminInventoryEquipmentPerProductController::class, 'index'])->name('AdminInventoryEquipmentPerProduct');
                Route::post('', [AdminInventoryEquipmentPerProductController::class, 'insert'])->name('AdminInventoryEquipmentPerProduct');
                Route::post('update/{id}', [AdminInventoryEquipmentPerProductController::class, 'update'])->name('AdminInventoryUpdateEquipmentPerProduct');
                Route::get('delete/{id}', [AdminInventoryEquipmentPerProductController::class, 'delete'])->name('AdminInventoryDeleteEquipmentPerProduct');
            });
        });

    });
    // inventory

    // reports
    Route::prefix('report')->group(function(){
        Route::get('equipment', [AdminReportEquipmentController::class, 'index'])->name('AdminReportEquipment');
    });
    // reports
    // configuration
    Route::prefix('configuration')->group(function(){

        Route::prefix('equipment')->group(function(){

            Route::prefix('item')->group(function(){
                Route::get('', [AdminConfigurationInventoryEquipmentController::class, 'index_item'])->name('AdminConfigurationEquipmentItem');
                Route::post('', [AdminConfigurationInventoryEquipmentController::class, 'insert_item'])->name('AdminConfigruationInsertEquipmentItem');
                Route::post('update/{id}', [AdminConfigurationInventoryEquipmentController::class, 'update_item'])->name('AdminConfigruationUpdateEquipmentItem');
                Route::get('delete/{id}', [AdminConfigurationInventoryEquipmentController::class, 'delete_item'])->name('AdminConfigurationDeleteEquipmentItem');
            });

            Route::prefix('name')->group(function(){
                Route::get('', [AdminConfigurationInventoryEquipmentController::class, 'index_name'])->name('AdminConfigurationEquipmentName');
                Route::post('', [AdminConfigurationInventoryEquipmentController::class, 'insert_name'])->name('AdminConfigruationInsertEquipmentName');
                Route::post('update/{id}', [AdminConfigurationInventoryEquipmentController::class, 'update_name'])->name('AdminConfigruationUpdateEquipmentName');
                Route::get('delete/{id}', [AdminConfigurationInventoryEquipmentController::class, 'delete_name'])->name('AdminConfigurationDeleteEquipmentName');
            });

            Route::prefix('brand')->group(function(){
                Route::get('', [AdminConfigurationInventoryEquipmentController::class, 'index_brand'])->name('AdminConfigurationEquipmentBrand');
                Route::post('', [AdminConfigurationInventoryEquipmentController::class, 'insert_brand'])->name('AdminConfigruationInsertEquipmentBrand');
                Route::post('update/{id}', [AdminConfigurationInventoryEquipmentController::class, 'update_brand'])->name('AdminConfigruationUpdateEquipmentBrand');
                Route::get('delete/{id}', [AdminConfigurationInventoryEquipmentController::class, 'delete_brand'])->name('AdminConfigurationDeleteEquipmentBrand');
            });

            Route::prefix('type')->group(function(){
                Route::get('', [AdminConfigurationInventoryEquipmentController::class, 'index_type'])->name('AdminConfigurationEquipmentType');
                Route::post('', [AdminConfigurationInventoryEquipmentController::class, 'insert_type'])->name('AdminConfigruationInsertEquipmentType');
                Route::post('update/{id}', [AdminConfigurationInventoryEquipmentController::class, 'update_type'])->name('AdminConfigruationUpdateEquipmentType');
                Route::get('delete/{id}', [AdminConfigurationInventoryEquipmentController::class, 'delete_type'])->name('AdminConfigurationDeleteEquipmentType');
            });

            Route::prefix('place')->group(function(){
                Route::get('', [AdminConfigurationInventoryEquipmentController::class, 'index_place'])->name('AdminConfigurationEquipmentPlace');
                Route::post('', [AdminConfigurationInventoryEquipmentController::class, 'insert_place'])->name('AdminConfigruationInsertEquipmentPlace');
                Route::post('update/{id}', [AdminConfigurationInventoryEquipmentController::class, 'update_place'])->name('AdminConfigruationUpdateEquipmentPlace');
                Route::get('delete/{id}', [AdminConfigurationInventoryEquipmentController::class, 'delete_place'])->name('AdminConfigurationDeleteEquipmentPlace');
            });
        });

    });
    // configuration
});
//admin routes

Route::get('view/{pd_id}', [Documents::class, 'view'])->name('ViewDocument');