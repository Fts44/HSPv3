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
                                    @error('shr_contact')
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
                                        <select name="shr_gender_dysmenorhea" id="shr_gender_dysmenorhea" class="form-select"
                                        {{ (old('shr_gender', $patient_details->gender)=='male') ? 'disabled' : '' }}>
                                            <option value="">--- choose ---</option>
                                            <option value="0" {{ (old('shr_gender', $patient_details->gender)=='female') ? (old('shr_gender_dysmenorhea', $patient_details->mhp_female_dysmenorhea)=='0') ? 'selected' : '' : '' }}>No</option>
                                            <option value="1" {{ (old('shr_gender', $patient_details->gender)=='female') ? (old('shr_gender_dysmenorhea', $patient_details->mhp_female_dysmenorhea)=='1') ? 'selected' : '' : '' }}>Yes</option>
                                        </select>
                                        <span class="text-danger">
                                            @error('shr_gender_dysmenorhea')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </label>
                                    <label class="col-lg-6 mt-1">
                                        Medicine:
                                        <input type="text" name="shr_gender_dysmenorhea_medicine" id="shr_gender_dysmenorhea_medicine" class="form-control" 
                                        value="{{ (old('shr_gender', $patient_details->gender)=='female') ? old('shr_gender_dysmenorhea_medicine', $patient_details->mhp_female_dysmenorhea_medicine) : '' }}"
                                        {{ (old('shr_gender', $patient_details->gender)=='male') ? 'disabled' : '' }}>
                                        <span class="text-danger">
                                            @error('shr_gender_dysmenorhea_medicine')
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
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Heart Disease:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Mental Illness:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Cancer:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Hypertension:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Kidney Disease:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Epilepsy:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Others:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-12 mt-1" style="font-weight: 600; font-size: 14px;">Father's Name</label>
                            <div class="col-lg-3 mt-1">
                                Firstname:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col-lg-3 mt-1">
                                Midllename:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col-lg-3 mt-1">
                                Lastname:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col-lg-3 mt-1">
                                Suffix:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col-lg-3 mt-1">
                                Occupation:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-12 mt-1" style="font-weight: 600; font-size: 14px;">Mother's Name</label>
                            <div class="col-lg-3 mt-1">
                                Firstname:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col-lg-3 mt-1">
                                Midllename:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col-lg-3 mt-1">
                                Lastname:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col-lg-3 mt-1">
                                Suffix:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col-lg-3 mt-1">
                                Occupation:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Marital Status:
                                <select name="" id="" class="form-select">
                                    <option value="">Married</option>
                                </select>
                            </label>
                        </div>
                    </fieldset>

                    <fieldset class="border border-secondary mt-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Physical Examination</legend>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Weight:
                                <input type="text" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                Height:
                                <input type="text" class="form-control">
                            </label>
                            <label class="col-lg-6 mt-1">
                                BMI (Weight in kg/height in meter sq.):
                                <input type="text" class="form-control">
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Temperature:
                                <input type="text" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                HR:
                                <input type="text" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                BP:
                                <input type="text" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                Vision:
                                <input type="text" class="form-control">
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Hearing:
                                <input type="text" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                Blood Type:
                                <select name="" id="" class="form-select">
                                    <option value="">A Positive</option>
                                </select>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-6 mt-1">
                                Chest X-Ray Result:
                                <input type="text" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                Date (X-Ray Result):
                                <input type="date" class="form-control">
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-12 mt-2 text-danger" style="font-size: 15px;">If no or not normal, describe only the abnormal findings in the space below.</label>
                            
                            <label class="col-lg-3 mt-1">
                                General Survey:
                                <select name="" id="" class="form-select">
                                    <option value="">Yes</option>
                                    <option value="">No</option>
                                </select>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (general survey):
                                <input type="text" class="form-control">
                            </label>

                            <label class="col-lg-3 mt-1">
                                Skin:
                                <select name="" id="" class="form-select">
                                    <option value="">Yes</option>
                                    <option value="">No</option>
                                </select>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (skin):
                                <input type="text" class="form-control">
                            </label>

                            <label class="col-lg-3 mt-1">
                                Eyes/ Ears/ Nose:
                                <select name="" id="" class="form-select">
                                    <option value="">Yes</option>
                                    <option value="">No</option>
                                </select>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (eyes/ ears/ nose):
                                <input type="text" class="form-control">
                            </label>

                            <label class="col-lg-3 mt-1">
                                Teeth/ Gums:
                                <select name="" id="" class="form-select">
                                    <option value="">Yes</option>
                                    <option value="">No</option>
                                </select>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (teeth/ gums):
                                <input type="text" class="form-control">
                            </label>

                            <label class="col-lg-3 mt-1">
                                Neck:
                                <select name="" id="" class="form-select">
                                    <option value="">Yes</option>
                                    <option value="">No</option>
                                </select>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (neck):
                                <input type="text" class="form-control">
                            </label>

                            <label class="col-lg-3 mt-1">
                                Heart:
                                <select name="" id="" class="form-select">
                                    <option value="">Yes</option>
                                    <option value="">No</option>
                                </select>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (heart):
                                <input type="text" class="form-control">
                            </label>

                            <label class="col-lg-3 mt-1">
                                Chest/ Lungs:
                                <select name="" id="" class="form-select">
                                    <option value="">Yes</option>
                                    <option value="">No</option>
                                </select>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (chest/ lungs):
                                <input type="text" class="form-control">
                            </label>

                            <label class="col-lg-3 mt-1">
                                Abdomen:
                                <select name="" id="" class="form-select">
                                    <option value="">Yes</option>
                                    <option value="">No</option>
                                </select>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (abdomen):
                                <input type="text" class="form-control">
                            </label>

                            <label class="col-lg-3 mt-1">
                                Musculoskeletal:
                                <select name="" id="" class="form-select">
                                    <option value="">Yes</option>
                                    <option value="">No</option>
                                </select>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (musculoskeletal):
                                <input type="text" class="form-control">
                            </label>
                        </div>
                    </fieldset>

                    <fieldset class="border border-secondary mt-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Assesment Diagnosis</legend>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-4">
                                Drinking?
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-4">
                                How much?
                                <input type="text" class="form-control">
                            </label>
                            <label class="col-lg-4">
                                How often?
                                <input type="text" class="form-control">
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-4">
                                Smoking?
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-4">
                                Number of Sticks/day?
                                <input type="number" class="form-control">
                            </label>
                            <label class="col-lg-4">
                                Since when?
                                <input type="number" class="form-control">
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-4">
                                Drug use?
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-4">
                                Kind:
                                <input type="number" class="form-control">
                            </label>
                            <label class="col-lg-4">
                                Regular Use?
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-4">
                                Driving?
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-4">
                                Specify Vehicle:
                                <input type="text" class="form-control">
                            </label>
                            <label class="col-lg-4">
                                With license?
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-4">
                                Abuse? (Physical, Sexual, Verbal)
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-6">
                                Specify what kind of abuse:
                                <input type="text" class="form-control">
                            </label>
                        </div>
                    </fieldset>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="submit_button">Add</button>
            </div>
            </form>
        </div>    
    </div>
</div>