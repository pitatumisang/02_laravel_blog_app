<x-app-layout>

<div class="flex justify-between items-center">
    <a href="{{ route('posts.create') }}" class="inline-block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-4 py-2 text-center mt-4">Create
        New Post</a>
</div>

    <main class="rounded-lg mt-6 flex gap-4">

        <section class="w-[65%]">

            @forelse($posts as $post)
                <div class="bg-white rounded-lg mb-4 p-4">
                    <div class="flex justify-between items-center mb-2">
                        <a href="{{ route('posts.show',[$post]) }}" class="hover:text-primaryColor hover:underline">
                            <p class="text-xl font-semibold">{{ $post->title }}</p>
                        </a>
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

                    </div>

                    <p class="mb-2"> {{ Str::words($post->description,15,' ...') }} </p>

                    <div class=" flex gap-0.5 mb-3">
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

                    <div class="flex justify-between items-center text-gray-600">

                        <a href="{{ route('posts.show',[$post]) }}"
                           class="flex items-center gap-1  font-semibold hover:text-blue-700 hover:underline">
                            <i class="fa-solid fa-comment fa-sm"></i>
                            <span class="text-xs">{{ $post->comment()->count() }} Comments</span>
                        </a>

                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-user fa-xs"></i>
                                <span class="text-sm ">{{ $post->user->name }}</span>
                            </div>

                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-clock fa-xs"></i>
                                <span class="text-xs ">{{ $post->updated_at }}</span>
                            </div>

                        </div>
                    </div>

                </div>
            @empty
                <div class="bg-white rounded-lg mb-4 p-4">
                    <p class="text-xl font-semibold">There are no posts yet!</p>
                </div>
            @endforelse

        </section>
        <aside class="h-fit w-[35%] bg-white rounded-lg p-4 border border-borderColor ">
            <p class="text-xl font-semibold">Posts with most comments</p>
            <div class="bg-blue-600 h-[0.2rem] w-20 mb-4 mt-2"></div>

            <div class="flex items-center justify-between border-b border-gray-200 p-2 mb-1 text-gray-600">
                <p class="text-sm font-bold">Post One</p>
                <a href="#" class="text-xs font-bold bg-gray-300 rounded-2xl px-3 py-1 text-gray-600 hover:border hover:border-gray-400">Read More</a>
            </div>
            <div class="flex items-center justify-between border-b border-gray-200 p-2 mb-1 text-gray-600">
                <p class="text-sm font-bold">Post One</p>
                <a href="#" class="text-xs font-bold bg-gray-300 rounded-2xl px-3 py-1 text-gray-600 hover:border hover:border-gray-400">Read More</a>
            </div>
            <div class="flex items-center justify-between border-b border-gray-200 p-2 mb-1 text-gray-600">
                <p class="text-sm font-bold">Post One</p>
                <a href="#" class="text-xs font-bold bg-gray-300 rounded-2xl px-3 py-1 text-gray-600 hover:border hover:border-gray-400">Read More</a>
            </div>

        </aside>
    </main>

</x-app-layout>
