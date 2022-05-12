@extends('admin.common.main')

@section('title', 'NIEDSWET | Our Work')

@section('customHeader')
    <style>
        .card-img,
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

    </style>
@endsection

@section('page_title', 'Our Work')

@section('main')
    <div class="container-xxl flex-grow-1 pt-4">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-9">
                        <div class="card-body">
                            <a href="{{ route('admin.ourwork.create') }}" type="button" class="btn btn-primary">Create
                                New</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl flex-grow-1">
        <div class="col-lg-12 mb-4 order-0">
            <div class="row mb-5">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3">
                        <img class="card-img-top"
                            src="https://images.unsplash.com/photo-1593240637899-5fc06c754c2b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=394&q=80"
                            alt="Featured image">
                        <div class="card-body">
                            <a target="_blank" href="{{ route('site.ourwork', ['id' => Crypt::encrypt(1)]) }} ">
                                <h5 class="card-title">Gate of Dr. Nobin Bordoloi College</h5>
                            </a>
                            <p class="card-text">
                                <small class="text-muted">Posted 3 days ago</small>
                            </p>
                            <a href="{{ route('admin.ourwork.edit', ['id' => Crypt::encrypt(1)]) }}"
                                class="btn btn-primary">Edit</a>
                            <button class="btn btn-danger deleteOurWorkBtn"
                                data-id="{{ Crypt::encrypt(1) }}">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('customJs')
    {{-- Delete blog --}}
    <script>
        $('.deleteOurWorkBtn').on('click', function() {
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
                    let actionUrl = "{{ route('admin.ourwork.delete') }}";
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
