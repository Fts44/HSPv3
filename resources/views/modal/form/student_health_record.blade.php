<div class="modal fade" id="modal_form_shr" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_title" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" style="font-size: 15px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title">Student Health Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('StudentHealthRecordInsert') }}" method="POST">
                    <!-- date, sr, prog -->
                    @csrf
                    <fieldset class="border border-secondary pb-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Header</legend>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-4 mt-1">
                                Medical Examination Date:
                                <input type="date" name="shr_med" id="shr_med" class="form-control" value="{{ old('shr_med',date('Y-m-d')) }}">
                                <span class="text-danger">
                                    @error('shr_med')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-4 mt-1">
                                SR-Code:
                                <input type="text" name="shr_srcode" id="shr_srcode" class="form-control" value="{{ old('shr_srcode',$patient_details->sr_code) }}">
                                <span class="text-danger">
                                    @error('shr_srcode')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-4 mt-1">
                                Program:
                                <select name="shr_program" id="shr_program" class="form-select">
                                    <option value="">--- choose ---</option>
                                    @foreach($programs as $prog)
                                        <option value="{{ $prog->prog_id }}" {{ (old('shr_program',$patient_details->prog_id)==$prog->prog_id) ? 'selected' : '' }}>{{ $prog->prog_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('shr_program')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                    </fieldset>
                    <!-- personal info -->
                    <fieldset class="border border-secondary pb-2 mt-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Personal Information</legend>
                        <div class="row px-2 pb-2 d-flex flex-column align-items-center">
                            <div class="col-lg-4 d-flex flex-column align-items-center mt-1">
                                Profile Pictre:
                                <img src="{{ ($patient_details->profile_pic) ? asset('storage/profile_picture/'.$patient_details->profile_pic) : asset('storage/default_avatar.png') }}" alt="tet" style="width: 200px; height: 210px;" class="border border-secondary">
                                <input type="file" name="shr_profile_pic" id="shr_profile_pic" class="form-control mt-1">
                                <span class="text-danger">
                                    @error('shr_profile_pic')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Firstname:
                                <input type="text" name="shr_firstname" id="shr_firstname" class="form-control" value="{{ old('shr_firstname', $patient_details->firstname) }}">
                                <span class="text-danger">
                                    @error('shr_firstname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Middlename:
                                <input type="text" name="shr_middlename" id="shr_middlename" class="form-control" value="{{ old('shr_middlename', $patient_details->middlename) }}">
                                <span class="text-danger">
                                    @error('shr_middlename')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Lastname:
                                <input type="text" name="shr_lastname" id="shr_lastname" class="form-control" value="{{ old('shr_lastname', $patient_details->lastname) }}">
                                <span class="text-danger">
                                    @error('shr_lastname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Suffix:
                                <input type="text" name="shr_suffixname" id="shr_suffixname" class="form-control" value="{{ old('shr_suffixname', $patient_details->suffixname) }}">
                            </label>
                        </div>

                        <div class="row px-2 pb-2">
                            <label class="col-lg-6 mt-1">
                                Home Address:
                                <input type="text" name="shr_home_address" id="shr_home_address" class="form-control" value="{{ old('shr_home_address', ($patient_details->home_brgy_name.', '.$patient_details->home_mun_name.', '.$patient_details->home_prov_name))}}">
                                <span class="text-danger">
                                    @error('shr_home_address')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-6 mt-1">
                                Dormitory Address:
                                <input type="text" name="shr_dorm_address" id="shr_dorm_address" class="form-control" value="{{ old('shr_dorm_addres', (($patient_details->dorm_brgy_name) ? $patient_details->dorm_brgy_name.', '.$patient_details->dorm_mun_name.', '.$patient_details->dorm_prov_name : '')) }}">
                            </label>
                        </div>

                        <div class="row px-2 pb-2">
                            <label class="col-lg-2 mt-1">
                                Gender:
                                <select name="shr_gender" id="shr_gender" class="form-select">
                                    <option value="">--- choose ---</option>
                                    <option value="male" {{($patient_details->gender=='male') ? 'selected' : ''}}>Male</option>
                                    <option value="female" {{($patient_details->gender=='female') ? 'selected' : ''}}>Female</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_gender')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            @php 
                                $date = new DateTime($patient_details->birthdate);
                                $now = new DateTime();
                                $interval = $now->diff($date);
                            @endphp
                            <label class="col-lg-2 mt-1">
                                Age:
                                <input type="number" name="shr_age" id="shr_age" class="form-control" value="{{ $interval->y }}" readonly>
                                <span class="text-danger">
                                    @error('shr_age')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-2 mt-1">
                                Civil Status:
                                <select name="shr_civil_status" id="shr_civil_status" class="form-select">
                                    <option value="">--- choose ---</option>
                                    <option value="single" {{ (old('shr_civil_status',$patient_details->civil_status)=='single') ? 'selected' : '' }}>Single</option>
                                    <option value="married" {{ (old('shr_civil_status',$patient_details->civil_status)=='married') ? 'selected' : '' }}>Married</option>
                                    <option value="divorced" {{ (old('shr_civil_status',$patient_details->civil_status)=='divorced') ? 'selected' : '' }}>Divorced</option>
                                    <option value="separated" {{ (old('shr_civil_status',$patient_details->civil_status)=='separated') ? 'selected' : '' }}>Separated</option>
                                    <option value="widowed" {{ (old('shr_civil_status',$patient_details->civil_status)=='widowed') ? 'selected' : '' }}>Widowed</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_civil_status')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Religion:
                                <input type="text" name="shr_religion" id="shr_religion" class="form-control" value="{{ old('shr_religion', $patient_details->religion) }}">
                                <span class="text-danger">
                                    @error('shr_religion')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Contact:
                                <input type="text" name="shr_contact" id="shr_contact" class="form-control" value="{{ old('shr_contact', $patient_details->contact) }}">
                                <span class="text-danger">
                                    @error('shr_contact')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>

                        <div class="row px-2 pb-2">
                            <label class="col-lg-6 mt-1">
                                Date of Birth:
                                <input type="date" name="shr_date_of_birth" id="shr_date_of_birth" class="form-control" value="{{ old('shr_date_of_birth', $patient_details->birthdate) }}">
                                <span class="text-danger">
                                    @error('shr_date_of_birth')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-6 mt-1">
                                Place of Birth:
                                <input type="text" name="shr_place_of_birth" id="shr_place_of_birth" class="form-control" value="{{ old('shr_place_of_birth', ($patient_details->birth_brgy_name.', '.$patient_details->birth_mun_name.', '.$patient_details->birth_prov_name) ) }}">
                                <span class="text-danger">
                                    @error('shr_place_of_birth')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                    </fieldset>
                    <!-- emergency contact -->
                    <fieldset class="border border-secondary pb-2 mt-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Emergency Contact</legend>
                        
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Firstname:
                                <input type="text" name="shr_emergency_firstname" id="shr_emergency_firstname" class="form-control" value="{{ old('shr_emergency_firstname', $patient_details->ec_firstname) }}">
                                <span class="text-danger">
                                    @error('shr_emergency_firstname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Middlename:
                                <input type="text" name="shr_emergency_middlename" id="shr_emergency_middlename" class="form-control" value="{{ old('shr_emergency_middlename', $patient_details->ec_middlename) }}">
                                <span class="text-danger">
                                    @error('shr_emergency_middlename')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                lastname:
                                <input type="text" name="shr_emergency_lastname" id="shr_emergency_lastname" class="form-control" value="{{ old('shr_emergency_lastname', $patient_details->ec_lastname) }}">
                                <span class="text-danger">
                                    @error('shr_emergency_lastname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Suffix:
                                <input type="text" name="shr_emergency_suffixname" id="shr_emergency_suffixname" class="form-control" value="{{ old('shr_emergency_suffixname', $patient_details->ec_suffixname) }}">
                                <span class="text-danger">
                                    @error('shr_emergency_suffixname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                        
                        <div class="row px-2 pb-2">
                            <label class="col-lg-6 mt-1">
                                Business Address:
                                <input type="text" name="shr_emergenccy_business_address" id="shr_emergenccy_business_address" class="form-control" value="{{ old('shr_emergenccy_business_address', ($patient_details->ec_brgy_name.', '.$patient_details->ec_mun_name.', '.$patient_details->ec_prov_name) ) }}">
                                <span class="text-danger">
                                    @error('shr_emergenccy_business_address')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Relation to patient:
                                <input type="text" name="shr_emergency_relation_to_patient" id="shr_emergency_relation_to_patient" class="form-control" value="{{ old('shr_emergency_relation_to_patient', $patient_details->ec_relationtopatient) }}">
                                <span class="text-danger">
                                    @error('shr_emergency_relation_to_patient')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>

                        <div class="row px-2 pb-2">
                            <div class="col-lg-6 mt-1">
                                Landline:
                                <input type="text" name="shr_emergency_landline" id="shr_emergency_landline" class="form-control" value="{{ old('shr_emergency_landline', $patient_details->ec_landline) }}">
                                <span class="text-danger">
                                    @error('shr_emergency_landline')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-lg-6 mt-1">
                                Cellphone no:
                                <input type="text" name="shr_emergency_contact" id="shr_emergency_contact" class="form-control" value="{{ old('shr_emergency_contact', $patient_details->ec_contact) }}">
                                <span class="text-danger">
                                    @error('shr_emergency_contact')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                    </fieldset>
                    <!-- past illness -->
                    <fieldset class="border border-secondary pb-2 mt-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Past Illness</legend>
                        
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Asthma:
                                <select name="shr_past_illness_asthma" id="shr_past_illness_asthma" class="form-select">
                                    <option value="0" {{ ($patient_details->mhpi_asthma_last_attack) ? '' : 'selected' }}>No</option>
                                    <option value="1" {{ ($patient_details->mhpi_asthma_last_attack) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_past_illness_asthma')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Last Attack (Asthma):
                                <input type="date" name="shr_past_illness_asthma_last_attack" id="shr_past_illness_asthma_last_attack" class="form-control" value="{{ old('shr_past_illness_asthma_last_attack', $patient_details->mhpi_asthma_last_attack) }}">
                                <span class="text-danger">
                                    @error('shr_past_illness_asthma_last_attack')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Heart Disease:
                                <select name="shr_past_illness_heart_disease" id="shr_past_illness_heart_disease" class="form-select">
                                    <option value="0" {{ (old('shr_past_illness_heart_disease', $patient_details->mhpi_heart_disease)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_past_illness_heart_disease', $patient_details->mhpi_heart_disease)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_past_illness_heart_disease')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Hypertension:
                                <select name="shr_past_illness_hypertension" id="shr_past_illness_hypertension" class="form-select">
                                    <option value="0" {{ (old('shr_past_illness_hypertension', $patient_details->mhpi_hypertension)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_past_illness_hypertension', $patient_details->mhpi_hypertension)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_past_illness_hypertension')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>

                        <div class="row px-2 pb-2">
                            
                            <label class="col-lg-3 mt-1">
                                Epilepsy:
                                <select name="shr_past_illness_epilepsy" id="shr_past_illness_epilepsy" class="form-select">
                                    <option value="0" {{ (old('shr_past_illness_epilepsy', $patient_details->mhpi_epilepsy)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_past_illness_epilepsy', $patient_details->mhpi_epilepsy)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_past_illness_epilepsy')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Diabetes:
                                <select name="shr_past_illness_diabetes" id="shr_past_illness_diabetes" class="form-select">
                                    <option value="0" {{ (old('shr_past_illness_diabetes', $patient_details->mhpi_diabetes)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_past_illness_diabetes', $patient_details->mhpi_diabetes)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_past_illness_diabetes')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Thyroid Problem:
                                <select name="shr_past_illness_thyroid_problem" id="shr_past_illness_thyroid_problem" class="form-select">
                                    <option value="0" {{ (old('shr_past_illness_thyroid_problem', $patient_details->mhpi_thyroid_problem)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_past_illness_thyroid_problem', $patient_details->mhpi_thyroid_problem)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_past_illness_thyroid_problem')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Measles:
                                <select name="shr_past_illness_measles" id="shr_past_illness_measles" class="form-select">
                                    <option value="0" {{ (old('shr_past_illness_measles', $patient_details->mhpi_measles)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_past_illness_measles', $patient_details->mhpi_measles)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_past_illness_measles')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>

                        <div class="row px-2 pb-2">
                            
                            <label class="col-lg-3 mt-1">
                                Mumps:
                                <select name="shr_past_illness_mumps" id="shr_past_illness_mumps" class="form-select">
                                    <option value="0" {{ (old('shr_past_illness_mumps', $patient_details->mhpi_mumps)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_past_illness_mumps', $patient_details->mhpi_mumps)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_past_illness_mumps')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Varicella:
                                <select name="shr_past_illness_varicella" id="shr_past_illness_varicella" class="form-select">
                                    <option value="0" {{ (old('shr_past_illness_varicella', $patient_details->mhpi_varicella)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_past_illness_varicella', $patient_details->mhpi_varicella)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_past_illness_varicella')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>

                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Hospitalization:
                                <select name="shr_past_illness_hospitalization" id="shr_past_illness_hospitalization" class="form-select">
                                    <option value="0" {{ (!old('shr_past_illness_hospitalization_specify', $patient_details->mhpi_hospitalization_specify)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_past_illness_hospitalization_specify', $patient_details->mhpi_hospitalization_specify)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_past_illness_hospitalization')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>

                            <label class="col-lg-6 mt-1">
                                Specify:
                                <input type="text" name="shr_past_illness_hospitalization_specify" id="shr_past_illness_hospitalization_specify" class="form-control" value="{{ old('shr_past_illness_hospitalization_specify', $patient_details->mhpi_hospitalization_specify) }}">
                                <span class="text-danger">
                                    @error('shr_past_illness_hospitalization_specify')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>

                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Operation:
                                <select name="shr_past_illness_operation" id="shr_past_illness_operation" class="form-select">
                                    <option value="0" {{ (!old('shr_past_illness_operation_specify', $patient_details->mhpi_operation_specify)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_past_illness_operation_specify', $patient_details->mhpi_operation_specify)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_past_illness_operation')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>

                            <label class="col-lg-6 mt-1">
                                Specify:
                                <input type="text" name="shr_past_illness_operation_specify" id="shr_past_illness_operation_specify" class="form-control" value="{{ old('shr_past_illness_operation_specify', $patient_details->mhpi_operation_specify) }}">
                                <span class="text-danger">
                                    @error('shr_past_illness_operation_specify')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>

                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Accident:
                                <select name="shr_past_illness_accident" id="shr_past_illness_accident" class="form-select">
                                    <option value="0" {{ (!old('shr_past_illness_accident_specify', $patient_details->mhpi_accident_specify)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_past_illness_accident_specify', $patient_details->mhpi_accident_specify)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_past_illness_accident')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>

                            <label class="col-lg-6 mt-1">
                                Specify:
                                <input type="text" name="shr_past_illness_accident_specify" id="shr_past_illness_accident_specify" class="form-control" value="{{ old('shr_past_illness_accident_specify', $patient_details->mhpi_accident_specify) }}">
                                <span class="text-danger">
                                    @error('shr_past_illness_accident')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>

                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Disability:
                                <select name="shr_past_illness_disability" id="shr_past_illness_disability" class="form-select">
                                    <option value="0" {{ (!old('shr_past_illness_disability_specify', $patient_details->mhpi_disability_specify)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_past_illness_disability_specify', $patient_details->mhpi_disability_specify)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_past_illness_disability')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>

                            <label class="col-lg-6 mt-1">
                                Specify:
                                <input type="text" name="shr_past_illness_disability_specify" id="shr_past_illness_disability_specify" class="form-control" value="{{ old('shr_past_illness_disability_specify', $patient_details->mhpi_disability_specify) }}">
                                <span class="text-danger">
                                    @error('shr_past_illness_disability_specify')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                    </fieldset>
                    <!-- allergy -->
                    <fieldset class="border border-secondary mt-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Allergy</legend>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3">
                                Food:
                                <select name="shr_allergy_food" id="shr_allergy_food" class="form-select">
                                    <option value="0" {{ (!old('shr_allergy_food_specify', $patient_details->mha_food_specify)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_allergy_food_specify', $patient_details->mha_food_specify)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_allergy_food')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-6">
                                Specify:
                                <input type="text" name="shr_allergy_food_specify" id="shr_allergy_food_specify" class="form-control" value="{{ old('shr_allergy_food_specify', $patient_details->mha_food_specify) }}">
                                <span class="text-danger">
                                    @error('shr_allergy_food_specify')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3">
                                Medicine:
                                <select name="shr_allergy_medicine" id="shr_allergy_medicine" class="form-select">
                                    <option value="0" {{ (!old('shr_allergy_medicine_specify', $patient_details->mha_medicine_specify)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_allergy_medicine_specify', $patient_details->mha_medicine_specify)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_allergy_medicine')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-6">
                                Specify:
                                <input type="text" name="shr_allergy_medicine_specify" id="shr_allergy_medicine_specify" class="form-control" value="{{ old('shr_allergy_medicine_specify', $patient_details->mha_medicine_specify) }}">
                                <span class="text-danger">
                                    @error('shr_allergy_medicine_specify')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3">
                                Others:
                                <select name="shr_allergy_others" id="shr_allergy_others" class="form-select">
                                    <option value="0" {{ (!old('shr_allergy_others_specify', $patient_details->mha_others_specify)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_allergy_others_specify', $patient_details->mha_others_specify)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_allergy_others')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-6">
                                Specify:
                                <input type="text" name="shr_allergy_others_specify" id="shr_allergy_others_specify" class="form-control" value="{{old('shr_allergy_others_specify', $patient_details->mha_others_specify)}}">
                                <span class="text-danger">
                                    @error('shr_allergy_others_specify')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                    </fieldset>
                    <!-- immunization -->
                    <fieldset class="border border-secondary mt-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Immunization</legend>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                BCG:
                                <select name="shr_immunization_bcg" id="shr_immunization_bcg" class="form-select">
                                    <option value="0" {{ (old('shr_immunization_bcg', $patient_details->mhmi_bcg)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_immunization_bcg', $patient_details->mhmi_bcg)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_immunization_bcg')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                MMR:
                                <select name="shr_immunization_mmr" id="shr_immunization_mmr" class="form-select">
                                    <option value="0" {{ (old('shr_immunization_mmr', $patient_details->mhmi_mmr)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_immunization_mmr', $patient_details->mhmi_mmr)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_immunization_mmr')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                HEPA A:
                                <select name="shr_immunization_hepa_a" id="shr_immunization_hepa_a" class="form-select">
                                    <option value="0" {{ (old('shr_immunization_hepa_a', $patient_details->mhmi_hepa_a)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_immunization_hepa_a', $patient_details->mhmi_hepa_a)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_immunization_hepa_a')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Typhoid:
                                <select name="shr_immunization_typhoid" id="shr_immunization_typhoid" class="form-select">
                                    <option value="0" {{ (old('shr_immunization_typhoid', $patient_details->mhmi_typhoid)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_immunization_typhoid', $patient_details->mhmi_typhoid)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_immunization_typhoid')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Varicella:
                                <select name="shr_immunization_varicella" id="shr_immunization_varicella" class="form-select">
                                    <option value="0" {{ (old('shr_immunization_varicella', $patient_details->mhmi_varicella)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_immunization_varicella', $patient_details->mhmi_varicella)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_immunization_varicella')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Hepa B:
                                <select name="shr_immunization_hepa_b" id="shr_immunization_hepa_b" class="form-select">
                                    <option value="0" {{ (!old('shr_immunization_hepa_b_doses', $patient_details->mhmi_hepa_b_doses)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_immunization_hepa_b_doses', $patient_details->mhmi_hepa_b_doses)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_immunization_hepa_b')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Hepa B Doses:
                                <input type="number" name="shr_immunization_hepa_b_doses" id="shr_immunization_hepa_b_doses" class="form-control" value="{{ old('shr_immunization_hepa_b_doses', $patient_details->mhmi_hepa_b_doses) }}">
                                <span class="text-danger">
                                    @error('shr_immunization_hepa_b_doses')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                DPT:
                                <select name="shr_immunization_dpt" id="shr_immunization_dpt" class="form-select">
                                    <option value="0" {{ (!old('shr_immunization_dpt_doses', $patient_details->mhmi_dpt_doses)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_immunization_dpt_doses', $patient_details->mhmi_dpt_doses)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_immunization_dpt')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                DPT Doses:
                                <input type="number" name="shr_immunization_dpt_doses" id="shr_immunization_dpt_doses" class="form-control" value="{{ old('shr_immunization_dpt_doses', $patient_details->mhmi_dpt_doses) }}">
                                <span class="text-danger">
                                    @error('shr_immunization_dpt_doses')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                OPV:
                                <select name="shr_immunization_opv" id="shr_immunization_opv" class="form-select">
                                    <option value="" {{ (!old('shr_immunization_opv_doses', $patient_details->mhmi_opv_doses)) ? 'selected' : '' }}>No</option>
                                    <option value="" {{ (old('shr_immunization_opv_doses', $patient_details->mhmi_opv_doses)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_immunization_opv')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                OPV Doses:
                                <input type="number" name="shr_immunization_opv_doses" id="shr_immunization_opv_doses" class="form-control" value="{{ old('shr_immunization_opv_doses', $patient_details->mhmi_opv_doses) }}">
                                <span class="text-danger">
                                    @error('shr_immunization_opv_doses')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                HIB:
                                <select name="shr_immunization_hib" id="shr_immunization_hib" class="form-select">
                                    <option value="0" {{ (!old('shr_immunization_hib_doses', $patient_details->mhmi_hib_doses)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_immunization_hib_doses', $patient_details->mhmi_hib_doses)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_immunization_hib')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                HIB Doses:
                                <input type="number" name="shr_immunization_hib_doses" id="shr_immunization_hib_doses" class="form-control" value="{{ old('shr_immunization_hib_doses', $patient_details->mhmi_hib_doses) }}">
                                <span class="text-danger">
                                    @error('shr_immunization_hib_doses')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                    </fieldset>

                    <fieldset class="border border-secondary mt-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Pubertal</legend>
                        <div class="row px-2 pb-2">
                            <div class="col-lg-6 mt-1">
                                Male:
                                <div class="row mt-1">
                                    <label class="col-lg-6">
                                        Age of onset:
                                        <input type="number" name="shr_male_age_of_onset" id="shr_male_age_of_onset" class="form-control" 
                                        value="{{ (old('shr_gender', $patient_details->gender)=='male') ? old('shr_male_age_of_onset', $patient_details->mhp_male_age_on_set) : '' }}"
                                        {{ (old('shr_gender', $patient_details->gender)=='female') ? 'disabled' : '' }}>
                                        <span class="text-danger">
                                            @error('shr_male_age_of_onset')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-1">
                                Female:
                                <div class="row">
                                    <label class="col-lg-6 mt-1">
                                        Menarche:
                                        <input type="number" name="shr_female_menarche" id="shr_female_menarche" class="form-control" 
                                        value="{{ (old('shr_gender', $patient_details->gender)=='female') ? old('shr_female_menarche', $patient_details->mhp_female_menarche) : '' }}"
                                        {{ (old('shr_gender', $patient_details->gender)=='male') ? 'disabled' : '' }}>
                                        <span class="text-danger">
                                            @error('shr_female_menarche')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </label>
                                    <label class="col-lg-6 mt-1">
                                        LMP:
                                        <input type="date" name="shr_female_lmp" id="shr_female_lmp" class="form-control"
                                        value="{{ (old('shr_gender', $patient_details->gender)=='female') ? old('shr_female_lmp', $patient_details->mhp_female_lmp) : '' }}"
                                        {{ (old('shr_gender', $patient_details->gender)=='male') ? 'disabled' : '' }}>
                                        <span class="text-danger">
                                            @error('shr_female_lmp')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </label>
                                </div>
                                <div class="row">
                                    <label class="col-lg-6 mt-1">
                                        Dysmenorhea:
                                        <select name="shr_female_dysmenorhea" id="shr_female_dysmenorhea" class="form-select"
                                        {{ (old('shr_gender', $patient_details->gender)=='male') ? 'disabled' : '' }}>
                                            <option value="">--- choose ---</option>
                                            <option value="0" {{ (old('shr_gender', $patient_details->gender)=='female') ? (old('shr_gender_dysmenorhea', $patient_details->mhp_female_dysmenorhea)=='0') ? 'selected' : '' : '' }}>No</option>
                                            <option value="1" {{ (old('shr_gender', $patient_details->gender)=='female') ? (old('shr_gender_dysmenorhea', $patient_details->mhp_female_dysmenorhea)=='1') ? 'selected' : '' : '' }}>Yes</option>
                                        </select>
                                        <span class="text-danger">
                                            @error('shr_female_dysmenorhea')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </label>
                                    <label class="col-lg-6 mt-1">
                                        Medicine:
                                        <input type="text" name="shr_female_dysmenorhea_medicine" id="shr_female_dysmenorhea_medicine" class="form-control" 
                                        value="{{ (old('shr_gender', $patient_details->gender)=='female') ? old('shr_female_dysmenorhea_medicine', $patient_details->mhp_female_dysmenorhea_medicine) : '' }}"
                                        {{ (old('shr_gender', $patient_details->gender)=='male') ? 'disabled' : '' }}>
                                        <span class="text-danger">
                                            @error('shr_female_dysmenorhea_medicine')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>    
                    
                    <fieldset class="border border-secondary mt-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Family History</legend>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Diabetes:
                                <select name="shr_family_history_diabetes" id="shr_family_history_diabetes" class="form-select">
                                    <option value="0" {{ (!old('shr_family_history_diabetes', $patient_details->fih_diabetes)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_family_history_diabetes', $patient_details->fih_diabetes)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_family_history_diabetes')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Heart Disease:
                                <select name="shr_family_history_heart_disease" id="shr_family_history_heart_disease" class="form-select">
                                    <option value="0" {{ (!old('shr_family_history_heart_disease', $patient_details->fih_heart_disease)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_family_history_heart_disease', $patient_details->fih_heart_disease)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_family_history_heart_disease')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Mental Illness:
                                <select name="shr_family_history_mental_illness" id="shr_family_history_mental_illness" class="form-select">
                                    <option value="0" {{ (!old('shr_family_history_mental_illness', $patient_details->fih_mental)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_family_history_mental_illness', $patient_details->fih_mental)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_family_history_mental_illness')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Cancer:
                                <select name="shr_family_history_cancer" id="shr_family_history_cancer" class="form-select">
                                    <option value="0" {{ (!old('shr_family_history_cancer', $patient_details->fih_cancer)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_family_history_cancer', $patient_details->fih_cancer)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_family_history_cancer')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Hypertension:
                                <select name="shr_family_history_hypertension" id="shr_family_history_hypertension" class="form-select">
                                    <option value="0" {{ (!old('shr_family_history_hypertension', $patient_details->fih_hypertension)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_family_history_hypertension', $patient_details->fih_hypertension)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_family_history_hypertension')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Kidney Disease:
                                <select name="shr_family_history_kidney_disease" id="shr_family_history_kidney_disease" class="form-select">
                                    <option value="0" {{ (!old('shr_family_history_kidney_disease', $patient_details->fih_kidney_disease)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_family_history_kidney_disease', $patient_details->fih_kidney_disease)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_family_history_kidney_disease')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Epilepsy:
                                <select name="shr_family_history_epilepsy" id="shr_family_history_epilepsy" class="form-select">
                                    <option value="0" {{ (!old('shr_family_history_epilepsy', $patient_details->fih_epilepsy)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_family_history_epilepsy', $patient_details->fih_epilepsy)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_family_history_epilepsy')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Others:
                                <select name="shr_family_history_others" id="shr_family_history_others" class="form-select">
                                    <option value="0" {{ (!old('shr_family_history_others', $patient_details->fih_others)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_family_history_others', $patient_details->fih_others)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_family_history_others')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-12 mt-1" style="font-weight: 600; font-size: 14px;">Father's Name</label>
                            <div class="col-lg-3 mt-1">
                                Firstname:
                                <input type="text" name="shr_fathers_firstname" id="shr_fathers_firstname" class="form-control" value="{{ old('shr_fathers_firstname', $patient_details->fd_father_firstname) }}">
                                <span class="text-danger">
                                    @error('shr_fathers_firstname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-lg-3 mt-1">
                                Middlename:
                                <input type="text" name="shr_fathers_middlename" id="shr_fathers_middlename" class="form-control" value="{{ old('shr_fathers_middlename', $patient_details->fd_father_middlename) }}">
                                <span class="text-danger">
                                    @error('shr_fathers_middlename')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-lg-3 mt-1">
                                Lastname:
                                <input type="text" name="shr_fathers_lastname" id="shr_fathers_lastname" class="form-control" value="{{ old('shr_fathers_lastname', $patient_details->fd_father_lastname) }}">
                                <span class="text-danger">
                                    @error('shr_fathers_lastname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-lg-3 mt-1">
                                Suffix:
                                <input type="text" name="shr_fathers_suffixname" id="shr_fathers_suffixname" class="form-control" value="{{ old('shr_fathers_suffixname', $patient_details->fd_father_suffixname) }}">
                                <span class="text-danger">
                                    @error('shr_fathers_suffixname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-lg-3 mt-1">
                                Occupation:
                                <input type="text" name="shr_fathers_occupation" id="shr_fathers_occupation" class="form-control" value="{{ old('shr_fathers_occupation',$patient_details->fd_father_occupation) }}">
                                <span class="text-danger">
                                    @error('shr_fathers_occupation')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-12 mt-1" style="font-weight: 600; font-size: 14px;">Mother's Name</label>
                            <div class="col-lg-3 mt-1">
                                Firstname:
                                <input type="text" name="shr_mothers_firstname" id="shr_mothers_firstname" class="form-control" value="{{ old('shr_mothers_firstname', $patient_details->fd_mother_firstname) }}">
                                <span class="text-danger">
                                    @error('shr_mothers_firstname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-lg-3 mt-1">
                                Midllename:
                                <input type="text" name="shr_mothers_middlename" id="shr_mothers_middlename" class="form-control" value="{{ old('shr_mothers_middlename', $patient_details->fd_mother_middlename) }}">
                                <span class="text-danger">
                                    @error('shr_mothers_middlename')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-lg-3 mt-1">
                                Lastname:
                                <input type="text" name="shr_mothers_lastname" id="shr_mothers_lastname" class="form-control" value="{{ old('shr_mothers_lastname', $patient_details->fd_mother_lastname) }}">
                                <span class="text-danger">
                                    @error('shr_mothers_lastname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-lg-3 mt-1">
                                Suffix:
                                <input type="text" name="shr_mothers_suffixname" id="shr_mothers_suffixname" class="form-control" value="{{ old('shr_mothers_suffixname', $patient_details->fd_mother_suffixname) }}">
                                <span class="text-danger">
                                    @error('shr_mothers_lastname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-lg-3 mt-1">
                                Occupation:
                                <input type="text" name="shr_mothers_occupation" id="shr_mothers_occupation" class="form-control" value="{{ old('shr_mothers_occupation', $patient_details->fd_mother_occupation) }}">
                                <span class="text-danger">
                                    @error('shr_mothers_occupation')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Marital Status:
                                <select name="shr_marital_status" id="shr_marital_status" class="form-select">
                                    <option value="">--- choose ---</option>
                                    <option value="married" {{ (old('shr_marital_status', $patient_details->fd_marital_status)=='married') ? 'selected' : '' }}>Married</option>
                                    <option value="divorced" {{ (old('shr_marital_status', $patient_details->fd_marital_status)=='divorced') ? 'selected' : '' }}>Divorced</option>
                                    <option value="separated" {{ (old('shr_marital_status', $patient_details->fd_marital_status)=='separated') ? 'selected' : '' }}>Separated</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_marital_status')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                    </fieldset>

                    <fieldset class="border border-secondary mt-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Physical Examination</legend>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Weight (kg):
                                <input type="text" name="shr_weight" id="shr_weight" class="form-control" value="{{ old('shr_weight', $patient_details->weight) }}">
                                <span class="text-danger">
                                    @error('shr_weight ')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Height (m):
                                <input type="text" name="shr_height" id="shr_height" class="form-control" value="{{ old('shr_height', $patient_details->height) }}">
                                <span class="text-danger">
                                    @error('shr_height')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-6 mt-1">
                                BMI (Weight in kg/height in meter sq.):
                                <input type="text" name="shr_bmi" id="shr_bmi" class="form-control" value="{{ number_format(((float)old('shr_weight', $patient_details->weight))/((float)old('shr_height', $patient_details->height)**2), 2, '.', '') }}" readonly>
                                <span class="text-danger">
                                    @error('shr_bmi')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Temperature:
                                <input type="text" name="shr_temperature" id="shr_temperature" class="form-control" value="{{ old('shr_temperature') }}">
                                <span class="text-danger">
                                    @error('shr_temperature')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                HR:
                                <input type="text" name="shr_hr" id="shr_hr" class="form-control" value="{{ old('shr_temperature') }}">
                                <span class="text-danger">
                                    @error('shr_hr')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                BP:
                                <input type="text" name="shr_bp" id="shr_bp" class="form-control" value="{{ old('shr_bp') }}">
                                <span class="text-danger">
                                    @error('shr_bp')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Vision:
                                <input type="text" name="shr_vision" id="shr_vision" class="form-control" value="{{ old('shr_vision') }}">
                                <span class="text-danger">
                                    @error('shr_vision')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Hearing:
                                <input type="text" name="shr_hearing" id="shr_hearing" class="form-control" value="{{ old('shr_hearing') }}">
                                <span class="text-danger">
                                    @error('shr_hearing')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Blood Type:
                                <select name="shr_blood_type" id="shr_blood_type" class="form-select">
                                <option value="">--- choose ---</option>
                                <option value="a positive"  {{ (old('shr_blood_type', $patient_details->blood_type)=='a positive') ? 'selected' : '' }}>A Positive</option>
                                <option value="a negative"  {{ (old('shr_blood_type', $patient_details->blood_type)=='a negative') ? 'selected' : '' }}>A Negative</option>
                                <option value="ab positive" {{ (old('shr_blood_type', $patient_details->blood_type)=='ab positive') ? 'selected' : '' }}>AB Positive</option>
                                <option value="ab negative" {{ (old('shr_blood_type', $patient_details->blood_type)=='ab negative') ? 'selected' : '' }}>AB Negative</option>
                                <option value="b positive"  {{ (old('shr_blood_type', $patient_details->blood_type)=='b positive') ? 'selected' : '' }}>B Positive</option>
                                <option value="b negative"  {{ (old('shr_blood_type', $patient_details->blood_type)=='b negative') ? 'selected' : '' }}>B Negative</option>
                                <option value="o positive"  {{ (old('shr_blood_type', $patient_details->blood_type)=='o positive') ? 'selected' : '' }}>O Positive</option>
                                <option value="o negative"  {{ (old('shr_blood_type', $patient_details->blood_type)=='o negative') ? 'selected' : '' }}>O Negative</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_blood_type')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-6 mt-1">
                                Chest X-Ray Result:
                                <input type="text" name="shr_chest_xray_result" id="shr_chest_xray_result" class="form-control" value="{{ old('shr_chest_xray_result') }}">
                                <span class="text-danger">
                                    @error('shr_chest_xray_result')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Date (X-Ray Result):
                                <input type="date" name="shr_chest_xray_result_date" id="shr_chest_xray_result_date"  class="form-control" value="{{ old('shr_chest_xray_result_date') }}">
                                <span class="text-danger">
                                    @error('shr_chest_xray_result_date')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-12 mt-2 text-danger" style="font-size: 15px;">If no or not normal, describe only the abnormal findings in the space below.</label>
                            
                            <label class="col-lg-3 mt-1">
                                General Survey:
                                <select name="shr_general_survey" id="shr_general_survey" class="form-select">
                                    <option value="1" {{ (!old('shr_general_survey_findings')) ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ (old('shr_general_survey_findings')) ? 'selected' : '' }}>No</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_general_survey')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (general survey):
                                <input type="text" name="shr_general_survey_findings" id="shr_general_survey_findings" class="form-control" value="{{ old('shr_general_survey_findings') }}">
                                <span class="text-danger">
                                    @error('shr_general_survey_findings')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Skin:
                                <select name="shr_skin" id="shr_skin" class="form-select">
                                    <option value="1" {{ (!old('shr_skin_findings')) ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ (old('shr_skin_findings')) ? 'selected' : '' }}>No</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_skin')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (skin):
                                <input type="text" name="shr_skin_findings" id="shr_skin_findings" class="form-control" value="{{ old('shr_skin_findings') }}">
                                <span class="text-danger">
                                    @error('shr_skin_findings')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Eyes/ Ears/ Nose:
                                <select name="shr_eye_ears_nose" id="shr_eye_ears_nose" class="form-select">
                                    <option value="1" {{ (!old('shr_eye_ears_nose_findings')) ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ (old('shr_eye_ears_nose_findings')) ? 'selected' : '' }}>No</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_eye_ears_nose')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (eyes/ ears/ nose):
                                <input type="text" name="shr_eye_ears_nose_findings" id="shr_eye_ears_nose_findings" class="form-control" value="{{ old('shr_eye_ears_nose_findings') }}">
                                <span class="text-danger">
                                    @error('shr_eye_ears_nose_findings')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Teeth/ Gums:
                                <select name="shr_teeth_gums" id="shr_teeth_gums" class="form-select">
                                    <option value="1" {{ (!old('shr_teeth_gums_findings')) ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ (old('shr_teeth_gums_findings')) ? 'selected' : '' }}>No</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_teeth_gums')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (teeth/ gums):
                                <input type="text" name="shr_teeth_gums_findings" id="shr_teeth_gums_findings" class="form-control" value="{{ old('shr_teeth_gums_findings') }}">
                                <span class="text-danger">
                                    @error('shr_teeth_gums')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Neck:
                                <select name="shr_neck" id="shr_neck" class="form-select">
                                    <option value="1" {{ (!old('shr_neck_findings')) ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ (old('shr_neck_findings')) ? 'selected' : '' }}>No</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_neck')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (neck):
                                <input type="text" name="shr_neck_findings" id="shr_neck_findings" class="form-control" value="{{ old('shr_neck_findings') }}">
                                <span class="text-danger">
                                    @error('shr_neck_findings')
                                        {{ $message }}
                                    @enderror
                                </span>    
                            </label>

                            <label class="col-lg-3 mt-1">
                                Heart:
                                <select name="shr_heart" id="shr_heart" class="form-select">
                                    <option value="1" {{ (!old('shr_heart_findings')) ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ (old('shr_heart_findings')) ? 'selected' : '' }}>No</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_heart')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (heart):
                                <input type="text" name="shr_heart_findings" id="shr_heart_findings" class="form-control" value="{{ old('shr_heart_findings') }}">
                                <span class="text-danger">
                                    @error('shr_heart_findings')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Chest/ Lungs:
                                <select name="shr_chest_lungs" id="shr_chest_lungs" class="form-select">
                                    <option value="1" {{ (!old('shr_chest_lungs_findings')) ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ (old('shr_chest_lungs_findings')) ? 'selected' : '' }}>No</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_chest_lungs')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (chest/ lungs):
                                <input type="text" name="shr_chest_lungs" id="shr_chest_lungs" class="form-control" value="{{ old('shr_chest_lungs') }}">
                                <span class="text-danger">
                                    @error('shr_chest_lungs')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Abdomen:
                                <select name="shr_abdomen" id="shr_abdomen" class="form-select">
                                    <option value="1" {{ (!old('shr_abdomen_findings')) ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ (old('shr_abdomen_findings')) ? 'selected' : '' }}>No</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_abdomen')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (abdomen):
                                <input type="text" name="shr_abdomen_findings" id="shr_abdomen_findings" class="form-control" value="{{ old('shr_abdomen_findings') }}">
                                <span class="text-danger">
                                    @error('shr_abdomen_findings')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Musculoskeletal:
                                <select name="shr_musculoskeletal" id="shr_musculoskeletal" class="form-select">
                                    <option value="1" {{ (!old('shr_musculoskeletal_findings')) ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ (old('shr_musculoskeletal_findings')) ? 'selected' : '' }}>No</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_musculoskeletal')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (musculoskeletal):
                                <input type="text" name="shr_musculoskeletal_findings" id="shr_musculoskeletal_findings" class="form-control" value="{{ old('shr_musculoskeletal_findings') }}">
                                <span class="text-danger">
                                    @error('shr_musculoskeletal_findings')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                    </fieldset>

                    <fieldset class="border border-secondary mt-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Assesment Diagnosis</legend>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-4">
                                Drinking?
                                <select name="shr_assessment_diagnosis_drinking" id="shr_assessment_diagnosis_drinking" class="form-select">
                                    <option value="0" {{ (!old('shr_assessment_diagnosis_drinking_how_much', $patient_details->ad_drinking_how_much)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_assessment_diagnosis_drinking_how_much', $patient_details->ad_drinking_how_much)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_assessment_diagnosis_drinking')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-4">
                                How much?
                                <input type="text" name="shr_assessment_diagnosis_drinking_how_much" id="shr_assessment_diagnosis_drinking_how_much" class="form-control" 
                                value="{{ old('shr_assessment_diagnosis_drinking_how_much', ($patient_details->ad_drinking_how_much.' '.'bottle(s)')) }}">
                                <span class="text-danger">
                                    @error('shr_assessment_diagnosis_drinking_how_much')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-4">
                                How often?
                                <input type="text" name="shr_assessment_diagnosis_how_often" id="shr_assessment_diagnosis_how_often" class="form-control"
                                value="{{ old('shr_assessment_diagnosis_how_often', $patient_details->ad_drinking_how_often) }}">
                                <span class="text-danger">
                                    @error('shr_assessment_diagnosis_how_often')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-4">
                                Smoking?
                                <select name="shr_assessment_diagnosis_smoking" id="shr_assessment_diagnosis_smoking" class="form-select">
                                    <option value="0" {{ (!old('shr_assessment_diagnosis_smoking_sticks_per_day', $patient_details->ad_smoking_sticks_per_day)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_assessment_diagnosis_smoking_sticks_per_day', $patient_details->ad_smoking_sticks_per_day)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_assessment_diagnosis_smoking')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-4">
                                Number of Sticks/day?
                                <input type="number" name="shr_assessment_diagnosis_smoking_sticks_per_day" id="shr_assessment_diagnosis_smoking_sticks_per_day" class="form-control"
                                value="{{ old('shr_assessment_diagnosis_smoking_sticks_per_day', $patient_details->ad_smoking_sticks_per_day) }}">
                                <span class="text-danger">
                                    @error('shr_assessment_diagnosis_smoking_sticks_per_day')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-4">
                                Since when (Yrs. Old)? 
                                <input type="number" name="shr_assessment_diagnosis_smoking_since_when" id="shr_assessment_diagnosis_smoking_since_when" class="form-control"
                                value="{{ old('shr_assessment_diagnosis_smoking_since_when', $patient_details->ad_smoking_since_when) }}">
                                <span class="text-danger">
                                    @error('shr_assessment_diagnosis_smoking_since_when')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-4">
                                Drug use?
                                <select name="shr_assessment_diagnosis_drug_use" id="shr_assessment_diagnosis_drug_use" class="form-select">
                                    <option value="0" {{ (!old('shr_assessment_diagnosis_drug_kind', $patient_details->ad_drug_kind)) ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_assessment_diagnosis_drug_kind', $patient_details->ad_drug_kind)) ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_assessment_diagnosis_drug_use')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-4">
                                Kind:
                                <input type="text" name="shr_assessment_diagnosis_drug_kind" id="shr_assessment_diagnosis_drug_kind" class="form-control"
                                value="{{ old('shr_assessment_diagnosis_drug_kind', $patient_details->ad_drug_kind) }}">
                                <span class="text-danger">
                                    @error('shr_assessment_diagnosis_drug_kind')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-4">
                                Regular Use?
                                <select name="shr_assessment_diagnosis_regular_use" id="shr_assessment_diagnosis_regular_use" class="form-select">
                                    <option value="0" {{ (old('shr_assessment_diagnosis_regular_use', $patient_details->ad_drug_regular_use)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_assessment_diagnosis_regular_use', $patient_details->ad_drug_regular_use)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_assessment_diagnosis_regular_use')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-4">
                                Driving?
                                <select name="shr_assessment_driving" id="shr_assessment_driving" class="form-select">
                                    <option value="0" {{ (old('shr_assessment_driving', $patient_details->ad_driving)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_assessment_driving', $patient_details->ad_driving)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_assessment_driving')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-4">
                                Specify Vehicle:
                                <input type="text" name="shr_assessment_driving_specify" id="shr_assessment_driving_specify" class="form-control"
                                value="{{ old('shr_assessment_driving_specify', $patient_details->ad_driving_specify) }}">
                                <span class="text-danger">
                                    @error('shr_assessment_driving_specify')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-4">
                                With license?
                                <select name="shr_assessment_driving_with_license" id="shr_assessment_driving_with_license" class="form-select">
                                    <option value="0" {{ (old('shr_assessment_driving_with_license', $patient_details->ad_driving_with_license)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_assessment_driving_with_license', $patient_details->ad_driving_with_license)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_assessment_driving_with_license')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-4">
                                Abuse? (Physical, Sexual, Verbal)
                                <select name="shr_assessment_diagnosis_abuse" id="shr_assessment_diagnosis_abuse" class="form-select">
                                    <option value="0" {{ (old('shr_assessment_diagnosis_abuse', $patient_details->ad_abuse)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('shr_assessment_diagnosis_abuse', $patient_details->ad_abuse)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('shr_assessment_diagnosis_abuse')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-8">
                                Specify what kind of abuse:
                                <input type="text" name="shr_assessment_diagnosis_abuse_specify" id="shr_assessment_diagnosis_abuse_specify" class="form-control"
                                value="{{ old('shr_assessment_diagnosis_abuse_specify', $patient_details->ad_abuse_specify) }}">
                                <span class="text-danger">
                                    @error('shr_assessment_diagnosis_abuse_specify')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                    </fieldset>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="shr_save_btn">Save</button>
            </div>
            </form>
        </div>    
    </div>
</div>

<script>

    function clear_disable(id){
        $(id).val('');
        $(id).attr('disabled', true);
    }

    function enable(id){
        $(id).attr('disabled', false);
    }

    function set_input(id, val){
        $(id).val(val);
    }

    $('#shr_gender').change(function(){
        let gender = $(this).val();

        if(gender == 'male'){
            clear_disable('#shr_female_menarche');
            clear_disable('#shr_female_lmp');
            clear_disable('#shr_female_dysmenorhea');
            clear_disable('#shr_female_dysmenorhea_medicine');
            enable('#shr_male_age_of_onset');
            set_input('#shr_male_age_of_onset', "{{ $patient_details->mhp_male_age_on_set }}")
        }
        else{
            enable('#shr_male_age_of_onset');
            enable('#shr_female_menarche');
            enable('#shr_female_lmp');
            enable('#shr_female_dysmenorhea');
            enable('#shr_female_dysmenorhea_medicine');
            clear_disable('#shr_male_age_of_onset');
            set_input('#shr_female_menarche', "{{ $patient_details->mhp_female_menarche }}");
            set_input('#shr_female_lmp', "{{ $patient_details->mhp_female_lmp }}");
            set_input('#shr_female_dysmenorhea', "{{ $patient_details->mhp_female_dysmenorhea }}");
            set_input('#shr_female_dysmenorhea', "{{ $patient_details->mhp_female_dysmenorhea_medicine }}");
        }
    });

    $('#shr_date_of_birth').change(function(){
        var now = new Date();
        console.log((Date.parse(now).toString('yyyy-MM-dd H:i:s')));

    });
   
</script>