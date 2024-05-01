@extends("layouts.app")

@section("content")
    <h1>update Post</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('post.update', $post['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value='@php echo $post['title'] @endphp'><br>

        <label for="body">Body:</label><br>
        <input type="text" id="body" name="body" value='@php echo $post['body'] @endphp'><br>

        <label for="description">Description:</label><br>
        <input type="text" id="description" name="description" value='@php echo $post['description'] @endphp'><br>

        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image"><br>

        <x-button type="info">Submit</x-button>
    </form>
@endsection
