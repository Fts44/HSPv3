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
                <form action="" method="">
                   
                    <label for="" class="col-lg-12" style="font-weight: 600;">Past Illness:</label>
                    <!-- Hosptalization, Operation, Accident -->
                    <div class="row">
                        <div class="col-lg-4 p-0 mt-2">
                            <label for="hospitalization" class="col-lg-12 form-control border-0">
                                Hospitalization:
                                <select name="hospitalization" id="hospitalization" class="form-select">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                            </label>
                            <label for="hospitalization_specify" class="col-lg-12 form-control border-0 pt-0">
                                Hospitalization (Specify):
                                <input type="text" name="hospitalization_specify" id="hospitalization_specify" class="form-control">
                                <span class="text-danger">Test</span>
                            </label>
                        </div>

                        <div class="col-lg-4 p-0 mt-2">
                            <label for="operation" class="col-lg-12 form-control border-0">
                                Operation:
                                <select name="operation" id="operation" class="form-select">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                            </label>
                            <label for="operation_specify" class="col-lg-12 form-control border-0 pt-0">
                                Operation (Specify):
                                <input type="text" name="operation_specify" id="operation_specify" class="form-control">
                                <span class="text-danger">Test</span>
                            </label>
                        </div>

                        <div class="col-lg-4 p-0 mt-2">
                            <label for="accident" class="col-lg-12 form-control border-0">
                                Accident:
                                <select name="accident" id="accident" class="form-select">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                            </label>
                            <label for="accident_specify" class="col-lg-12 form-control border-0 pt-0">
                                Accident (Specify):
                                <input type="text" name="accident_specify" id="accident_specify" class="form-control">
                                <span class="text-danger">Test</span>
                            </label>
                        </div>
                    </div>

                    <!-- Disability, Asthma -->
                    <div class="row">
                        <div class="col-lg-4 p-0 mt-2">
                            <label for="disability" class="col-lg-12 form-control border-0">
                                Disability:
                                <select name="disability" id="disability" class="form-select">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                            </label>
                            <label for="disability_specify" class="col-lg-12 form-control border-0 pt-0">
                                Disability (Specify):
                                <input type="text" name="disability_specify" id="disability_specify" class="form-control">
                                <span class="text-danger">Test</span>
                            </label>
                        </div>

                        <div class="col-lg-4 p-0 mt-2">
                            <label for="asthma" class="col-lg-12 form-control border-0">
                                Asthma:
                                <select name="asthma" id="asthma" class="form-select">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                            </label>
                            <label for="asthma_last_attack" class="col-lg-12 form-control border-0 pt-0">
                                Asthma (Last attack):
                                <input type="date" name="asthma_last_attack" id="asthma_last_attack" class="form-control">
                                <span class="text-danger">Test</span>
                            </label>
                        </div>
                    </div>

                    <!-- Diabetes, Epilepsy, Heart Disease, Hypertension, Measles, Mumps, Thyroid Problem, Varicella -->
                    <div class="row mt-2">
                        <label for="diabetes" class="col-lg-2 mt-1">
                            Diabetes:
                            <select name="diabetes" id="diabetes" class="form-select">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </label>
                        <label for="epilepsy" class="col-lg-2 mt-1">
                            Epilepsy:
                            <select name="epilepsy" id="epilepsy" class="form-select">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </label>
                        <label for="heart_disease" class="col-lg-2 mt-1">
                            Heart Disease:
                            <select name="heart_disease" id="heart_disease" class="form-select">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </label>
                        <label for="hypertension" class="col-lg-2 mt-1">
                            Hypertension:
                            <select name="hypertension" id="hypertension" class="form-select">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </label>
                        
                        <!-- space -->
                        <div class="co-lg-4"></div>

                        <label for="measles" class="col-lg-2 mt-1">
                            Measles:
                            <select name="measles" id="measles" class="form-select">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </label>
                        <label for="mumps" class="col-lg-2 mt-1">
                            Mumps:
                            <select name="mumps" id="mumps" class="form-select">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </label>
                        <label for="thyroid_problem" class="col-lg-2 mt-1">
                            Thyroid Problem:
                            <select name="thyroid_problem" id="thyroid_problem" class="form-select">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </label>
                        <label for="varicella" class="col-lg-2 mt-1">
                            Varicella:
                            <select name="varicella" id="varicella" class="form-select">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </label>
                    </div>

                    <label for="" class="col-lg-12 mt-4" style="font-weight: 600;">Allergy:</label>
                    <!-- Food, Allergy -->
                    <div class="row">
                        <div class="col-lg-4 p-0 mt-2">
                            <label for="allergy_food" class="col-lg-12 form-control border-0">
                                Food
                                <select name="allergy_food" id="allergy_food" class="form-select">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                            </label>
                            <label for="allergy_food_specify" class="col-lg-12 form-control border-0 pt-0">
                                Food (Specify):
                                <input type="text" name="allergy_food_specify" id="allergy_food_specify" class="form-control">
                                <span class="text-danger">Test</span>
                            </label>
                        </div>
                        <div class="col-lg-4 p-0 mt-2">
                            <label for="allergy_medicine" class="col-lg-12 form-control border-0">
                                Medicine
                                <select name="allergy_medicine" id="allergy_medicine" class="form-select">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                            </label>
                            <label for="allergy_medicine_specify" class="col-lg-12 form-control border-0 pt-0">
                                Medicine (Specify):
                                <input type="text" name="allergy_medicine_specify" id="allergy_medicine_specify" class="form-control">
                                <span class="text-danger">Test</span>
                            </label>
                        </div>
                        <div class="col-lg-4 p-0 mt-2">
                            <label for="allergy_others" class="col-lg-12 form-control border-0">
                                Others
                                <select name="allergy_others" id="allergy_others" class="form-select">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                            </label>
                            <label for="allergy_others_specify" class="col-lg-12 form-control border-0 pt-0">
                                Others (Specify):
                                <input type="text" name="allergy_others_specify" id="allergy_others_specify" class="form-control">
                                <span class="text-danger">Test</span>
                            </label>
                        </div>
                    </div>

                    <label for="" class="col-lg-12 mt-4" style="font-weight: 600;">Medical Immunization:</label>
                    <!-- BCG, MMR, Hepa A, Typhoid, Varicella -->
                    <div class="row">
                        <label class="col-lg-2 mt-2" for="immunization_bcg">BCG
                            <select name="immunization_bcg" id="immunization_bcg" class="form-select">
                                <option value="">No</option>
                                <option value="">Yes</option>
                            </select>
                        </label>

                        <label class="col-lg-2 mt-2" for="immunization_mmr">MMR
                            <select name="immunization_mmr" id="immunization_mmr" class="form-select">
                                <option value="">No</option>
                                <option value="">Yes</option>
                            </select>
                        </label>
                        
                        <label class="col-lg-2 mt-2" for="immunization_hepa_a">Hepa A
                            <select name="immunization_hepa_a" id="immunization_hepa_a" class="form-select">
                                <option value="">No</option>
                                <option value="">Yes</option>
                            </select>
                        </label>

                        <label class="col-lg-2 mt-2" for="immunization_typhoid">Typhoid
                            <select name="immunization_typhoid" id="immunization_typhoid" class="form-select">
                                <option value="">No</option>
                                <option value="">Yes</option>
                            </select>
                        </label>

                        <label class="col-lg-2 mt-2" for="immunization_varicella">Varicella
                            <select name="immunization_varicella" id="immunization_varicella" class="form-select">
                                <option value="">No</option>
                                <option value="">Yes</option>
                            </select>
                        </label>
                    </div>
                    <!-- Hepa B, DPT, OPV, HIB -->
                    <div class="row">
                        <div class="col-lg-2 p-0 mt-3">
                            <label for="immunization_hepa_b" class="col-lg-12 form-control border-0">          
                                Hepa B
                                <select name="immunization_hepa_b" id="immunization_hepa_b" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label for="immunization_hepa_b_doses" class="col-lg-12 form-control border-0 pt-0">
                                Hepa B (Doses):
                                <input type="number" name="immunization_hepa_b_doses" id="immunization_hepa_b_doses" class="form-control">
                                <span class="text-danger">Test</span>
                            </label>
                        </div>

                        <div class="col-lg-2 p-0 mt-3">
                            <label for="immunization_dpt" class="col-lg-12 form-control border-0">          
                                DPT
                                <select name="immunization_dpt" id="immunization_dpt" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label for="immunization_dpt_doses" class="col-lg-12 form-control border-0 pt-0">
                                DPT (Doses):
                                <input type="number" name="immunization_dpt_doses" id="immunization_dpt_doses" class="form-control">
                                <span class="text-danger">Test</span>
                            </label>
                        </div>

                        <div class="col-lg-2 p-0 mt-3">
                            <label for="immunization_opv" class="col-lg-12 form-control border-0">          
                                OPV
                                <select name="immunization_opv" id="immunization_opv" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label for="immunization_opv_doses" class="col-lg-12 form-control border-0 pt-0">
                                OPV (Doses):
                                <input type="number" name="immunization_opv_doses" id="immunization_opv_doses" class="form-control">
                                <span class="text-danger">Test</span>
                            </label>
                        </div>

                        <div class="col-lg-2 p-0 mt-3">
                            <label for="immunization_hib" class="col-lg-12 form-control border-0">          
                                HIB
                                <select name="immunization_hib" id="immunization_hib" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label for="immunization_hib_doses" class="col-lg-12 form-control border-0 pt-0">
                                HIB (Doses):
                                <input type="number" name="immunization_hib_doses" id="immunization_hib_doses" class="form-control">
                                <span class="text-danger">Test</span>
                            </label>
                        </div>
                    </div>

                    <label for="" class="col-lg-12 mt-4" style="font-weight: 600;">Pubertal History:</label>
                    <!--  -->
                    <div class="row">
                        <div class="col-lg-2 p-0 mt-3">
                            <label for="" class="col-lg-12 form-control border-0">          
                                (Male)
                            </label>
                            <label for="pubertal_male_age_on_set" class="col-lg-12 form-control border-0 pt-0">
                                Age on set:
                                <input type="number" name="pubertal_male_age_on_set" id="pubertal_male_age_on_set" class="form-control">
                                <span class="text-danger">Test</span>
                            </label>
                        </div>

                        <div class="col-lg-4">
                            <label for="" class="col-lg-12 mt-4">          
                                (Female)
                            </label>
                            <div class="row">
                                <div class="col-lg-6 p-0 mt-1">
                                    <label for="pubertal_menarche" class="col-lg-12 form-control border-0 pt-0">          
                                        Menarche
                                        <input type="number" class="form-control" name="pubertal_menarche" id="pubertal_menarche">
                                        <span class="text-danger">Test</span>
                                    </label>
                                    <label for="pubertal_lmp" class="col-lg-12 form-control border-0 pt-0">
                                        LMP:
                                        <input type="date" name="pubertal_lmp" id="pubertal_lmp" class="form-control">
                                        <span class="text-danger">Test</span>
                                    </label>
                                </div>

                                <div class="col-lg-6 p-0 mt-1">
                                    <label for="pubertal_dysmenorhea" class="col-lg-12 form-control border-0 pt-0">          
                                        Dysmenorhea:
                                        <select name="pubertal_dysmenorhea" id="pubertal_dysmenorhea" class="form-select">
                                            <option value="">No</option>
                                            <option value="">Yes</option>
                                        </select>
                                    </label>
                                    <label for="pubertal_dysmenorhea_medicine" class="col-lg-12 form-control border-0 pt-0">
                                        <span style="display: inline-block; width: 200px; overflow: hidden">Dysmenorhea (Medicine):</span>
                                        <input type="text" name="pubertal_dysmenorhea_medicine" id="pubertal_dysmenorhea_medicine" class="form-control">
                                        <span class="text-danger">Test</span>
                                    </label>
                                </div>
                            </div>    
                        </div>
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
<script src="{{ asset('js/profile.js') }}"></script>
<script>

    $(document).ready(function(){
   
    });
</script>
@endpush