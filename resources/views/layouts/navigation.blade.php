<nav x-data="{ open: false }" class="border-b border-gray-100 bg-white">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex">
                <!-- Logo -->
                <div class="flex shrink-0 items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')">
                                {{ __('Users') }}
                            </x-nav-link>
                            <x-nav-link href="#">
                                {{ __('Products') }}
                            </x-nav-link>
                            <x-nav-link href="#">
                                {{ __('Newsletters') }}
                            </x-nav-link>
                            <x-nav-link href="#">
                                {{ __('Promotions') }}
                            </x-nav-link>
                        @elseif (Auth::user()->role === 'customer')
                            <x-nav-link :href="route('customer.home')" :active="request()->routeIs('customer.home')">
                                {{ __('Home') }}
                            </x-nav-link>
                            <x-nav-link href="#">
                                {{ __('Preferences') }}
                            </x-nav-link>
                            <x-nav-link href="#">
                                {{ __('Products') }}
                            </x-nav-link>
                            <x-nav-link href="#">
                                {{ __('Customer Support') }}
                            </x-nav-link>
                            <x-nav-link href="#">
                                {{ __('About') }}
                            </x-nav-link>
                        @elseif (Auth::user()->role === 'clothingbusiness')
                            <x-nav-link :href="route('clothingbusiness.home')" :active="request()->routeIs('clothingbusiness.home')">
                                {{ __('Home') }}
                            </x-nav-link>
                            <x-nav-link href="#">
                                {{ __('Products') }}
                            </x-nav-link>
                            <x-nav-link href="#">
                                {{ __('About') }}
                            </x-nav-link>
                        @endif
                    @else
                        <x-nav-link :href="route('customer.home')" :active="request()->routeIs('customer.home')">
                            {{ __('Home') }}
                        </x-nav-link>
                        <x-nav-link href="#">
                            {{ __('Preferences') }}
                        </x-nav-link>
                        <x-nav-link href="#">
                            {{ __('Products') }}
                        </x-nav-link>
                        <x-nav-link href="#">
                            {{ __('Customer Support') }}
                        </x-nav-link>
                        <x-nav-link href="#">
                            {{ __('About') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:ms-6 sm:flex sm:items-center">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

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
                @else
                    <a href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                            Register
                        </a>
                    @endif
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none">
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
        <div class="space-y-1 pb-3 pt-2">
            @auth
                @if (Auth::user()->role === 'Admin')
                    <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#">
                        {{ __('Users') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#">
                        {{ __('Products') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#">
                        {{ __('Newsletters') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#">
                        {{ __('Promotions') }}
                    </x-responsive-nav-link>
                @elseif (Auth::user()->role === 'Customer')
                    <x-responsive-nav-link :href="route('customer.home')" :active="request()->routeIs('customer.home')">
                        {{ __('Home') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#">
                        {{ __('Preferences') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#">
                        {{ __('Products') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#">
                        {{ __('Customer Support') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#">
                        {{ __('About') }}
                    </x-responsive-nav-link>
                @elseif (Auth::user()->role === 'ClothingBusiness')
                    <x-responsive-nav-link :href="route('clothingbusiness.home')" :active="request()->routeIs('clothingbusiness.home')">
                        {{ __('Home') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#">
                        {{ __('Products') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#">
                        {{ __('About') }}
                    </x-responsive-nav-link>
                @endif
            @else
                <x-responsive-nav-link :href="route('customer.home')" :active="request()->routeIs('customer.home')">
                    {{ __('Home') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="#">
                    {{ __('Preferences') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="#">
                    {{ __('Products') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="#">
                    {{ __('Customer Support') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="#">
                    {{ __('About') }}
                </x-responsive-nav-link>
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        <div class="border-t border-gray-200 pb-1 pt-4">
            @auth
                <div class="px-4">
                    <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                    Log in
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                        Register
                    </a>
                @endif
            @endauth
        </div>
    </div>
</nav>
