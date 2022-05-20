@extends('admin.common.main')

@section('title', 'NIEDSWET | Dashboard')

@section('customHeader')
@endsection

@section('page_title', 'Dashboard')

@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Update password</h5>
                        <small class="text-muted float-end">Dashboard</small>
                    </div>
                    <div class="card-body">
                        <form id="updatePasswordForm">
                            <div class="mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="&#9733;&#9733;&#9733;&#9733;&#9733;&#9733;">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="cpassword">Confirm Password</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword"
                                    placeholder="&#9733;&#9733;&#9733;&#9733;&#9733;&#9733;">
                            </div>
                            <button type="submit" class="btn btn-primary" id="updateBtn">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
    <script>
        $('#updatePasswordForm').on('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            let btn = $('#updateBtn');
            let actionUrl = "{{ route('admin.password.update') }}";
            btn.text('Please wait...');
            btn.attr('disabled', true);
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
@endsection
