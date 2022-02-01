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
                    Comments
                    <a href="{{ url('comments/create') }}" class="btn btn-primary float-end">Add comment</a>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>

                @endif
                    <table class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Content</th>
                            <th scope="col">Author</th>
                            <th scope="col">Post</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($comment as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->content }}</td>
                                <td>{{ $item->author }}</td>
                                <td>{{ $item->post->title }}</td>
                                <td>

                                    <a href="{{ url('comments/' . $item->id . '/edit', ) }}" class="btn btn-sm btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ url('comments/' . $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach


                        </tbody>
                      </table>

                      {{ $comment->links() }}


                </div>
            </div>
        </div>
    </div>


</x-app-layout>
