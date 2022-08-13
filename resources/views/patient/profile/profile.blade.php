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

                    <div class="row mb-3">
                        <label class="col-lg-12 text-center" for="profile_pic">
                            Profile Picture
                            <span class="fr">*</span>
                        </label>
                        <div class="col-lg-12 mt-1 d-flex justify-content-center">
                            <img id="profile_pic_preview" class="form-control p-1" src="{{ asset('storage/default_avatar.png') }}" alt="Upload image" style="height: 200px; width: 200px;">
                        </div>
                        <div class="col-lg-12 mt-1 d-flex justify-content-center">
                            <input class="form-control" type="file" name="profile_pic" id="profile_pic" accept=".jpg,.png" style="width: 300px;">
                        </div>
                        <label for="" class="col-lg-12 mt-1 text-center">
                            <span class="text-danger">Test</span>
                        </label>
                    </div>

                    <!-- sr-code, personal email, gsuite, otp -->
                    <div class="row mb-3">

                        <label for="sr_code" class="col-lg-3 mt-1">
                            SR-Code:<span class="fr">*</span>
                            <input class="form-control" type="text" name="sr_code" id="sr_code">
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="email" class="col-lg-3 mt-1">
                            Personal Email:<span class="fr">*</span>
                            <input class="form-control" type="text" name="email" id="email">
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="email" class="col-lg-3 mt-1">
                            Gsuite Email:
                            <input class="form-control" type="text" name="email" id="email">
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="otp" class="col-lg-3 mt-1">
                            One Time Pin:
                            <div class="row">
                                <div class="col-lg-7">
                                    <input class="form-control" type="number" name="otp" id="otp">
                                    <span class="text-danger">Test</span>
                                </div>
                                <div class="col-lg-5">
                                    <a class="btn btn-secondary btn-sm py-2" id="btn_otp" href="#" style="width: 100%; height: 38px;" id="btn_otp">
                                        <span id="lbl_otp" class="">Get OTP</span>
                                        <span class="spinner-border spinner-border-sm d-none" id="lbl_loading" role="status" aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>       
                        </label>
                        

                    </div>

                    <!-- Name -->
                    <div class="row mb-3">
                        
                        <label for="first_name" class="col-lg-3 mt-1">
                            First Name:<span class="fr">*</span>
                            <input class="form-control" type="text" name="first_name" id="first_name">
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="middle_name" class="col-lg-3 mt-1">
                            Middle Name:
                            <input class="form-control" type="text" name="middle_name" id="middle_name">
                        </label>

                        <label for="last_name" class="col-lg-3 mt-1">
                            Last Name:<span class="fr">*</span>
                            <input class="form-control" type="text" name="last_name" id="last_name">
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="suffix_name" class="col-lg-3 mt-1">
                            Suffix Name: (Sr,Jr,I,II,...)
                            <input class="form-control" type="text" name="suffix_name" id="suffix_name">
                            <span class="text-danger">Test</span>
                        </label>

                    </div>

                    <!-- Gender, Civil Status, Contact -->
                    <div class="row mb-3">

                        <label for="gender" class="col-lg-3 mt-1">
                            Gender:<span class="fr">*</span>
                            <select class="form-select" name="gender" id="gender">
                                <option value="">--- choose ---</option>
                            </select>
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="civil_status" class="col-lg-3 mt-1">
                            Civil Status:<span class="fr">*</span>
                            <select class="form-select" name="civil_status" id="civil_status">
                                <option value="">--- choose ---</option>
                            </select>
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="contact" class="col-lg-3 mt-1">
                            Contact Number:<span class="fr">*</span>
                            <input class="form-control" type="tel" name="contact" id="contact">
                            <span class="text-danger">Test</span>
                        </label>

                    </div>

                    <!-- Home address -->
                    <div class="row mb-3">

                        <label for="home_prov" class="col-lg-3 mt-1">
                            Home Province:<span class="fr">*</span>
                            <select name="home_prov" id="home_prov" class="form-select">
                                <option value="">--- choose ---</option>
                            </select>
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="home_mun" class="col-lg-3 mt-1">
                            Home Municipality:<span class="fr">*</span>
                            <select name="home_mun" id="home_mun" class="form-select">
                                <option value="">--- choose ---</option>
                            </select>
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="home_brgy" class="col-lg-3 mt-1">
                            Home Barangay:<span class="fr">*</span>
                            <select name="home_brgy" id="home_brgy" class="form-select">
                                <option value="">--- choose ---</option>
                            </select>
                            <span class="text-danger">Test</span>
                        </label>

                    </div>

                    <!-- Religion, Birthdate, Classification -->
                    <div class="row mb-3">

                        <label for="religion" class="col-lg-3 mt-1">
                            Religion:<span class="fr">*</span>
                            <input type="text" class="form-control" name="religion" id="religion">
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="birthdate" class="col-lg-3 mt-1">
                            Birthdate:<span class="fr">*</span>
                            <input type="date" class="form-control" name="birthdate" id="birthdate">
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="classification" class="col-lg-3 mt-1">
                            Classification:<span class="fr">*</span>
                            <select name="classification" id="classification" class="form-select">
                                <option value="">--- choose ---</option>
                            </select>
                            <span class="text-danger">Test</span>
                        </label>

                    </div>
                    
                    <!-- Birthplace -->
                    <div class="row mb-3">

                        <label for="birth_prov" class="col-lg-3 mt-1">
                            Birthplace (Province):<span class="fr">*</span>
                            <select name="birth_prov" id="birth_prov" class="form-select">
                                <option value="">--- choose ---</option>
                            </select>
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="birth_mun" class="col-lg-3 mt-1">
                            Birthplace (Municipality):<span class="fr">*</span>
                            <select name="birth_mun" id="birth_mun" class="form-select">
                                <option value="">--- choose ---</option>
                            </select>
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="birth_brgy" class="col-lg-3 mt-1">
                            Birthplace (Barangay):<span class="fr">*</span>
                            <select name="birth_brgy" id="birth_brgy" class="form-select">
                                <option value="">--- choose ---</option>
                            </select>
                            <span class="text-danger">Test</span>
                        </label>

                    </div>

                    <!-- Grade, Department, Program -->
                    <div class="row mb-3">

                        <label for="grade_level" class="col-lg-3 mt-1">
                            Grade level:<span class="fr">*</span>
                            <select name="grade_level" id="grade_level" class="form-select">
                                <option value="">--- choose ---</option>
                            </select>
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="department" class="col-lg-3 mt-1">
                            Department:<span class="fr">*</span>
                            <select name="department" id="department" class="form-select">
                                <option value="">--- choose ---</option>
                            </select>
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="program" class="col-lg-3 mt-1">
                            Program:<span class="fr">*</span>
                            <select name="program" id="program" class="form-select">
                                <option value="">--- choose ---</option>
                            </select>
                            <span class="text-danger">Test</span>
                        </label>

                    </div>

                    <!-- Dormitory address -->
                    <div class="row mb-3">

                        <label for="dorm_prov" class="col-lg-3 mt-1">
                            Dormitory (Province):
                            <select name="dorm_prov" id="dorm_prov" class="form-select">
                                <option value="">--- choose ---</option>
                            </select>
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="dorm_mun" class="col-lg-3 mt-1">
                            Dormitory (Municipality):
                            <select name="dorm_mun" id="dorm_mun" class="form-select">
                                <option value="">--- choose ---</option>
                            </select>
                            <span class="text-danger">Test</span>
                        </label>

                        <label for="dorm_brgy" class="col-lg-3 mt-1">
                            Dormitory (Barangay):
                            <select name="dorm_brgy" id="dorm_brgy" class="form-select">
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
    @if(old('home_prov'))
        set_municipality('#home_mun','{{ old("home_mun") }}', '{{ old("home_prov") }}', '#home_brgy');
        @if(old('home_mun'))
            set_barangay('#home_brgy','{{ old("home_brgy") }}', '{{ old("home_mun") }}');
        @endif
    @endif

    @if(old('birth_prov'))
        set_municipality('#birth_mun','{{ old("birth_mun") }}', '{{ old("birth_prov") }}', '#birth_brgy');
        @if(old('birth_mun'))
            set_barangay('#birth_brgy','{{ old("birth_brgy") }}', '{{ old("birth_mun") }}');
        @endif
    @endif
    
    @if(old('dorm_mun'))
        set_municipality('#dorm_mun','{{ old("dorm_mun") }}', '{{ old("dorm_prov") }}', '#dorm_brgy');
        @if(old('dorm_mun'))
            set_barangay('#dorm_brgy','{{ old("dorm_brgy") }}', '{{ old("dorm_mun") }}');
        @endif
    @endif

    @if(old('emerg_mun'))
        set_municipality('#emerg_mun','{{ old("emerg_mun") }}', '{{ old("emerg_prov") }}', '#emerg_brgy');
        @if(old('emerg_mun'))
            set_barangay('#emerg_brgy','{{ old("emerg_brgy") }}', '{{ old("emerg_mun") }}');
        @endif
    @endif

    @if(old('department'))
        set_program('#program', '{{ old("program") }}', '{{ old("department") }}')
    @endif

    $(document).ready(function(){

        @if(session('status'))  
            @php 
                $status = json_decode(session('status'));                      
            @endphp
            swal('{{$status->title}}','{{$status->message}}','{{$status->icon}}');
        @endif

        
        $('#btn_otp').click(function(e){
            e.preventDefault();
            let gsuite_email = $('#gsuite_email').val();
            if(!gsuite_email.includes('@g.batstate-u.edu.ph')){
                swal('Error!', 'Invalid gsuite email', 'error');
            }
            else{
                $('#lbl_loading').removeClass('d-none');
                $('#lbl_otp').addClass('d-none');
                $.ajax({
                    type: "POST",
                    url: "{{ route('SendOTP') }}",
                    contentType: 'application/json',
                    data: JSON.stringify({
                        "email": gsuite_email,
                        "msg_type": "register",
                        "_token": "{{csrf_token()}}",
                    }),
                    success: function(response){
                        response = JSON.parse(response);
                        console.log(response);
                        $('#lbl_loading').addClass('d-none');
                        $('#lbl_otp').removeClass('d-none');
                        if(response.status == 400){
                            $.each(response.errors, function(key, err_values){
                                $('#'+key+'_error').html(err_values);
                            });
                        }
                        else{
                            $('.error-message').html('');
                            swal(response.title, response.message, response.icon);
                        }
                    },
                    error: function(response){
                        console.log(response);
                    }
                });
            }          
        });
    });
</script>
@endpush