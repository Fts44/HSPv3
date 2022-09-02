@extends('layout.admin')

@push('title')
    <title>User Patient</title>
@endpush

@section('content')
<main id="main" class="main">

    <x-admin.user-pagetitle></x-admin.user-pagetitle>
    <!-- Admin User Page Title -->

    <section class="section">

        <div class="card" id="card-table">

            <div class="card-body px-4">

                <h5 class="card-title">Patient test</h5>

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
                    @foreach($patients as $patient)
                        <tr>
                            <td>{{ $patient->sr_code }}</td>
                            <td>{{ $patient->firstname." ".($patient->middlename ? $patient->middlename[0].'.' : '')." ".$patient->lastname }}</td>
                            <td>{{ $patient->contact }}</td>
                            <td>{{ ucwords($patient->classification) }}</td>
                            <td>{{ ucwords($patient->gl_name) }}</td>
                            <td>{{ $patient->dept_code."-".$patient->prog_code }}</td>
                            <td>
                                <a href="{{ route('AdminViewPatientDetails',['id'=>$patient->acc_id]) }}" class="btn btn-sm btn-secondary">
                                    <i class="bi bi-eye"></i> View
                                </a>
                            </td>
                        </tr>
                    @endforeach
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