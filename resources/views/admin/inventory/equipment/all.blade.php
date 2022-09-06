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
                        <th scope="col">Description</th>
                        <th scope="col">Place</th>
                        <th scope="col">Total Quantity</th>
                        <th scope="col">Condition</th>
                    </thead>
                    <tbody>
                    @foreach($inventory as $item)
                        <tr>
                            <td>
                                <span style="font-weight: 600; color: #444444;">Name: </span>{{ $item->ien_name }} <br>
                                <span style="font-weight: 600; color: #444444;">Type: </span>{{ $item->iet_type }} <br>
                                <span style="font-weight: 600; color: #444444;">Brand: </span>{{ $item->ieb_brand }}
                            </td>
                            <td>{{ $item->iep_place }}</td>
                            <td>{{ $item->total_qty." ".$item->ieid_unit }}</td>
                            <td>
                                <span style="font-weight: 600; color: #444444;">Very Good: </span>{{ $item->VeryGood }} <br>
                                <span style="font-weight: 600; color: #444444;">Good: </span>{{ $item->Good }} <br>
                                <span style="font-weight: 600; color: #444444;">Fair: </span>{{ $item->Fair }} <br>
                                <span style="font-weight: 600; color: #444444;">Poor: </span>{{ $item->Poor }} <br>
                                <span style="font-weight: 600; color: #444444;">Scrap: </span>{{ $item->Scrap }} <br>
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