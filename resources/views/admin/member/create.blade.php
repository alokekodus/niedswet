@extends('admin.common.main')

@section('title', 'NIEDSWET | Add New Member')

@section('customHeader')
@endsection

@section('page_title', 'Member')

@section('main')
    <div class="container-xxl flex-grow-1 pt-4">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add Member</h5>
                        <small class="text-muted float-end">Member</small>
                    </div>
                    <div class="card-body">
                        <form id="addMemberForm">
                            <div class="mb-3">
                                <label class="form-label" for="name">Member Name<sup>*</sup></label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Member Category<sup>*</sup></label>
                                <select d="category" name="category" class="form-select">
                                    <option readonly selected value="">Select one...</option>
                                    <option value="Trustee">Trustee</option>
                                    <option value="Advisor">Advisor</option>
                                    <option value="CA">Chartered Accountant</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="designation">Member Designation<sup>*</sup></label>
                                <input type="text" id="designation" name="designation" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="fb_link">Member Facebook link</label>
                                <input type="text" id="fb_link" name="fb_link" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tw_link">Member Twitter link</label>
                                <input type="text" id="tw_link" name="tw_link" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="google_link">Member Google link</label>
                                <input type="text" id="google_link" name="google_link" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bio">Member Bio<sup>*</sup></label>
                                <textarea id="bio" name="bio" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" id="createBtn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#addMemberForm").validate({
                rules: {
                    name: "required",
                    category: "required",
                    designation: "required",
                    bio: "required",
                },
                messages: {
                    name: "Please enter member name",
                    category: "Please select member category",
                    designation: "Please enter member designation",
                    bio: "Please enter member description",
                },
                errorElement: "em",
                errorPlacement: function(error, element) {
                    // Add the `invalid-feedback` class to the error element
                    error.addClass("invalid-feedback");
                    error.insertAfter(element);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                },
                submitHandler: function(form, e) {
                    e.preventDefault();
                    const formData = new FormData(form);
                    const btn = $('#createBtn');
                    btn.text('Please wait...');
                    btn.attr('disabled', true);
                    $.ajax({
                        type: 'post',
                        url: "{{ route('admin.member.add') }}",
                        cache: false,
                        processData: false,
                        contentType: false,
                        data: formData,
                        success: function(data) {
                            if (data.status === 200) {
                                btn.text('Submit');
                                btn.attr('disabled', false);
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: data.message,
                                }).then(() => {
                                    window.location.reload(true);
                                })
                            } else {
                                btn.text('Submit');
                                btn.attr('disabled', false);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops!',
                                    text: data.message,
                                })
                            }
                        },
                        error: function(data) {
                            newImage.removeFiles();
                            btn.text('Submit');
                            btn.attr('disabled', false);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops!',
                                text: 'Server error',
                            })
                        }
                    });
                }
            });
        });
    </script>
@endsection
