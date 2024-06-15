<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Comment
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card my-4 bg-white shadow-xl">
                <div class="card-body">
                    <h2 class="text-xl">{{ $post->user->name }} - <span class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</span></h2>
                    <p>{{ $post->content }}</p>
                </div>
            </div>
        
            <div class="card bg-white shadow-xl">
                <div class="card-body">  
                        <form action="{{ route('comment.store', $post->id) }}" method="POST">
                            @csrf
                            <textarea name="content" class="textarea textarea-bordered w-full" placeholder="Apa yang kamu pikirkan" rows="3"></textarea>
                            <input type="submit" value="Post" class="btn btn-primary">
                        </form>                   
                </div>
            </div>
        
            <h2 class="text-4xl my-4">Comments</h2>

            @foreach ($comments as $comment)
            <div class="card my-4 bg-white shadow-xl">
                <div class="card-body">
                    <h2 class="text-xl">{{ $comment->user->name }} - <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span></h2>
                    <p>{{ $comment->content }}</p>
                </div>
            </div>
            @endforeach
            

        </div>
    </div>

</x-app-layout>