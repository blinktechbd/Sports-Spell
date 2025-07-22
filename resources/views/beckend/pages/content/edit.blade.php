@extends('beckend.layouts.app')
@push('title')
    Edit
@endpush
@push('adminAppendCss')
    <link rel="stylesheet" href="{{ asset('/storage/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="{{ asset('/storage/admin/tinymce/skins/lightgray/skin.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
    <style>
        input.form-control-danger:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }

        .select2-container .select2-selection--single {
            height: 40px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 38px;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #cfc9c9;
        }

        .bootstrap-tagsinput {
            width: 100% !important;
            min-height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            line-height: 1.5;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            background-color: #fff;
        }

        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: white;
            background-color: #dc3545;
            padding: 0.2em 0.5em;
            border-radius: 3px;
        }
    </style>
@endpush
@section('admin-content')
    @push('breadcumb')
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-danger">Contents</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-danger" href="{{ route('contents.index') }}">Lists</a></li>
                    <li class="breadcrumb-item active text-danger">Edit</li>
                </ol>
            </div>
        </div>
    @endpush
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-lg-12">
                    <form action="{{ route('contents.update', $content->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card card-danger card-outline mb-4">
                            <div class="card-header">
                                <div class="card-title text-danger">Content Edit</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <div class="form-group" data-toggle="tooltip" data-placement="top"
                                            title="Category Name">
                                            <select name="category_id" id="category"
                                                class="form-control select2 select2-danger @error('category_id') is-invalid @enderror"
                                                data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                <option value="">Category Select</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if ($category->id == $content->category_id) selected @endif>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-group" data-toggle="tooltip" data-placement="top"
                                            title="Subcategory Name">
                                            <select name="subcategory_id" id="subcategory"
                                                class="form-control select2 select2-danger @error('subcategory_id') is-invalid @enderror"
                                                data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                <option value="">Select Subcategory</option>
                                                @foreach ($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}"
                                                        @if ($subcategory->id == $content->subcategory_id) selected @endif>
                                                        {{ $subcategory->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('subcategory_id')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-group" data-toggle="tooltip" data-placement="top"
                                            title="Select Author">
                                            <select name="author_id" id="author"
                                                class="form-control select2 select2-danger @error('author_id') is-invalid @enderror"
                                                data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                <option value="">Author Select</option>
                                                @foreach ($authors as $author)
                                                    <option value="{{ $author->id }}"
                                                        @if ($author->id == $content->author_id) selected @endif>
                                                        {{ $author->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('author_id')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" name="title"
                                            class="form-control form-control-danger @error('title') is-invalid @enderror"
                                            placeholder="Content Title" data-toggle="tooltip" data-placement="top"
                                            title="Content Title" value="{{ $content->title }}" />
                                        @error('title')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <div>
                                                <img class="w-25"
                                                    src="{{ asset('/storage/assets/images/blogs/' . $content->image) }}"
                                                    alt="content-image">
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="image"
                                                    class="form-control form-control-danger custom-file-input"
                                                    id="customFile" data-toggle="tooltip" data-placement="top"
                                                    title="Content Image">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            @error('image')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" name="caption"
                                            class="form-control form-control-danger @error('caption') is-invalid @enderror"
                                            placeholder="Image Caption" data-toggle="tooltip" data-placement="top"
                                            title="Image Caption" value="{{ $content->caption ?? '' }}" />
                                        @error('caption')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-group" data-toggle="tooltip" data-placement="top"
                                            title="Content Details">
                                            <textarea name="details" class="form-control" id="post_content" placeholder="Content Details">
                                                {{ $content->details }}
                                            </textarea>
                                            @error('details')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group" data-toggle="tooltip" data-placement="top"
                                            title="Content input tags">
                                            <input type="text" id="tags" name="tags" class="form-control"
                                                data-role="tagsinput" placeholder="Enter content input tags"
                                                value="{{ implode(',', json_decode($content->tags, true)) }}">
                                            @error('tags')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('adminAppendScripts')
    <script src="{{ asset('/storage/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/tinymce@5.10.0/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script src="{{ asset('/storage/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            bsCustomFileInput.init();
            //TinyMCE
            tinymce.init({
                selector: "textarea#post_content",
                contextmenu: false,
                height: 400,
                convert_urls: false,
                plugins: [
                    'advlist autolink lists link charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link insertCustomImage',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                setup: function(editor) {
                    editor.ui.registry.addButton('insertCustomImage', {
                        text: '',
                        icon: 'image',
                        onAction: function() {
                            let fileInputId = 'custom-upload-' + Date.now();
                            editor.windowManager.open({
                                title: 'Upload Image with Caption',
                                body: {
                                    type: 'panel',
                                    items: [{
                                            type: 'htmlpanel',
                                            html: `
                  <label for="${fileInputId}" style="display:block;margin-bottom:8px;font-weight:bold;">Choose Image:</label>
                  <input type="file" id="${fileInputId}" accept="image/*" style="margin-bottom:15px;" />
                `
                                        },
                                        {
                                            type: 'checkbox',
                                            name: 'caption',
                                            label: 'Add Caption',
                                        }
                                    ]
                                },
                                initialData: {
                                    caption: true
                                },
                                buttons: [{
                                        type: 'cancel',
                                        text: 'Cancel'
                                    },
                                    {
                                        type: 'submit',
                                        text: 'Upload & Insert',
                                        primary: true,
                                        classes: 'tox-insert-btn'
                                    }
                                ],
                                onSubmit: function(api) {
                                    const data = api.getData();
                                    const fileInput = document.getElementById(
                                        fileInputId);
                                    const file = fileInput.files[0];

                                    if (!file) {
                                        editor.windowManager.alert(
                                            'Please select an image file.');
                                        return;
                                    }

                                    const buttons = document.querySelectorAll(
                                        '.tox-dialog__footer .tox-button');
                                    let submitButton = null;
                                    buttons.forEach(btn => {
                                        if (btn.textContent.trim() ===
                                            'Upload & Insert') {
                                            submitButton = btn;
                                        }
                                    });
                                    const originalText = submitButton ?
                                        submitButton
                                        .innerText : 'Upload & Insert';
                                    if (submitButton) {
                                        submitButton.disabled = true;
                                        submitButton.innerText = 'Uploading...';
                                    }

                                    const formData = new FormData();
                                    formData.append('_token',
                                        '{{ csrf_token() }}');
                                    formData.append('file', file);

                                    const xhr = new XMLHttpRequest();
                                    xhr.open('POST',
                                        '{{ route('postImageUpload') }}',
                                        true);
                                    xhr.onload = function() {

                                        if (submitButton) {
                                            submitButton.disabled = false;
                                            submitButton.innerText =
                                                originalText;
                                        }

                                        if (xhr.status !== 200) {
                                            editor.windowManager.alert(
                                                'Upload failed.');
                                            return;
                                        }

                                        const res = JSON.parse(xhr
                                            .responseText);
                                        if (!res.file_path) {
                                            editor.windowManager.alert(
                                                'Invalid response from server.'
                                            );
                                            return;
                                        }

                                        const html = data.caption ?
                                            `<figure class="image w-100">
                                                <img class="w-100" src="${res.file_path}" alt="${file.name}" />
                                                <figcaption class="text-center"  style="background:#eaecee">Write caption here...</figcaption>
                                            </figure>`:
                                            `<figure class="image w-100" ><img class="w-100" src="${res.file_path}" alt="${file.name}"/></figure>`;

                                        editor.insertContent(html);
                                        api.close();
                                    };

                                    xhr.onerror = function() {
                                        if (submitButton) {
                                            submitButton.disabled = false;
                                            submitButton.innerText =
                                                originalText;
                                        }
                                        editor.windowManager.alert(
                                            'An error occurred while uploading.'
                                        );
                                    };

                                    xhr.send(formData);
                                }
                            });
                        }
                    });
                }
            });
            $('#category').on('change', function() {
                var categoryID = $(this).val();
                if (categoryID) {
                    $.ajax({
                        url: '/admin/get-subcategories/' + categoryID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#subcategory').empty().append(
                                '<option value="">Select Subcategory</option>');
                            $.each(data, function(key, value) {
                                $('#subcategory').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        },
                        error: function() {
                            alert('Unable to load subcategories.');
                        }
                    });
                } else {
                    $('#subcategory').empty().append('<option value="">Select Subcategory</option>');
                }
            });
        });
    </script>
@endpush
