<nav x-data="{ open: false }" class="bg-gray-800 text-white border-b border-gray-700 sticky top-0 z-10">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('path_to_logo') }}" alt="Logo" class="h-10 w-auto">
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:flex">
                <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-900' : '' }}">Dashboard</a>
                <a href="{{ route('stores.index') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 {{ request()->routeIs('stores.index') ? 'bg-gray-900' : '' }}">Stores</a>
                <a href="{{ route('products.index') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 {{ request()->routeIs('products.index') ? 'bg-gray-900' : '' }}">Products</a>
                <a href="{{ route('sales.index') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 {{ request()->routeIs('sales.index') ? 'bg-gray-900' : '' }}">Sales</a>
            </div>

            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-400 bg-gray-800 hover:text-white focus:outline-none">
                            <span>{{ Auth::user()->name ?? 'Guest' }}</span>
                            <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

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

            <!-- Hamburger for Mobile -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:bg-gray-700 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700">Dashboard</a>
            <a href="{{ route('stores.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700">Stores</a>
            <a href="{{ route('products.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700">Products</a>
            <a href="{{ route('sales.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700">Sales</a>
        </div>

        <!-- Responsive User Settings -->
        <div class="pt-4 pb-3 border-t border-gray-700">
            <div class="px-5">
                <div class="text-base font-medium text-white">{{ Auth::user()->name ?? 'Guest' }}</div>
                <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email ?? '' }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-400 hover:bg-gray-700">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block px-4 py-2 text-sm text-gray-400 hover:bg-gray-700">Log Out</button>
                </form>
            </div>
        </div>
    </div>
</nav>
