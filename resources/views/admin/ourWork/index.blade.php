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
                @forelse ($works as $item)
                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3">
                            <img class="card-img-top" src="{{ asset($item->image) }}" alt="Featured image">
                            <div class="card-body">
                                <a target="_blank"
                                    href="{{ route('site.ourwork', ['id' => Crypt::encrypt($item->id)]) }} ">
                                    <h5 class="card-title">{{ $item->work_title }}</h5>
                                </a>
                                <p class="card-text">
                                    <small class="text-muted">Posted {{ $item->created_at->diffForHumans() }}
                                        ago</small>
                                </p>
                                <a href="{{ route('admin.ourwork.edit', ['id' => Crypt::encrypt($item->id)]) }}"
                                    class="btn btn-primary">Edit</a>
                                <button class="btn btn-danger deleteOurWorkBtn"
                                    data-id="{{ Crypt::encrypt($item->id) }}">Delete</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>*No data found</p>
                @endforelse
            </div>

            {{ $works->links() }}
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
