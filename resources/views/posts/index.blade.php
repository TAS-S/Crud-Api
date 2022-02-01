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
                    Posts
                    <a href="{{ url('posts/create') }}" class="btn btn-primary float-end">Add post</a>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>

                @endif
                    <table class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Author</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($post as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->content }}</td>
                                <td>{{ $item->author }}</td>
                                <td>

                                    <a href="{{ url('posts/' . $item->id . '/edit', ) }}" class="btn btn-sm btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ url('posts/' . $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    {{-- <a href="{{ url('posts/' . $item->id) }}" class="btn btn-sm btn-danger">Delete</a> --}}
                                </td>
                              </tr>
                            @endforeach


                        </tbody>
                      </table>

                      {{ $post->links() }}


                </div>
            </div>
        </div>
    </div>


</x-app-layout>
