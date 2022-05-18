@extends('admin.common.main')

@section('title', 'NIEDSWET | Add new trustee')

@section('customHeader')
@endsection

@section('page_title', 'Trustee')

@section('main')
    <div class="container-xxl flex-grow-1 pt-4">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add trustee</h5>
                        <small class="text-muted float-end">Trustee</small>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label" for="name">Full Name<sup>*</sup></label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="designation">Designation<sup>*</sup></label>
                                <input type="text" class="form-control" id="designation" name="designation">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="fb_link">Facebook link</label>
                                <input type="text" id="fb_link" name="fb_link" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tw_link">Twitter link</label>
                                <input type="text" id="tw_link" name="tw_link" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="google_link">Google link</label>
                                <input type="text" id="google_link" name="google_link" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Description</label>
                                <textarea id="description" name="description" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
@endsection
