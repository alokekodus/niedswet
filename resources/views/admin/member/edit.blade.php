@extends('admin.common.main')

@section('title', 'NIEDSWET | Edit member')

@section('customHeader')
@endsection

@if ($category === 'trustee')
    @section('page_title', 'Manage Trustee')
@elseif($category === 'advisor')
    @section('page_title', 'Manage Advisor')
@else
    @section('page_title', 'Manage Chartered Accountant')
@endif


@section('main')
    <div class="container-xxl flex-grow-1 pt-4">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Update details</h5>
                        <small class="text-muted float-end">Member</small>
                    </div>
                    <div class="card-body">
                        <form id="updateMemberForm">
                            <div class="mb-3">
                                <label class="form-label" for="name">Member Name<sup>*</sup></label>
                                <input type="hidden" id="member_id" name="member_id" value="{{ Crypt::encrypt($member->id) }}">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $member->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="image">Profile image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Member Category<sup>*</sup></label>
                                <select d="category" name="category" class="form-select">
                                    <option readonly value="">Select one...</option>
                                    <option value="Trustee" {{ $member->category == 'Trustee' ? 'selected' : '' }}>Trustee
                                    </option>
                                    <option value="Advisor" {{ $member->category == 'Advisor' ? 'selected' : '' }}>Advisor
                                    </option>
                                    <option value="CA" {{ $member->category == 'CA' ? 'selected' : '' }}>Chartered
                                        Accountant</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="designation">Member Designation<sup>*</sup></label>
                                <input type="text" id="designation" name="designation" class="form-control"
                                    value="{{ $member->designation }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="fb_link">Member Facebook link</label>
                                <input type="text" id="fb_link" name="fb_link" class="form-control"
                                    value="{{ $member->fb_link }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tw_link">Member Twitter link</label>
                                <input type="text" id="tw_link" name="tw_link" class="form-control"
                                    value="{{ $member->tw_link }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="linkedin_link">Member Linkedin link</label>
                                <input type="text" id="linkedin_link" name="linkedin_link" class="form-control"
                                    value="{{ $member->linkedin_link }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="bio">Member Bio<sup>*</sup></label>
                                <textarea id="bio" name="bio" class="form-control">{{ $member->bio }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" id="updateBtn">Update</button>
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
            @if ($member->image != '') 
                files: [{
                source: "{{ asset($member->image) }}",
            }]
            @endif
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#updateMemberForm").validate({
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

                    pondFiles = pond.getFiles();
                    for (var i = 0; i < pondFiles.length; i++) {
                        formData.append('profileImage', pondFiles[i].file);
                    }
                    formData.append('memberBio', editorData);

                    const btn = $('#updateBtn');
                    btn.text('Please wait...');
                    btn.attr('disabled', true);
                    $.ajax({
                        type: 'post',
                        url: "{{ route('admin.member.update') }}",
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
