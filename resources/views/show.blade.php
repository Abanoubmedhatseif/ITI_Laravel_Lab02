@extends("layouts.app")

@section("body")
<div class="card" style="width: 18rem;">
    <img height="300" src="{{ asset('images/posts/' . $post['image']) }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $post['title'] }}</h5>
        <p class="card-text">Salary:{{ $post['body'] }}</p>
        <a href="{{ route('posts.home') }}" class="btn btn-danger">Back</a>

    </div>
</div>
@endsection
