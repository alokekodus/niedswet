@extends('admin.common.main')

@section('title', 'NIEDSWET | View member details')

@section('customHeader')
<style>
    .member_image{
        width: 200px;
        margin-bottom: 20px;
    }
</style>
@endsection

@section('page_title', 'View member details')

@section('main')
    <div class="container-xxl flex-grow-1 pt-4">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="text-center">
                            <img class="member_image" src="{{ asset($member->image) }}" alt="Image">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name">Member Name<sup>*</sup></label>
                            <input type="text" class="form-control" value="{{ $member->name }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Member Category<sup>*</sup></label>
                            <input type="text" class="form-control" value="{{ $member->category }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="designation">Member Designation<sup>*</sup></label>
                            <input type="text" class="form-control" value="{{ $member->designation }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="fb_link">Member Facebook link</label>
                            <input type="text" class="form-control" value="{{ $member->fb_link }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tw_link">Member Twitter link</label>
                            <input type="text" class="form-control" value="{{ $member->tw_link }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="linkedin_link">Member Linkedin link</label>
                            <input type="text" class="form-control" value="{{ $member->linkedin_link }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bio">Member Bio</label>
                            {!! $member->bio !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
@endsection
