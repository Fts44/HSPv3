@extends('layout.patient')

@push('title')
    <title>Patient Profile</title>
@endpush

@section('content')
<main id="main" class="main">

    <x-patient.profile-pagetitle></x-patient.profile-pagetitle>
    <!-- End Page Title -->

    <section class="section profile">

        <div class="card">

            <div class="card-body pt-3">
                <form action="" method="">
                   
                    <!-- Father's Name -->
                    <div class="row mb-3">
                        
                        <label for="father_fn" class="col-lg-3 mt-1">
                            Father's firstname:<span class="fr">*</span>
                            <input class="form-control" type="text" name="father_fn" id="father_fn">
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="father_mn" class="col-lg-3 mt-1">
                            Father's middlename:
                            <input class="form-control" type="text" name="father_mn" id="father_mn">
                        </label>

                        <label for="father_ln" class="col-lg-3 mt-1">
                            Father's lastname:<span class="fr">*</span>
                            <input class="form-control" type="text" name="father_ln" id="father_ln">
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="father_sn" class="col-lg-3 mt-1">
                            Father's suffixname: (Sr,Jr,I,II,...)
                            <input class="form-control" type="text" name="father_sn" id="father_sn">
                            <span class="text-danger">Test</span>
                        </label>

                    </div>

                    <!-- Occupation -->
                    <div class="row mb-3">

                        <label for="father_occupation" class="col-lg-3 mt-1">
                            Father's Occupation:
                            <input class="form-control" type="text" name="father_occupation" id="father_occupation">
                            <span class="text-danger">Test</span>
                        </label>

                    </div>

                    <!-- Mothers's Name -->
                    <div class="row mb-3">
                        
                        <label for="mother_fn" class="col-lg-3 mt-1">
                            Mothers's firstname:<span class="fr">*</span>
                            <input class="form-control" type="text" name="mother_fn" id="mother_fn">
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="mother_mn" class="col-lg-3 mt-1">
                            Mothers's middlename:
                            <input class="form-control" type="text" name="mother_mn" id="mother_mn">
                        </label>

                        <label for="mother_ln" class="col-lg-3 mt-1">
                            Mothers's lastname:<span class="fr">*</span>
                            <input class="form-control" type="text" name="mother_ln" id="mother_ln">
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="mother_sn" class="col-lg-3 mt-1">
                            Mothers's suffixname: (I,II,...)
                            <input class="form-control" type="text" name="mother_sn" id="mother_sn">
                            <span class="text-danger">Test</span>
                        </label>

                    </div>

                    <!-- Mother's occupation, marital status -->
                    <div class="row mb-3">

                        <label for="mother_occupation" class="col-lg-3 mt-1">
                            Mother's Occupation:
                            <input class="form-control" type="text" name="mother_occupation" id="mother_occupation">
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="marital_satus" class="col-lg-3 mt-1">
                            Marital status:
                            <select name="marital_satus" id="marital_satus" class="form-select">
                                <option value="">--- choose ---</option>
                            </select>
                            <span class="text-danger">Test</span>
                        </label>

                    </div>
                  
                    <div class="row mb-3">
                        <label for="" class="col-lg-12" style="font-weight: 600;">Family Illness History:</label>

                        <label for="diabetes" class="col-lg-2 mt-1">
                            <input type="checkbox" name="diabetes" id="diabetes">
                            Diabetes
                        </label>

                        <label for="heart_disease" class="col-lg-2 mt-1">
                            <input type="checkbox" name="heart_disease" id="heart_disease">
                            Heart Disease
                        </label>

                        <label for="mental_illness" class="col-lg-2 mt-1">
                            <input type="checkbox" name="mental_illness" id="mental_illness">
                            Mental Illness
                        </label>

                        <label for="cancer" class="col-lg-2 mt-1">
                            <input type="checkbox" name="cancer" id="cancer">
                            Cancer
                        </label>

                        <label for="" class="col-lg-4"></label>

                        <label for="hypertension" class="col-lg-2 mt-1">
                            <input type="checkbox" name="hypertension" id="hypertension">
                            Hypertension
                        </label>

                        <label for="kidney_disease" class="col-lg-2 mt-1">
                            <input type="checkbox" name="kidney_disease" id="kidney_disease">
                            Kidney Disease
                        </label>

                        <label for="epilepsy" class="col-lg-2 mt-1">
                            <input type="checkbox" name="epilepsy" id="epilepsy">
                            Epilepsy
                        </label>

                        <label for="others" class="col-lg-2 mt-1">
                            <input type="checkbox" name="others" id="others">
                            Others
                        </label>
                    </div>

                    <div class="row mb-3">
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