@extends('layout.admin')

@push('title')
    <title>Inventory Equipment</title>
@endpush

@section('content')
<main id="main" class="main">

    <x-admin.inventory.equipment-pagetitle activeTitle="All"></x-admin.inventory.equipment-pagetitle>
    <!-- Document Page Title -->

    <section class="section mt-2">

        <div class="card" id="card-table">

            <div class="card-body px-4">

                <h5 class="card-title">Equipment</h5>
                <a href="#" class="btn btn-secondary btn-sm" style="float: right; margin-top: -2.5rem;" data-bs-toggle="modal" data-bs-target="#modal">
                    <i class="bi bi-plus-lg"></i>          
                </a>
                <table id="datatable" class="table table-bordered" style="width: 100%;">
                    <thead class="table-light">
                        <th scope="col">ID</th>
                        <th scope="col">Item</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Type</th>
                        <th scope="col">Place</th>
                        <th scope="col">Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Airconditioner</td>
                            <td>Sanyo</td>
                            <td>Window Type</td>
                            <td>Infirmary Lobby</td>
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
@endsection

@push('script')

    <!-- datatable js -->
    <script src="{{ asset('js/datatable.js') }}"></script>
@endpush