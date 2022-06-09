<header class="sticky top-0 z-50 border-b border-borderColor bg-bgColor py-3">

<nav class="container mx-auto flex max-w-screen-lg items-center justify-between ">
    <a href="{{ route('posts.index') }}" class="text-xl font-semibold">Blog</a>
    @auth
        <section class="flex gap-4">
            <a href="{{ route('posts.index') }}" class="underline font-medium hover:text-primaryColor hover:underline ">All Posts</a>
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </section>
    @else
        <ul class="flex items-center justify-between gap-x-8">

            <li class=" hover:text-primaryColor hover:underline">
                <a href="{{ route('register') }}">Register</a>
            </li>
            <li class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-4 py-2 text-center ">
                <a href="{{ route('login') }}">Log In</a>
            </li>
        </ul>
    @endauth
</nav>
</header>
