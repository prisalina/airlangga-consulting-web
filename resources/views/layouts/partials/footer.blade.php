<footer class="bg-[#1C2B5E] text-white pt-16 mt-20 relative overflow-hidden">
    {{-- Background pattern/glow --}}
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-secondary rounded-full blur-[100px] opacity-10 pointer-events-none"></div>

    <div class="et-container relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-8 pb-12">
            
            {{-- Column 1: Brand & About --}}
            <div class="lg:col-span-4">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3 mb-6">
                    <img src="{{ asset('images/logo-airlangga.png') }}" alt="Logo Airlangga Consulting" class="h-12 w-12 object-contain shrink-0" style="mix-blend-mode: screen;">
                    <span class="text-2xl font-bold text-white">Airlangga<span class="text-secondary">Consulting</span></span>
                </a>
                <p class="text-white/70 text-sm leading-relaxed mb-8 pr-4">
                    PT Dharma Putra Airlangga (Airlangga Consulting) siap menjadi mitra strategis Anda dalam merumuskan solusi berbasis keilmuan dan pengalaman praktis guna mengoptimalkan kinerja organisasi.
                </p>
                
                <div class="flex items-center gap-3">
                    <a href="https://instagram.com/airlanggaconsulting" target="_blank" rel="noopener" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-secondary hover:text-primary transition-colors duration-300">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://linkedin.com/company/airlanggaconsulting" target="_blank" rel="noopener" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-secondary hover:text-primary transition-colors duration-300">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="https://wa.me/6281130009000" target="_blank" rel="noopener" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-secondary hover:text-primary transition-colors duration-300">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            {{-- Column 2: Quick Links --}}
            <div class="lg:col-span-2 lg:col-start-6">
                <h4 class="text-white font-bold text-lg mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-secondary"></span> Tautan
                </h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('about.index') }}" class="text-white/70 text-sm hover:text-secondary transition-colors inline-flex items-center gap-2"><i class="fa-solid fa-angle-right text-[10px]"></i> Tentang Kami</a></li>
                    <li><a href="{{ route('services.index') }}" class="text-white/70 text-sm hover:text-secondary transition-colors inline-flex items-center gap-2"><i class="fa-solid fa-angle-right text-[10px]"></i> Layanan</a></li>
                    <li><a href="{{ route('programs.index') }}" class="text-white/70 text-sm hover:text-secondary transition-colors inline-flex items-center gap-2"><i class="fa-solid fa-angle-right text-[10px]"></i> Program</a></li>
                    <li><a href="{{ route('case-studies.index') }}" class="text-white/70 text-sm hover:text-secondary transition-colors inline-flex items-center gap-2"><i class="fa-solid fa-angle-right text-[10px]"></i> Studi Kasus</a></li>
                    <li><a href="{{ route('blog.index') }}" class="text-white/70 text-sm hover:text-secondary transition-colors inline-flex items-center gap-2"><i class="fa-solid fa-angle-right text-[10px]"></i> Artikel Blog</a></li>
                </ul>
            </div>

            {{-- Column 3: Services --}}
            <div class="lg:col-span-3">
                <h4 class="text-white font-bold text-lg mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-secondary"></span> Layanan Utama
                </h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('services.index') }}#konsultasi-manajemen" class="text-white/70 text-sm hover:text-secondary transition-colors block truncate">Konsultasi Manajemen</a></li>
                    <li><a href="{{ route('services.index') }}#pengembangan-organisasi-sdm" class="text-white/70 text-sm hover:text-secondary transition-colors block truncate">Pengembangan Organisasi & SDM</a></li>
                    <li><a href="{{ route('services.index') }}#perencanaan-bisnis" class="text-white/70 text-sm hover:text-secondary transition-colors block truncate">Perencanaan Bisnis</a></li>
                    <li><a href="{{ route('services.index') }}#pendampingan-transformasi-organisasi" class="text-white/70 text-sm hover:text-secondary transition-colors block truncate">Pendampingan Transformasi</a></li>
                    <li><a href="{{ route('services.index') }}#kajian-dan-riset" class="text-white/70 text-sm hover:text-secondary transition-colors block truncate">Kajian dan Riset</a></li>
                </ul>
            </div>

            {{-- Column 4: Contact --}}
            <div class="lg:col-span-2">
                <h4 class="text-white font-bold text-lg mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-secondary"></span> Hubungi Kami
                </h4>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-location-dot mt-1 text-secondary"></i>
                        <span class="text-white/70 text-sm leading-relaxed">Surabaya,<br>Jawa Timur, Indonesia</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-envelope text-secondary"></i>
                        <a href="mailto:halo@airlanggaconsulting.id" class="text-white/70 text-sm hover:text-secondary transition-colors">halo@airlanggaconsulting.id</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-brands fa-whatsapp text-secondary text-lg"></i>
                        <a href="https://wa.me/6281130009000" target="_blank" rel="noopener" class="text-white/70 text-sm hover:text-secondary transition-colors">0811-3000-9000</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Bottom Copyright --}}
    <div class="border-t border-white/10">
        <div class="et-container">
            <div class="flex flex-col md:flex-row items-center justify-between py-6 gap-4">
                <p class="text-white/50 text-sm">
                    &copy; {{ date('Y') }} <strong>Airlangga Consulting</strong>. Hak Cipta Dilindungi.
                </p>
                <div class="flex items-center gap-6">
                    <a href="{{ route('contact.index') }}" class="text-white/50 hover:text-secondary text-sm transition-colors">Hubungi Kami</a>
                    <a href="#" class="text-white/50 hover:text-secondary text-sm transition-colors">Kebijakan Privasi</a>
                </div>
            </div>
        </div>
    </div>
</footer>
