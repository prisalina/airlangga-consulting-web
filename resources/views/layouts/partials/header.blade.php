<header id="header-sticky" class="fixed top-0 left-0 right-0 z-[100] bg-white/95 backdrop-blur-sm transition-shadow duration-300">
    <div class="max-w-[1400px] mx-auto px-4 lg:px-6">
        <div class="flex items-center justify-between h-16 lg:h-20">

            {{-- Logo --}}
            <div class="logo shrink-0">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5">
                    <img src="{{ asset('images/logo-airlangga.png') }}" alt="Logo Airlangga Consulting" class="h-11 w-11 object-contain shrink-0">
                    <span class="text-lg font-bold text-primary leading-none">Airlangga<span class="text-[#F5A800]">Consulting</span></span>
                </a>
            </div>

            {{-- Desktop Nav --}}
            <nav class="hidden lg:flex items-center gap-0.5 flex-1 justify-center">
                <a href="{{ route('home') }}" class="nav-link px-3 py-2 text-sm font-medium text-primary hover:text-[#F5A800] transition-colors {{ request()->routeIs('home') ? 'text-[#F5A800]' : '' }}">Beranda</a>

                {{-- Layanan Dropdown --}}
                <div class="relative group">
                    <a href="{{ route('services.index') }}" class="nav-link px-3 py-2 text-sm font-medium text-primary hover:text-[#F5A800] transition-colors flex items-center gap-1 {{ request()->routeIs('services.*') ? 'text-[#F5A800]' : '' }}">
                        Layanan <i class="fa-solid fa-chevron-down text-[10px]"></i>
                    </a>
                    <div class="absolute top-full left-0 bg-white shadow-xl rounded-lg min-w-[260px] p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 mt-1 z-50">
                        @php
                            $navServices = \App\Models\Service::active()->orderBy('sort_order')->get();
                        @endphp
                        @foreach($navServices as $s)
                            <a href="{{ route('services.index') }}#{{ $s->slug }}" class="block px-4 py-2 text-[13px] text-primary hover:bg-[#F5A8001A] hover:text-[#F5A800] rounded-md transition">{{ $s->name }}</a>
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('programs.index') }}" class="nav-link px-3 py-2 text-sm font-medium text-primary hover:text-[#F5A800] transition-colors {{ request()->routeIs('programs.*') ? 'text-[#F5A800]' : '' }}">Program & Jadwal</a>
                <a href="{{ route('products.index') }}" class="nav-link px-3 py-2 text-sm font-medium text-primary hover:text-[#F5A800] transition-colors {{ request()->routeIs('products.*') ? 'text-[#F5A800]' : '' }}">Produk Digital</a>
                <a href="{{ route('case-studies.index') }}" class="nav-link px-3 py-2 text-sm font-medium text-primary hover:text-[#F5A800] transition-colors {{ request()->routeIs('case-studies.*') ? 'text-[#F5A800]' : '' }}">Studi Kasus</a>
                <a href="{{ route('blog.index') }}" class="nav-link px-3 py-2 text-sm font-medium text-primary hover:text-[#F5A800] transition-colors {{ request()->routeIs('blog.*') ? 'text-[#F5A800]' : '' }}">Blog</a>
                <a href="{{ route('about.index') }}" class="nav-link px-3 py-2 text-sm font-medium text-primary hover:text-[#F5A800] transition-colors {{ request()->routeIs('about.*') ? 'text-[#F5A800]' : '' }}">Tentang Kami</a>
                <a href="{{ route('contact.index') }}" class="nav-link px-3 py-2 text-sm font-medium text-primary hover:text-[#F5A800] transition-colors {{ request()->routeIs('contact.*') ? 'text-[#F5A800]' : '' }}">Kontak</a>
            </nav>

            {{-- CTA Button --}}
            <div class="flex items-center gap-3 shrink-0">
                <a href="{{ route('contact.index') }}" class="hidden lg:inline-flex et-btn">
                    <span class="icon"><i class="fa-solid fa-arrow-right"></i></span>
                    Konsultasi Gratis
                </a>

                {{-- Mobile hamburger --}}
                <button class="sidebar__toggle lg:hidden p-2 text-primary" aria-label="Menu">
                    <i class="fa-solid fa-bars text-2xl"></i>
                </button>
            </div>


        </div>
    </div>
</header>

{{-- Spacer for fixed header --}}
<div class="h-16 lg:h-20"></div>
