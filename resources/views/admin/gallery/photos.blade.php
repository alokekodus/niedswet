@extends('admin.common.main')

@section('title', 'NIEDSWET | Gallery')

@section('customHeader')
    <style>
        .card-img-top {
            height: 250px;
            object-fit: cover;
        }

    </style>
@endsection

@section('page_title', 'Album name: ' . $album->album_title)

@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-9">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#uploadGalleryImageModal">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse ($images as $item)
                <div class="col-md-4 col-lg-4 mb-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ asset($item->image) }}" alt="Card image cap">
                        <div class="card-body">
                            <button class="btn btn-danger deleteBtn"
                                data-id="{{ Crypt::encrypt($item->id) }}">Delete</button>
                        </div>
                    </div>
                </div>
            @empty
                <h5>*No images found</h5>
            @endforelse
        </div>

        {{ $images->links() }}

        {{-- Upload gallery images Modal --}}
        <div class="modal fade" id="uploadGalleryImageModal" data-bs-backdrop="static" tabindex="-1"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" id="uploadGalleryImageForm">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload Gallery Image</h5>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="galleryImage" class="form-label">Image</label>
                            <input type="hidden" id="album_id" name="album_id" value="{{ Crypt::encrypt($album->id) }}">
                            <input type="file" accept="image/*" id="galleryImage" name="galleryImage[]" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" id="closeModalBtn" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" id="galleryUploadBtn" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection

    @section('customJs')
        <script>
            // Create a FilePond instance
            const pond = FilePond.create(document.getElementById('galleryImage'), {
                allowMultiple: true,
                maxFileSize: '1MB',
                maxFiles: 10,
                instantUpload: false,
                imagePreviewHeight: 200,
                acceptedFileTypes: ['image/*'],
                labelFileTypeNotAllowed: 'Not a valid image. Please select only image.',
                labelIdle: '<div style="width:100%;height:100%;"><p> Drag &amp; Drop your files or <span class="filepond--label-action" tabindex="0">Browse</span><br> Maximum number of image is 10 :</p> </div>',
            });

            pond.on('warning', (error, file) => {
                $('#uploadGalleryImageModal').modal('toggle');
                Swal.fire({
                    icon: 'error',
                    title: error['body'],
                    text: 'Max 10 images can be upload at once',
                })
                // console.log('Warning', error, file);
            });
        </script>

        <script>
            $('#closeModalBtn').on('click', function() {
                pond.removeFiles();
                $('#uploadGalleryImageModal').modal('toggle');
            });
        </script>

        {{-- Upload image --}}
        <script>
            $('#uploadGalleryImageForm').on('submit', function(e) {
                e.preventDefault();

                let btn = $('#galleryUploadBtn');
                let modal = $('#uploadGalleryImageModal');
                let actionUrl = "{{ route('admin.gallery.upload') }}";
                btn.text('Please wait...');
                btn.attr('disabled', true);
                let formData = new FormData(this);
                pondFiles = pond.getFiles();
                for (var i = 0; i < pondFiles.length; i++) {
                    formData.append('attachment[]', pondFiles[i].file);
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
                            pond.removeFiles();
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
                            pond.removeFiles();
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
                        pond.removeFiles();
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
                        let actionUrl = "{{ route('admin.gallery.delete') }}";
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
