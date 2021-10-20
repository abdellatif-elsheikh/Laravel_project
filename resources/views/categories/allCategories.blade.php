@extends('layout')
{{-- Start CSS Links --}}
@section('css')
    <link rel="stylesheet" href="{{asset('css/index')}}">
@endsection
{{-- End CSS Links --}}

{{-- ---------Start Title---------- --}}
@section('title')
All Categories
@endsection
{{-- ---------End Title---------- --}}

{{-- Start Body Content --}}
@section('content')
@include('errors')

<section class="all-categories p-4 my-4">
    <div class="container">
        <a href="{{url('create/category')}}" class="btn btn-primary">Create Category</a>
        <div class="row my-4">
            @foreach ($somCats as $category)
                <div class="col-md-6 mb-4 d-flex flex-column">
                    <div class="p-3 bg-dark h-100 position-relative">
                        <img src='{{asset("uploads/$category->img")}}' alt="" name="img" class="img-fluid">
                        <h2 class="text-info mb-2">{{$category->name}}</h2>
                        <p class="text-white short-text">{{$category->desc}}</p>
                        <a href="{{url("AllCategories/$category->id")}}" class="btn btn-info justify-content-end align-items-end align-bottom">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
        {{$somCats->links()}}
    </div>
</section>

@endsection
{{-- End Body Content --}}