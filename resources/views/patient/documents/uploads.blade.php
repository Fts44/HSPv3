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

                <h5 class="card-title">Uploads</h5>
                <a href="#" class="btn btn-secondary btn-sm" id="add" style="float: right; margin-top: -2.3rem;"  data-bs-toggle="modal" data-bs-target="#modal">
                    <i class="bi bi-plus-lg"></i>          
                </a>
                <table id="datatable" class="table table-bordered" style="width: 100%;">
                    <thead class="table-light">
                        <th scope="col">ID</th>
                        <th scope="col">Document Type</th>
                        <th scope="col">Filename</th>
                        <th scope="col">Date Upload</th>
                        <th scope="col">Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Joseph E. Calma</td>
                            <td>test</td>
                            <td>test</td>
                            <td>test</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="">
                                    <i class="bi bi-eye"></i> 
                                    View
                                </a>
                                <a class="btn btn-danger btn-sm" href="">
                                    <i class="bi bi-eraser"></i>
                                    Delete
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
    <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_title">Upload New Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" id="form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body mb-4">
                        <div class="row">
                            <div>
                                <label for="" class="col-form-label col-lg-12">Document Type<span class="fr">*</span></label>
                                <select class="form-select form-select" name="document_type" id="">
                                    <option value="">--- choose document type ---</option>
                                    
                                </select>
                            </div>
                            <span class="text-danger" id="file_error">
                                @error('document_type')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="row">
                            <div>
                                <label for="" class="col-form-label col-lg-12 mt-4">Document File<span class="fr">*</span></label>
                                <input class="form-control" type="file" name="file" id="file">
                            </div>
                            <span class="text-danger" id="file_error">
                                @error('file')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="submit_button">Add</button>
                    </div>
                </form>
            </div>    
        </div>
    </div>
@endsection

@push('script')

    <!-- main js -->
    <script src="{{ asset('js/datatable.js') }}"></script>
@endpush