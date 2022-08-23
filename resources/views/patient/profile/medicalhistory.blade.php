@extends('layout.patient')

@push('title')
    <title>Patient Medical History</title>
@endpush

@section('content')
<main id="main" class="main">

    <x-patient.profile-pagetitle></x-patient.profile-pagetitle>
    <!-- End Page Title -->

    <section class="section profile">

        <div class="card">

            <div class="card-body pt-3">
                <form action="{{ route('UpdateMedicalHistory') }}" method="POST">
                    @csrf
                    <label class="col-lg-12" style="font-weight: 600;">Past Illness:</label>
                    <!-- Hosptalization, Operation, Accident -->
                    <div class="row">
                        <div class="col-lg-4 p-0 mt-2">
                            <label class="col-lg-12 form-control border-0">
                                Hospitalization:
                                <select name="hospitalization" id="hospitalization" class="form-select">
                                    <option value="0" {{ (old('hospitalization',$user_details->mhpi_hospitalization)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('hospitalization',$user_details->mhpi_hospitalization)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('hospitalization')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-12 form-control border-0 pt-0">
                                Hospitalization (Specify):
                                <input type="text" name="hospitalization_specify" id="hospitalization_specify" class="form-control" 
                                    {{ (old('hospitalization',$user_details->mhpi_hospitalization)=='1') ? '' : 'disabled' }} 
                                    value="{{ (old('hospitalization',$user_details->mhpi_hospitalization)=='1') ? old('hospitalization_specify',$user_details->mhpi_hospitalization_specify) : '' }}"
                                >
                                <span class="text-danger">
                                    @error('hospitalization_specify')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>

                        <div class="col-lg-4 p-0 mt-2">
                            <label class="col-lg-12 form-control border-0">
                                Operation:
                                <select name="operation" id="operation" class="form-select">
                                    <option value="0" {{ (old('operation',$user_details->mhpi_operation)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('operation',$user_details->mhpi_operation)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('operation')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-12 form-control border-0 pt-0">
                                Operation (Specify):
                                <input type="text" name="operation_specify" id="operation_specify" class="form-control" 
                                    {{ (old('operation',$user_details->mhpi_operation)=='1') ? '' : 'disabled' }} 
                                    value="{{ (old('operation',$user_details->mhpi_operation)=='1') ? old('operation_specify',$user_details->mhpi_operation_specify) : '' }}"
                                >
                                <span class="text-danger">
                                    @error('operation_specify')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>

                        <div class="col-lg-4 p-0 mt-2">
                            <label class="col-lg-12 form-control border-0">
                                Accident:
                                <select name="accident" id="accident" class="form-select">
                                    <option value="0" {{ (old('accident',$user_details->mhpi_accident)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('accident',$user_details->mhpi_accident)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('accident')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-12 form-control border-0 pt-0">
                                Accident (Specify):
                                <input type="text" name="accident_specify" id="accident_specify" class="form-control" 
                                    {{ (old('accident',$user_details->mhpi_accident)=='1') ? '' : 'disabled' }}  
                                    value="{{ (old('accident',$user_details->mhpi_accident)=='1') ? old('accident_specify', $user_details->mhpi_accident_specify) : '' }}"
                                >
                                <span class="text-danger">
                                    @error('accident_specify')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                    </div>

                    <!-- Disability, Asthma -->
                    <div class="row">
                        <div class="col-lg-4 p-0 mt-2">
                            <label class="col-lg-12 form-control border-0">
                                Disability:
                                <select name="disability" id="disability" class="form-select">
                                    <option value="0" {{ (old('disability',$user_details->mhpi_disability)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('disability',$user_details->mhpi_disability)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('disability')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-12 form-control border-0 pt-0">
                                Disability (Specify):
                                <input type="text" name="disability_specify" id="disability_specify" class="form-control" 
                                    {{ (old('disability',$user_details->mhpi_disability)=='1') ? '' : 'disabled' }}   
                                    value="{{ (old('disability',$user_details->mhpi_disability)=='1') ? old('disability_specify',$user_details->mhpi_disability_specify) : '' }}"
                                >
                                <span class="text-danger">
                                    @error('disability_specify')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>

                        <div class="col-lg-4 p-0 mt-2">
                            <label class="col-lg-12 form-control border-0">
                                Asthma:
                                <select name="asthma" id="asthma" class="form-select">
                                    <option value="0" {{ (old('asthma',$user_details->mhpi_asthma)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('asthma',$user_details->mhpi_asthma)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('asthma')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-12 form-control border-0 pt-0">
                                Asthma (Last attack):
                                <input type="date" name="asthma_last_attack" id="asthma_last_attack" class="form-control" 
                                    {{ (old('asthma',$user_details->mhpi_asthma)=='1') ? '' : 'disabled' }}    
                                    value="{{ (old('asthma',$user_details->mhpi_asthma)=='1') ? old('asthma_last_attack',$user_details->mhpi_asthma_last_attack) : '' }}"
                                >
                                <span class="text-danger">
                                    @error('asthma_last_attack')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                    </div>

                    <!-- Diabetes, Epilepsy, Heart Disease, Hypertension, Measles, Mumps, Thyroid Problem, Varicella -->
                    <div class="row mt-2">
                        <label class="col-lg-2 mt-1">
                            Diabetes:
                            <select name="diabetes" id="diabetes" class="form-select">
                                <option value="0" {{ (old('diabetes',$user_details->mhpi_diabetes)=='0') ? 'selected' : '' }}>No</option>
                                <option value="1" {{ (old('diabetes',$user_details->mhpi_diabetes)=='1') ? 'selected' : '' }}>Yes</option>
                            </select>
                            <span class="text-danger">
                                @error('diabetes')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                        <label class="col-lg-2 mt-1">
                            Epilepsy:
                            <select name="epilepsy" id="epilepsy" class="form-select">
                                <option value="0" {{ (old('epilepsy',$user_details->mhpi_epilepsy)=='0') ? 'selected' : '' }}>No</option>
                                <option value="1" {{ (old('epilepsy',$user_details->mhpi_epilepsy)=='1') ? 'selected' : '' }}>Yes</option>
                            </select>
                            <span class="text-danger">
                                @error('epilepsy')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                        <label class="col-lg-2 mt-1">
                            Heart Disease:
                            <select name="heart_disease" id="heart_disease" class="form-select">
                                <option value="0" {{ (old('heart_disease',$user_details->mhpi_heart_disease)=='0') ? 'selected' : '' }}>No</option>
                                <option value="1" {{ (old('heart_disease',$user_details->mhpi_heart_disease)=='1') ? 'selected' : '' }}>Yes</option>
                            </select>
                        </label>
                        <label class="col-lg-2 mt-1">
                            Hypertension:
                            <select name="hypertension" id="hypertension" class="form-select">
                                <option value="0" {{ (old('hypertension',$user_details->mhpi_hypertension)=='0') ? 'selected' : '' }}>No</option>
                                <option value="1" {{ (old('hypertension',$user_details->mhpi_hypertension)=='1') ? 'selected' : '' }}>Yes</option>
                            </select>
                            <span class="text-danger">
                                @error('hypertension')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                        
                        <!-- space -->
                        <div class="co-lg-4"></div>

                        <label class="col-lg-2 mt-1">
                            Measles:
                            <select name="measles" id="measles" class="form-select">
                                <option value="0" {{ (old('measles',$user_details->mhpi_measles)=='0') ? 'selected' : '' }}>No</option>
                                <option value="1" {{ (old('measles',$user_details->mhpi_measles)=='1') ? 'selected' : '' }}>Yes</option>
                            </select>
                            <span class="text-danger">
                                @error('measles')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                        <label class="col-lg-2 mt-1">
                            Mumps:
                            <select name="mumps" id="mumps" class="form-select">
                                <option value="0" {{ (old('mumps',$user_details->mhpi_mumps)=='0') ? 'selected' : '' }}>No</option>
                                <option value="1" {{ (old('mumps',$user_details->mhpi_mumps)=='1') ? 'selected' : '' }}>Yes</option>
                            </select>
                            <span class="text-danger">
                                @error('mumps')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                        <label class="col-lg-2 mt-1">
                            Thyroid Problem:
                            <select name="thyroid_problem" id="thyroid_problem" class="form-select">
                                <option value="0" {{ (old('thyroid_problem',$user_details->mhpi_thyroid_problem)=='0') ? 'selected' : '' }}>No</option>
                                <option value="1" {{ (old('thyroid_problem',$user_details->mhpi_thyroid_problem)=='1') ? 'selected' : '' }}>Yes</option>
                            </select>
                            <span class="text-danger">
                                @error('thyroid_problem')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                        <label class="col-lg-2 mt-1">
                            Varicella:
                            <select name="varicella" id="varicella" class="form-select">
                                <option value="0" {{ (old('varicella',$user_details->mhpi_varicella)=='0') ? 'selected' : '' }}>No</option>
                                <option value="1" {{ (old('varicella',$user_details->mhpi_varicella)=='1') ? 'selected' : '' }}>Yes</option>
                            </select>
                            <span class="text-danger">
                                @error('varicella')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                    </div>

                    <label class="col-lg-12 mt-4" style="font-weight: 600;">Allergy:</label>
                    <!-- Food, Allergy -->
                    <div class="row">
                        <div class="col-lg-4 p-0 mt-2">
                            <label class="col-lg-12 form-control border-0">
                                Food
                                <select name="allergy_food" id="allergy_food" class="form-select">
                                    <option value="0" {{ (old('allergy_food',$user_details->mha_food)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('allergy_food',$user_details->mha_food)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('allergy_food')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-12 form-control border-0 pt-0">
                                Food (Specify):
                                <input type="text" name="allergy_food_specify" id="allergy_food_specify" class="form-control" 
                                    {{ (old('allergy_food',$user_details->mha_food)=='1') ? '' : 'disabled' }}
                                    value="{{ (old('allergy_food',$user_details->mha_food)=='1') ? old('allergy_food_specify',$user_details->mha_food_specify) : '' }}"
                                >
                                <span class="text-danger">
                                    @error('allergy_food_specify')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                        <div class="col-lg-4 p-0 mt-2">
                            <label class="col-lg-12 form-control border-0">
                                Medicine
                                <select name="allergy_medicine" id="allergy_medicine" class="form-select">
                                    <option value="0" {{ (old('allergy_medicine',$user_details->mha_medicine)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('allergy_medicine',$user_details->mha_medicine)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('allergy_medicine')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-12 form-control border-0 pt-0">
                                Medicine (Specify):
                                <input type="text" name="allergy_medicine_specify" id="allergy_medicine_specify" class="form-control" 
                                    {{ (old('allergy_medicine',$user_details->mha_medicine)=='1') ? '' : 'disabled' }}
                                    value="{{ (old('allergy_medicine',$user_details->mha_medicine)=='1') ? old('allergy_medicine_specify',$user_details->mha_medicine_specify) : '' }}"
                                >
                                <span class="text-danger">
                                    @error('allergy_medicine_specify')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                        <div class="col-lg-4 p-0 mt-2">
                            <label class="col-lg-12 form-control border-0">
                                Others
                                <select name="allergy_others" id="allergy_others" class="form-select">
                                    <option value="0" {{ (old('allergy_others',$user_details->mha_others)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('allergy_others',$user_details->mha_others)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('allergy_others')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-12 form-control border-0 pt-0">
                                Others (Specify):
                                <input type="text" name="allergy_others_specify" id="allergy_others_specify" class="form-control" 
                                    {{ (old('allergy_others',$user_details->mha_others)=='1') ? '' : 'disabled' }}
                                    value="{{ (old('allergy_others',$user_details->mha_others)=='1') ? old('allergy_others_specify',$user_details->mha_others_specify) : '' }}"
                                >
                                <span class="text-danger">
                                    @error('allergy_others_specify')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                    </div>

                    <label class="col-lg-12 mt-4" style="font-weight: 600;">Medical Immunization:</label>
                    <!-- BCG, MMR, Hepa A, Typhoid, Varicella -->
                    <div class="row">
                        <label class="col-lg-2 mt-2" >BCG
                            <select name="immunization_bcg" id="immunization_bcg" class="form-select">
                                <option value="0" {{ (old('immunization_bcg',$user_details->mhmi_bcg)=='0') ? 'selected' : '' }}>No</option>
                                <option value="1" {{ (old('immunization_bcg',$user_details->mhmi_bcg)=='1') ? 'selected' : '' }}>Yes</option>
                            </select>
                            <span class="text-danger">
                                @error('immunization_bcg')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <label class="col-lg-2 mt-2">MMR
                            <select name="immunization_mmr" id="immunization_mmr" class="form-select">
                                <option value="0" {{ (old('immunization_mmr',$user_details->mhmi_mmr)=='0') ? 'selected' : '' }}>No</option>
                                <option value="1" {{ (old('immunization_mmr',$user_details->mhmi_mmr)=='1') ? 'selected' : '' }}>Yes</option>
                            </select>
                            <span class="text-danger">
                                @error('immunization_mmr')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                        
                        <label class="col-lg-2 mt-2">Hepa A
                            <select name="immunization_hepa_a" id="immunization_hepa_a" class="form-select">
                                <option value="0" {{ (old('immunization_hepa_a',$user_details->mhmi_hepa_a)=='0') ? 'selected' : '' }}>No</option>
                                <option value="1" {{ (old('immunization_hepa_a',$user_details->mhmi_hepa_a)=='1') ? 'selected' : '' }}>Yes</option>
                            </select>
                            <span class="text-danger">
                                @error('immunization_hepa_a')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <label class="col-lg-2 mt-2">Typhoid
                            <select name="immunization_typhoid" id="immunization_typhoid" class="form-select">
                                <option value="0" {{ (old('immunization_typhoid',$user_details->mhmi_typhoid)=='0') ? 'selected' : '' }}>No</option>
                                <option value="1" {{ (old('immunization_typhoid',$user_details->mhmi_typhoid)=='1') ? 'selected' : '' }}>Yes</option>
                            </select>
                            <span class="text-danger">
                                @error('immunization_typhoid')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <label class="col-lg-2 mt-2">Varicella
                            <select name="immunization_varicella" id="immunization_varicella" class="form-select">
                                <option value="0" {{ (old('immunization_varicella',$user_details->mhmi_varicella)=='0') ? 'selected' : '' }}>No</option>
                                <option value="1" {{ (old('immunization_varicella',$user_details->mhmi_varicella)=='1') ? 'selected' : '' }}>Yes</option>
                            </select>
                            <span class="text-danger">
                                @error('immunization_varicella')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                    </div>
                    <!-- Hepa B, DPT, OPV, HIB -->
                    <div class="row">
                        <div class="col-lg-2 p-0 mt-3">
                            <label class="col-lg-12 form-control border-0">          
                                Hepa B
                                <select name="immunization_hepa_b" id="immunization_hepa_b" class="form-select">
                                    <option value="0" {{ (old('immunization_hepa_b',$user_details->mhmi_hepa_b)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('immunization_hepa_b',$user_details->mhmi_hepa_b)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('immunization_hepa_b')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-12 form-control border-0 pt-0">
                                Hepa B (Doses):
                                <input type="number" name="immunization_hepa_b_doses" id="immunization_hepa_b_doses" class="form-control" 
                                    {{ (old('immunization_hepa_b',$user_details->mhmi_hepa_b)=='1') ? '' : 'disabled' }}
                                    value="{{ (old('immunization_hepa_b',$user_details->mhmi_hepa_b)=='1') ? old('immunization_hepa_b_doses',$user_details->mhmi_hepa_b_doses) : '' }}"
                                >
                                <span class="text-danger">
                                    @error('immunization_hepa_b_doses')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>

                        <div class="col-lg-2 p-0 mt-3">
                            <label class="col-lg-12 form-control border-0">          
                                DPT
                                <select name="immunization_dpt" id="immunization_dpt" class="form-select">
                                    <option value="0" {{ (old('immunization_dpt', $user_details->mhmi_dpt)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('immunization_dpt', $user_details->mhmi_dpt)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('immunization_dpt')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-12 form-control border-0 pt-0">
                                DPT (Doses):
                                <input type="number" name="immunization_dpt_doses" id="immunization_dpt_doses" class="form-control" 
                                    {{ (old('immunization_dpt', $user_details->mhmi_dpt)=='1') ? '' : 'disabled' }}
                                    value="{{ (old('immunization_dpt', $user_details->mhmi_dpt)=='1') ? old('immunization_dpt_doses', $user_details->mhmi_dpt_doses) : '' }}"
                                >
                                <span class="text-danger">
                                    @error('immunization_dpt_doses')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>

                        <div class="col-lg-2 p-0 mt-3">
                            <label class="col-lg-12 form-control border-0">          
                                OPV
                                <select name="immunization_opv" id="immunization_opv" class="form-select">
                                    <option value="0" {{ (old('immunization_opv', $user_details->mhmi_opv)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('immunization_opv', $user_details->mhmi_opv)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('immunization_opv')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-12 form-control border-0 pt-0">
                                OPV (Doses):
                                <input type="number" name="immunization_opv_doses" id="immunization_opv_doses" class="form-control" 
                                    {{ (old('immunization_opv', $user_details->mhmi_opv)=='1') ? '' : 'disabled' }}
                                    value="{{ (old('immunization_opv', $user_details->mhmi_opv)=='1') ? old('immunization_opv_doses', $user_details->mhmi_opv_doses) : '' }}"
                                >
                                <span class="text-danger">
                                    @error('immunization_opv_doses')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>

                        <div class="col-lg-2 p-0 mt-3">
                            <label class="col-lg-12 form-control border-0">          
                                HIB
                                <select name="immunization_hib" id="immunization_hib" class="form-select">
                                    <option value="0" {{ (old('immunization_hib', $user_details->mhmi_hib)=='0') ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ (old('immunization_hib', $user_details->mhmi_hib)=='1') ? 'selected' : '' }}>Yes</option>
                                </select>
                                <span class="text-danger">
                                    @error('immunization_hib')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <label class="col-lg-12 form-control border-0 pt-0">
                                HIB (Doses):
                                <input type="number" name="immunization_hib_doses" id="immunization_hib_doses" class="form-control" 
                                    {{ (old('immunization_hib', $user_details->mhmi_hib)=='1') ? '' : 'disabled' }}
                                    value="{{ (old('immunization_hib', $user_details->mhmi_hib)=='1') ? old('immunization_hib_doses', $user_details->mhmi_hib_doses) : '' }}"
                                >
                                <span class="text-danger">
                                    @error('immunization_hib_doses')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                        </div>
                    </div>

                    <label class="col-lg-12 mt-4" style="font-weight: 600;">Pubertal History:</label>
                    <!--  -->
                    <div class="row">
                       
                        @if($user_details->gender=='male')
                            <div class="col-lg-2 p-0 mt-3">
                                <label class="col-lg-12 form-control border-0 pt-0">
                                    Age on set:
                                    <input type="number" name="pubertal_male_age_on_set" id="pubertal_male_age_on_set" class="form-control" value="{{ old('pubertal_male_age_on_set',$user_details->mhp_male_age_on_set) }}">
                                    <span class="text-danger">
                                        @error('pubertal_male_age_on_set')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </label>
                            </div>
                        @endif

                        @if($user_details->gender=='female')
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-6 p-0 mt-1">
                                        <label class="col-lg-12 form-control border-0 pt-0">          
                                            Menarche
                                            <input type="number" class="form-control" name="pubertal_menarche" id="pubertal_menarche" value="{{ old('pubertal_menarche',$user_details->mhp_female_menarche) }}">
                                            <span class="text-danger">
                                                @error('pubertal_menarche')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                        <label class="col-lg-12 form-control border-0 pt-0">
                                            <span style="display: inline-block; width: 200px; overflow: hidden">LMP:</span> 
                                            <input type="date" name="pubertal_lmp" id="pubertal_lmp" class="form-control" value="{{ old('pubertal_lmp',$user_details->mhp_female_lmp) }}">
                                            <span class="text-danger">
                                                @error('pubertal_lmp')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </div>

                                    <div class="col-lg-6 p-0 mt-1">
                                        <label class="col-lg-12 form-control border-0 pt-0">          
                                            Dysmenorhea:
                                            <select name="pubertal_dysmenorhea" id="pubertal_dysmenorhea" class="form-select">
                                                <option value="0" {{ (old('pubertal_dysmenorhea', $user_details->mhp_female_dysmenorhea)=='0') ? 'selected' : '' }}>No</option>
                                                <option value="1" {{ (old('pubertal_dysmenorhea', $user_details->mhp_female_dysmenorhea)=='1') ? 'selected' : '' }}>Yes</option>
                                            </select>
                                            <span class="text-danger">
                                                @error('pubertal_dysmenorhea')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                        <label class="col-lg-12 form-control border-0 pt-0">
                                            <span style="display: inline-block; width: 200px; overflow: hidden">Dysmenorhea (Medicine):</span>
                                            <input type="text" name="pubertal_dysmenorhea_medicine" id="pubertal_dysmenorhea_medicine" class="form-control"
                                                value="{{ (old('pubertal_dysmenorhea', $user_details->mhp_female_dysmenorhea)=='1') ? old('pubertal_dysmenorhea_medicine', $user_details->mhp_female_dysmenorhea_medicine) : '' }}"
                                                {{ (old('pubertal_dysmenorhea', $user_details->mhp_female_dysmenorhea)=='1') ? '' : 'disabled' }}
                                            >
                                            <span class="text-danger">
                                                @error('pubertal_dysmenorhea_medicine')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </div>
                                </div>    
                            </div>
                        @endif
                    </div>

                    <div class="row mt-3">
                        <label class="col-lg-3">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </label>
                    </div>
                </form>
            </div>

        </div>

    </section>

  </main>
  <!-- main -->

@endsection

@push('script')
<script src="{{ asset('js/select.js') }}"></script>
<script src="{{ asset('js/input.js') }}"></script>
<script>

    $(document).ready(function(){
        
        @if(session('status'))  
            @php 
                $status = (object)session('status');     
            @endphp
            swal('{{$status->title}}','{{$status->message}}','{{$status->icon}}');
        @endif

        $('#hospitalization').change(function(){ clear_disable_enable_input(this, '#hospitalization_specify') });
        $('#operation').change(function(){ clear_disable_enable_input(this, '#operation_specify') });
        $('#accident').change(function(){ clear_disable_enable_input(this, '#accident_specify') });
        $('#disability').change(function(){ clear_disable_enable_input(this, '#disability_specify') });
        $('#asthma').change(function(){ clear_disable_enable_input(this, '#asthma_last_attack') });
        $('#allergy_food').change(function(){ clear_disable_enable_input(this, '#allergy_food_specify') });
        $('#allergy_medicine').change(function(){ clear_disable_enable_input(this, '#allergy_medicine_specify') });
        $('#allergy_others').change(function(){ clear_disable_enable_input(this, '#allergy_others_specify') });
        $('#immunization_hepa_b').change(function(){ clear_disable_enable_input(this, '#immunization_hepa_b_doses') });
        $('#immunization_dpt').change(function(){ clear_disable_enable_input(this, '#immunization_dpt_doses') });
        $('#immunization_opv').change(function(){ clear_disable_enable_input(this, '#immunization_opv_doses') });
        $('#immunization_hib').change(function(){ clear_disable_enable_input(this, '#immunization_hib_doses') });
        $('#pubertal_dysmenorhea').change(function(){ clear_disable_enable_input(this, '#pubertal_dysmenorhea_medicine') });
    });
</script>
@endpush