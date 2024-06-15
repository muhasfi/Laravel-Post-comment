<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card bg-white shadow-xl">
                <div class="card-body">  
                        <form action="{{ route('posts.store') }}" method="POST">
                            @csrf
                            <textarea name="content" class="textarea textarea-bordered w-full" placeholder="Apa yang kamu pikirkan" rows="3"></textarea>
                            <input type="submit" value="Post" class="btn btn-primary">
                        </form>                   
                </div>
            </div>
              
            @foreach ($posts as $post)
            <div class="card my-4 bg-white shadow-xl">
                <div class="card-body">
                    <h2 class="text-xl">{{ $post->user->name }} - <span class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</span></h2>
                    <p>{{ $post->content }}</p>
                    <div class="text-end">
                        @can('update', $post)
                        <a href="{{ route('posts.edit', $post->id) }}"class="link link-hover text-blue-400"><button class="btn btn-active btn-secondary btn-sm">Edit</button></a>
                        @endcan

                        @can('delete', $post)
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-error btn-sm">Hapus</button>
                        </form>   
                        @endcan

                    </div>
                        <div>
                            <a href="{{ route('posts.comment', $post) }}" class="link link-primary mx-3 my-3">Comment ({{ $post->comments_count }})</a>
                        </div>
                </div>
            </div>
            @endforeach
            

            

        </div>
    </div>
</x-app-layout>
