@extends('layout.patient')

@push('title')
    <title>Patient Family Details</title>
@endpush

@section('content')
<main id="main" class="main">

    <x-patient.profile-pagetitle></x-patient.profile-pagetitle>
    <!-- End Page Title -->

    <section class="section profile">

        <div class="card">

            <div class="card-body pt-3">
                <form action="{{ route('UpdateFamilyDetails') }}" method="POST">
                    @csrf
                    <!-- Father's Name -->
                    <div class="row mb-3">
                        
                        <label class="col-lg-3 mt-1">
                            Father's firstname:<span class="fr">*</span>
                            <input class="form-control" type="text" name="father_firstname" id="father_firstname">
                            <span class="text-danger">
                                @error('father_firstname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <label class="col-lg-3 mt-1">
                            Father's middlename:
                            <input class="form-control" type="text" name="father_middlename" id="father_middlename">
                            <span class="text-danger">
                                @error('father_middlename')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <label class="col-lg-3 mt-1">
                            Father's lastname:<span class="fr">*</span>
                            <input class="form-control" type="text" name="father_lastname" id="father_lastname">
                            <span class="text-danger">
                                @error('father_lastname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <label class="col-lg-3 mt-1">
                            Father's suffixname: (Sr,Jr,I,II,...)
                            <input class="form-control" type="text" name="father_suffixname" id="father_suffixname">
                            <span class="text-danger">
                                @error('father_suffixname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                    </div>

                    <!-- Occupation -->
                    <div class="row mb-3">

                        <label for="father_occupation" class="col-lg-3 mt-1">
                            Father's Occupation:
                            <input class="form-control" type="text" name="father_occupation" id="father_occupation">
                            <span class="text-danger">
                                @error('father_occupation')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                    </div>

                    <!-- Mothers's Name -->
                    <div class="row mb-3">
                        
                        <label class="col-lg-3 mt-1">
                            Mothers's firstname:<span class="fr">*</span>
                            <input class="form-control" type="text" name="mother_firstname" id="mother_firstname">
                            <span class="text-danger">
                                @error('mother_firstname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <label class="col-lg-3 mt-1">
                            Mothers's middlename:
                            <input class="form-control" type="text" name="mother_middlename" id="mother_middlename">
                            <span class="text-danger">
                                @error('mother_middlename')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <label class="col-lg-3 mt-1">
                            Mothers's lastname:<span class="fr">*</span>
                            <input class="form-control" type="text" name="mother_lastname" id="mother_lastname">
                            <span class="text-danger">
                                @error('mother_lastname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <label class="col-lg-3 mt-1">
                            Mothers's suffixname: (I,II,...)
                            <input class="form-control" type="text" name="mother_suffixname" id="mother_suffixname">
                            <span class="text-danger">
                                @error('mother_suffixname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                    </div>

                    <!-- Mother's occupation, marital status -->
                    <div class="row mb-3">

                        <label for="mother_occupation" class="col-lg-3 mt-1">
                            Mother's Occupation:
                            <input class="form-control" type="text" name="mother_occupation" id="mother_occupation">
                            <span class="text-danger">
                                @error('mother_occupation')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <label for="marital_satus" class="col-lg-3 mt-1">
                            Parent's marital status:
                            <select name="marital_satus" id="marital_satus" class="form-select">
                                <option value="">--- choose ---</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                                <option value="separated">Separated</option>
                            </select>
                            <span class="text-danger">
                                @error('marital_satus')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                    </div>
                  
                    <div class="row mb-3">
                        <label for="" class="col-lg-12" style="font-weight: 600;">Family Illness History:</label>

                        <label for="family_illness_history_diabetes" class="col-lg-2 mt-1">
                            Diabetes:
                            <select name="family_illness_history_diabetes" id="family_illness_history_diabetes" class="form-select">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </label>

                        <label for="family_illness_history_heart_disease" class="col-lg-2 mt-1">
                            Heart Disease:
                            <select name="family_illness_history_heart_disease" id="family_illness_history_heart_disease" class="form-select">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </label>

                        <label for="family_illness_history_mental" class="col-lg-2 mt-1">
                            Mental:
                            <select name="family_illness_history_mental" id="family_illness_history_mental" class="form-select">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </label>

                        <label for="family_illness_history_cancer" class="col-lg-2 mt-1">
                            Cancer:
                            <select name="family_illness_history_cancer" id="family_illness_history_cancer" class="form-select">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </label>

                        <label for="" class="col-lg-4"></label>

                        <label for="family_illness_history_hypertension" class="col-lg-2 mt-1">
                            Hypertension:
                            <select name="family_illness_history_hypertension" id="family_illness_history_hypertension" class="form-select">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </label>

                        <label for="family_illness_history_kidney_disease" class="col-lg-2 mt-1">
                            Kidney Disease:
                            <select name="family_illness_history_kidney_disease" id="family_illness_history_kidney_disease" class="form-select">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </label>

                        <label for="family_illness_history_kidney_epilepsy" class="col-lg-2 mt-1">
                            Epilepsy:
                            <select name="family_illness_history_kidney_epilepsy" id="family_illness_history_kidney_epilepsy" class="form-select">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </label>

                        <label for="family_illness_history_others" class="col-lg-2 mt-1">
                            Others:
                            <select name="family_illness_history_others" id="family_illness_history_others" class="form-select">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
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
<script>

    $(document).ready(function(){
   
        @if(session('status'))  
            @php 
                $status = (object)session('status');     
            @endphp
            swal('{{$status->title}}','{{$status->message}}','{{$status->icon}}');
        @endif

    });
</script>
@endpush