<header class="bg-black py-4 px-8 flex justify-between items-center text-white font-bold">
    <div class="flex items-center">
        <img src="{{ asset('images/HOBO_logo.png') }}" alt="Logo" class="h-12">
    </div>
    <nav class="max-sm:hidden md:flex justify-center space-x-6">
        <a href="{{ url('series') }}" class="text-white hover:text-[#92d051]">Home</a>
        <a href="{{ url('genres') }}" class="text-white hover:text-[#92d051]">Genres</a>
        <a href="{{ url('series') }}" class="text-white hover:text-[#92d051]">Series</a>
        @role('admin')
        <a href="{{ url('dashboard/manage_klanten') }}" class="text-white hover:text-[#92d051]">Admin</a>
        @endrole
        @role('contentmanager')
        <a href="{{ url('dashboard/manage_content') }}" class="text-white hover:text-[#92d051]">Manager</a>
        @endrole
    </nav>
    <button aria-controls="mobile-menu" aria-expanded="false" class="md:hidden text-white">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
    </button>
    <div class="max-sm:hidden md:flex items-center ml-4">
        <form method="GET" action="{{ url('searchSeries') }}" class="flex">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." class="px-4 py-2 bg-black border border-[#92d051] rounded-md text-white focus:outline-none focus:border-blue-500 hover:bg-black hover:border-[#5b9bd5]" required>
            <button type="submit" class="hidden">Search</button>
        </form>
        @if(!Auth::check())
            <a href="/login" class="ml-4 text-white hover:text-[#92d051]">Login</a>
        @else
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="ml-4 text-white hover:text-[#92d051]">Logout</button>
            </form>
            <a href="/profile" class="ml-4 text-white hover:text-[#92d051]">Profile</a>
        @endif
    </div>
</header>
<nav id="mobile-menu" class="hidden md:hidden bg-black text-white py-4 px-8 flex flex-col space-y-4">
    <a href="{{ url('series') }}" class="hover:text-[#92d051]">Home</a>
    <a href="{{ url('genres') }}" class="hover:text-[#92d051]">Genres</a>
    <a href="{{ url('series') }}" class="hover:text-[#92d051]">Series</a>
    @role('admin')
    <a href="{{ url('dashboard/manage_klanten') }}" class="hover:text-[#92d051]">Admin</a>
    @endrole
    @role('contentmanager')
    <a href="{{ url('dashboard/manage_content') }}" class="hover:text-[#92d051]">Manager</a>
    @endrole
    <form method="GET" action="{{ url('searchSeries') }}" class="flex mb-4">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." class="px-4 py-2 bg-black border border-[#92d051] rounded-md text-white focus:outline-none focus:border-blue-500 hover:bg-black hover:border-[#5b9bd5]" required>
        <button type="submit" class="hidden">Search</button>
    </form>
    @if(!Auth::check())
        <a href="/login" class="text-white hover:text-[#92d051]">Login</a>
    @else
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="text-white hover:text-[#92d051]">Logout</button>
        </form>
        <a href="/profile" class="text-white hover:text-[#92d051]">Profile</a>
    @endif
</nav>
