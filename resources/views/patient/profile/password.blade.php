@extends('layout.patient')

@push('title')
    <title>Patient Password</title>
@endpush

@section('content')
<main id="main" class="main">

    <x-patient.profile-pagetitle></x-patient.profile-pagetitle>
    <!-- End Page Title -->

    <section class="section profile">

        <div class="card">

            <div class="card-body pt-3">
                <form action="" method="">

                    <div class="row mb-3">
                        
                        <label for="new_pass" class="col-lg-3 mt-1">
                            New password:<span class="fr">*</span>
                            <input class="form-control" type="text" name="new_pass" id="new_pass">
                            <span class="text-danger">Test</span>
                        </label>

                    </div>

                    <div class="row mb-3">
                        
                        <label for="new_cpass" class="col-lg-3 mt-1">
                            Re-type password:<span class="fr">*</span>
                            <input class="form-control" type="text" name="new_cpass" id="new_cpass">
                            <span class="text-danger">Test</span>
                        </label>

                    </div>

                    <div class="row mb-3">
                        
                        <label for="old_pass" class="col-lg-3 mt-1">
                            Confirm password:<span class="fr">*</span>
                            <input class="form-control" type="text" name="old_pass" id="old_pass">
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

@endpush