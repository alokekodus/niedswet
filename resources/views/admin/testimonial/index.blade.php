@extends('admin.common.main')

@section('title', 'NIEDSWET | Testimonial')

@section('customHeader')
    <style>
        .card-img-top {
            height: 250px;
            object-fit: cover;
        }

    </style>
@endsection

@section('page_title', 'Testimonial')

@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-9">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addTestimonialModal">Add new</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse ($testimonials as $item)
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ asset($item->image) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">
                                {{ $item->message }}
                            </p>
                            <button class="btn btn-primary openEditModal"
                                data-id="{{ Crypt::encrypt($item->id) }}">Edit</button>
                            <button class="btn btn-danger deleteBtn"
                                data-id="{{ Crypt::encrypt($item->id) }}">Delete</button>
                        </div>
                    </div>
                </div>
            @empty
                <p>*No testimonials found</p>
            @endforelse

        </div>
    </div>

    {{-- Add testimonial Modal --}}
    <div class="modal fade" id="addTestimonialModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" id="addTestimonialForm">
                <div class="modal-header">
                    <h5 class="modal-title">Add testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name<sup>*</sup></label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="profile_pic" class="form-label">Image<sup>*</sup></label>
                        <input type="file" accept="image/*" id="profile_pic" name="profile_pic" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message<sup>*</sup></label>
                        <textarea type="text" class="form-control" rows="4" id="message" name="message" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" id="closeModalBtn" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" id="addTestimonialBtn" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Update testimonial Modal --}}
    <div class="modal fade" id="updateTestimonialModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" id="updateTestimonialForm">
                <div class="modal-header">
                    <h5 class="modal-title">Add testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Name<sup>*</sup></label>
                        <input type="hidden" id="testimonial_id" name="testimonial_id">
                        <input type="text" class="form-control" id="edit_name" name="edit_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit_profile_pic" class="form-label">Image</label>
                        <input type="file" accept="image/*" id="edit_profile_pic" name="edit_profile_pic" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit_message" class="form-label">Message<sup>*</sup></label>
                        <textarea type="text" class="form-control" rows="4" id="edit_message" name="edit_message"
                            required>My message</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" id="closeModalBtn" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" id="updateTestimonialBtn" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('customJs')
    <script>
        // Create a FilePond instance
        const pond1 = FilePond.create(document.getElementById('profile_pic'), {
            allowMultiple: false,
            maxFileSize: '1MB',
            maxFiles: 1,
            instantUpload: false,
            imagePreviewHeight: 200,
            acceptedFileTypes: ['image/*'],
            labelFileTypeNotAllowed: 'Not a valid image. Please select only image.',
            labelIdle: '<div style="width:100%;height:100%;"><p> Drag &amp; Drop your files or <span class="filepond--label-action" tabindex="0">Browse</span><br> Maximum number of image is 1 :</p> </div>',
        });

        // Create a FilePond instance
        const pond2 = FilePond.create(document.getElementById('edit_profile_pic'), {
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

    {{-- Add testionial --}}
    <script>
        $('#addTestimonialForm').on('submit', function(e) {
            e.preventDefault();

            let btn = $('#addTestimonialBtn');
            let modal = $('#addTestimonialModal');
            let actionUrl = "{{ route('admin.testimonial.add') }}";
            btn.text('Please wait...');
            btn.attr('disabled', true);
            let formData = new FormData(this);
            pondFiles = pond1.getFiles();
            for (var i = 0; i < pondFiles.length; i++) {
                formData.append('profilePic', pondFiles[i].file);
            }
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status === 200) {
                        pond1.removeFiles();
                        btn.text('Upload');
                        btn.attr('disabled', false);
                        modal.modal('toggle');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        }).then(() => {
                            window.location.reload(true);
                        })
                    } else {
                        pond1.removeFiles();
                        btn.text('Upload');
                        btn.attr('disabled', false);
                        modal.modal('toggle');
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops!',
                            text: data.message,
                        })
                    }
                },
                error: function(data) {
                    pond1.removeFiles();
                    btn.text('Upload');
                    btn.attr('disabled', false);
                    modal.modal('toggle');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'Server error',
                    })
                }
            });
        })
    </script>

    {{-- Open edit modal --}}
    <script>
        $('.openEditModal').on('click', function() {
            let testimonial_id = $(this).data('id');
            $('#updateTestimonialModal').modal('toggle');
        });
    </script>

    {{-- Open update modal --}}
    <script>
        $('.openEditModal').on('click', function(e) {
            e.preventDefault();
            const testimonial_id = $(this).data('id');
            const formData = {
                id: testimonial_id
            }
            $.ajax({
                url: "{{ route('admin.testimonial.getdata') }}",
                type: "POST",
                data: formData,
                success: function(data) {
                    if (data.status === 200) {
                        $('#edit_name').val(data.name);
                        $('#edit_message').val(data.details);
                        $('#testimonial_id').val(data.id);
                    } else {
                        Swal.fire(
                            'Oops!',
                            data.message,
                            'error'
                        );
                    }
                },
                error: function(data) {
                    Swal.fire(
                        'Oops!',
                        'Server error',
                        'error'
                    );
                }
            });
        });
    </script>

    {{-- Edit testionial --}}
    <script>
        $('#updateTestimonialForm').on('submit', function(e) {
            e.preventDefault();

            let btn = $('#updateTestimonialBtn');
            let modal = $('#updateTestimonialModal');
            let actionUrl = "{{ route('admin.testimonial.update') }}";
            btn.text('Please wait...');
            btn.attr('disabled', true);
            let formData = new FormData(this);
            pondFiles = pond2.getFiles();
            for (var i = 0; i < pondFiles.length; i++) {
                formData.append('profilePic', pondFiles[i].file);
            }
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status === 200) {
                        pond1.removeFiles();
                        btn.text('Upload');
                        btn.attr('disabled', false);
                        modal.modal('toggle');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        }).then(() => {
                            window.location.reload(true);
                        })
                    } else {
                        pond1.removeFiles();
                        btn.text('Upload');
                        btn.attr('disabled', false);
                        modal.modal('toggle');
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops!',
                            text: data.message,
                        })
                    }
                },
                error: function(data) {
                    pond1.removeFiles();
                    btn.text('Upload');
                    btn.attr('disabled', false);
                    modal.modal('toggle');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'Server error',
                    })
                }
            });
        })
    </script>

    {{-- Delete testionial --}}
    <script>
        $('.deleteBtn').on('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let id = $(this).data('id');
                    let btn = $(this);
                    let actionUrl = "{{ route('admin.testimonial.delete') }}";
                    let formData = {
                        id: id
                    }
                    btn.text('Please wait...');
                    btn.attr('disabled', true);

                    $.ajax({
                        type: "POST",
                        url: actionUrl,
                        data: formData,
                        success: function(data) {
                            if (data.status === 200) {
                                btn.text('Delete');
                                btn.attr('disabled', false);
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: data.message,
                                }).then(() => {
                                    window.location.reload(true);
                                })
                            } else {
                                btn.text('Delete');
                                btn.attr('disabled', false);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops!',
                                    text: data.message,
                                })
                            }
                        },
                        error: function(data) {
                            btn.text('Delete');
                            btn.attr('disabled', false);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops!',
                                text: 'Server error',
                            })
                        }
                    });
                }
            })
        })
    </script>
@endsection
