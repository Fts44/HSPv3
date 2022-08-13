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
                   
                    <!-- Name -->
                    <div class="row mb-3">
                        
                        <label for="emerg_fn" class="col-lg-3 mt-1">
                            First Name:<span class="fr">*</span>
                            <input class="form-control" type="text" name="emerg_fn" id="emerg_fn">
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="emerg_mn" class="col-lg-3 mt-1">
                            Middle Name:
                            <input class="form-control" type="text" name="emerg_mn" id="emerg_mn">
                        </label>

                        <label for="emerg_ln" class="col-lg-3 mt-1">
                            Last Name:<span class="fr">*</span>
                            <input class="form-control" type="text" name="emerg_ln" id="emerg_ln">
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="emerg_sn" class="col-lg-3 mt-1">
                            Suffix Name: (Sr,Jr,I,II,...)
                            <input class="form-control" type="text" name="emerg_sn" id="emerg_sn">
                            <span class="text-danger">Test</span>
                        </label>

                    </div>

                    <!-- Landline, Contact, Relation -->
                    <div class="row mb-3">

                        <label for="emerg_landline" class="col-lg-3 mt-1">
                            Landline:
                            <input class="form-control" type="text" name="emerg_landline" id="emerg_landline">
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="emerg_contact" class="col-lg-3 mt-1">
                            Contact:<span class="fr">*</span>
                            <input class="form-control" type="text" name="emerg_contact" id="emerg_contact">
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="emerg_relation" class="col-lg-3 mt-1">
                            Relation to patient:<span class="fr">*</span>
                            <input class="form-control" type="text" name="emerg_relation" id="emerg_relation">
                            <span class="text-danger">Test</span>
                        </label>

                    </div>

                    <!-- Home address -->
                    <div class="row mb-3">

                        <label for="emerg_prov" class="col-lg-3 mt-1">
                            Business Address (Province):<span class="fr">*</span>
                            <select name="emerg_prov" id="emerg_prov" class="form-select">
                                <option value="">--- choose ---</option>
                            </select>
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="emerg_mun" class="col-lg-3 mt-1">
                            Business Address (Municipality):<span class="fr">*</span>
                            <select name="emerg_mun" id="emerg_mun" class="form-select">
                                <option value="">--- choose ---</option>
                            </select>
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="emerg_brgy" class="col-lg-3 mt-1">
                            Business Address (Barangay)<span class="fr">*</span>
                            <select name="emerg_brgy" id="emerg_brgy" class="form-select">
                                <option value="">--- choose ---</option>
                            </select>
                            <span class="text-danger">Test</span>
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