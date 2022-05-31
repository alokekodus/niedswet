@extends('admin.common.main')

@section('title', 'NIEDSWET | Gallery')

@section('customHeader')
    <style>
        .card-img-top {
            height: 250px;
            object-fit: cover;
        }

        .table:not(.table-dark) th{
            font-size: 15px;
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
                                data-bs-target="#createAlbumModal">Create new album</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <h5 class="card-header">Albums</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Action</th>
                                <th>Change status</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($albums as $item)
                                <tr>
                                    <td>{{ $item->album_title }} <span
                                            class="badge badge-center rounded-pill bg-success">{{ $item->photos->count() }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.gallery.photos', ['id' => Crypt::encrypt($item->id)]) }}"
                                            class="btn btn-success">Add/Delete Image</a>
                                        <button class="btn btn-warning openEditModal"
                                            data-id="{{ Crypt::encrypt($item->id) }}">Edit</button>
                                        <button class="btn btn-danger deleteAlbum"
                                            data-id="{{ Crypt::encrypt($item->id) }}">Delete</button>
                                    </td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" class="testingUpdate" id="testingUpdate"
                                                data-id="{{ Crypt::encrypt($item->id) }}"
                                                {{ $item->status == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">**No albums found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Create album Modal --}}
    <div class="modal fade" id="createAlbumModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" id="createAlbumForm">
                <div class="modal-header">
                    <h5 class="modal-title">Create album</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="album_name" class="form-label">Album Name</label>
                        <input type="text" class="form-control" id="album_name" name="album_name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" id="closeModalBtn" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" id="createBtn" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Edit album Modal --}}
    <div class="modal fade" id="editAlbumModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" id="editAlbumForm">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Album</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="album_name" class="form-label">Album Name</label>
                        <input type="hidden" class="form-control" id="album_id" name="album_id">
                        <input type="text" class="form-control" id="edit_album_name" name="edit_album_name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" id="closeModalBtn" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" id="editBtn" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('customJs')
    {{-- Create album --}}
    <script>
        $('#createAlbumForm').on('submit', function(e) {
            e.preventDefault();

            let btn = $('#createBtn');
            let modal = $('#createAlbumModal');
            let actionUrl = "{{ route('admin.create.album') }}";
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
                        btn.text('Create');
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
                        btn.text('Create');
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
                    btn.text('Create');
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
            const id = $(this).data('id');
            $('#album_id').val(id);
            $('#editAlbumModal').modal('toggle');
        })
    </script>

    {{-- Update album --}}
    <script>
        $('#editAlbumForm').on('submit', function(e) {
            e.preventDefault();

            let btn = $('#editBtn');
            let modal = $('#editAlbumModal');
            let actionUrl = "{{ route('admin.update.album') }}";
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
                        btn.text('Update');
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
                        btn.text('Update');
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
                    btn.text('Update');
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

    {{-- Delete album --}}
    <script>
        $('.deleteAlbum').on('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "All images will be deleted",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let id = $(this).data('id');
                    let btn = $(this);
                    let actionUrl = "{{ route('admin.delete.album') }}";
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

    {{-- Change image status --}}
    <script>
        // Change status
        $(document.body).on('change', '#testingUpdate', function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var album_id = $(this).data('id');
            var formData = {
                album_id: album_id,
                active: status
            }
            $.ajax({
                type: "POST",
                url: "{{ route('admin.album.change.status') }}",
                data: formData,

                success: function(data) {
                    console.log(data)
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    console.log(errors);
                }
            });
        });
    </script>
@endsection
