@extends('admin.common.main')

@section('title', 'NIEDSWET | Dashboard')

@section('customHeader')
@endsection

@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-9">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#createCarouselModal"><i class='bx bx-image-add'></i> Add Image</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12 mb-3">
            <div class="card h-100">
                <img class="card-img-top" src="{{ asset('web_assets/images/slider/slider1.png') }}" alt="Card image cap">
                <div class="card-body">
                    <button class="btn btn-outline-primary editBtn">Edit</button>
                    <button class="btn btn-danger deleteBtn" data-id="1">Delete</button>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12 mb-3">
            <div class="card h-100">
                <img class="card-img-top" src="{{ asset('web_assets/images/slider/slider2.png') }}"
                    alt="Card image cap">
                <div class="card-body">
                    <button class="btn btn-outline-primary editBtn">Edit</button>
                    <button class="btn btn-danger deleteBtn" data-id="2">Delete</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Create New Carousel Modal --}}
    <div class="modal fade" id="createCarouselModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" id="uploadCarouselImageForm">
                <div class="modal-header">
                    <h5 class="modal-title">Upload New Carousel Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="carouselImage" class="form-label">Image</label>
                        <input type="file" accept="image/*" id="newImage" name="newImage" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" id="carouselUploadBtn" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Update Carousel Modal --}}
    <div class="modal fade" id="editCarouselModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="updateCarouselImageForm" action="#">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Update Carousel Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload image</label>
                            <input type="file" id="updateImage" name="updateImage">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary" id="updateImageBtn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
    <script>
        // Create a FilePond instance
        const updateImage = FilePond.create(document.getElementById('updateImage'), {
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
        const newImage = FilePond.create(document.getElementById('newImage'), {
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

        {{-- Upload image --}}
        <script>    
            $('#uploadCarouselImageForm').on('submit', function(e) {
                e.preventDefault();
    
                let btn = $('#carouselUploadBtn');
                let modal = $('#createCarouselModal');
                let actionUrl = "{{ route('admin.carousel.upload') }}";
                btn.text('Please wait...');
                btn.attr('disabled', true);
                let formData = new FormData(this);
                pondFiles = newImage.getFiles();
                for (var i = 0; i < pondFiles.length; i++) {
                    formData.append('attachment', pondFiles[i].file);
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
                            newImage.removeFiles();
                            btn.text('Upload');
                            btn.attr('disabled', true);
                            modal.modal('toggle');
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: data.message,
                            }).then(() => {
                                window.location.reload(true);
                            })
                        } else {
                            newImage.removeFiles();
                            btn.text('Upload');
                            btn.attr('disabled', true);
                            modal.modal('toggle');
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops!',
                                text: data.message,
                            })
                        }
                    },
                    error: function(data) {
                        newImage.removeFiles();
                        btn.text('Upload');
                        btn.attr('disabled', true);
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

    {{-- Update image --}}
    <script>
        $('.editBtn').on('click', function() {
            $('#editCarouselModal').modal('toggle');
        });

        $('#updateCarouselImageForm').on('submit', function(e) {
            e.preventDefault();

            let btn = $('#updateImageBtn');
            let modal = $('#editCarouselModal');
            let actionUrl = "{{ route('admin.carousel.update') }}";
            btn.text('Please wait...');
            btn.attr('disabled', true);
            let formData = new FormData(this);
            pondFiles = updateImage.getFiles();
            for (var i = 0; i < pondFiles.length; i++) {
                formData.append('attachment', pondFiles[i].file);
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
                        updateImage.removeFiles();
                        btn.text('Update');
                        btn.attr('disabled', true);
                        modal.modal('toggle');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        }).then(() => {
                            window.location.reload(true);
                        })
                    } else {
                        updateImage.removeFiles();
                        btn.text('Update');
                        btn.attr('disabled', true);
                        modal.modal('toggle');
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops!',
                            text: data.message,
                        })
                    }
                },
                error: function(data) {
                    updateImage.removeFiles();
                    btn.text('Update');
                    btn.attr('disabled', true);
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

    {{-- Delete image --}}
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
                    let actionUrl = "{{ route('admin.carousel.delete') }}";
                    let formData = {
                        id: id
                    }
                    btn.text('Please wait...');
                    btn.attr('disabled', true);

                    $.ajax({
                        type: "POST",
                        url: actionUrl,
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
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
