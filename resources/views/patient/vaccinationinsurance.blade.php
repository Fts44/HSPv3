@extends('layout.patient')

@push('title')
    <title>Patient Password</title>
@endpush

@section('content')
<main id="main" class="main">

    <div class="pagetitle mb-3">
        <nav>
            <ol class="breadcrumb" style="--bs-breadcrumb-divider: '|';">
                
            </ol>
        </nav>
    </div>
    <section class="section profile">

        <div class="card mb-3" id="card-table">
            <div class="card-body px-4">
                <h5 class="card-title">Vaccination</h5>
                <table id="table_vaccination" class="table table-bordered" style="width: 100%;">
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
                                <a class="btn btn-primary btn-sm" href="" id="test">
                                    <i class="bi bi-eye"></i> 
                                    View
                                </a> 
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Dr. Joseph E. Calma</td>
                            <td>prescription.pdf</td>
                            <td>August 15, 2022</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="" id="test">
                                    <i class="bi bi-eye"></i> 
                                    View
                                </a> 
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Dr. Joseph E. Calma</td>
                            <td>prescription.pdf</td>
                            <td>August 15, 2022</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="" id="test">
                                    <i class="bi bi-eye"></i> 
                                    View
                                </a> 
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Dr. Joseph E. Calma</td>
                            <td>prescription.pdf</td>
                            <td>August 15, 2022</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="" id="test">
                                    <i class="bi bi-eye"></i> 
                                    View
                                </a> 
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Dr. Joseph E. Calma</td>
                            <td>prescription.pdf</td>
                            <td>August 15, 2022</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="" id="test">
                                    <i class="bi bi-eye"></i> 
                                    View
                                </a> 
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Dr. Joseph E. Calma</td>
                            <td>prescription.pdf</td>
                            <td>August 15, 2022</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="" id="test">
                                    <i class="bi bi-eye"></i> 
                                    View
                                </a> 
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Dr. Joseph E. Calma</td>
                            <td>prescription.pdf</td>
                            <td>August 15, 2022</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="" id="test">
                                    <i class="bi bi-eye"></i> 
                                    View
                                </a> 
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Dr. Joseph E. Calma</td>
                            <td>prescription.pdf</td>
                            <td>August 15, 2022</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="" id="test">
                                    <i class="bi bi-eye"></i> 
                                    View
                                </a> 
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Dr. Joseph E. Calma</td>
                            <td>prescription.pdf</td>
                            <td>August 15, 2022</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="" id="test">
                                    <i class="bi bi-eye"></i> 
                                    View
                                </a> 
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Dr. Joseph E. Calma</td>
                            <td>prescription.pdf</td>
                            <td>August 15, 2022</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="" id="test">
                                    <i class="bi bi-eye"></i> 
                                    View
                                </a> 
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Dr. Joseph E. Calma</td>
                            <td>prescription.pdf</td>
                            <td>August 15, 2022</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="" id="test">
                                    <i class="bi bi-eye"></i> 
                                    View
                                </a> 
                            </td>
                        </tr>
                    </tbody>
                </table>     
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Insurance</h5>
                <table id="table_insurance" class="table table-bordered" style="width: 100%;">
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
                                <a class="btn btn-primary btn-sm" href="" id="test">
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
    <script src="{{ asset('js/datatable.js') }}"></script>
    <script>
        $(document).ready(function(){
            datatable_class('#table_vaccination');
            datatable_class('#table_insurance');


            $('#hamburgerMenu').click(function(){
                setTimeout(function() { 
                    redraw_datatable_class('#table_vaccination');
                    redraw_datatable_class('#table_insurance');
                }, 300);
            });
        });
    </script>
@endpush