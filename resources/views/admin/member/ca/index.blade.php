@extends('admin.common.main')

@section('title', 'NIEDSWET | Members')

@section('customHeader')
    <style>
        .card-img-top {
            height: 250px;
            object-fit: cover;
        }

    </style>
@endsection

@section('page_title', 'Chartered Accountant')

@section('main')
    <div class="container-xxl flex-grow-1 pt-4">
        <div class="row mb-5">
            @forelse ($members as $item)
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ asset($item->image) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">
                                Designation: {{ $item->designation }}
                            </p>

                            <p class="card-text">
                                Bio: {{ Str::limit(strip_tags($item->bio), 100, '...') }}
                            </p>
                            <a href="{{ route('site.about.team') }}" target="_blank" class="btn btn-success">View</a>
                            <a href="{{ route('admin.member.edit', ['category' => 'advisor', 'id' => Crypt::encrypt($item->id)]) }}"
                                class="btn btn-warning">Edit</a>
                            <button class="btn btn-danger deleteBtn"
                                data-id="{{ Crypt::encrypt($item->id) }}">Delete</button>
                        </div>
                    </div>
                </div>
            @empty
                <p>*No data found</p>
            @endforelse
        </div>
    </div>
@endsection

@section('customJs')
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
                    let actionUrl = "{{ route('admin.member.delete') }}";
                    let formData = {
                        id: id
                    }
                    btn.text('Deleting...');
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
