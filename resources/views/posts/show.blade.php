<x-app-layout>

    <a href="{{ route('posts.index') }}"
       class=" inline-block text-blue-700 hover:underline hover:font-bold font-semibold text-sm w-full sm:w-auto text-center mt-6 mb-4">
        <i class="fa-solid fa-circle-arrow-left"></i>
        <span class="ml-1">Back To Posts</span>
    </a>

    <main class="bg-white rounded-lg p-6">
        <section class="flex justify-between items-center">
            <div class="flex gap-6">
                <h1 class="text-2xl font-semibold">{{ $post->title }} - {{ $post->id }}</h1>

                <div class=" flex gap-0.5 items-center">
                    <div class="bg-red-100 text-red-800 text-xs border border-red-600 font-semibold mr-2 px-2.5 py-0.5 rounded-lg ">
                        tags
                    </div>
                    <div class="bg-green-100 text-green-800 text-xs border border-green-600 font-semibold mr-2 px-2.5 py-0.5 rounded-lg ">
                        tags
                    </div>
                    <div class="bg-yellow-100 text-yellow-800 text-xs border border-yellow-600 font-semibold mr-2 px-2.5 py-0.5 rounded-lg ">
                        tags
                    </div>
                </div>
            </div>

            @if($post->user->id === auth()->user()->id)
                <div class="flex gap-2 font-semibold">
                    <a href="{{ route('posts.edit',[$post]) }}" class="text-blue-600 hover:text-blue-800 hover:underline">
                        <i class="fa-solid fa-pencil fa-xs"></i>
                        <span class="text-sm">Edit</span>
                    </a>
                    <form action="{{ route('posts.destroy',[$post]) }}" method="POST">
                        @csrf
                        @method('delete')
                    <button type="submit" class="text-red-600 hover:text-red-800 hover:underline border-0">
                        <i class="fa-solid fa-trash fa-xs"></i>
                        <span class="text-sm">Delete</span>
                    </button>
                    </form>
                </div>
            @endif
        </section>

        <div class="flex items-center gap-4 text-gray-400 mb-6 mt-4">
            <span class="text-sm">Published: {{ $post->created_at }}</span>
            <div class="flex items-center gap-1">
                <i class="fa-solid fa-user fa-xs"></i>
                <span class="text-sm ml-1">{{ $post->user->name }}</span>
            </div>

        </div>
        {{--POST DESC AND COMMENT LIST SECTION--}}
        <div class="flex gap-4">
            <div class="w-3/5 ">
                <p class="mb-2">{{ $post->description }}</p>

{{--                <a href="#"--}}
{{--                   class="flex text-md items-center gap-1 text-blue-600 font-semibold hover:text-blue-700 hover:underline">--}}
{{--                    <i class="fa-solid fa-thumbs-up fa-sm"></i>--}}
{{--                    <span class="text-sm font-semibold">16 Likes</span>--}}
{{--                </a>--}}

                <h1 class="text-lg font-semibold mt-4 mb-2 border-t pt-2 border-bgColor">Comments ({{ $post->comment()->count() }})</h1>
                {{--COMMENTS SECTION--}}
                @forelse($post->comment as $comment)
                    <div class="bg-bgColor rounded-lg border border-borderColor py-2 px-4 mb-2">
                        <div class="flex items-center justify-between">
                        <p class="text-sm font-bold">{{ $comment->user->name }}</p>
                            @if($comment->user->id === auth()->user()->id)
                                <div class="font-semibold">
                                    <form action="{{ route('comments.destroy',[$comment]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-red-600 hover:text-red-800 hover:underline border-0">
                                            <i class="fa-solid fa-trash fa-xs"></i>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                        <span class="text-xs text-gray-400 font-light ">Posted {{ $comment->created_at }}</span>
                        <p class="text-sm">{{ $comment->body }}</p>
                    </div>
                @empty
                    <div class="bg-bgColor rounded-lg border border-borderColor py-2 px-4 mb-4">
                       <p class="text-md font-semibold">No comment for this post. Please leave a comment!</p>
                    </div>
                @endforelse

            </div>

            {{--LEAVE A COMMENT SECTION--}}
            <div class="bg-bgColor w-2/5 rounded-lg text-gray-600 p-4 h-fit">
                <div class="flex justify-between items-center mb-2">
                    <p class="text-md font-semibold">Leave A Comments</p>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-comment fa-sm"></i>
                        <span class="text-sm font-bold">{{ $post->comment()->count() }}</span>
                    </div>
                </div>
                <form action="{{ route('comments.store',[$post]) }}" method="POST">
                    @csrf

                    <textarea name="body" id="body" cols="30" rows="3" placeholder="Leave a comment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1"></textarea>

                    @error('body')
                    <span class="text-xs font-medium text-red-500 mt-1">{{ $message }}</span>
                    @enderror

                    <button type="submit" class=" block mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs w-full sm:w-auto px-4 py-2 text-center">Submit</button>
                </form>
            </div>
        </div>

    </main>
</x-app-layout>
