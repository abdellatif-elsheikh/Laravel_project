@extends('layout')
{{-- Start CSS Links --}}
@section('css')
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
@endsection
{{-- End CSS Links --}}

{{-- ---------Start Title---------- --}}
@section('title')
    Create Category
@endsection
{{-- ---------End Title---------- --}}

{{-- Start Body Content --}}
@section('content')
    <div class="layer">
        <div class="container">
            <form action="{{ url('save/category') }}" method="POST" class="form m-auto" enctype="multipart/form-data">
                @csrf
                @include('errors')
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Category Deascreption</label>
                    <textarea class="form-control" name="desc" id="desc" rows="10"></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" name="img" id="formFile">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
{{-- End Body Content --}}

{{-- Start javScript connection --}}
@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
{{-- End javScript connection --}}
