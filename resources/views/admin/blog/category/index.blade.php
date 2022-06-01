@extends('admin.common.main')

@section('title', 'NIEDSWET | Blog Category')

@section('customHeader')
    <style>
        .table:not(.table-dark) th {
            font-size: 15px;
        }

    </style>
@endsection

@section('page_title', 'Blog Category')

@section('main')
    <div class="container-xxl flex-grow-1 pt-4">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-9">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#createCategoryModal">
                                Create New
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header">Categories</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Created at</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($categories as $item)
                                <tr>
                                    <td>
                                        <strong>{{ $item->category }}</strong>
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" class="testingUpdate" id="testingUpdate"
                                                data-id="{{ Crypt::encrypt($item->id) }}"
                                                {{ $item->status == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-success openEditCategoryModal"
                                            data-id="{{ Crypt::encrypt($item->id) }}">Edit</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">**No categories found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Create category modal --}}
    <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create new category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="createNewCategoryForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Category title</label>
                                <input type="text" id="caegory_title" name="caegory_title" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary" id="createCategoryBtn">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit category modal --}}
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="updateCategoryForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Category title</label>
                                <input type="hidden" id="edit_category_id" name="edit_category_id">
                                <input type="text" id="edit_caegory_title" name="edit_caegory_title" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary" id="updateCategoryBtn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('customJs')
    {{-- Create category --}}
    <script>
        $('#createNewCategoryForm').on('submit', function(e) {
            e.preventDefault();
            const btn = $('#createCategoryBtn');
            const modal = $('#createCategoryModal');
            btn.text('Please wait...');
            btn.attr('disabled', true);
            const formData = new FormData(this);
            $.ajax({
                url: "{{ route('admin.blog.category.create') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status === 200) {
                        btn.text('Create');
                        btn.attr('disabled', false);
                        $('#createNewCategoryForm').trigger('reset');
                        modal.modal('toggle');
                        Swal.fire(
                            'Good job!',
                            data.message,
                            'success'
                        ).then(() => {
                            location.reload(true);
                        })
                    } else {
                        btn.text('Create');
                        btn.attr('disabled', false);
                        modal.modal('toggle');
                        Swal.fire(
                            'Oops!',
                            data.message,
                            'error'
                        );
                    }
                },
                error: function(data) {
                    btn.text('Create');
                    btn.attr('disabled', false);
                    modal.modal('toggle');
                    Swal.fire(
                        'Oops!',
                        'Server error',
                        'error'
                    );
                }

            });
        })
    </script>

    {{-- Open edit category modal --}}
    <script>
        $('.openEditCategoryModal').on('click', function(e) {
            e.preventDefault();
            const category_id = $(this).data('id');
            const formData = {
                category_id: category_id
            }
            $.ajax({
                url: "{{ route('admin.blog.category.get') }}",
                type: "POST",
                data: formData,
                success: function(data) {
                    if (data.status === 200) {
                        $('#edit_caegory_title').val(data.name);
                        $('#edit_category_id').val(data.id);
                        $('#editCategoryModal').modal('toggle');
                    } else {
                        Swal.fire(
                            'Oops!',
                            data.message,
                            'error'
                        );
                    }
                },
                error: function(data) {
                    Swal.fire(
                        'Oops!',
                        'Server error',
                        'error'
                    );
                }

            });
        });
    </script>

    {{-- Update category name --}}
    <script>
        $('#updateCategoryForm').on('submit', function(e) {
            e.preventDefault();
            const btn = $('#updateCategoryBtn');
            const modal = $('#editCategoryModal');
            btn.text('Please wait...');
            btn.attr('disabled', true);
            const formData = new FormData(this);
            $.ajax({
                url: "{{ route('admin.blog.category.update') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status === 200) {
                        btn.text('Update');
                        btn.attr('disabled', false);
                        $('#updateCategoryForm').trigger('reset');
                        modal.modal('toggle');
                        Swal.fire(
                            'Good job!',
                            data.message,
                            'success'
                        ).then(() => {
                            location.reload(true);
                        })
                    } else {
                        btn.text('Update');
                        btn.attr('disabled', false);
                        modal.modal('toggle');
                        Swal.fire(
                            'Oops!',
                            data.message,
                            'error'
                        );
                    }
                },
                error: function(data) {
                    btn.text('Update');
                    btn.attr('disabled', false);
                    modal.modal('toggle');
                    Swal.fire(
                        'Oops!',
                        'Server error',
                        'error'
                    );
                }
            });
        })
    </script>

    {{-- Change status --}}
    <script>
        // Change status
        $(document.body).on('change', '#testingUpdate', function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var category_id = $(this).data('id');
            var formData = {
                category_id: category_id,
                active: status
            }
            $.ajax({
                type: "POST",
                url: "{{ route('admin.blog.category.change.status') }}",
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
