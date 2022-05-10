@extends('admin.common.main')

@section('title', 'NIEDSWET | Create Blog')

@section('customHeader')
@endsection

@section('page_title', 'Blog')

@section('main')
    <div class="container-xxl flex-grow-1 pt-4">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit blog</h5>
                    <small class="text-muted float-end">Blog</small>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="blog_title">Blog title<sup>*</sup></label>
                            <input type="text" class="form-control" id="blog_title" name="blog_title">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="blog_category">Category<sup>*</sup></label>
                            <select id="blog_category" name="blog_category" class="form-select">
                                <option>Select...</option>
                                <option value="1">Political</option>
                                <option value="2">Assam</option>
                                <option value="3">India</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="featured_image">Featured image<sup>*</sup></label>
                            <input type="file" class="form-control" id="featured_image" name="featured_image">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="blog_description">Category<sup>*</sup></label>
                            <textarea class="form-control" id="blog_description" name="blog_description" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('customJs')
<script>
    // Create a FilePond instance
    const pond = FilePond.create(document.getElementById('featured_image'), {
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
@endsection
