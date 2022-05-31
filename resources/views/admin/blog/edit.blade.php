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
                    <form id="updateBlogForm">
                        <div class="mb-3">
                            <label class="form-label" for="blog_title">Blog title<sup>*</sup></label>
                            <input type="hidden" id="blog_id" name="blog_id" value="{{ Crypt::encrypt($blog->id) }}">
                            <input type="text" class="form-control" id="blog_title" name="blog_title"
                                value="{{ $blog->title }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="blog_category">Category<sup>*</sup></label>
                            <select id="blog_category" name="blog_category" class="form-select">
                                <option>Select...</option>
                                @forelse ($category as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $blog->category_id ? 'selected' : '' }}>
                                        {{ $item->category }}</option>
                                @empty
                                    <option value="" disabled>No data found</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="featured_image">Featured image<sup>*</sup></label>
                            <input type="file" class="form-control" id="featured_image" name="featured_image" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="blog_description">Blog description<sup>*</sup></label>
                            <textarea class="form-control" id="blog_description" name="blog_description" rows="3">
                                {{ $blog->description }}
                            </textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" id="updateBtn">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('customJs')
    {{-- Initialize CK Editor 5 --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        let editor;

        ClassicEditor
            .create(document.querySelector('#blog_description'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        }
                    ]
                }
            }).then(newEditor => {
                editor = newEditor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>

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
            files: [{
                source: "{{ asset($blog->image) }}",
            }]
        });
    </script>

    <script>
        $('#updateBlogForm').on('submit', function(e) {
            e.preventDefault();
            const editorData = editor.getData();
            const btn = $('#updateBtn');
            btn.text('Please wait...');
            btn.attr('disabled', true);

            const formData = new FormData(this);

            pondFiles = pond.getFiles();
            for (var i = 0; i < pondFiles.length; i++) {
                formData.append('blogImage', pondFiles[i].file);
            }
            formData.append('blogDescription', editorData);

            $.ajax({
                url: "{{ route('admin.blog.update') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status === 200) {
                        Swal.fire(
                            'Good job!',
                            data.message,
                            'success'
                        ).then(() => {
                            btn.text('Update');
                            btn.attr('disabled', false);
                            $('#createBlogForm').trigger('reset');
                            pond.removeFiles();
                            window.location.href = "{{ route('admin.blog.index') }}";

                        })
                    } else {
                        Swal.fire(
                            'Oops!',
                            data.message,
                            'error'
                        ).then(() => {
                            btn.text('Update');
                            btn.attr('disabled', false);
                        });
                    }
                },
                error: function(data) {
                    Swal.fire(
                        'Oops!',
                        'Server error',
                        'error'
                    ).then(() => {
                        btn.text('Update');
                        btn.attr('disabled', false);
                    })
                }

            });
        })
    </script>
@endsection
