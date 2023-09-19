@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Edit Achievement</title>
@endsection

@section('main_content')
<div class="card-header">
    <h3>Update Achievement</h3>
</div>
<div class=" container">
    <form action="{{ route('achievement.update', $dataAchievement['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="name" class="form-label">Name</label>
            <input name="name" value="{{ old('name', $dataAchievement->name) }}" type="text" class="form-control @error('name') is-invalid @enderror" onkeyup="autoSlug(this.value)">
            @error('name')
            <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6 mt-4">
            <label for="description" class="form-label">Description</label>
            <input name="description" type="text" value="{{ old('description', $dataAchievement->description) }}" class="form-control @error('description') is-invalid @enderror">
            @error('description')
            <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6 mt-4">
            <label for="slug" class="form-label">Slug</label>
            <input name="slug" type="text" value="{{ old('slug', $dataAchievement->slug) }}" class="form-control @error('slug') is-invalid @enderror" id="slug" readonly="readonly">
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
            <label for="points" class="form-label">Points</label>
            <input name="points" type="text" value="{{ old('points', $dataAchievement->points) }}" class="form-control @error('points') is-invalid @enderror">
            @error('points')
            <span class="invalid-feedback" style="font-size: 100%;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6 mt-4">
            <label for="icon">Icon</label>
            <input value="icon" type="file" class=" form-control @error('icon') is-invalid @enderror border-0 bg-light pl-0" name="icon" id="icon" hidden>
            <div class=" choose-avatar">
                <div id="btnimage">
                    <img id="showImage" style="width: 150px" class="show-avatar" src="{{ asset($dataAchievement->icon) }}" alt="avatar">
                </div>
                <div id="button">
                    <i id="btn_chooseImg" class="fa fa-camera mt-2"></i>
                </div>
            </div>
            @error('icon')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-success disabled" id="submit-button">Update</button>
        </div>
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/user.js') }}"></script>
<script>
    const slugOld = <?php echo json_encode($dataAchievement->slug) ?>;
    const idSlug = <?php echo json_encode($dataAchievement->id) ?>;
    autoSlug(slugOld);

    function autoSlug(string) {
        let lowCase = string.toLowerCase();
        let replace = lowCase.replace(" ", "-");
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
            url: '/former-slug',
            type: 'GET',
            data: {
                'slug': replace,
                'type': 'update',
                'id': idSlug
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
            }
        });
    }
</script>
@endsection
