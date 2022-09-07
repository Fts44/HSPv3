@extends('layout.admin')

@push('title')
    <title>Patient Documents</title>
@endpush

@section('content')
<main id="main" class="main">

    <div class="pagetitle mb-3">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb" style="--bs-breadcrumb-divider: '|';">
               
            </ol>
        </nav>
    </div>
    <!-- Document Page Title -->

    <section class="section">

        <div class="row">
            <div class="col-lg-3">
                <div class="card px-4 py-4">
                    <h5 class="card-title flex-row justify-content-start m-0">
                        Registered Patient:
                    </h5>
                    <span class="mt-0">{{ number_format($registered_patient) }}</span>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card px-4 py-4">
                    <h5 class="card-title flex-row justify-content-start m-0">
                        Registered Employee:
                    </h5>
                    <span class="mt-0">{{ number_format($registered_employee) }}</span>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card px-4 py-4">
                    <h5 class="card-title flex-row justify-content-start m-0">
                        Total Equipments:
                    </h5>
                    <span class="mt-0">{{ number_format($total_equipments) }}</span>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card px-4 py-4">
                    <h5 class="card-title flex-row justify-content-start m-0">
                        Medicine Available:
                    </h5>
                    <span class="mt-0">{{ number_format($total_equipments) }}</span>
                </div>
            </div>
        </div>
    
    </section>

</main>
<!-- main -->
@endsection

@push('script')

    <!-- datatable js -->
    <script src="{{ asset('js/datatable.js') }}"></script>
@endpush