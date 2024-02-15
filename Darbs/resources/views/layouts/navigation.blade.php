<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<nav x-data="{ open: false }" class="bg-gray-800 border-b border-gray-600">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('storage/logo/cvlogo.png') }}" alt="CV Logo" class="block h-9 w-auto">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:-my-px sm:ml-10 sm:flex text-white">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-300 hover:text-white">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('board')" :active="request()->routeIs('board')" class="text-gray-300 hover:text-white">
                        {{ __('News') }}
                    </x-nav-link>
                    <x-nav-link :href="route('jobs.create')" :active="request()->routeIs('jobs.create')" class="text-white hover:text-yellow-500">
                        {{ __('Create') }}
                    </x-nav-link>
                    <x-nav-link :href="route('jobs.index')" :active="request()->routeIs('jobs.index')" class="text-gray-300 hover:text-white">
                        {{ __('Jobs') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <div class="flex items-center">
                            @auth
                                @if (auth()->user()->profile_photo_path)
                                    <img src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}"
                                        alt="Profile Picture" class="rounded-full w-10 h-10 object-cover mr-2">
                                @endif
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 bg-gray-700 hover:text-white hover:bg-gray-600 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            @endauth
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-gray-700 hover:text-white"
                            style="background-color: #b87a44;">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- User's Posts Page Link -->
                        <x-dropdown-link :href="route('user.posts')" class="text-gray-700 hover:text-white"
                            style="background-color: #b87a44;">
                            {{ __('My Posts') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                class="text-gray-700 hover:text-white" style="background-color: #b87a44;">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-600 focus:outline-none focus:bg-gray-600 focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-300 hover:text-white">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-gray-700 hover:text-white">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();"
                        class="text-gray-700 hover:text-white">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
