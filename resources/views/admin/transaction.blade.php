@extends('layout.admin')

@push('title')
    <title>Transaction</title>
@endpush

@section('content')
<main id="main" class="main">

    <x-admin.user-pagetitle></x-admin.user-pagetitle>
    <!-- Admin User Page Title -->

    <section class="section">

        <div class="card" id="card-table">

            <div class="card-body px-4">

                <h5 class="card-title">Transaction</h5>

                <table id="datatable" class="table table-bordered" style="width: 100%;">
                    <thead class="table-light">
                        <th scope="col">SR-Code</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Classification</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Program</th>
                        <th scope="col">Action</th>
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
        });
    </script>
   
@endpush