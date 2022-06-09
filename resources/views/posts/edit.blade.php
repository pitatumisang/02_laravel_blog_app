<x-app-layout>

    <a href="{{ route('posts.show',[$post]) }}"
       class="inline-block text-blue-700 hover:underline hover:font-bold font-semibold text-sm w-full sm:w-auto text-center mt-6 mb-4">
        <i class="fa-solid fa-circle-arrow-left"></i>
        <span class="ml-1">Back</span>
    </a>

    <a href="{{ route('posts.show',[$post]) }}" class="block text-2xl font-semibold mb-4 hover:underline hover:text-blue-700">Edit Post - {{ $post->id }} </a>
    <main class="bg-white rounded-lg p-6">
        <form action="{{ route('posts.update',[$post]) }}" method="POST">
            @csrf
            @method('put')

            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-gray-300">Post
                    Title</label>
                <input type="text" name="title" id="title" value="{{ $post->title }}"
                       class=" @error('title') border border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('title')
                <span class="text-sm font-medium text-red-500 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-gray-300">Post
                    Title</label>
                <textarea name="description" id="description" cols="30" rows="10"
                          class="@error('title') border border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    {{ $post->description }}
                </textarea>

                @error('description')
                <span class="text-sm font-medium text-red-500 mt-1">{{ $message }}</span>
                @enderror
            </div>


            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                Submit
            </button>
        </form>
    </main>
</x-app-layout>
