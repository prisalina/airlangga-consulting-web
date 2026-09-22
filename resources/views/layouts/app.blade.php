<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Airlangga Consulting') — Konsultan Profesional Berbasis Keilmuan dan Praktik</title>
    <meta name="description" content="@yield('description', 'PT Dharma Putra Airlangga membantu organisasi, perusahaan, instansi pemerintah, maupun individu menghadapi berbagai tantangan dan mencapai tujuan strategis.')">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Airlangga Consulting">
    <meta property="og:title" content="@yield('title', 'Airlangga Consulting')">
    <meta property="og:description" content="@yield('description', 'PT Dharma Putra Airlangga')">
    <meta property="og:url" content="{{ url()->current() }}">

    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- Swiper CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    {{-- Animate.css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    {{-- Tailwind CSS CDN (v4) --}}
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        @theme {
            --color-primary: #1C2B5E;
            --color-secondary: #F5A800;
        }

        body {
            font-family: "Plus Jakarta Sans", sans-serif;
            color: var(--color-primary);
        }

        /* Reusable Components */
        .et-btn { @apply inline-flex items-center gap-2 bg-primary text-white text-[14px] font-semibold px-5 py-2.5 rounded-full transition duration-300 hover:bg-secondary hover:text-primary; }
        .et-btn .icon { @apply w-7 h-7 rounded-full bg-secondary text-primary flex items-center justify-center text-xs transition duration-300; }
        .et-btn:hover .icon { @apply bg-primary text-secondary; }
        .et-btn.bg-white { @apply bg-white text-primary border border-primary; }
        .et-btn.bg-white:hover { @apply bg-primary text-white; }
        .et-btn.bg-secondary { @apply bg-secondary text-primary; }
        .et-btn.bg-secondary:hover { @apply bg-primary text-white; }
        .et-section-sub-title { @apply inline-flex items-center gap-2 text-[13px] font-semibold text-primary bg-[#F5A8001A] border border-[#F5A80033] rounded-full px-4 py-1 mb-3; }
        .et-section-title { @apply text-[clamp(24px,2.5vw,40px)] font-bold text-primary leading-tight; }
        .et-section-title span { @apply text-secondary; }
        .et-container { @apply max-w-[1400px] mx-auto px-4 lg:px-6; }
        .service-item { @apply bg-white rounded-2xl px-6 py-8 transition duration-300 shadow-sm border border-gray-100; }
        .service-item:hover { @apply bg-secondary -translate-y-2 border-secondary shadow-lg; }
        .choose-items { @apply flex items-center gap-6 border border-gray-200 rounded-lg p-6 hover:bg-secondary/10 transition duration-300; }
        .team-item { @apply bg-[#F8F9FA] rounded-2xl text-center shadow-sm border border-gray-100 hover:shadow-md transition; }
        .blog-card { @apply bg-[#F8F9FA] rounded-2xl overflow-hidden shadow-sm hover:shadow-md hover:-translate-y-2 transition duration-300 border border-gray-100; }
        .blog-card:hover h5 a { @apply text-secondary; }
        .accordion-item { @apply grid grid-rows-[max-content_0fr] duration-300; }
        .accordion-item.open { grid-template-rows: max-content 1fr; }
        .accordion-collapse { @apply overflow-hidden; }
        .nav-link { @apply relative; }
        .nav-link::after { content: ''; @apply absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-secondary transition-all duration-300; }
        .nav-link:hover::after, .nav-link.active::after { @apply w-3/4; }
        .form-input { @apply w-full border border-gray-300 rounded-lg px-4 py-3 text-[15px] text-primary placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition; }
        .pagination { @apply flex items-center justify-center gap-2 mt-8; }
        .pagination .page-link { @apply w-10 h-10 rounded-full flex items-center justify-center text-sm border border-gray-200 text-primary hover:bg-primary hover:text-white hover:border-primary transition; }
        .pagination .active .page-link { @apply bg-primary text-white border-primary; }

        /* Ornaments */
        .bg-grid-pattern {
            background-image: linear-gradient(to right, #1C2B5E 1px, transparent 1px), linear-gradient(to bottom, #1C2B5E 1px, transparent 1px);
            background-size: 60px 60px;
        }
        .bg-dot-pattern {
            background-image: radial-gradient(#1C2B5E 2px, transparent 2px);
            background-size: 24px 24px;
        }
    </style>
    
    @stack('styles')
</head>
<body class="font-jakarta antialiased bg-white text-[#1C2B5E]">

    {{-- Offcanvas Mobile Menu --}}
    <div class="fix-area">
        <div class="offcanvas__info fixed top-0 right-0 h-full w-[320px] bg-white shadow-xl z-[999] translate-x-full transition-transform duration-300" id="offcanvas-menu">
            <div class="offcanvas__wrapper p-6 h-full overflow-y-auto">
                <div class="offcanvas__content">
                    <div class="flex justify-between items-center mb-6">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('storage/site/logo.jpeg') }}" alt="Airlangga Consulting" class="h-9 w-auto" onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
                            <span class="text-xl font-bold text-primary hidden">Airlangga Consulting</span>
                        </a>
                        <button id="offcanvas-close" class="text-gray-500 hover:text-primary text-xl">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <nav class="mobile-nav">
                        <ul class="space-y-2">
                            <li><a href="{{ route('home') }}" class="block py-2 font-semibold hover:text-[#F5A800]">Beranda</a></li>
                            <li><a href="{{ route('services.index') }}" class="block py-2 font-semibold hover:text-[#F5A800]">Layanan</a></li>
                            <li><a href="{{ route('programs.index') }}" class="block py-2 font-semibold hover:text-[#F5A800]">Program & Jadwal</a></li>
                            <li><a href="{{ route('products.index') }}" class="block py-2 font-semibold hover:text-[#F5A800]">Produk Digital</a></li>
                            <li><a href="{{ route('case-studies.index') }}" class="block py-2 font-semibold hover:text-[#F5A800]">Studi Kasus</a></li>
                            <li><a href="{{ route('blog.index') }}" class="block py-2 font-semibold hover:text-[#F5A800]">Blog</a></li>
                            <li><a href="{{ route('about.index') }}" class="block py-2 font-semibold hover:text-[#F5A800]">Tentang Kami</a></li>
                            <li><a href="{{ route('contact.index') }}" class="block py-2 font-semibold hover:text-[#F5A800]">Kontak</a></li>
                        </ul>
                    </nav>

                    <div class="mt-6 space-y-3">
                        <div class="flex items-center gap-3 text-sm">
                            <i class="fal fa-envelope text-primary"></i>
                            <a href="mailto:halo@airlanggaconsulting.id" class="hover:text-[#F5A800]">halo@airlanggaconsulting.id</a>
                        </div>
                        <div class="flex items-center gap-3 text-sm">
                            <i class="far fa-phone text-primary"></i>
                            <a href="https://wa.me/6281130009000" target="_blank" rel="noopener" class="hover:text-[#F5A800]">0811-3000-9000</a>
                        </div>
                        <a href="{{ route('contact.index') }}" class="et-btn mt-4 inline-flex">
                            <span class="icon"><i class="fa-solid fa-arrow-right"></i></span>
                            Konsultasi Gratis
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas__overlay fixed inset-0 bg-black/50 z-[998] hidden" id="offcanvas-overlay"></div>

    {{-- Header --}}
    @include('layouts.partials.header')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.partials.footer')

    {{-- WhatsApp Float Button --}}
    <a href="https://wa.me/6281130009000?text=Halo%20Airlangga%2C%20saya%20ingin%20bertanya%20tentang%20layanan%20Anda."
        target="_blank" rel="noopener"
        class="fixed bottom-6 right-6 z-50 flex h-14 w-14 items-center justify-center rounded-full bg-green-500 text-white shadow-lg transition hover:scale-105 hover:bg-green-600"
        aria-label="Chat WhatsApp">
        <svg viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7" aria-hidden="true">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
        </svg>
    </a>

    {{-- Swiper JS --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- WOW.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

    <script>
        // Init WOW
        new WOW().init();

        // Sticky header
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header-sticky');
            if (header) {
                if (window.scrollY > 80) {
                    header.classList.add('shadow-md', 'bg-white');
                } else {
                    header.classList.remove('shadow-md');
                }
            }
        });

        // Offcanvas
        const offcanvasMenu = document.getElementById('offcanvas-menu');
        const offcanvasOverlay = document.getElementById('offcanvas-overlay');
        const offcanvasClose = document.getElementById('offcanvas-close');
        const hamburgers = document.querySelectorAll('.sidebar__toggle');

        function openOffcanvas() {
            offcanvasMenu.classList.remove('translate-x-full');
            offcanvasOverlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        function closeOffcanvas() {
            offcanvasMenu.classList.add('translate-x-full');
            offcanvasOverlay.classList.add('hidden');
            document.body.style.overflow = '';
        }

        hamburgers.forEach(h => h.addEventListener('click', openOffcanvas));
        offcanvasClose?.addEventListener('click', closeOffcanvas);
        offcanvasOverlay?.addEventListener('click', closeOffcanvas);

        // Accordion FAQ
        document.querySelectorAll('.accordion-button').forEach(button => {
            button.addEventListener('click', function() {
                const item = this.closest('.accordion-item');
                const isOpen = item.classList.contains('open');
                document.querySelectorAll('.accordion-item').forEach(i => i.classList.remove('open'));
                if (!isOpen) item.classList.add('open');
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
