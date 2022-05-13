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

@section('page_title', 'Photos')

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
            <div class="col-md-4 col-lg-4 mb-3">
                <div class="card h-100">
                    <iframe width="100%" height="250" src="https://www.youtube.com/embed/eaU3ff3uVzw"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    <div class="card-body">
                        <button class="btn btn-primary editBtn" data-id="{{ Crypt::encrypt(1) }}">Edit</button>
                        <button class="btn btn-danger deleteBtn" data-id="{{ Crypt::encrypt(1) }}">Delete</button>
                    </div>
                </div>
            </div>
        </div>

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
                            <label for="galleryImage" class="form-label">Youtube link</label>
                            <input type="text" class="form-control" id="youtube_link" name="youtube_link" required>
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
                            <label for="galleryImage" class="form-label">Youtube link</label>
                            <input type="hidden" class="form-control" id="link_id" name="link_id" required>
                            <input type="text" class="form-control" id="edit_youtube_link" name="edit_youtube_link">                            
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
@endsection
