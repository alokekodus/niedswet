@extends('admin.common.main')

@section('title', 'NIEDSWET | Gallery')

@section('customHeader')
@endsection

@section('page_title', 'Events')

@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-9">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addNewEventModal">Add new</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse ($events as $item)
                <div class="col-md-4 col-lg-4 mb-4">
                    <div class="card h-100">
                        <a href="{{ asset($item->image) }}" target="_blank"><img class="card-img-top"
                                src="{{ asset($item->image) }}" alt="Event image"></a>
                        <div class="card-body">
                            <h5 class="card-title">Event date: <span
                                    class="badge bg-success">{{ $item->event_date }}</span></h5>
                            <p class="card-text"><small class="text-muted">Created at
                                    {{ $item->created_at }}</small></p>
                            <button class="btn btn-sm btn-warning openUpdateModalBtn"
                                data-id="{{ Crypt::encrypt($item->id) }}">Update</button>
                            <button class="btn btn-sm btn-danger deleteBtn"
                                data-id="{{ Crypt::encrypt($item->id) }}">Delete</button>
                        </div>
                    </div>
                </div>
            @empty
                <p>*No data found</p>
            @endforelse
        </div>
    </div>

    {{-- Add new modal --}}
    <div class="modal fade" id="addNewEventModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" id="addNewEventForm">
                    <div class="modal-body">
                        <div class="col mb-3">
                            <label for="event_title" class="form-label">Event Title</label>
                            <input type="text" id="event_title" name="event_title" class="form-control"
                                placeholder="Enter event title" required>
                        </div>
                        <div class="col mb-3">
                            <label for="event_date" class="form-label">Event Date</label>
                            <input type="date" id="event_date" name="event_date" class="form-control" required>
                        </div>
                        <div class="col mb-3">
                            <label for="event_image" class="form-label">Event Image</label>
                            <small> **Image size not more than 1MB</small>
                            <input type="file" id="event_image" name="event_image" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary" id="addEventBtn">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Update modal --}}
    <div class="modal fade" id="updateEventModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Update Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" id="updateEventForm">
                    <div class="modal-body">
                        <div class="col mb-3">
                            <label for="edit_event_title" class="form-label">Event Title</label>
                            <input type="text" id="edit_event_title" name="edit_event_title" class="form-control"
                                placeholder="Enter event title">
                        </div>
                        <div class="col mb-3">
                            <label for="edit_event_date" class="form-label">Event Date</label>
                            <input type="date" id="edit_event_date" name="edit_event_date" class="form-control">
                        </div>
                        <div class="col mb-3">
                            <label for="edit_event_image" class="form-label">Event Image</label>
                            <small> **Image size not more than 1MB</small>
                            <input type="file" id="edit_event_image" name="edit_event_image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary" id="updateEventBtn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('customJs')
    <script>
        // Create a FilePond instance
        const pond_1 = FilePond.create(document.getElementById('event_image'), {
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
        const pond_2 = FilePond.create(document.getElementById('edit_event_image'), {
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

    {{-- Add event --}}
    <script>
        $('#addNewEventForm').on('submit', function(e) {
            e.preventDefault();

            let btn = $('#addEventBtn');
            let modal = $('#addNewEventModal');
            let actionUrl = "{{ route('admin.event.add') }}";
            btn.text('Please wait...');
            btn.attr('disabled', true);
            let formData = new FormData(this);
            pondFiles = pond_1.getFiles();
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
                        pond_1.removeFiles();
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
                        pond_1.removeFiles();
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
                    pond_1.removeFiles();
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

    {{-- Open update modal --}}
    <script>
        $('.openUpdateModalBtn').on('click', function() {
            $('#updateEventModal').modal('toggle');
        });
    </script>

    {{-- Update event --}}
    <script>
        $('#updateEventForm').on('submit', function(e) {
            e.preventDefault();

            let btn = $('#updateEventBtn');
            let modal = $('#updateEventModal');
            let actionUrl = "{{ route('admin.event.update') }}";
            btn.text('Please wait...');
            btn.attr('disabled', true);
            let formData = new FormData(this);
            pondFiles = pond_2.getFiles();
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
                        pond_2.removeFiles();
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
                        pond_2.removeFiles();
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
                    pond_2.removeFiles();
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

    {{-- Delete event --}}
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
                    let actionUrl = "{{ route('admin.event.delete') }}";
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
