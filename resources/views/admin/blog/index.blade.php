@extends('admin.common.main')

@section('title', 'NIEDSWET | Blog')

@section('customHeader')
@endsection

@section('page_title', 'Blog')

@section('main')
    <div class="container-xxl flex-grow-1 pt-4">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-9">
                        <div class="card-body">
                            <a href="{{ route('admin.blog.create') }}" type="button" class="btn btn-primary">Create New</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl flex-grow-1">
        <div class="col-lg-12 mb-4 order-0">
            <div class="row mb-5">
                @for ($i = 1; $i <= 9; $i++)
                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3">
                            <img class="card-img-top"
                                src="https://images.unsplash.com/photo-1620662831351-9f68f76d0b9a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                                alt="Featured image">
                            <div class="card-body">
                                <a target="_blank" href="{{ route('site.blogs', ['id' => Crypt::encrypt($i)]) }}">
                                    <h5 class="card-title">Card title</h5>
                                </a>
                                <p class="card-text">
                                    This is a wider card with supporting text below as a natural lead-in to additional
                                    content.
                                    This
                                    content is a little bit longer.
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                                <a href="{{ route('admin.blog.edit', ['id' => Crypt::encrypt($i)]) }}"
                                    class="btn btn-primary">Edit</a>
                                <button class="btn btn-danger deleteBlogBtn"
                                    data-id="{{ Crypt::encrypt($i) }}">Delete</button>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>


@endsection

@section('customJs')
    {{-- Delete image --}}
    <script>
        $('.deleteBlogBtn').on('click', function() {
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
                    let actionUrl = "{{ route('admin.blog.delete') }}";
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
