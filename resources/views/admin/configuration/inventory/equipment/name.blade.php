@extends('layout.admin')

@push('title')
    <title>Configuration Equipment</title>
@endpush

@section('content')
<main id="main" class="main">

    <x-admin.configuration.inventory.equipment-pagetitle activeTitle="name"></x-admin.configuration.inventory.equipment-pagetitle>
    <!-- Document Page Title -->
    @if(session()->has('status'))
        @php $status = (object)session('status') @endphp
        <div class="alert {{ ($status->status==200) ? 'alert-success' : 'alert-danger' }} alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ $status->message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="section mt-2">

        <div class="card" id="card-table">

            <div class="card-body px-4">

                <h5 class="card-title">Equipment Name</h5>
                <a href="#" id="add" class="btn btn-secondary btn-sm" style="float: right; margin-top: -2.5rem;">
                    <i class="bi bi-plus-lg"></i>          
                </a>
                <table id="datatable" class="table table-bordered" style="width: 100%;">
                    <thead class="table-light">
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </thead>
                    <tbody>
                    @foreach($ie_names as $item)
                        <tr>
                            <td>{{ $item->ien_id }}</td>
                            <td>{{ $item->ien_name }}</td>
                            <td>
                                <span class="badge {{ ($item->ien_status) ? 'bg-success' : 'bg-secondary' }}">{{ ($item->ien_status) ? 'Enabled' : 'Disabled' }}</span>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" onclick="update('{{ $item->ien_id }}','{{ $item->ien_name }}','{{ $item->ien_status }}')"><i class="bi bi-pencil"></i></a>
                                <button class="btn btn-danger btn-sm" {{ ($item->ieid_id!=null) ? 'disabled' : '' }} href="" onclick="return delete_confirmation('{{ $item->ien_name }}','{{ route('AdminConfigurationDeleteEquipmentName', ['id' => ($item->ieid_id!=null) ? 'id' : $item->ien_id]) }}');"><i class="bi bi-eraser"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>

    </section>

</main>
    <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_title">Add Equipment Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" id="form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body mb-4">
                        <label class="form-control border-0 p-0">
                            Equipment's Name:
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
                            <span class="text-danger" id="error_name">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>

                        <label class="form-control border-0 p-0 mt-2">
                            Status:
                            <select class="form-select" name="status" id="status">
                                <option value="1" {{ (old('status')=='1') ? 'selected' : '' }}>Enable</option>
                                <option value="0" {{ (old('status')=='0') ? 'selected' : '' }}>Disable</option>
                            </select>
                            <span class="text-danger" id="error_status">
                                @error('status')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="submit_button">Add</button>
                    </div>
                </form>
            </div>    
        </div>
    </div>
@endsection

@push('script')

    <!-- datatable js -->
    <script src="{{ asset('js/datatable.js') }}"></script>

    <script>
        function clear(){
            $("#status").prop("selectedIndex", 0);
            $('#name').val('');
            $('#error_name, #error_status').html('');
        }

        function update(item_id, item_name, item_status){
            clear();
            var url = "{{ route('AdminConfigruationUpdateEquipmentName', ['id'=>'id']) }}";
            $('#form').attr('action', url.replace('id', item_id));
            $('#name').val(item_name);
            $('#status').val(item_status);
            $('#modal_title').html('Update Equipment Name');
            $('#submit_button').html('Update');
            $('#modal').modal('show'); 
        }

        function delete_confirmation(item_name, href){
            event.preventDefault();
            swal({
                title: "Are you sure?",
                text: "Your about to delete "+item_name+"!",
                icon: "warning",
                buttons: ["Cancel", "Yes"],
                dangerMode: true,
            }).then(function(value){
                if(value){
                    window.location.href = href;
                }
            });   
        }

        $(document).ready(function(){
            datatable_class('#datatable');

            $('#hamburgerMenu').click(function(){
                setTimeout(function() { 
                    redraw_datatable_class('#datatable');
                }, 300);
            });
            $('.alert').delay(5000).fadeOut('slow');
            @if($errors->any())
                @if(session('status'))
                    @php 
                        $status = (object)session('status');                      
                    @endphp

                    @if($status->action=='Add')
                        $('#form').attr('action', "{{ route('AdminConfigruationInsertEquipmentName') }}");
                        $('#modal_title').html('Add Equipment Name');
                        $('#submit_button').html('Add');
                    @elseif($status->action=='Update')
                        $('#form').attr('action', "{{ route('AdminConfigruationUpdateEquipmentName', ['id' => $status->ien_id]) }}");
                        $('#modal_title').html('Update Equipment Name');
                        $('#submit_button').html('Update');
                    @endif
                @endif                
                $('#modal').modal('show'); 
            @endif 

            $('#add').click(function(){
                clear();
                $('#form').attr('action', "{{ route('AdminConfigruationInsertEquipmentName') }}");
                $('#modal_title').html('Add Equipment Name');
                $('#submit_button').html('Add');
                $('#modal').modal('show'); 
            });

        });
    </script>
@endpush