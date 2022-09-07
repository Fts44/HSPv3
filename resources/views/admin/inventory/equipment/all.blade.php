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

                <h5 class="card-title">Equipment Summary</h5>
                <table id="datatable" class="table table-bordered" style="width: 100%;">
                    <thead class="table-light">
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">Place</th>
                        <th scope="col">Total Quantity</th>
                        <th scope="col">Condition</th>
                    </thead>
                    <tbody>
                    @foreach($inventory as $item)
                        <tr>
                            <td>{{ ucwords($item->ieid_category) }}</td>
                            <td>
                                <span>NAME: </span>{{ $item->ien_name }} <br>
                                <span>TYPE: </span>{{ $item->iet_type }} <br>
                                <span>BRAND: </span>{{ $item->ieb_brand }}
                            </td>
                            <td>{{ $item->iep_place }}</td>
                            <td>{{ $item->total_qty." ".$item->ieid_unit }}</td>
                            <td>
                                <span class="badge bg-success">Very Good: {{ $item->VeryGood }} </span><br>
                                <span class="badge bg-primary">Good: {{ $item->Good }}</span><br>
                                <span class="badge bg-secondary">Fair: {{ $item->Fair }}</span><br>
                                <span class="badge bg-warning">Poor: {{ $item->Poor }}</span><br>
                                <span class="badge bg-danger">Scrap: {{ $item->Scrap }}</span>
                            </td>
                        </tr>
                    @endforeach
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