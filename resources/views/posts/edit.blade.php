<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Edit Post
                    <a href="{{ url('posts') }}" class="btn btn-danger float-end">Return</a>

                </div>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>

                    @endif
                    <form action="{{ url('posts/' . $post->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" id="title" name="title" value={{ $post->title }}>
                        </div>
                        <div class="form-group mb-3">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5" >{{ $post->content }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="title">Author</label>
                            <input type="text" class="form-control" name="author" id="author" value={{ $post->author }}>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
