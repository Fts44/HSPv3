@extends('layout.patient')

@push('title')
    <title>Patient Documents</title>
@endpush

@section('content')
<main id="main" class="main">

    <x-patient.documents-pagetitle></x-patient.documents-pagetitle>
    <!-- Document Page Title -->

    <section class="section">

        <div class="card" id="card-table">

            <div class="card-body px-4">

                <h5 class="card-title">Prescription</h5>
                
                <table id="datatable" class="table table-bordered" style="width: 100%;">
                    <thead class="table-light">
                        <th scope="col">ID</th>
                        <th scope="col">Physician</th>
                        <th scope="col">File</th>
                        <th scope="col">Date Upload</th>
                        <th scope="col">Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Dr. Joseph E. Calma</td>
                            <td>prescription.pdf</td>
                            <td>August 15, 2022</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="">
                                    <i class="bi bi-eye"></i> 
                                    View
                                </a> 
                            </td>
                        </tr>
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
@endpush