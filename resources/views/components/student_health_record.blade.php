<style type="text/css">
    @media print and (width: 21cm) and (height: 29.7cm) {
        @page {
            size: A4 portrait;
            margin: 3cm;
        }
    }

    /* style sheet for "letter" printing
    @media print and (width: 8.5in) and (height: 11in) {
        @page {
            margin: 1in;
        }
    } */

    /* A4 Landscape */
    /* @page {
        size: A4 landscape;
        margin: 10%;
    } */

    .print_table{
        font-size: 12pt;
        font-family: "Times New Roman", Times, serif;
        border: 1px solid black;
        border-collapse: collapse;
    }

    .print_table th{
        width: 5%;
    }
    table.print_table tbody tr td:last-child,
    table.print_table thead tr th,
    table.print_table thead {
        border-right: 1px solid;
    }

    .print_table td{
        padding: 5px;
    }

    .print_table input[type='checkbox'] {
        accent-color: black;
    }

    .print_table input[type="radio"] {
        -webkit-appearance: checkbox; /* Chrome, Safari, Opera */
        -moz-appearance: checkbox;    /* Firefox */
        -ms-appearance: checkbox;     /* not currently supported */
        accent-color: black;
    }

    .print_table input {
        font-size: 12.5pt;
    }

    .bb {
        border: none;
        border-bottom: 1px solid;
    }

    .nbb {
        border-bottom: none;
    }

    .br {
        border-right: 1px solid;
    }

    .ba {
        border: 1px solid;
    }

    

</style> 

