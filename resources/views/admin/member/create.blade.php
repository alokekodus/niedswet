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
                                <small>Max length 50 chatacters</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="image">Profile image</label>
                                <input type="file" class="form-control" id="image" name="image">
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
                                <input type="text" id="designation" name="designation1" class="form-control">
                                <small>Max length 50 chatacters</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="fb_link">Member Facebook link</label>
                                <input type="text" id="fb_link" name="fb_link" class="form-control">
                                <small>Max length 255 chatacters</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tw_link">Member Twitter link</label>
                                <input type="text" id="tw_link" name="tw_link" class="form-control">
                                <small>Max length 255 chatacters</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="linkedin_link">Member Linkedin link</label>
                                <input type="text" id="linkedin_link" name="linkedin_link" class="form-control">
                                <small>Max length 255 chatacters</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bio">Member Bio</label>
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
    {{-- Initialize CK Editor 5 --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        let editor;

        ClassicEditor
            .create(document.querySelector('#bio'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                heading: {
                    options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    }, ]
                }
            }).then(newEditor => {
                editor = newEditor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    {{-- Initialize filepond --}}
    <script>
        // Create a FilePond instance
        const pond = FilePond.create(document.getElementById('image'), {
            allowMultiple: false,
            maxFileSize: '1MB',
            maxFiles: 1,
            instantUpload: false,
            imagePreviewHeight: 200,
            acceptedFileTypes: ['image/*'],
            labelFileTypeNotAllowed: 'Not a valid image. Please select only image.',
            labelIdle: '<div style="width:100%;height:100%;"><p> Drag &amp; Drop your files or <span class="filepond--label-action" tabindex="0">Browse</span><br> Maximum number of image is 1 :</p> </div>',
        });
    </script>

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
                    const editorData = editor.getData();
                    const formData = new FormData(form);
                    const btn = $('#createBtn');

                    pondFiles = pond.getFiles();
                    for (var i = 0; i < pondFiles.length; i++) {
                        formData.append('profileImage', pondFiles[i].file);
                    }
                    formData.append('memberBio', editorData);

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
