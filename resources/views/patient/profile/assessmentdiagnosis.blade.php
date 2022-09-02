@extends('layout.patient')

@push('title')
    <title>Assessment Diagnosis</title>
@endpush

@section('content')
<main id="main" class="main">

    <x-patient.profile-pagetitle activeTitle='AssessmentDiagnosis'></x-patient.profile-pagetitle>
    <!-- End Page Title -->

    <section class="section profile">

        <div class="card">

            <div class="card-body pt-3">
                <form action="{{ route('UpdatePatientAssessmentDiagnosis') }}" method="POST">
                    @csrf
                    <!-- q1. drinking -->
                    <div class="row mb-3">
                        <label class="col-lg-12" style="font-weight: 600;">Question 1:</label>
                        <label class="col-lg-3 mt-1">
                            Are you drinking? <span class="fr">*</span>
                            <select class="form-select" name="drinking" id="drinking">
                                <option value="0" {{ (old('drinking', $user_details->ad_drinking)=='0') ? 'selected' : '' }}>No</option>
                                <option value="1" {{ (old('drinking', $user_details->ad_drinking)=='1') ? 'selected' : '' }}>Yes</option>
                            </select>
                            <span class="text-danger">
                                @error('drinking')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <label class="col-lg-3 mt-1">
                            How much do you drink? (bottles) <span class="fr">*</span>
                            <input class="form-control" type="number" name="drinking_how_much" id="drinking_how_much" value="{{ old('drinking_how_much', $user_details->ad_drinking_how_much) }}"  {{ (!old('drinking', $user_details->ad_drinking)) ? 'disabled' : '' }}>
                            <span class="text-danger">
                                @error('drinking_how_much')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <label class="col-lg-3 mt-1">
                            How often do you drink? <span class="fr">*</span>
                            <select class="form-select" name="drinking_how_often" id="drinking_how_often" {{ (!old('drinking', $user_details->ad_drinking)) ? 'disabled' : '' }}>
                                <option value="" {{ (old('drinking', $user_details->ad_drinking)=='0') ? 'selected' : '' }}>--- choose ---</option>
                                <option value="one time a week" {{ (old('drinking_how_often', $user_details->ad_drinking_how_often)=='one time a week') ? 'selected' : '' }}>One time a week</option>
                                <option value="two times a week" {{ (old('drinking_how_often', $user_details->ad_drinking_how_often)=='two times a week') ? 'selected' : '' }}>Two times a week</option>
                                <option value="three times a week" {{ (old('drinking_how_often', $user_details->ad_drinking_how_often)=='three times a week') ? 'selected' : '' }}>Three times a week</option>
                                <option value="four times a week" {{ (old('drinking_how_often', $user_details->ad_drinking_how_often)=='four times a week') ? 'selected' : '' }}>Four times a week</option>
                                <option value="five times a week" {{ (old('drinking_how_often', $user_details->ad_drinking_how_often)=='five times a week') ? 'selected' : '' }}>Five times a week</option>
                                <option value="six times a week" {{ (old('drinking_how_often', $user_details->ad_drinking_how_often)=='six times a week') ? 'selected' : '' }}>Six times a week</option>
                                <option value="seven times a week" {{ (old('drinking_how_often', $user_details->ad_drinking_how_often)=='seven times a week') ? 'selected' : '' }}>Seven times a week</option>
                            </select>
                            <span class="text-danger">
                                @error('drinking_how_often')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                    </div>

                    <!-- q2. smoking -->
                    <div class="row mb-3">
                        <label class="col-lg-12" style="font-weight: 600;">Question 2:</label>
                        <label class="col-lg-3 mt-1">
                            Are you smoking? <span class="fr">*</span>
                            <select class="form-select" name="smoking" id="smoking">
                                <option value="0" {{ (old('smoking', $user_details->ad_smoking=='0')) ? 'selected' : '' }}>No</option>
                                <option value="1" {{ (old('smoking', $user_details->ad_smoking=='1')) ? 'selected' : '' }}>Yes</option>
                            </select>
                            <span class="text-danger">
                                @error('smoking')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <label class="col-lg-3 mt-1">
                            Sticks per day: <span class="fr">*</span>
                            <input class="form-control" type="number" name="smoking_sticks_per_day" id="smoking_sticks_per_day" value="{{ old('smoking_sticks_per_day', $user_details->ad_smoking_sticks_per_day) }}" {{ (!old('smoking', $user_details->ad_smoking)) ? 'disabled' : '' }}>
                            <span class="text-danger">
                                @error('smoking_sticks_per_day')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <label class="col-lg-3 mt-1">
                            Since when? (Yrs. old) <span class="fr">*</span>
                            <input class="form-control" type="number" name="smoking_since_when" id="smoking_since_when" value="{{ old('smoking_since_when', $user_details->ad_smoking_since_when) }}" {{ (!old('smoking', $user_details->ad_smoking)) ? 'disabled' : '' }}>
                            <span class="text-danger">
                                @error('smoking_since_when')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                    </div>

                    <!-- q3. drug use -->
                    <div class="row mb-3">
                        <label class="col-lg-12" style="font-weight: 600;">Question 3:</label>
                        <label class="col-lg-3 mt-1">
                            Are you using drug? <span class="fr">*</span>
                            <select class="form-select" name="drug" id="drug">
                                <option value="0" {{ (old('drug', $user_details->ad_drug=='0')) ? 'selected' : '' }}>No</option>
                                <option value="1" {{ (old('drug', $user_details->ad_drug=='1')) ? 'selected' : '' }}>Yes</option>
                            </select>
                            <span class="text-danger">
                                @error('drug')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <label class="col-lg-3 mt-1">
                            Drug kind: <span class="fr">*</span>
                            <input class="form-control" type="text" name="drug_kind" id="drug_kind" value="{{ (old('drug', $user_details->ad_drug)=='1') ? old('drug_kind', $user_details->ad_drug_kind) : ''}}" {{ (!old('drug', $user_details->ad_drug)) ? 'disabled' : '' }}>
                            <span class="text-danger">
                                @error('drug_kind')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <label class="col-lg-3 mt-1">
                            Regular use? <span class="fr">*</span>
                            <select class="form-select" name="drug_regular_use" id="drug_regular_use" {{ (!old('drug', $user_details->ad_drug)) ? 'disabled' : '' }}>
                                <option value="" {{ (old('drug', $user_details->ad_drug=='0')) ? 'selected' : '' }}>--- choose ---</option>
                                <option value="0" {{ (old('drug', $user_details->ad_drug)=='1') ? (old('drug_regular_use', $user_details->ad_drug_regular_use)=='0') ? 'selected' : '' : '' }}>No</option>
                                <option value="1" {{ (old('drug', $user_details->ad_drug)=='1') ? (old('drug_regular_use', $user_details->ad_drug_regular_use)=='1') ? 'selected' : '' : '' }}>Yes</option>
                            </select>
                            <span class="text-danger">
                                @error('drug_regular_use')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                    </div>

                    <!-- q4. driving -->
                    <div class="row mb-3">
                        <label class="col-lg-12" style="font-weight: 600;">Question 4:</label>
                        <label class="col-lg-3 mt-1">
                            Are you driving? <span class="fr">*</span>
                            <select class="form-select" name="driving" id="driving">
                                <option value="0" {{ (old('driving', $user_details->ad_driving=='0')) ? 'selected' : '' }}>No</option>
                                <option value="1" {{ (old('driving', $user_details->ad_driving=='1')) ? 'selected' : '' }}>Yes</option>
                            </select>
                            <span class="text-danger">
                                @error('driving')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <label class="col-lg-3 mt-1">
                            Specify vehicle: <span class="fr">*</span>
                            <input class="form-control" type="text" name="driving_specify" id="driving_specify" value="{{ (old('driving', $user_details->ad_driving)=='1') ? old('driving_specify', $user_details->ad_driving_specify) : '' }}" {{ (!old('driving', $user_details->ad_driving)) ? 'disabled' : '' }}>
                            <span class="text-danger">
                                @error('driving_specify')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <label class="col-lg-3 mt-1">
                            With license? <span class="fr">*</span>
                            <select class="form-select" name="driving_with_license" id="driving_with_license" {{ (!old('driving', $user_details->ad_driving)) ? 'disabled' : '' }}>
                                <option value="">--- choose ---</option>
                                <option value="0" {{ (old('driving', $user_details->ad_driving)=='1') ? (old('driving_with_license', $user_details->ad_driving_with_license)=='0') ? 'selected' : '' : '' }}>No</option>
                                <option value="1" {{ (old('driving', $user_details->ad_driving)=='1') ? (old('driving_with_license', $user_details->ad_driving_with_license)=='1') ? 'selected' : '' : '' }}>Yes</option>
                            </select>
                            <span class="text-danger">
                                @error('driving_with_license')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                    </div>

                    <!-- q5. abuse -->
                    <div class="row mb-3">
                        <label class="col-lg-12" style="font-weight: 600;">Question 5:</label>
                        <label class="col-lg-3 mt-1">
                            Abuse (Physical, Sexual, Verbal)? <span class="fr">*</span>
                            <select class="form-select" name="abuse" id="abuse">
                                <option value="0" {{ (old('abuse', $user_details->ad_abuse=='0')) ? 'selected' : '' }}>No</option>
                                <option value="1" {{ (old('abuse', $user_details->ad_abuse=='1')) ? 'selected' : '' }}>Yes</option>
                            </select>
                            <span class="text-danger">
                                @error('abuse')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <label class="col-lg-3 mt-1 mb-0">
                            Specify: <span class="fr">*</span>
                            <input class="form-control" type="text" name="abuse_specify" id="abuse_specify" value="{{ old('abuse_specify', $user_details->ad_abuse_specify) }}" {{ (!old('abuse', $user_details->ad_abuse)) ? 'disabled' : '' }}>
                            <span class="text-danger">
                                @error('abuse_specify')
                                    {{ $message }}
                                @enderror
                            </span>
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
<script src="{{ asset('js/input.js') }}"></script>
<script>

    $(document).ready(function(){
   
        @if(session('status'))  
            @php 
                $status = (object)session('status');     
            @endphp
            swal('{{$status->title}}','{{$status->message}}','{{$status->icon}}');
        @endif

        $('#drinking').change(function(){ clear_disable_enable_input(this, $('#drinking_how_much, #drinking_how_often')); });
        $('#smoking').change(function(){ clear_disable_enable_input(this, $('#smoking_sticks_per_day, #smoking_since_when')); });
        $('#drug').change(function(){ clear_disable_enable_input(this, $('#drug_kind, #drug_regular_use')); });
        $('#driving').change(function(){ clear_disable_enable_input(this, $('#driving_specify, #driving_with_license')); });
        $('#abuse').change(function(){ clear_disable_enable_input(this, $('#abuse_specify')); });

    });
</script>
@endpush