<div class="modal fade" id="student_health_records" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_title" aria-hidden="true">
    <div class="modal-dialog" style="min-width: 1000px; overflow-y: auto;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-flex w-100 justify-content-center" id="modal_title">Student Health Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="student_record_body modal-body mb-4">
                
                <table class="print_table">
                    <thead style="visibility: collapse; border: 1px solid;">
                        <th>1</th><th>1</th><th>1</th><th>1</th><th>1</th><th>1</th><th>1</th><th>1</th><th>1</th><th>1</th>
                        <th>1</th><th>1</th><th>1</th><th>1</th><th>1</th><th>1</th><th>1</th><th>1</th><th>1</th><th>1</th>
                    </thead>
                    <tbody>
                        <tr style="height: 30px; border: 1px solid;">
                            <td colspan="2" class="text-center">
                                <img src="{{ asset('image/logo.png') }}" alt="" style="display:float; width:50px; height:45px;">
                            </td>
                            <td colspan="6"></td>
                            <td colspan="6"></td>
                            <td colspan="6"></td>
                        </tr>
                        <!-- date of medical exam, sr-code, program -->
                        <tr>
                            <td colspan="7">
                                Date of Medical Examination: {{ date('F d, Y') }}
                            </td>
                            <td colspan="4">
                                SR-Code: {{ $patientDetails->sr_code }}
                            </td>
                            <td colspan="9">
                                Program: {{ $patientDetails->prog_name }}
                            </td>
                        </tr>
                        <!-- profile pic -->
                        <tr class="ba" style="height: 240px;">
                            <td colspan="15"></td>
                            <td class="ba" colspan="5">
                                <img src="{{ asset('storage/profile_picture/'.$patientDetails->profile_pic) }}" alt="profile_pic" style="display:block; width:auto; height:240px;">
                            </td>
                        </tr>
                        <!-- name -->
                        <tr>
                            <td colspan="7">
                                <b>FIRST NAME:</b> {{ $patientDetails->firstname }}
                            </td>
                            <td colspan="5">
                                <b>MIDDLE NAME:</b> {{ $patientDetails->middlename }}
                            </td>
                            <td colspan="5">
                                <b>LAST NAME:</b> {{ $patientDetails->lastname }}
                            </td>
                            <td colspan="3">
                                <b>SUFFIX:</b> {{ $patientDetails->suffixname }}
                            </td>
                        </tr>
                        <!-- home address -->
                        <tr>
                            <td colspan="20">
                                <b>HOME ADDRESS:</b> {{ $patientDetails->home_brgy_name.", ".$patientDetails->home_mun_name.", ".$patientDetails->home_prov_name }}
                            </td>
                        </tr>
                        <!-- dorm address -->
                        <tr>
                            <td colspan="20">
                                <b>DORMITORY ADDRESS:</b> {{ $patientDetails->dorm_brgy_name.", ".$patientDetails->dorm_mun_name.", ".$patientDetails->dorm_prov_name }}
                            </td>
                        </tr>
                        <!-- gender, age, status, religion, contact -->
                        <tr>
                            <td colspan="3">
                                <b>GENDER:</b> {{ ucwords($patientDetails->gender) }}
                            </td>
                            <td colspan="2">
                                <b>AGE:</b> 
                                @php 
                                    $date = new DateTime($patientDetails->birthdate);
                                    $now = new DateTime();
                                    $interval = $now->diff($date);
                                @endphp
                                {{ $interval->y }}
                            </td>
                            <td colspan="4">
                                <b>Civil Status:</b> {{ ucwords($patientDetails->civil_status) }}
                            </td>
                            <td colspan="6">
                                <b>Religion:</b> {{$patientDetails->religion}}
                            </td>
                            <td colspan="5">
                                <b>Contact:</b> {{$patientDetails->contact}}
                            </td>
                        </tr>
                        <!-- date of birth, place of birth -->
                        <tr class="bb">
                            <td colspan="10">
                                <b>DATE OF BIRTH:</b> {{ date_format(date_create($patientDetails->birthdate),'F d, Y') }}
                            </td>
                            <td colspan="10">
                                <b>PLACE OF BIRTH:</b> {{ ($patientDetails->birth_brgy_name) ? $patientDetails->birth_brgy_name.", ".$patientDetails->birth_mun_name.", ".$patientDetails->birth_prov_name : 'none' }}
                            </td>
                        </tr>
                        <!-- contact incase of emergency -->
                        <tr>
                            <td colspan="20">
                                <b>CONTACT INCASE OF EMERGENCY:</b>
                            </td>
                        </tr>
                        <!-- ec name, relation -->
                        <tr>
                            <td colspan="10">
                                <b>NAME:</b> {{ $patientDetails->ec_firstname." ".$patientDetails->ec_middlename." ".$patientDetails->ec_lastname." ".$patientDetails->ec_suffixname }}
                            </td>
                            <td colspan="10">
                                <b>RELATION TO PATIENT:</b> {{ $patientDetails->ec_relationtopatient }}
                            </td>
                        </tr>
                        <!-- ec business address -->
                        <tr>
                            <td colspan="20">
                                <b>BUSINESS ADDRESS:</b> {{ $patientDetails->ec_brgy_name." ".$patientDetails->ec_mun_name." ".$patientDetails->ec_prov_name }}
                            </td>
                        </tr>
                        <!-- ec landline contact -->
                        <tr class="bb">
                            <td colspan="10">
                                <b>LANDLINE:</b> {{ $patientDetails->ec_landline }}
                            </td>
                            <td colspan="10">
                                <b>CELLPHONE NO:</b> {{ $patientDetails->ec_contact }}
                            </td>
                        </tr>
                        <!-- past medical history -->
                        <tr>
                            <td colspan="20">
                                <b>PAST MEDICAL HISTORY:</b>
                            </td>
                        </tr>
                        <!-- past illness 1st row -->
                        <tr>
                            <td colspan="3">
                                Past Illness:
                            </td>
                            <td colspan="6">
                                <input type="checkbox" name="mhpi_asthma" id="mhpi_asthma" {{ ($patientDetails->mhpi_asthma) ? 'checked' : '' }}>
                                <label for="mhpi_asthma"> Asthma;</label>
                                &nbsp;
                                Last Attack:
                                <input type="date" class="bb" style="width: 100px;" name="mhpi_asthma_last_attack" value="{{ ($patientDetails->mhpi_asthma) ? $patientDetails->mhpi_asthma_last_attack : '' }}">
                            </td>
                            <td colspan="2">
                                <input type="checkbox" name="mhpi_measles" id="mhpi_measles" {{ ($patientDetails->mhpi_measles) ? 'checked' : '' }}>
                                <label for="mhpi_measles">Measles</label>
                            </td>
                            <td colspan="3">
                                <input type="checkbox" name="mhpi_hospitalization" id="mhpi_hospitalization" {{ ($patientDetails->mhpi_hospitalization) ? 'checked' : '' }}>
                                <label for="mhpi_hospitalization">Hospitalization:</label>
                            </td>
                            <td colspan="6">
                                <input type="text" style="border-left: none;border-right: none;border-top: none; width: 100%;" name="mhpi_hospitalization_specify" value=" {{ ($patientDetails->mhpi_hospitalization) ? $patientDetails->mhpi_hospitalization_specify : '' }}">
                            </td>
                        </tr>
                        <!-- heart disease, mumps, operation -->
                        <tr>
                            <td colspan="3">

                            </td>
                            <td colspan="6">
                                <input type="checkbox" name="mhpi_heart_disease" id="mhpi_heart_disease" {{ ($patientDetails->mhpi_heart_disease) ? 'checked' : '' }}>
                                <label for="mhpi_heart_disease"> Heart disease</label>
                            </td>
                            <td colspan="2">
                                <input type="checkbox" name="mhpi_mumps" id="mhpi_mumps" {{ ($patientDetails->mhpi_mumps) ? 'checked' : '' }}>
                                <label for="mhpi_mumps"> Mumps</label>
                            </td>
                            <td colspan="3">
                                <input type="checkbox" name="mhpi_operation" id="mhpi_operation" {{ ($patientDetails->mhpi_operation) ? 'checked' : '' }}>
                                <label for="mhpi_operation"> Operation</label>
                            </td>
                            <td colspan="6">
                                <input type="text" style="border-left: none;border-right: none;border-top: none; width: 100%;" name="mhpi_operation_specify" value="{{ ($patientDetails->mhpi_operation) ? $patientDetails->mhpi_operation_specify : '' }}">
                            </td>
                        </tr>
                        <!-- hypertension, varicella, accident -->
                        <tr>
                            <td colspan="3">

                            </td>
                            <td colspan="6">
                                <input type="checkbox" name="mhpi_hypertension" id="mhpi_hypertension" {{ ($patientDetails->mhpi_hypertension) ? 'checked' : '' }}>
                                <label for="mhpi_hypertension"> Hypertension</label>
                            </td>
                            <td colspan="2">
                                <input type="checkbox" name="mhpi_varicella" id="mhpi_varicella" {{ ($patientDetails->mhpi_varicella) ? 'checked' : '' }}>
                                <label for="mhpi_varicella"> Varicella</label>
                            </td>
                            <td colspan="3">
                                <input type="checkbox" name="mhpi_accident" id="mhpi_accident" {{ ($patientDetails->mhpi_accident) ? 'checked' : '' }}>
                                <label for="mhpi_accident"> Accident</label>
                            </td>
                            <td colspan="6">
                                <input type="text" style="border-left: none;border-right: none;border-top: none; width: 100%;" name="mhpi_accident_specify" value="{{ ($patientDetails->mhpi_accident) ? $patientDetails->mhpi_accident_specify : '' }}">
                            </td>
                        </tr>
                        <!-- epilepsy, disability -->
                        <tr>
                            <td colspan="3">

                            </td>
                            <td colspan="6">
                                <input type="checkbox" name="mhpi_epilepsy" id="mhpi_epilepsy" {{ ($patientDetails->mhpi_epilepsy) ? 'checked' : '' }}>
                                <label for="mhpi_epilepsy"> Epilepsy</label>
                            </td>
                            <td colspan="2">
                            </td>
                            <td colspan="3">
                                <input type="checkbox" name="mhpi_disability" id="mhpi_disability" {{ ($patientDetails->mhpi_disability) ? 'checked' : '' }}>
                                <label for="mhpi_disability"> Disability</label>
                            </td>
                            <td colspan="6">
                                <input type="text" style="border-left: none;border-right: none;border-top: none; width: 100%;" name="mhpi_disability_specify" value="{{ ($patientDetails->mhpi_disability) ? $patientDetails->mhpi_disability_specify : '' }}">
                            </td>
                        </tr>
                        <!-- diabetes -->
                        <tr>
                            <td colspan="3">

                            </td>
                            <td colspan="6">
                                <input type="checkbox" name="mhpi_diabetes" id="mhpi_diabetes" {{ ($patientDetails->mhpi_diabetes) ? 'checked' : '' }}>
                                <label for="mhpi_diabetes"> Diabetes</label>
                            </td>
                            <td colspan="2">
                            </td>
                            <td colspan="3">
                            </td>
                            <td colspan="6">
                            </td>
                        </tr>
                        <!-- thyroid -->
                        <tr>
                            <td colspan="3">

                            </td>
                            <td colspan="6">
                                <input type="checkbox" name="mhpi_thyroid_problem" id="mhpi_thyroid_problem" {{ ($patientDetails->mhpi_thyroid_problem) ? 'checked' : '' }}>
                                <label for="mhpi_thyroid_problem"> Thyroid Problem</label>
                            </td>
                            <td colspan="2">
                            </td>
                            <td colspan="3">
                            </td>
                            <td colspan="6">
                            </td>
                        </tr>
                        <!-- allergy food -->
                        <tr>
                            <td colspan="3">
                                Allergy:
                            </td>
                            <td colspan="2">
                                <label> Food:</label>
                            </td>
                            <td colspan="2">
                                <input type="checkbox" name="mha_food_no" id="allergy_food_no" {{ ($patientDetails->mha_food) ? '' : 'checked' }}>
                                <label for="allergy_food_no"> No</label>
                            </td>
                            <td colspan="2">
                                <input type="checkbox" name="mha_food_yes" id="allergy_food_yes" {{ ($patientDetails->mha_food) ? 'checked' : '' }}>
                                <label for="allergy_food_yes"> Yes</label>
                            </td>
                            <td colspan="2">
                                <label for="mha_food_specify">Specify:</label>
                            </td>
                            <td colspan="9">
                                <input type="text" style="border-left: none;border-right: none;border-top: none; width: 100%;" name="mha_food_specify" value="{{ ($patientDetails->mha_food) ? $patientDetails->mha_food_specify : '' }}">
                            </td>
                        </tr>
                        <!-- allergy medicine -->
                        <tr>
                            <td colspan="3">
                               
                            </td>
                            <td colspan="2">
                                <label>Medicine:</label>
                            </td>
                            <td colspan="2">
                                <input type="checkbox" name="mha_medicine_no" id="mha_medicine_no" {{ ($patientDetails->mha_medicine) ? '' : 'checked' }}>
                                <label for="mha_medicine_no"> No</label>
                            </td>
                            <td colspan="2">
                                <input type="checkbox" name="mha_medicine_yes" id="mha_medicine_yes" {{ ($patientDetails->mha_medicine) ? 'checked' : '' }}>
                                <label for="mha_medicine_yes"> Yes</label>
                            </td>
                            <td colspan="2">
                                <label for="mha_medicine_specify">Specify:</label>
                            </td>
                            <td colspan="9">
                                <input type="text" style="border-left: none;border-right: none;border-top: none; width: 100%;" name="mha_medicine_specify" value="{{ ($patientDetails->mha_medicine) ? $patientDetails->mha_medicine_specify : '' }}">
                            </td>
                        </tr>
                        <!-- allergy others -->
                        <tr>
                            <td colspan="3">
                               
                            </td>
                            <td colspan="2">
                                <label>Others:</label>
                            </td>
                            <td colspan="2">
                                <input type="checkbox" name="mha_others_no" id="mha_others_no" {{ ($patientDetails->mha_others) ? '' : 'checked' }}>
                                <label for="mha_others_no"> No</label>
                            </td>
                            <td colspan="2">
                                <input type="checkbox" name="mha_others_yes" id="mha_others_yes" {{ ($patientDetails->mha_others) ? 'checked' : '' }}>
                                <label for="mha_others_yes"> Yes</label>
                            </td>
                            <td colspan="2">
                                <label for="mha_others_specify">Specify:</label>
                            </td>
                            <td colspan="9">
                                <input type="text" style="border-left: none;border-right: none;border-top: none; width: 100%;" name="mha_others_specify" value="{{ ($patientDetails->mha_others) ? $patientDetails->mha_others_specify : '' }}">
                            </td>
                        </tr>
                        <!-- medication immunization -->
                        <tr>
                            <td colspan="20">Medication Immunization:</td>
                        </tr>
                        <!-- bcg, hepa b -->
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">
                                BCG
                            </td>
                            <td colspan="2">
                                <input type="checkbox" name="mhmi_bcg" id="mhmi_bcg" {{ ($patientDetails->mhmi_bcg) ? 'checked' : '' }}>
                                <label for="bcg">Yes</label>
                            </td>
                            <td colspan="2">
                                <input type="checkbox" name="" id="" {{ ($patientDetails->mhmi_bcg) ? '' : 'checked' }}>
                                <label for="bcg">No</label>
                            </td>
                            <td colspan="2">
                                Hepa B 
                            </td>
                            <td colspan="9">
                                <input type="checkbox" name="mhmi_hepa_b_yes" id="mhmi_hepa_b_yes" {{ ($patientDetails->mhmi_hepa_b) ? 'checked' : '' }}>
                                <label for=""> Yes</label>
                                &nbsp;
                                <input type="number" name="" id="" style="border-left: none; border-right: none; border-top: none; width: 30px;" value="{{ ($patientDetails->mhmi_hepa_b) ? $patientDetails->mhmi_hepa_b_doses : '' }}">
                                <label for=""> doses</label>
                                &nbsp;
                                <input type="checkbox" name="" id="">
                                <label for=""> No</label>
                            </td>
                        </tr>
                        <!-- mmr, dpt -->
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">
                                MMR
                            </td>
                            <td colspan="2">
                                <input type="checkbox" name="mhmi_mmr_yes" id="mhmi_mmr_yes" {{ ($patientDetails->mhmi_mmr) ? 'checked' : '' }}>
                                <label for="mhmi_mmr_yes">Yes</label>
                            </td>
                            <td colspan="2">
                                <input type="checkbox" name="mhmi_mmr_no" id="mhmi_mmr_no" {{ ($patientDetails->mhmi_mmr) ? '' : 'checked' }}>
                                <label for="mhmi_mmr_no">No</label>
                            </td>
                            <td colspan="2">
                                DPT
                            </td>
                            <td colspan="9">
                                <input type="checkbox" name="mhmi_dpt_yes" id="mhmi_dpt_yes" {{ ($patientDetails->mhmi_dpt) ? 'checked' : '' }}>
                                <label for="mhmi_dpt_yes"> Yes</label>
                                &nbsp;
                                <input type="number" name="mhmi_dpt_doses" id="mhmi_dpt_doses" style="border-left: none; border-right: none; border-top: none; width: 30px;" value="{{ ($patientDetails->mhmi_dpt) ? $patientDetails->mhmi_dpt_doses : '' }}">
                                <label for="mhmi_dpt_doses"> doses</label>
                                &nbsp;
                                <input type="checkbox" name="mhmi_dpt_no" id="mhmi_dpt_no" {{ ($patientDetails->mhmi_dpt) ? '' : 'checked' }}>
                                <label for="mhmi_dpt_no"> No</label>
                            </td>
                        </tr>
                        <!-- hepa a, opv -->
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">
                                Hepa A
                            </td>
                            <td colspan="2">
                                <input type="checkbox" name="mhmi_hepa_a_yes" id="mhmi_hepa_a_yes" {{ ($patientDetails->mhmi_hepa_a) ? 'checked' : '' }}>
                                <label for="mhmi_hepa_a_yes">Yes</label>
                            </td>
                            <td colspan="2">
                                <input type="checkbox" name="mhmi_hepa_a_no" id="mhmi_hepa_a_no" {{ ($patientDetails->mhmi_hepa_a) ? '' : 'checked' }}>
                                <label for="mhmi_hepa_a_no">No</label>
                            </td>
                            <td colspan="2">
                                OPV
                            </td>
                            <td colspan="9">
                                <input type="checkbox" name="mhmi_opv_yes" id="mhmi_opv_yes" {{ ($patientDetails->mhmi_opv) ? 'checked' : '' }}>
                                <label for="mhmi_opv_yes"> Yes</label>
                                &nbsp;
                                <input type="number" name="mhmi_opv_doses" id="mhmi_opv_doses" style="border-left: none; border-right: none; border-top: none; width: 30px;" value="{{ ($patientDetails->mhmi_opv) ? $patientDetails->mhmi_opv_doses : '' }}">
                                <label for="mhmi_opv_doses"> doses</label>
                                &nbsp;
                                <input type="checkbox" name="mhmi_opv_no" id="mhmi_opv_no" {{ ($patientDetails->mhmi_opv) ? '' : 'checked' }}>
                                <label for="mhmi_opv_no"> No</label>
                            </td>
                        </tr>
                        <!-- typhoid, hib -->
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">
                                Typhoid
                            </td>
                            <td colspan="2">
                                <input type="checkbox" name="mhmi_typhoid_yes" id="mhmi_typhoid_yes" {{ ($patientDetails->mhmi_typhoid) ? 'checked' : '' }}>
                                <label for="mhmi_typhoid_yes">Yes</label>
                            </td>
                            <td colspan="2">
                                <input type="checkbox" name="mhmi_typhoid_no" id="mhmi_typhoid_no" {{ ($patientDetails->mhmi_typhoid) ? '' : 'checked' }}>
                                <label for="mhmi_typhoid_no">No</label>
                            </td>
                            <td colspan="2">
                                HIB
                            </td>
                            <td colspan="9">
                                <input type="checkbox" name="mhmi_hib_yes" id="mhmi_hib_yes" {{ ($patientDetails->mhmi_hib) ? 'checked' : '' }}>
                                <label for="mhmi_hib_yes"> Yes</label>
                                &nbsp;
                                <input type="number" name="mhmi_hib_doses" id="mhmi_hib_doses" style="border-left: none; border-right: none; border-top: none; width: 30px;" value="{{ ($patientDetails->mhmi_hib) ? $patientDetails->mhmi_hib_doses : '' }}">
                                <label for="mhmi_hib_doses"> doses</label>
                                &nbsp;
                                <input type="checkbox" name="mhmi_hib_no" id="mhmi_hib_no" {{ ($patientDetails->mhmi_hib) ? '' : 'checked' }}>
                                <label for="mhmi_hib_no"> No</label>
                            </td>
                        </tr>
                        <!-- typhoid, hib -->
                        <tr class="bb">
                            <td colspan="3"></td>
                            <td colspan="2">
                                Varicella
                            </td>
                            <td colspan="2">
                                <input type="checkbox" name="mhmi_varicella_yes" id="mhmi_varicella_yes" {{ ($patientDetails->mhmi_varicella) ? 'checked' : '' }}>
                                <label for="mhmi_varicella_yes">Yes</label>
                            </td>
                            <td colspan="2">
                                <input type="checkbox" name="mhmi_varicella_no" id="mhmi_varicella_no" {{ ($patientDetails->mhmi_varicella) ? '' : 'checked' }}>
                                <label for="mhmi_varicella_no">No</label>
                            </td>
                            <td colspan="11">
                            </td>
                        </tr>
                        <!-- pubertal history -->
                        <tr>
                            <td colspan="20">
                                <b>PUBERTAL HISTORY:</b>
                            </td>
                        </tr>
                        <!-- male, female -->
                        <tr>
                            <td colspan="10">Male:</td>
                            <td colspan="10">Female:</td>
                        </tr>
                        <!-- age of onset, menarche, lmp -->
                        <tr>
                            <td colspan="10">
                                Age of onset: 
                                &nbsp;
                                <input type="text" style="border-left: none; border-right: none; border-top: none; border-bottom: 1px solid;" name="mhp_male_age_on_set" value="{{ ($patientDetails->gender=='male') ? $patientDetails->mhp_male_age_on_set : '' }}">
                            </td>
                            <td colspan="5">
                                Menarche:
                                &nbsp;
                                <input type="text" style="border-left: none; border-right: none; border-top: none; border-bottom: 1px solid; width: 120px;" name="mhp_female_menarche" value="{{ ($patientDetails->gender=='female') ? $patientDetails->mhp_female_menarche : '' }}">
                            </td>
                            <td colspan="5">
                                LMP:
                                &nbsp;
                                <input type="date" style="border-left: none; border-right: none; border-top: none; border-bottom: 1px solid; width: 120px;" name="" value="{{ ($patientDetails->gender=='female') ? $patientDetails->mhp_female_lmp : '' }}">
                            </td>
                        </tr>
                        <!-- dysmenorhea -->
                        <tr class="bb">
                            <td colspan="10">

                            </td>
                            <td colspan="10">
                                Dysmenorhea:
                                &nbsp;
                                <input type="checkbox" name="mhp_female_dysmenorhea_no" id="mhp_female_dysmenorhea_no" {{ ($patientDetails->gender=='female') ? ($patientDetails->mhp_female_dysmenorhea) ? '' : 'checked' : '' }}>
                                <label for="mhp_female_dysmenorhea_no">No</label>
                                &nbsp;
                                <input type="checkbox" name="mhp_female_dysmenorhea_yes" id="mhp_female_dysmenorhea_yes" {{ ($patientDetails->gender=='female') ? ($patientDetails->mhp_female_dysmenorhea) ? 'checked' : '' : '' }}>
                                <label for="mhp_female_dysmenorhea_yes">Yes;</label>
                                &nbsp;
                                <label for="mhp_female_dysmenorhea_medicine">Medicine:</label>
                                <input type="text" name="mhp_female_dysmenorhea_medicine" id="mhp_female_dysmenorhea_medicine" style="width: 150px;" class="bb" value="{{ ($patientDetails->gender=='female') ? ($patientDetails->mhp_female_dysmenorhea) ? $patientDetails->mhp_female_dysmenorhea_medicine : '' : '' }}">
                            </td>
                        </tr>

                        <!-- family history -->
                        <tr>
                            <td colspan="20">
                                <b>FAMILY HISTORY:</b>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4"><input type="checkbox" name="fih_diabetes" id="fih_diabetes" {{ ($patientDetails->fih_diabetes) ? 'checked' : '' }}> Diabetes</td>
                            <td colspan="4"><input type="checkbox" name="fih_heart_disease" id="fih_heart_disease" {{ ($patientDetails->fih_heart_disease) ? 'checked' : '' }}> Heart Disease</td>
                            <td colspan="4"><input type="checkbox" name="fih_mental" id="fih_mental" {{ ($patientDetails->fih_mental) ? 'checked' : '' }}> Mental Illness</td>
                            <td colspan="4"><input type="checkbox" name="fih_cancer" id="fih_cancer" {{ ($patientDetails->fih_cancer) ? 'checked' : '' }}> Cancer</td>
                            <td colspan="4"></td>
                        </tr>

                        <tr>
                            <td colspan="4"><input type="checkbox" name="fih_hypertension" id="fih_hypertension" {{ ($patientDetails->fih_hypertension) ? 'checked' : '' }}> Hypertension</td>
                            <td colspan="4"><input type="checkbox" name="fih_kidney_disease" id="fih_kidney_disease" {{ ($patientDetails->fih_kidney_disease) ? 'checked' : '' }}> Kidney Disease</td>
                            <td colspan="4"><input type="checkbox" name="fih_epilepsy" id="fih_epilepsy" {{ ($patientDetails->fih_epilepsy) ? 'checked' : '' }}> Epilepsy</td>
                            <td colspan="4"><input type="checkbox" name="fih_others" id="fih_others" {{ ($patientDetails->fih_others) ? 'checked' : '' }}> Others</td>
                            <td colspan="4"></td>
                        </tr>

                        <tr>
                            <td colspan="6">
                                <b>FATHER:</b> {{$patientDetails->fd_father_firstname." ".$patientDetails->fd_father_middlename." ".$patientDetails->fd_father_lastname." ".$patientDetails->fd_father_suffixname}}
                            </td>
                            <td colspan="4">
                                <b>Occupation:</b> {{$patientDetails->fd_father_occupation}}
                            </td>
                            <td colspan="6">
                                <b>Mother:</b> {{$patientDetails->fd_mother_firstname." ".$patientDetails->fd_mother_middlename." ".$patientDetails->fd_mother_lastname." ".$patientDetails->fd_mother_suffixname}}
                            </td>
                            <td colspan="5">
                                <b>Occupation:</b> {{$patientDetails->fd_mother_occupation}}
                            </td>
                        </tr>

                        <tr class="bb">
                            <td colspan="3">
                                Marital Status: 
                            </td>
                            <td colspan="17">
                                <input type="checkbox" name="fd_marital_status_married" id="fd_marital_status_married" {{ ($patientDetails->fd_marital_status=='married') ? 'checked' : '' }}>
                                <label for="fd_marital_status_married"> Married</label>
                                &nbsp;
                                <input type="checkbox" name="fd_marital_status_unmarried" id="fd_marital_status_unmarried" {{ ($patientDetails->fd_marital_status=='unmarried') ? 'checked' : '' }}>
                                <label for="fd_marital_status_unmarried"> Unmarried</label>
                                &nbsp;
                                <input type="checkbox" name="fd_marital_status_separated" id="fd_marital_status_separated" {{ ($patientDetails->fd_marital_status=='separated') ? 'checked' : '' }}>
                                <label for="fd_marital_status_separated"> Separated</label>
                            </td>
                        </tr>

                        <!-- physical examination -->
                        <tr>
                            <td colspan="20">
                                <b>PHYSICAL EXAMINATION:</b>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                Weight:
                                <input type="number" style="width: 65px;" class="bb">
                            </td>
                            <td colspan="3">
                                Height:
                                <input type="number" style="width: 65px;" class="bb">
                            </td>
                            <td colspan="14">
                                Body Mass Index (BMI) (Weight in kg/height in meter sq.)
                                <input type="number" name="" id="" style="width: 260px;" class="bb">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="20">
                                <label for="">Temperature:</label>
                                <input type="text" name="" id="" class="bb" style="width: 100px;">
                                &nbsp;
                                <label for="">HR:</label>
                                <input type="text" name="" id="" class="bb" style="width: 100px;">
                                &nbsp;
                                <label for="">BP:</label>
                                <input type="text" name="" id="" class="bb" style="width: 100px;">
                                &nbsp;
                                <label for="">Vision:</label>
                                <input type="text" name="" id="" class="bb" style="width: 160px;">
                                &nbsp;
                                <label for="">Hearing:</label>
                                <input type="text" name="" id="" class="bb" style="width: 100px;">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="15">
                                <label for="">Chest X-ray Result:</label>
                                <input type="text" name="" id="" style="width: 500px;" class="bb">
                            </td>
                            <td colspan="5">
                                <label for="">Date:</label>
                                <input type="date" name="" id="" style="width: 160px;" class="bb">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="20">
                                <label for="">Blood Type:</label>
                                <select name="" id="" class="bb">
                                    <option value="">--- Choose ---</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="20">
                                Please check if normal. Describe only the abnormal findings in the space below.
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <input type="checkbox" name="" id="">
                                <label for="">General Survey</label>
                            </td>
                            <td colspan="17">
                                <input type="text" name="" id="" style="width: 500px;" class="bb">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <input type="checkbox" name="" id="">
                                <label for="">Skin</label>
                            </td>
                            <td colspan="17">
                                <input type="text" name="" id="" style="width: 500px;" class="bb">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <input type="checkbox" name="" id="">
                                <label for="">Eyes/ Ears/ Nose</label>
                            </td>
                            <td colspan="17">
                                <input type="text" name="" id="" style="width: 500px;" class="bb">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <input type="checkbox" name="" id="">
                                <label for="">Teeth/ Gums</label>
                            </td>
                            <td colspan="17">
                                <input type="text" name="" id="" style="width: 500px;" class="bb">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <input type="checkbox" name="" id="">
                                <label for="">Neck</label>
                            </td>
                            <td colspan="17">
                                <input type="text" name="" id="" style="width: 500px;" class="bb">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <input type="checkbox" name="" id="">
                                <label for="">Heart</label>
                            </td>
                            <td colspan="17">
                                <input type="text" name="" id="" style="width: 500px;" class="bb">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <input type="checkbox" name="" id="">
                                <label for="">Chest/ Lungs</label>
                            </td>
                            <td colspan="17">
                                <input type="text" name="" id="" style="width: 500px;" class="bb">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <input type="checkbox" name="" id="">
                                <label for="">Abdomen</label>
                            </td>
                            <td colspan="17">
                                <input type="text" name="" id="" style="width: 500px;" class="bb">
                            </td>
                        </tr>

                        <tr class="bb">
                            <td colspan="3">
                                <input type="checkbox" name="" id="">
                                <label for="">Musculoskeletal</label>
                            </td>
                            <td colspan="17" style="border-bottom: none;">
                                <input type="text" name="" id="" style="width: 500px;" class="bb">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="20">
                                <b>ASSESSMENT DIAGNOSIS</b>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="7"></td>
                            <td colspan="1">NO</td>
                            <td colspan="1">YES</td>
                            <td colspan="11">IF YES</td>
                        </tr>
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="6">
                                1. Drinking
                            </td>
                            <td colspan="1">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td colspan="1">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td colspan="11">
                                <label for="">How much?</label>
                                <input type="text" name="" id="" style="width: 175px;" class="bb">
                                <label for="">How often?</label>
                                <input type="text" name="" id="" style="width: 175px;" class="bb">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="6">
                                2. Smoking
                            </td>
                            <td colspan="1">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td colspan="1">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td colspan="11">
                                <label for="">Number of Sticks/day?</label>
                                <input type="number" name="" id="" style="width: 140px;" class="bb">
                                <label for="">Since when?</label>
                                <input type="text" name="" id="" style="width: 140px;" class="bb">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="6">
                                3. Drug Use
                            </td>
                            <td colspan="1">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td colspan="1">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td colspan="11">
                                <label for="">Kind:</label>
                                <input type="text" name="" id="" style="width: 280px;" class="bb">
                                <label for="">Regular use:</label>
                                <label for="">YES:</label>
                                <input type="checkbox" name="" id="">
                                <label for="">NO:</label>
                                <input type="checkbox" name="" id="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="6">
                                4. Driving
                            </td>
                            <td colspan="1">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td colspan="1">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td colspan="11">
                                <label for="">Specify vehicle:</label>
                                <input type="text" name="" id="" style="width: 210px;" class="bb">
                                <label for="">With license:</label>
                                <label for="">YES:</label>
                                <input type="checkbox" name="" id="">
                                <label for="">NO:</label>
                                <input type="checkbox" name="" id="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="6">
                                5. Abuse (Physical, Sexual, Verbal)
                            </td>
                            <td colspan="1">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td colspan="1">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td colspan="11">
                                <label for="">Specify what kind of abuse:</label>
                                <input type="text" name="" id="" style="width: 330px;" class="bb">
                            </td>
                        </tr>
                    </tbody>
                    
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="test">Print</button>
            </div>

        </div>    
    </div>
</div>