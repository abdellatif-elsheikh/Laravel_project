@extends('layout')
{{-- Start CSS Links --}}
@section('css')
@endsection
{{-- End CSS Links --}}

{{-- ---------Start Title---------- --}}
@section('title')
All Categories
@endsection
{{-- ---------End Title---------- --}}

{{-- Start Body Content --}}
@section('content')

<section class="category my-4">
    <div class="container bg-light text-dark p-5">
        <h1>{{$category->name}}</h1>
        <p class="my-3">{{$category->desc}}</p>
        <a href="{{url()->previous()}}" class="btn btn-dark px-5">Back</a>
        <a href="{{url("edit/category/page/$category->id")}}" class="btn btn-outline-info">Edit</a>
        <form class="my-3" action="{{url("dlete/category/$category->id")}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-outline-danger">Delete</button>
        </form>
    </div>
</section>

@endsection
{{-- End Body Content --}}