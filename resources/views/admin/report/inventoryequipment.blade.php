@extends('layout.admin')

@push('title')
    <title>Inventory Equipments</title>
@endpush

@section('content')
<main id="main" class="main">

    <!-- Admin User Page Title -->

    <section class="section">

        <div class="card" id="card-table">

            <div class="card-body px-4">

                <h5 class="card-title">Inventory Equipment Report</h5>

                <table id="datatable" class="table table-bordered" style="width: 100%; overflow-x: scroll;">
                    <thead class="table-light">
                        <th scope="col">Qty</th>
                        <th scope="col">Description</th>

                        <th scope="col">Jan</th>
                        <th scope="col">Feb</th>
                        <th scope="col">Mar</th>

                        <th scope="col">Apr</th>
                        <th scope="col">May</th>
                        <th scope="col">Jun</th>

                        <th scope="col">Jul</th>
                        <th scope="col">Aug</th>
                        <th scope="col">Sep</th>

                        <th scope="col">Oct</th>
                        <th scope="col">Nov</th>
                        <th scope="col">Dec</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1 unit</td>
                            <td>Test</td>
                            <td>1 Very Good</td>
                            <td>1 Very Good</td>
                            <td>1 Very Good</td>

                            <td>VG = 1</td>
                            <td>VG = 1</td>
                            <td>VG = 1</td>

                            <td>VG = 1</td>
                            <td>VG = 1</td>
                            <td>VG = 1</td>
                            
                            <td>VG = 1</td>
                            <td>VG = 1</td>
                            <td>VG = 1</td>
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
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable({
                scrollX: true,
            });
        });
    </script>
@endpush