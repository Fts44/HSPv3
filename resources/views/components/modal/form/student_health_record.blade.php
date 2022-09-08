<div class="modal fade" id="global_modal_form_shr" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_title" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title">Student Health Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col-lg-5">
                        Date of Medical Examination: {{ date('F d, Y') }}
                    </div>
                    <div class="col-lg-2">
                        SR-Code: {{ $patientDetails->sr_code }}
                    </div>
                    <div class="col-lg-5">
                        Program: {{ $patientDetails->prog_name }}
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-10"></div>
                    <div class="col-lg-2 border ">
                        <img src="{{ asset('storage/profile_picture/'.$patientDetails->profile_pic) }}" alt="profile_pic" style="display:block; width:auto; height:100px;">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="submit_button">Add</button>
            </div>
        </div>    
    </div>
</div>