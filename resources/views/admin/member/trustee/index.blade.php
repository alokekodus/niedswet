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

@section('page_title', 'Trustee')

@section('main')
    <div class="container-xxl flex-grow-1 pt-4">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-9">
                        <div class="card-body">
                            <a href="{{ route('admin.trustee.add') }}" type="button" class="btn btn-primary">
                                Add Trustee
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                    <img class="card-img-top"
                        src="https://images.unsplash.com/photo-1494797262163-102fae527c62?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Binoy K. Bordoloi</h5>
                        <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p>
                        <a href="{{ route('site.about.team') }}" target="_blank" class="btn btn-success">View</a>
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
@endsection
