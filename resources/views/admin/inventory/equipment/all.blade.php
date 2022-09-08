@extends('layout.admin')

@push('title')
    <title>Inventory Equipment</title>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
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
                        <th scope="col">Cat</th>
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
                                <span>NAME: {{ $item->ien_name }} </span><br>
                                <span>TYPE: {{ $item->iet_type }} </span>
                                    @if($item->iet_type=='none')
                                        &emsp;
                                    @endif
                                <br>
                                <span>BRAND: {{ $item->ieb_brand }}</span>
                            </td>
                            <td>{{ $item->iep_place }}</td>
                            <td>{{ $item->total_qty." ".$item->ieid_unit }}</td>
                            <td>
                                @if($item->VeryGood)
                                    <span class="badge bg-success">Very Good: {{ $item->VeryGood }}</span>
                                @endif
                
                                @if($item->Good)
                                    <span class="badge bg-primary">Good: {{ $item->Good }}</span>
                                @endif

                                @if($item->Fair)
                                    <span class="badge bg-secondary">Fair: {{ $item->Fair }}</span>
                                @endif

                                @if($item->Poor)
                                    <span class="badge bg-warning">Poor: {{ $item->Poor }}</span>
                                @endif

                                @if($item->Scrap)
                                    <span class="badge bg-danger">Scrap: {{ $item->Scrap }}</span>
                                @endif
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