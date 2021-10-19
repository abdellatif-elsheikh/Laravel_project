<div class="col-md-6 mb-4 d-flex flex-column">
    <div class="p-3 bg-dark h-100 position-relative">
        <h2 class="text-info mb-2">@yield('h2') </h2>
        <p class="text-white short-text">@yield('p') </p>
        <a href="{{ url("AllCategories/$category->id") }}"
            class="btn btn-info justify-content-end align-items-end align-bottom">Read More</a>
    </div>
</div>