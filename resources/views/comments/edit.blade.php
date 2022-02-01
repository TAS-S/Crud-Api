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
                    <a href="{{ url('comments') }}" class="btn btn-danger float-end">Return</a>

                </div>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>

                    @endif
                    <form action="{{ url('comments/' . $comment->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                          <label for="post_id">Post id</label>
                          <input type="text" class="form-control" id="post_id" name="post_id" value={{ $comment->post_id }}>
                        </div>
                        <div class="form-group mb-3">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5" >{{ $comment->content }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="title">Author</label>
                            <input type="text" class="form-control" name="author" id="author" value={{ $comment->author }}>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
