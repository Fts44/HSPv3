@extends('layout.patient')

@push('title')
    <title>Patient Password</title>
@endpush

@section('content')
<main id="main" class="main">

    <div class="pagetitle mb-3">
        <h1>Settings</h1>
        <nav>
            <ol class="breadcrumb" style="--bs-breadcrumb-divider: '|';">
                <li class="breadcrumb-item"><a href="{{ route('PatientPassword') }}">Password</a></li>
            </ol>
        </nav>
    </div>
    <section class="section profile">

        <div class="card">

            <div class="card-body pt-3">
                <form action="{{ route('UpdatePatientPassword') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        
                        <label class="col-lg-3 mt-1">
                            New password:<span class="fr">*</span>
                            <input class="form-control" type="password" name="new_password" id="new_password" value="{{ old('new_password') }}">
                            <span class="text-danger">
                                @error('new_password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                    </div>

                    <div class="row mb-3">
                        
                        <label class="col-lg-3 mt-1">
                            Re-type new password:<span class="fr">*</span>
                            <input class="form-control" type="password" name="retype_new_password" id="retype_new_password" value="{{ old('retype_new_password') }}">
                            <span class="text-danger">
                                @error('retype_new_password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                    </div>

                    <div class="row mb-3">
                        
                        <label class="col-lg-3 mt-1">
                            Old password:<span class="fr">*</span>
                            <input class="form-control" type="password" name="old_password" id="old_password" value="{{ old('old_password') }}">
                            <span class="text-danger">
                                @error('old_password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                    </div>

                    <div class="row mb-3">
                        
                        <label class="col-lg-3 mt-1">
                            <input type="checkbox" id="showpassword"> Show password
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
    <script>
        $(document).ready(function(){
            @if(session('status'))  
                @php 
                    $status = (object)session('status');     
                @endphp
                swal('{{$status->title}}','{{$status->message}}','{{$status->icon}}');
            @endif

            $('#showpassword').click(function(){            
                let input = $('#old_password, #new_password, #retype_new_password');
                if(input.attr('type') === 'password'){
                    input.attr('type','text');
                }
                else{
                    input.attr('type','password');
                }
            });
        });
    </script>
@endpush