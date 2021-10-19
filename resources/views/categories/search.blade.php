@extends('layout')

{{-- CSS --}}
@section('css')

@endsection
{{-- Title --}}
@section('title')
    Search
@endsection

{{-- Page Content --}}
@section('search')
    {{"$keyword"}}
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-6 mb-4 d-flex flex-column">
                    <div class="p-3 bg-dark h-100 position-relative">
                        <h2 class="text-info mb-2">{{ $category->name }}</h2>
                        <p class="text-white short-text">{{ $category->desc }}</p>
                        <a href="{{ url("AllCategories/$category->id") }}"
                            class="btn btn-info justify-content-end align-items-end align-bottom">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
        {{$categories->links()}}
    </div>
@endsection

{{-- JavaScript --}}
@section('js')

@endsection
