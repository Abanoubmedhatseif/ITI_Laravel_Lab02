@extends("layouts.app")

@section("content")
    <h1>Delete Post</h1>
    <form action="{{ route('post.destroy', $post['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <p>Are you sure you want to delete this post?</p>
        <x-button type="danger">Delete</x-button>
    </form>
@endsection
