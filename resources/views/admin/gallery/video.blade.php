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

@section('page_title', 'Videos')

@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-9">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addVideoLinkModal">Add link</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse ($videos as $item)
                <div class="col-md-4 col-lg-4 mb-3">
                    <div class="card h-100">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/{{ $item->video_id }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                        <div class="card-body">
                            <button class="btn btn-primary editBtn"
                                data-id="{{ Crypt::encrypt($item->id) }}">Edit</button>
                            <button class="btn btn-danger deleteBtn"
                                data-id="{{ Crypt::encrypt($item->id) }}">Delete</button>
                        </div>
                    </div>
                </div>
            @empty
                <p>*No videos found</p>
            @endforelse
        </div>

        {{ $videos->links() }}

        {{-- Add video link Modal --}}
        <div class="modal fade" id="addVideoLinkModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" id="addVideoLinkForm">
                    <div class="modal-header">
                        <h5 class="modal-title">Add video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="galleryImage" class="form-label">Youtube ID</label>
                            <input type="text" class="form-control" id="video_id" name="video_id" required>
                            <small>Max length 50 chatacters</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" id="closeModalBtn" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" id="addVideoLinkBtn" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Edit video link Modal --}}
        <div class="modal fade" id="editVideoLinkModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" id="editVideoLinkForm">
                    <div class="modal-header">
                        <h5 class="modal-title">Update video link</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="galleryImage" class="form-label">Youtube ID</label>
                            <input type="hidden" class="form-control" id="link_id" name="link_id" required>
                            <input type="text" class="form-control" id="edit_video_id" name="edit_video_id">
                            <small>Max length 50 chatacters</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" id="closeModalBtn" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" id="updateVideoLinkBtn" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
    <script>
        $('.editBtn').on('click', function() {
            const video_id = $(this).data('id');
            $('#link_id').val(video_id);
            $('#editVideoLinkModal').modal('toggle');
        })
    </script>

    {{-- Add video --}}
    <script>
        $('#addVideoLinkForm').on('submit', function(e) {
            e.preventDefault();

            let btn = $('#addVideoLinkBtn');
            let modal = $('#addVideoLinkModal');
            let actionUrl = "{{ route('admin.gallery.video.add') }}";
            btn.text('Please wait...');
            btn.attr('disabled', true);
            let formData = new FormData(this);

            $.ajax({
                type: "POST",
                url: actionUrl,
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status === 200) {
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

    {{-- Update video --}}
    <script>
        $('#editVideoLinkForm').on('submit', function(e) {
            e.preventDefault();

            let btn = $('#updateVideoLinkBtn');
            let modal = $('#editVideoLinkModal');
            let actionUrl = "{{ route('admin.gallery.video.update') }}";
            btn.text('Please wait...');
            btn.attr('disabled', true);
            let formData = new FormData(this);

            $.ajax({
                type: "POST",
                url: actionUrl,
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status === 200) {
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
                    let actionUrl = "{{ route('admin.gallery.video.delete') }}";
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
