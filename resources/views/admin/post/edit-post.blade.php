@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Create Post</title>
@endsection

@section('js_sort_users')
<link rel="stylesheet" href="{{ asset('css/page/user.css') }}" />
@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('main_content')
<div class="card-header">
    <h3>Create Post</h3>
</div>
<div class=" container">
    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data" id="post-form">
        @csrf
        <div class="col-md-6">
            <label for="title" class="form-label">Title</label>
            <input name="title" value="{{ $post->title ? $post->title : old('title') }}" type="text" class="form-control @error('name') is-invalid @enderror" onkeyup="autoSlug(this.value)">
            @error('title')
            <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6 mt-4">
            <label for="content" class="form-label">Content</label>
            <textarea id="editor">
            </textarea>
            @error('content')
            <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6 mt-4">
            <label for="slug" class="form-label">Slug</label>
            <input name="slug" type="text" value="{{ $post->slug ? $post->slug : old('slug') }}" class="form-control @error('slug') is-invalid @enderror" id="slug" readonly="readonly">
            @error('slug')
            <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-2 mt-4">
            <img width="30" height="30" src="{{ asset('images/loading.gif') }}" class="d-none" id="loading-img" class="ml-3" />
            <img width="30" height="30" src="{{ asset('images/v-check-mark.png') }}" class="d-none" id="v-check-mark-img" class="ml-3" />
            <img width="30" height="30" src="{{ asset('images/x-check-mark.png') }}" class="d-none" id="x-check-mark-img" class="ml-3" />
        </div>
        <div class="col-md-6 mt-4">
            <label for="category" class="form-label">Category</label>
            <input name="category" type="text" value="{{ $post->category ? $post->category : old('category') }}" class="form-control @error('category') is-invalid @enderror">
            @error('category')
            <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6 mt-4">
            <label for="thumb">Thumb</label>
            <input value="" type="file" class=" form-control @error('thumb') is-invalid @enderror border-0 bg-light pl-0" name="thumb" id="thumb" hidden>
            <div class=" choose-avatar">
                <div id="btnimage">
                    <img id="showImage" style="width: 150px" class="show-avatar" src="{{ url($post->thumb) }}" alt="avatar">
                </div>
                <div id="button">
                    <i id="btn_chooseImg" class="fa fa-camera mt-2"></i>
                </div>
            </div>
            @error('thumb')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <input type="hidden" name="content" id="content" value="" />
        <div class="col-12 mt-4">
            <button type="button" class="btn btn-success" id="submit-button">Update</button>
        </div>
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/user.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<script>
    var editor;
    var content = <?php echo json_encode($post->content) ?>;

    ClassicEditor
        .create(document.querySelector('#editor'), {
            htmlSupport: {
                allow: [{
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }]
            }
        })
        .then(editor => {
            window.editor = editor;

            editor.setData(content);
        })
        .catch(error => {
            console.error(error);
        });

    function autoSlug(string) {
        let lowCase = string.toLowerCase();
        let replace = lowCase.replaceAll(" ", "-");
        let slugElement = document.getElementById('slug');
        let loadingImg = document.getElementById('loading-img');
        let vCheckImg = document.getElementById('v-check-mark-img');
        let xCheckImg = document.getElementById('x-check-mark-img');
        let submitButton = document.getElementById('submit-button');
        loadingImg.classList.remove('d-none');
        vCheckImg.classList.add('d-none');
        xCheckImg.classList.add('d-none');
        submitButton.classList.add('disabled');
        slugElement.value = replace;

        $.ajax({
            url: '/former-slug-post',
            type: 'GET',
            data: {
                'slug': replace,
                'type': 'create'
            }
        }).done(function(result) {
            loadingImg.classList.add('d-none');
            if (result) {
                vCheckImg.classList.remove('d-none');
                xCheckImg.classList.add('d-none');
                submitButton.classList.remove('disabled');
            } else {
                vCheckImg.classList.add('d-none');
                xCheckImg.classList.remove('d-none');
                xCheckImg.classList.add('disabled');
                submitButton.classList.add('disabled');
            }
        });
    }

    $('#btn_chooseImg').on('click', function() {
        $('#thumb').click();
    });

    $('#thumb').change(function() {
        readURL(this, '#showImage');
    });

    $('#submit-button').on('click', function() {
        $('#content').val(editor.getData());

        $('#post-form').submit();
    });

    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(id).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
