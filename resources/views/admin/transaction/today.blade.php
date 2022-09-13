@extends('layout.admin')

@push('title')
    <title>Transaction</title>
@endpush

@section('content')
<main id="main" class="main">

    <div class="pagetitle mb-3">
        <h1>Transaction</h1>
        <nav>
            <ol class="breadcrumb" style="--bs-breadcrumb-divider: '|';">
            
            </ol>
        </nav>
    </div>
    <!-- Admin User Page Title -->

    <section class="section">
        <div class="col-lg-3">
            <div class="card px-4 py-4 mb-3">
                <h5 class="card-title flex-row justify-content-start m-0">
                    Today's Attendance Code:
                </h5>
                <span class="mt-0" id="todays_code">{{$todays_code}}</span>
                <label class="form-control border-0 px-0 pt-3 pb-0">
                    <button class="btn btn-sm btn-secondary" id="new_code">
                        <i class="bi bi-arrow-clockwise"></i> New Code
                    </button>
                </label>
            </div>
        </div>

        <div class="card" id="card-table">

            <div class="card-body px-4">

                <h5 class="card-title">Today's Transaction</h5>

                <table id="datatable" class="table table-bordered" style="width: 100%;">
                    <thead class="table-light">
                        <th scope="col">No</th>
                        <th scope="col">Date</th>
                        <th scope="col">TimeIn</th>
                        <th scope="col">TimeOut</th>
                        <th scope="col">PatientName</th>
                        <th scope="col">Dept/SRCode/Course</th>
                        <th scope="col">Classification</th>
                        <th scope="col">Purpose</th>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>

            </div>

        </div>

    </section>

</main>
<!-- main -->
@endsection

@push('script')

    <!-- datatable js -->
    <script src="{{ asset('js/datatable.js') }}"></script>

    <script>
        $(document).ready(function(){
            datatable_class('#datatable');

            $('#hamburgerMenu').click(function(){
                setTimeout(function() { 
                    redraw_datatable_class('#datatable');
                }, 300);
            });

            $('#new_code').click(function(){
                event.preventDefault();
                swal({
                    title: "Are you sure?",
                    text: "Your about to get new attendance code for today.",
                    icon: "warning",
                    buttons: ["Cancel", "Yes"]
                }).then(function(value){
                    $(this).attr('disabled', true);
                    $.ajax({
                        async: false,
                        url: "{{ route('AdminGetNewAttendanceCode', ['date' => date('Y-m-d') ]) }}",
                        type: "GET",
                        success: function (response) {      
                            $('#todays_code').html(response);
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    });
                    $(this).attr('disabled', false);
                });  
            });
        });
    </script>
   
@endpush