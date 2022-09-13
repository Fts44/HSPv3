<div class="modal fade" id="global_modal_form_shr" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_title" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" style="font-size: 15px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title">Student Health Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <!-- date, sr, prog -->
                    <fieldset class="border border-secondary pb-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Header</legend>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-4 mt-1">
                                Medical Examination Date:
                                <input type="date" name="" id="" class="form-control" value="{{ date('F d, Y') }}">
                            </label>
                            <label class="col-lg-4 mt-1">
                                SR-Code:
                                <input type="text" name="" id="" class="form-control">
                            </label>
                            <label class="col-lg-4 mt-1">
                                Program:
                                <select name="" id="" class="form-select">
                                    <option value="">--- choose ---</option>
                                </select>
                            </label>
                        </div>
                    </fieldset>
                    <!-- personal info -->
                    <fieldset class="border border-secondary pb-2 mt-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Personal Information</legend>
                        <div class="row px-2 pb-2 d-flex flex-column align-items-center">
                            <div class="col-lg-4 d-flex flex-column align-items-center mt-1">
                                Profile Pictre:
                                <img src="{{ asset('storage/default_avatar.png') }}" alt="tet" style="width: 200px; height: 210px;" class="border border-secondary">
                                <input type="file" class="form-control mt-1">
                            </div>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Firstname:
                                <input type="text" name="" id="" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                Middlename:
                                <input type="text" name="" id="" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                Lastname:
                                <input type="text" name="" id="" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                Suffix:
                                <input type="text" name="" id="" class="form-control">
                            </label>
                        </div>

                        <div class="row px-2 pb-2">
                            <label class="col-lg-6 mt-1">
                                Home Address:
                                <input type="text" class="form-control">
                            </label>
                            <label class="col-lg-6 mt-1">
                                Dormitory Address:
                                <input type="text" class="form-control">
                            </label>
                        </div>

                        <div class="row px-2 pb-2">
                            <label class="col-lg-2 mt-1">
                                Gender:
                                <select name="" id="" class="form-select">
                                    <option value="">Male</option>
                                    <option value="">Female</option>
                                </select>
                            </label>
                            <label class="col-lg-2 mt-1">
                                Age:
                                <input type="number" class="form-control">
                            </label>
                            <label class="col-lg-2 mt-1">
                                Civil Status:
                                <select name="" id="" class="form-select">
                                    <option value="">Single</option>
                                </select>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Religion:
                                <input type="text" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                Contact:
                                <input type="text" class="form-control">
                            </label>
                        </div>

                        <div class="row px-2 pb-2">
                            <label class="col-lg-6 mt-1">
                                Date of Birth:
                                <input type="date" name="" id="" class="form-control">
                            </label>
                            <label class="col-lg-6 mt-1">
                                Place of Birth:
                                <input type="text" name="" id="" class="form-control">
                            </label>
                        </div>
                    </fieldset>
                    <!-- emergency contact -->
                    <fieldset class="border border-secondary pb-2 mt-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Emergency Contact</legend>
                        
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Firstname:
                                <input type="text" name="" id="" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                Middlename:
                                <input type="text" name="" id="" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                lastname:
                                <input type="text" name="" id="" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                Suffix:
                                <input type="text" name="" id="" class="form-control">
                            </label>
                        </div>
                        
                        <div class="row px-2 pb-2">
                            <label class="col-lg-6 mt-1">
                                Business Address:
                                <input type="text" name="" id="" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                Relation to patient:
                                <input type="text" name="" id="" class="form-control">
                            </label>
                        </div>

                        <div class="row px-2 pb-2">
                            <div class="col-lg-6 mt-1">
                                Landline:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col-lg-6 mt-1">
                                Cellphone no:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                        </div>

                    </fieldset>
                    <!-- past illness -->
                    <fieldset class="border border-secondary pb-2 mt-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Past Illness</legend>
                        
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Asthma:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Last Attack (Asthma):
                                <input type="date" name="" id="" class="form-control">
                            </label>

                            <label class="col-lg-3 mt-1">
                                Heart Disease:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Hypertension:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                        </div>

                        <div class="row px-2 pb-2">
                            
                            <label class="col-lg-3 mt-1">
                                Epilepsy:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Diabetes:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Thyroid Problem:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Thyroid Problem:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                        </div>

                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Measles:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Mumps:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>

                            <label class="col-lg-3 mt-1">
                                Varicella:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                        </div>

                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Hospitalization:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>

                            <label class="col-lg-6 mt-1">
                                Specify:
                                <input type="text" name="" id="" class="form-control">
                            </label>
                        </div>

                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Operation:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>

                            <label class="col-lg-6 mt-1">
                                Specify:
                                <input type="text" name="" id="" class="form-control">
                            </label>
                        </div>

                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Accident:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>

                            <label class="col-lg-6 mt-1">
                                Specify:
                                <input type="text" name="" id="" class="form-control">
                            </label>
                        </div>

                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Disability:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>

                            <label class="col-lg-6 mt-1">
                                Specify:
                                <input type="text" name="" id="" class="form-control">
                            </label>
                        </div>
                    </fieldset>
                    <!-- allergy -->
                    <fieldset class="border border-secondary mt-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Allergy</legend>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3">
                                Food:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-6">
                                Specify:
                                <input type="text" class="form-control">
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3">
                                Medicine:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-6">
                                Specify:
                                <input type="text" class="form-control">
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3">
                                Others:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-6">
                                Specify:
                                <input type="text" class="form-control">
                            </label>
                        </div>
                    </fieldset>
                    <!-- immunization -->
                    <fieldset class="border border-secondary mt-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Immunization</legend>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                BCG:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-3 mt-1">
                                MMR:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-3 mt-1">
                                HEPA A:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Typhoid:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Varicella:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Hepa B:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Hepa B Doses:
                                <input type="number" name="" id="" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                DPT:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-3 mt-1">
                                DPT Doses:
                                <input type="number" name="" id="" class="form-control">
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                OPV:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-3 mt-1">
                                OPV Doses:
                                <input type="number" name="" id="" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                HIB:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-3 mt-1">
                                HIB Doses:
                                <input type="number" name="" id="" class="form-control">
                            </label>
                        </div>
                    </fieldset>

                    <fieldset class="border border-secondary mt-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Pubertal</legend>
                        <div class="row px-2 pb-2">
                            <div class="col-lg-6 mt-1">
                                Male:
                                <div class="row mt-1">
                                    <label class="col-lg-6">
                                        Age of onset:
                                        <input type="number" name="" id="" class="form-control">
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-1">
                                Female:
                                <div class="row">
                                    <label class="col-lg-6 mt-1">
                                        Menarche:
                                        <input type="number" name="" id="" class="form-control">
                                    </label>
                                    <label class="col-lg-6 mt-1">
                                        LMP:
                                        <input type="date" name="" id="" class="form-control">
                                    </label>
                                </div>
                                <div class="row">
                                    <label class="col-lg-6 mt-1">
                                        Dysmenorhea:
                                        <select name="" id="" class="form-select">
                                            <option value="">No</option>
                                            <option value="">Yes</option>
                                        </select>
                                    </label>
                                    <label class="col-lg-6 mt-1">
                                        Medicine:
                                        <input type="text" name="" id="" class="form-control">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>    
                    
                    <fieldset class="border border-secondary mt-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Family History</legend>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Diabetes:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Heart Disease:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Mental Illness:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Cancer:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Hypertension:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Kidney Disease:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Epilepsy:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-3 mt-1">
                                Others:
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-12 mt-1" style="font-weight: 600; font-size: 14px;">Father's Name</label>
                            <div class="col-lg-3 mt-1">
                                Firstname:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col-lg-3 mt-1">
                                Midllename:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col-lg-3 mt-1">
                                Lastname:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col-lg-3 mt-1">
                                Suffix:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col-lg-3 mt-1">
                                Occupation:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-12 mt-1" style="font-weight: 600; font-size: 14px;">Mother's Name</label>
                            <div class="col-lg-3 mt-1">
                                Firstname:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col-lg-3 mt-1">
                                Midllename:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col-lg-3 mt-1">
                                Lastname:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col-lg-3 mt-1">
                                Suffix:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="col-lg-3 mt-1">
                                Occupation:
                                <input type="text" name="" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Marital Status:
                                <select name="" id="" class="form-select">
                                    <option value="">Married</option>
                                </select>
                            </label>
                        </div>
                    </fieldset>

                    <fieldset class="border border-secondary mt-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Physical Examination</legend>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Weight:
                                <input type="text" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                Height:
                                <input type="text" class="form-control">
                            </label>
                            <label class="col-lg-6 mt-1">
                                BMI (Weight in kg/height in meter sq.):
                                <input type="text" class="form-control">
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Temperature:
                                <input type="text" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                HR:
                                <input type="text" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                BP:
                                <input type="text" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                Vision:
                                <input type="text" class="form-control">
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-3 mt-1">
                                Hearing:
                                <input type="text" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                Blood Type:
                                <select name="" id="" class="form-select">
                                    <option value="">A Positive</option>
                                </select>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-6 mt-1">
                                Chest X-Ray Result:
                                <input type="text" class="form-control">
                            </label>
                            <label class="col-lg-3 mt-1">
                                Date (X-Ray Result):
                                <input type="date" class="form-control">
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-12 mt-2 text-danger" style="font-size: 15px;">If no or not normal, describe only the abnormal findings in the space below.</label>
                            
                            <label class="col-lg-3 mt-1">
                                General Survey:
                                <select name="" id="" class="form-select">
                                    <option value="">Yes</option>
                                    <option value="">No</option>
                                </select>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (general survey):
                                <input type="text" class="form-control">
                            </label>

                            <label class="col-lg-3 mt-1">
                                Skin:
                                <select name="" id="" class="form-select">
                                    <option value="">Yes</option>
                                    <option value="">No</option>
                                </select>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (skin):
                                <input type="text" class="form-control">
                            </label>

                            <label class="col-lg-3 mt-1">
                                Eyes/ Ears/ Nose:
                                <select name="" id="" class="form-select">
                                    <option value="">Yes</option>
                                    <option value="">No</option>
                                </select>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (eyes/ ears/ nose):
                                <input type="text" class="form-control">
                            </label>

                            <label class="col-lg-3 mt-1">
                                Teeth/ Gums:
                                <select name="" id="" class="form-select">
                                    <option value="">Yes</option>
                                    <option value="">No</option>
                                </select>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (teeth/ gums):
                                <input type="text" class="form-control">
                            </label>

                            <label class="col-lg-3 mt-1">
                                Neck:
                                <select name="" id="" class="form-select">
                                    <option value="">Yes</option>
                                    <option value="">No</option>
                                </select>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (neck):
                                <input type="text" class="form-control">
                            </label>

                            <label class="col-lg-3 mt-1">
                                Heart:
                                <select name="" id="" class="form-select">
                                    <option value="">Yes</option>
                                    <option value="">No</option>
                                </select>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (heart):
                                <input type="text" class="form-control">
                            </label>

                            <label class="col-lg-3 mt-1">
                                Chest/ Lungs:
                                <select name="" id="" class="form-select">
                                    <option value="">Yes</option>
                                    <option value="">No</option>
                                </select>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (chest/ lungs):
                                <input type="text" class="form-control">
                            </label>

                            <label class="col-lg-3 mt-1">
                                Abdomen:
                                <select name="" id="" class="form-select">
                                    <option value="">Yes</option>
                                    <option value="">No</option>
                                </select>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (abdomen):
                                <input type="text" class="form-control">
                            </label>

                            <label class="col-lg-3 mt-1">
                                Musculoskeletal:
                                <select name="" id="" class="form-select">
                                    <option value="">Yes</option>
                                    <option value="">No</option>
                                </select>
                            </label>
                            <label class="col-lg-9 mt-1">
                                Findings (musculoskeletal):
                                <input type="text" class="form-control">
                            </label>
                        </div>
                    </fieldset>

                    <fieldset class="border border-secondary mt-2" style="border-radius: 5px;">
                        <legend  class="float-none w-auto px-1" style="font-weight: 600; font-size: 15px; margin-left: 5px;">Assesment Diagnosis</legend>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-4">
                                Drinking?
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-4">
                                How much?
                                <input type="text" class="form-control">
                            </label>
                            <label class="col-lg-4">
                                How often?
                                <input type="text" class="form-control">
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-4">
                                Smoking?
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-4">
                                Number of Sticks/day?
                                <input type="number" class="form-control">
                            </label>
                            <label class="col-lg-4">
                                Since when?
                                <input type="number" class="form-control">
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-4">
                                Drug use?
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-4">
                                Kind:
                                <input type="number" class="form-control">
                            </label>
                            <label class="col-lg-4">
                                Regular Use?
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-4">
                                Driving?
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-4">
                                Specify Vehicle:
                                <input type="text" class="form-control">
                            </label>
                            <label class="col-lg-4">
                                With license?
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                        </div>
                        <div class="row px-2 pb-2">
                            <label class="col-lg-4">
                                Abuse? (Physical, Sexual, Verbal)
                                <select name="" id="" class="form-select">
                                    <option value="">No</option>
                                    <option value="">Yes</option>
                                </select>
                            </label>
                            <label class="col-lg-6">
                                Specify what kind of abuse:
                                <input type="text" class="form-control">
                            </label>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="submit_button">Add</button>
            </div>
        </div>    
    </div>
</div>