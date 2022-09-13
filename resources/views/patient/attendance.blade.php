@extends('layout.patient')

@push('title')
    <title>Patient Password</title>
@endpush

@section('content')
<main id="main" class="main">

    <div class="pagetitle mb-3">
        <h1>Attendance</h1>
        <nav>
            <ol class="breadcrumb" style="--bs-breadcrumb-divider: '|';">
                
            </ol>
        </nav>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">All Attendance Records</h5>
                        <a href="#" class="btn btn-secondary btn-sm" style="float: right; margin-top: -2.5rem;" data-bs-toggle="modal" data-bs-target="#modal">
                            <i class="bi bi-plus-lg"></i>          
                        </a>

                        <table id="table_attendance" class="table table-bordered" style="width: 100%;">
                            <thead class="table-light">
                                <th scope="col">Date</th>
                                <th scope="col">TimeIn</th>
                                <th scope="col">TimeOut</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Purpose</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                @foreach($all_attendance as $item)
                                <tr>
                                    <td>{{ date_format(date_create($item->trans_date), 'F d, Y') }}</td>
                                    <td>{{ date_format(date_create($item->trans_time_in),'h:i a') }}</td>
                                    <td>{{ ($item->trans_time_out) ? date_format(date_create($item->trans_time_out),'h:i a') : 'Not timed out yet' }}</td>
                                    @if($item->trans_time_out)
                                        @php
                                            $time_in = new DateTime(date_create($item->trans_time_in));
                                            $time_out = new DateTime(date_create($item->trans_time_out));
                                            $duration = $time_in->diff($time_out);
                                        @endphp 
                                    @endif
                                    <td>{{ ($item->trans_time_out) ? $duration->format('%H:i a') : 'Not timed out yet' }}</td>
                                    <td>{{ $item->trans_purpose }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-secondary">Time - Out</a>
                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
    </section>

  <!-- main -->

  <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_title">Attendance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('PatientAttendanceInsert') }}" method="POST">
                    @csrf
                    <div class="modal-body mb-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="form-control border-0 p-0">
                                    Date:
                                    <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}">
                                    <span class="text-danger">
                                        @error('date')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </label>
                                <label class="form-control border-0 p-0 mt-2">
                                    Attendance Code:
                                    <input type="text" name="code" class="form-control" value="{{ old('code') }}">
                                    <span class="text-danger">
                                        @error('code')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </label>
                                <label class="form-control border-0 p-0 mt-2">
                                    Purpose of Visit:
                                    <select name="purpose" id="purpose" class="form-select">
                                        <option value="">--- choose ---</option>
                                        <option value="BP" {{ (old('purpose')=='BP') ? 'selected' : '' }}>BP</option>
                                        <option value="Consultation" {{ (old('purpose')=='Consultation') ? 'selected' : '' }}>Consultation</option>
                                        <option value="Medicine" {{ (old('purpose')=='Medicine') ? 'selected' : '' }}>Medicine</option>
                                        <option value="Medical Certificate" {{ (old('purpose')=='Medical Certificate') ? 'selected' : '' }}>Medical Certificate</option>
                                        <option value="Others" {{ (old('purpose')=='Others') ? 'selected' : '' }}>Others</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('purpose')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </label>
                                <label class="form-control border-0 p-0 mt-2 {{ (!$errors->has('specify_purpose')&&old('purpose')!='Others')?'d-none':'' }}" id="specify_purpose_label">
                                    Specify (Purpose):
                                    <input type="text" name="specify_purpose" id="specify_purpose" class="form-control" value="{{ old('specify_purpose') }}">
                                    <span class="text-danger">
                                        @error('specify_purpose')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="submit_button">Add</button>
                    </div>
                </form>
            </div>    
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('js/datatable.js') }}"></script>
    <script src="{{ asset('js/populate.js') }}"></script>
    <script>
        $(document).ready(function(){
            @if($errors->any())
                $('#modal').modal('show');
            @endif

            datatable_no_btn_class('#table_attendance');

            $('#hamburgerMenu').click(function(){
                setTimeout(function() { 
                    redraw_datatable_class('#table_attendance');
                }, 300);
            });

            $('#purpose').change(function(){
                if($(this).val()!='Others'){
                    $('#specify_purpose_label').addClass('d-none');
                }
                else{
                    $('#specify_purpose_label').removeClass('d-none');
                }
            });
        });
    </script>
@endpush