@extends('layouts.app')

@section('title', 'Airlangga Consulting')
@section('description', 'PT Dharma Putra Airlangga membantu organisasi, perusahaan, instansi pemerintah, maupun individu menghadapi berbagai tantangan dan mencapai tujuan strategis.')

@section('content')

{{-- ===== HERO SECTION ===== --}}
<section class="et-banner overflow-hidden relative" style="background: linear-gradient(135deg, #EEF2FF 0%, #F8FAFF 40%, #FFFDF5 80%, #FFFFFF 100%);">

    {{-- Glow blobs besar & terlihat --}}
    <div class="absolute -top-20 -left-20 w-[500px] h-[500px] rounded-full pointer-events-none" style="background: radial-gradient(circle, rgba(28,43,94,0.12) 0%, transparent 70%);"></div>
    <div class="absolute -bottom-10 -right-10 w-[400px] h-[400px] rounded-full pointer-events-none" style="background: radial-gradient(circle, rgba(245,168,0,0.13) 0%, transparent 70%);"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[300px] rounded-full pointer-events-none" style="background: radial-gradient(ellipse, rgba(28,43,94,0.04) 0%, transparent 70%);"></div>

    {{-- Grid pattern --}}
    <div class="absolute inset-0 bg-grid-pattern opacity-[0.04] pointer-events-none"></div>

    {{-- Ornamen: Lingkaran konsentris besar kiri bawah --}}
    <div class="absolute -bottom-32 -left-32 pointer-events-none opacity-[0.18]">
        <svg width="460" height="460" viewBox="0 0 460 460" fill="none">
            <circle cx="230" cy="230" r="220" stroke="#1C2B5E" stroke-width="1.5" stroke-dasharray="8 5"/>
            <circle cx="230" cy="230" r="180" stroke="#1C2B5E" stroke-width="1" stroke-dasharray="5 7"/>
            <circle cx="230" cy="230" r="140" stroke="#F5A800" stroke-width="1.5" stroke-dasharray="8 5"/>
            <circle cx="230" cy="230" r="100" stroke="#1C2B5E" stroke-width="1" stroke-dasharray="4 6"/>
            <circle cx="230" cy="230" r="60" stroke="#F5A800" stroke-width="1" stroke-dasharray="6 4"/>
        </svg>
    </div>

    {{-- Ornamen: Lingkaran konsentris kanan atas --}}
    <div class="absolute -top-28 -right-28 pointer-events-none opacity-[0.15]">
        <svg width="400" height="400" viewBox="0 0 400 400" fill="none">
            <circle cx="200" cy="200" r="195" stroke="#F5A800" stroke-width="1.5" stroke-dasharray="7 5"/>
            <circle cx="200" cy="200" r="155" stroke="#1C2B5E" stroke-width="1" stroke-dasharray="5 7"/>
            <circle cx="200" cy="200" r="115" stroke="#F5A800" stroke-width="1.5" stroke-dasharray="8 5"/>
            <circle cx="200" cy="200" r="75" stroke="#1C2B5E" stroke-width="1" stroke-dasharray="4 6"/>
        </svg>
    </div>

    {{-- Ornamen: Wave / arc besar di bawah --}}
    <div class="absolute bottom-0 left-0 right-0 pointer-events-none opacity-[0.06]">
        <svg viewBox="0 0 1440 120" preserveAspectRatio="none" class="w-full" height="120">
            <path d="M0 60 C 360 120, 1080 0, 1440 60 L1440 120 L0 120 Z" fill="#1C2B5E"/>
        </svg>
    </div>

    {{-- Ornamen: Dot grid kiri tengah (lebih besar & terlihat) --}}
    <div class="absolute left-4 lg:left-10 top-1/3 pointer-events-none opacity-[0.18]">
        <svg width="110" height="110" viewBox="0 0 110 110" fill="none">
            @for($r = 0; $r < 6; $r++)
                @for($c = 0; $c < 6; $c++)
                    <circle cx="{{ $c * 20 + 5 }}" cy="{{ $r * 20 + 5 }}" r="2.5" fill="#1C2B5E"/>
                @endfor
            @endfor
        </svg>
    </div>

    {{-- Ornamen: Dot grid kanan tengah --}}
    <div class="absolute right-4 lg:right-10 bottom-1/3 pointer-events-none opacity-[0.12]">
        <svg width="90" height="90" viewBox="0 0 90 90" fill="none">
            @for($r = 0; $r < 5; $r++)
                @for($c = 0; $c < 5; $c++)
                    <circle cx="{{ $c * 20 + 5 }}" cy="{{ $r * 20 + 5 }}" r="2.5" fill="#F5A800"/>
                @endfor
            @endfor
        </svg>
    </div>

    {{-- Ornamen: Segitiga dekoratif kanan tengah --}}
    <div class="absolute right-16 lg:right-32 top-1/2 pointer-events-none opacity-[0.08]">
        <svg width="120" height="120" viewBox="0 0 120 120" fill="none">
            <polygon points="60,5 115,115 5,115" stroke="#1C2B5E" stroke-width="1.5" fill="none"/>
            <polygon points="60,25 95,105 25,105" stroke="#F5A800" stroke-width="1" fill="none"/>
        </svg>
    </div>

    {{-- Ornamen: Garis diagonal halus kiri atas --}}
    <div class="absolute top-0 left-1/4 pointer-events-none opacity-[0.07]">
        <svg width="200" height="200" viewBox="0 0 200 200" fill="none">
            <line x1="0" y1="0" x2="200" y2="200" stroke="#1C2B5E" stroke-width="1"/>
            <line x1="30" y1="0" x2="200" y2="170" stroke="#F5A800" stroke-width="0.8"/>
            <line x1="60" y1="0" x2="200" y2="140" stroke="#1C2B5E" stroke-width="0.6"/>
        </svg>
    </div>

    {{-- Floating shapes animasi --}}
    <div class="absolute top-24 left-8 lg:left-20 w-4 h-4 rounded-full bg-secondary opacity-60 animate-pulse pointer-events-none"></div>
    <div class="absolute top-44 left-12 lg:left-32 w-2.5 h-2.5 rounded-full bg-primary/50 animate-pulse pointer-events-none" style="animation-delay:0.8s;"></div>
    <div class="absolute bottom-24 left-16 lg:left-40 w-16 h-16 border-[3px] border-primary/20 rounded-full animate-bounce pointer-events-none" style="animation-duration: 4s;"></div>
    <div class="absolute bottom-16 left-10 lg:left-24 w-8 h-8 border-2 border-secondary/30 rounded-full animate-bounce pointer-events-none" style="animation-duration: 6s; animation-delay: 1s;"></div>
    <div class="absolute top-32 right-8 lg:right-24 text-secondary text-2xl opacity-40 animate-spin pointer-events-none" style="animation-duration: 10s;"><i class="fa-solid fa-plus"></i></div>
    <div class="absolute bottom-36 right-12 lg:right-40 text-primary/25 text-3xl animate-spin pointer-events-none" style="animation-duration: 16s;"><i class="fa-solid fa-asterisk"></i></div>
    <div class="absolute top-56 right-4 lg:right-14 w-6 h-6 border-2 border-secondary/40 rotate-45 animate-bounce pointer-events-none" style="animation-duration: 5s;"></div>
    <div class="absolute top-16 right-1/4 w-3 h-3 bg-secondary/40 rotate-45 animate-pulse pointer-events-none" style="animation-delay: 1.5s;"></div>

    {{-- Animated accent: Ping rings --}}
    <div class="absolute top-1/3 left-1/4 pointer-events-none">
        <div class="w-3 h-3 rounded-full bg-secondary/50 relative">
            <span class="absolute inset-0 rounded-full bg-secondary/30 animate-ping"></span>
        </div>
    </div>
    <div class="absolute bottom-1/3 right-1/3 pointer-events-none">
        <div class="w-2.5 h-2.5 rounded-full bg-primary/40 relative">
            <span class="absolute inset-0 rounded-full bg-primary/20 animate-ping" style="animation-delay: 0.7s;"></span>
        </div>
    </div>
    <div class="absolute top-2/3 left-1/3 pointer-events-none">
        <div class="w-2 h-2 rounded-full bg-secondary/60 relative">
            <span class="absolute inset-0 rounded-full bg-secondary/30 animate-ping" style="animation-delay: 1.3s;"></span>
        </div>
    </div>

    {{-- Animated accent: garis horizontal melayang kiri --}}
    <div class="absolute left-6 lg:left-16 top-1/2 -translate-y-1/2 pointer-events-none opacity-20 animate-pulse" style="animation-duration: 3s;">
        <div class="flex flex-col gap-2">
            <div class="w-10 h-[2px] bg-secondary rounded-full"></div>
            <div class="w-6 h-[2px] bg-primary rounded-full"></div>
            <div class="w-8 h-[2px] bg-secondary rounded-full"></div>
        </div>
    </div>

    {{-- Animated accent: garis horizontal melayang kanan --}}
    <div class="absolute right-6 lg:right-16 top-2/5 pointer-events-none opacity-20 animate-pulse" style="animation-duration: 4s; animation-delay: 1s;">
        <div class="flex flex-col gap-2 items-end">
            <div class="w-8 h-[2px] bg-primary rounded-full"></div>
            <div class="w-12 h-[2px] bg-secondary rounded-full"></div>
            <div class="w-5 h-[2px] bg-primary rounded-full"></div>
        </div>
    </div>

    {{-- Animated sparkle kiri --}}
    <div class="absolute top-1/2 left-2 lg:left-8 pointer-events-none opacity-30 animate-spin" style="animation-duration: 8s;">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
            <path d="M10 0 L11 9 L20 10 L11 11 L10 20 L9 11 L0 10 L9 9 Z" fill="#F5A800"/>
        </svg>
    </div>
    {{-- Animated sparkle kanan atas --}}
    <div class="absolute top-20 right-1/3 pointer-events-none opacity-25 animate-spin" style="animation-duration: 12s; animation-delay: 2s;">
        <svg width="16" height="16" viewBox="0 0 20 20" fill="none">
            <path d="M10 0 L11 9 L20 10 L11 11 L10 20 L9 11 L0 10 L9 9 Z" fill="#1C2B5E"/>
        </svg>
    </div>

    <div class="et-container relative z-10">
        <p class="et-section-sub-title inline-flex justify-center mx-auto mb-4 relative">
            Konsultan Profesional Berbasis Keilmuan dan Praktik
        </p>
        <h1 class="text-primary text-4xl md:text-5xl lg:text-6xl font-bold leading-tight text-center max-w-4xl mx-auto mb-6 relative">
            Mendorong Kinerja, <br class="hidden md:block"> <span class="text-secondary relative">Mewujudkan <svg class="absolute w-full h-3 -bottom-1 left-0 text-secondary/30" viewBox="0 0 100 10" preserveAspectRatio="none"><path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="4" fill="none"/></svg></span> Dampak
        </h1>

        {{-- Deskripsi rata tengah, layout sesuai inspect --}}
        <p class="text-primary/75 text-base md:text-lg leading-relaxed max-w-[640px] mx-auto mb-8 text-center">
            PT Dharma Putra Airlangga membantu organisasi, perusahaan, instansi pemerintah, maupun individu menghadapi berbagai tantangan dan mencapai tujuan strategis melalui layanan konsultasi yang memadukan keilmuan, pengalaman praktis, dan solusi yang aplikatif.
        </p>

        {{-- Trust badges kecil --}}
        <div class="flex flex-wrap items-center justify-center gap-4 mb-8 text-sm text-primary/60">
            <span class="inline-flex items-center gap-1.5"><i class="fa-solid fa-shield-check text-secondary text-xs"></i> Berpengalaman & Terstruktur</span>
            <span class="w-px h-4 bg-primary/20 hidden sm:block"></span>
            <span class="inline-flex items-center gap-1.5"><i class="fa-solid fa-users text-secondary text-xs"></i> 60+ Klien Institusi</span>
            <span class="w-px h-4 bg-primary/20 hidden sm:block"></span>
            <span class="inline-flex items-center gap-1.5"><i class="fa-solid fa-star text-secondary text-xs"></i> Berbasis Keilmuan & Praktik</span>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('contact.index') }}" class="et-btn w-full sm:w-auto justify-center group relative overflow-hidden">
                <span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-white rounded-full group-hover:w-56 group-hover:h-56 opacity-10"></span>
                <span class="icon relative z-10"><i class="fa-solid fa-arrow-right"></i></span>
                <span class="relative z-10">Konsultasi Gratis</span>
            </a>
            <a href="{{ route('services.index') }}" class="et-btn bg-white w-full sm:w-auto justify-center">
                <span class="icon border border-primary"><i class="fa-solid fa-arrow-right"></i></span>
                Lihat Layanan Kami
            </a>
        </div>
    </div>


    {{-- Stats Bar --}}
    @if($stats->count())
    <div class="et-container relative z-10 mt-16">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 bg-white/80 backdrop-blur-md rounded-2xl shadow-xl border border-white py-8 px-6 max-w-5xl mx-auto relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-secondary/10 rounded-bl-full -z-10"></div>
            @foreach($stats as $stat)
            <div class="text-center relative">
                @if(!$loop->last)
                <div class="hidden lg:block absolute top-1/2 -right-3 -translate-y-1/2 w-px h-10 bg-gray-200"></div>
                @endif
                <p class="text-3xl lg:text-4xl font-bold text-primary mb-1">{{ $stat->value }}</p>
                <p class="text-primary/70 text-sm font-medium">{{ $stat->label }}</p>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</section>


{{-- ===== WHY US SECTION ===== --}}
<section class="choose-section relative bg-[#F8F9FA] py-16 lg:py-24 overflow-hidden">
    <div class="absolute right-0 top-0 w-[500px] h-[500px] bg-grid-pattern opacity-[0.03] rounded-full blur-sm pointer-events-none -translate-y-1/2 translate-x-1/3"></div>

    <div class="et-container relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div class="order-2 lg:order-1 relative">
                <div class="et-section-sub-title">Kenapa Memilih Kami</div>
                <h2 class="et-section-title mb-4">
                    Pendamping Transformasi
                    <span class="font-light block text-primary/80">Organisasi Anda</span>
                </h2>
                <p class="text-primary/70 text-base leading-relaxed mb-8">
                    Dari memotret masalah, merumuskan solusi, hingga mengawal perubahannya — kami mendampingi organisasi di Indonesia dengan pendekatan berbasis data.
                </p>
                <div class="flex flex-col gap-4">
                    @foreach([
                        ['fa-graduation-cap', 'Tim Berpengalaman', 'Konsultan dengan rekam jejak lintas sektor'],
                        ['fa-chart-line', 'Berbasis Data', 'Setiap rekomendasi didukung riset & analisis'],
                        ['fa-handshake', 'Pendampingan Penuh', 'Bukan sekadar laporan, kami kawal implementasinya'],
                    ] as [$icon, $title, $desc])
                    <div class="choose-items bg-white/50 backdrop-blur-sm relative overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-r from-secondary/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <span class="w-14 h-14 rounded-full bg-primary/5 text-primary flex items-center justify-center shrink-0 text-xl group-hover:scale-110 transition-transform duration-300">
                            <i class="fa-solid {{ $icon }}"></i>
                        </span>
                        <div class="relative z-10">
                            <h4 class="text-primary font-bold text-lg mb-1">{{ $title }}</h4>
                            <p class="text-primary/70 text-sm">{{ $desc }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            {{-- Image with Ornaments --}}
            <div class="img order-1 lg:order-2 pl-0 lg:pl-10 pb-10">
                <div class="relative z-10 inline-block w-full">
                    {{-- Dotted background --}}
                    <div class="absolute -top-8 -right-8 w-40 h-40 bg-dot-pattern opacity-30 -z-10 rounded-full"></div>
                    {{-- Offset Border Box --}}
                    <div class="absolute -bottom-6 -left-6 w-full h-full border-4 border-secondary/80 rounded-2xl -z-10"></div>
                    
                    <img src="{{ asset('images/about-consulting.jpg') }}" alt="Tim Airlangga Consulting" class="w-full rounded-2xl shadow-[0_20px_50px_rgba(28,43,94,0.15)] object-cover aspect-square lg:aspect-[4/5]" onerror="this.src='https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&q=80'">
                    
                    {{-- Floating Badge --}}
                    <div class="absolute -bottom-10 right-10 bg-white p-5 rounded-2xl shadow-xl flex items-center gap-4 animate-bounce border-b-4 border-secondary" style="animation-duration: 5s;">
                        <div class="w-14 h-14 bg-primary/5 rounded-full flex items-center justify-center text-secondary text-2xl font-black">12+</div>
                        <div>
                            <p class="text-[10px] text-primary/60 font-bold uppercase tracking-widest mb-1">Pengalaman</p>
                            <p class="text-sm font-bold text-primary leading-none">Tahun Praktik</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== SERVICES SECTION ===== --}}
@if($services->count())
<section class="service-section bg-white py-16 lg:py-24 relative overflow-hidden">
    {{-- Large Text Watermark --}}
    <div class="absolute top-1/2 left-0 -translate-y-1/2 text-[200px] font-black text-gray-50 opacity-60 pointer-events-none -z-10 whitespace-nowrap select-none">
        LAYANAN KAMI
    </div>

    <div class="et-container">
        <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between gap-6 mb-12">
            <div>
                <div class="et-section-sub-title">Layanan Kami</div>
                <h2 class="et-section-title">
                    Lima Bidang Layanan<br><span>Utama Kami</span>
                </h2>
            </div>
            <a href="{{ route('services.index') }}" class="et-btn shrink-0">
                <span class="icon"><i class="fa-solid fa-arrow-up-right"></i></span>
                Lihat Semua
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $service)
            <div class="service-item group relative h-full flex flex-col cursor-pointer overflow-hidden" onclick="window.location.href='{{ route('services.index') }}#{{ $service->slug }}'">
                {{-- Hover Ornament --}}
                <div class="absolute -right-8 -top-8 w-32 h-32 bg-secondary/10 rounded-full blur-xl group-hover:bg-white/20 transition-colors duration-300"></div>
                
                <div class="flex-1 relative z-10">
                    <span class="mb-6 w-14 h-14 rounded-full bg-primary/5 text-primary flex items-center justify-center text-xl group-hover:bg-white group-hover:text-secondary transition-colors duration-300 shadow-sm group-hover:shadow-md group-hover:scale-110">
                        <i class="fa-solid {{ $service->icon ?: 'fa-briefcase' }}"></i>
                    </span>
                    <h5 class="mb-3 text-xl font-bold text-primary group-hover:text-white transition-colors duration-300">
                        {{ $service->name }}
                    </h5>
                    <p class="text-sm text-primary/70 leading-relaxed group-hover:text-white/90 transition-colors duration-300">
                        {{ $service->short_description }}
                    </p>
                </div>
                <div class="mt-6 pt-6 border-t border-gray-100 group-hover:border-white/20 transition-colors duration-300 flex justify-end relative z-10">
                    <span class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-50 text-primary group-hover:bg-white group-hover:text-primary transition-all duration-300 group-hover:translate-x-2">
                        <i class="fa-solid fa-arrow-right text-sm"></i>
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===== TESTIMONIALS SECTION ===== --}}
@if($testimonials->count())
<section class="testimonial-section py-16 lg:py-24 bg-[#F8F9FA] relative">
    <div class="absolute inset-0 bg-dot-pattern opacity-[0.04]"></div>

    <div class="et-container relative z-10">
        <div class="testimonial-wrap bg-primary max-w-5xl mx-auto rounded-3xl px-6 py-12 lg:px-16 lg:py-16 shadow-2xl relative overflow-hidden">
            {{-- Decoration --}}
            <div class="absolute inset-0 bg-grid-pattern opacity-10 pointer-events-none"></div>
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-secondary rounded-full blur-3xl opacity-20"></div>
            <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-[#2D438A] rounded-full blur-3xl opacity-50"></div>
            
            <div class="text-center mb-10 relative z-10">
                <div class="et-section-sub-title !bg-white/10 !border-white/20 !text-white mb-3">Testimoni</div>
                <h2 class="et-section-title !text-white">Apa Kata Mereka</h2>
            </div>

            <div class="swiper testimonial-slider1 relative z-10">
                <div class="swiper-wrapper">
                    @foreach($testimonials as $t)
                    <div class="swiper-slide cursor-grab">
                        <div class="text-center max-w-3xl mx-auto">
                            <i class="fa-solid fa-quote-left text-secondary text-4xl mb-6 opacity-50"></i>
                            <blockquote class="text-white text-lg md:text-xl italic font-medium leading-relaxed mb-8">
                                "{{ $t->content }}"
                            </blockquote>
                            <div>
                                <h4 class="text-white font-bold text-base">{{ $t->name }}</h4>
                                <span class="text-white/70 text-sm font-medium">{{ $t->position }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-center items-center gap-4 mt-10 relative z-10">
                <button type="button" class="array-prev w-12 h-12 flex items-center justify-center bg-white/10 hover:bg-secondary border border-white/20 hover:border-secondary rounded-full cursor-pointer transition-all duration-300 text-white hover:text-primary">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <button type="button" class="array-next w-12 h-12 flex items-center justify-center bg-white/10 hover:bg-secondary border border-white/20 hover:border-secondary rounded-full cursor-pointer transition-all duration-300 text-white hover:text-primary">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>
@endif

{{-- ===== TEAM SECTION ===== --}}
@if($teams->count())
<section class="team-section py-16 lg:py-24 bg-white relative">
    <div class="absolute right-0 bottom-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl -z-10 translate-y-1/2"></div>
    <div class="et-container relative z-10">
        <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between gap-6 mb-12">
            <div>
                <div class="et-section-sub-title">Tim Kami</div>
                <h2 class="et-section-title">
                    Orang-Orang di Balik<br><span>Setiap Proyek</span>
                </h2>
            </div>
            <a href="{{ route('about.index') }}" class="et-btn shrink-0">
                <span class="icon"><i class="fa-solid fa-users"></i></span>
                Tentang Kami
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($teams as $member)
            <div class="team-item p-8 group relative overflow-hidden bg-white hover:bg-primary transition-colors duration-500">
                <div class="absolute inset-0 bg-grid-pattern opacity-0 group-hover:opacity-10 transition-opacity duration-500"></div>
                <div class="w-24 h-24 mx-auto rounded-full overflow-hidden mb-5 border-4 border-white shadow-md group-hover:border-secondary transition-colors duration-300 relative z-10">
                    @if($member->photo)
                        <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                    @else
                        <span class="w-full h-full bg-primary text-white flex items-center justify-center text-2xl font-bold group-hover:bg-secondary group-hover:text-primary transition-colors">
                            {{ $member->initial }}
                        </span>
                    @endif
                </div>
                <h5 class="font-bold text-primary text-lg mb-1 group-hover:text-white transition-colors relative z-10">{{ $member->name }}</h5>
                <span class="text-sm text-primary/70 font-medium group-hover:text-white/70 transition-colors relative z-10">{{ $member->position }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===== SECTORS SECTION ===== --}}
@if($sectors->count())
<section class="industries-section bg-[#F8F9FA] py-16 lg:py-24 border-y border-gray-200 relative overflow-hidden">
    <div class="absolute inset-0 bg-dot-pattern opacity-[0.03]"></div>
    <div class="et-container relative z-10">
        <div class="flex flex-col lg:flex-row gap-12 lg:items-center">

            {{-- Kiri: Grafik Pertumbuhan Klien --}}
            <div class="w-full lg:w-1/2 relative">
                <div class="absolute -top-10 -left-10 w-64 h-64 bg-[#F5A800] opacity-10 rounded-full blur-3xl -z-10"></div>

                <div class="relative w-full rounded-2xl bg-white p-7 shadow-[0_8px_30px_rgba(0,0,0,0.08)] border border-gray-100">

                    {{-- Header teks di kiri --}}
                    <div class="mb-5">
                        <p class="text-xs font-bold text-secondary uppercase tracking-widest mb-1">Pertumbuhan Klien</p>
                        <h4 class="text-[#1C2B5E] font-bold text-xl lg:text-2xl leading-tight">Dampak nyata rata-rata<br>pasca pendampingan</h4>
                    </div>

                    {{-- Badge stat --}}
                    <div class="inline-flex items-center gap-2 bg-emerald-50 border border-emerald-100 rounded-full px-3 py-1.5 mb-6">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span class="text-xs font-bold text-emerald-600">Rata-rata peningkatan</span>
                        <span class="text-sm font-black text-[#1C2B5E]">+125%</span>
                    </div>

                    {{-- Chart area --}}
                    <div class="relative w-full" style="height: 200px;">
                        <svg viewBox="0 0 420 180" preserveAspectRatio="none" class="w-full h-full">
                            <defs>
                                {{-- Area fill gradient --}}
                                <linearGradient id="areaGrad" x1="0" y1="0" x2="0" y2="1">
                                    <stop offset="0%" stop-color="#1C2B5E" stop-opacity="0.18"/>
                                    <stop offset="100%" stop-color="#1C2B5E" stop-opacity="0.01"/>
                                </linearGradient>
                                {{-- Line gradient --}}
                                <linearGradient id="lineGrad" x1="0" y1="0" x2="1" y2="0">
                                    <stop offset="0%" stop-color="#3B82F6"/>
                                    <stop offset="100%" stop-color="#1C2B5E"/>
                                </linearGradient>
                                <filter id="glow">
                                    <feGaussianBlur stdDeviation="3" result="blur"/>
                                    <feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge>
                                </filter>
                            </defs>

                            {{-- Y-axis grid lines & labels --}}
                            <line x1="48" y1="20" x2="410" y2="20" stroke="#F3F4F6" stroke-width="1.5" stroke-dasharray="5,4"/>
                            <line x1="48" y1="55" x2="410" y2="55" stroke="#F3F4F6" stroke-width="1.5" stroke-dasharray="5,4"/>
                            <line x1="48" y1="90" x2="410" y2="90" stroke="#F3F4F6" stroke-width="1.5" stroke-dasharray="5,4"/>
                            <line x1="48" y1="125" x2="410" y2="125" stroke="#F3F4F6" stroke-width="1.5" stroke-dasharray="5,4"/>
                            <line x1="48" y1="155" x2="410" y2="155" stroke="#E5E7EB" stroke-width="1.5"/>

                            <text x="40" y="24" text-anchor="end" font-size="9" fill="#9CA3AF" font-family="sans-serif">4k</text>
                            <text x="40" y="59" text-anchor="end" font-size="9" fill="#9CA3AF" font-family="sans-serif">3k</text>
                            <text x="40" y="94" text-anchor="end" font-size="9" fill="#9CA3AF" font-family="sans-serif">2k</text>
                            <text x="40" y="129" text-anchor="end" font-size="9" fill="#9CA3AF" font-family="sans-serif">1k</text>
                            <text x="40" y="159" text-anchor="end" font-size="9" fill="#9CA3AF" font-family="sans-serif">0</text>

                            {{-- Area fill --}}
                            <path d="M 48 145 L 108 55 L 168 130 L 228 20 L 288 100 L 348 68 L 408 90 L 408 155 L 48 155 Z"
                                  fill="url(#areaGrad)"/>

                            {{-- Line --}}
                            <path d="M 48 145 L 108 55 L 168 130 L 228 20 L 288 100 L 348 68 L 408 90"
                                  fill="none" stroke="url(#lineGrad)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>

                            {{-- Data points --}}
                            <circle cx="48"  cy="145" r="4" fill="white" stroke="#3B82F6" stroke-width="2"/>
                            <circle cx="108" cy="55"  r="4" fill="white" stroke="#2563EB" stroke-width="2"/>
                            <circle cx="168" cy="130" r="4" fill="white" stroke="#2563EB" stroke-width="2"/>
                            <circle cx="288" cy="100" r="4" fill="white" stroke="#1D4ED8" stroke-width="2"/>
                            <circle cx="348" cy="68"  r="4" fill="white" stroke="#1C2B5E" stroke-width="2"/>
                            <circle cx="408" cy="90"  r="4" fill="white" stroke="#1C2B5E" stroke-width="2"/>

                            {{-- Highlighted point (peak) --}}
                            <circle cx="228" cy="20" r="6" fill="#1C2B5E" stroke="white" stroke-width="2.5"/>

                            {{-- Tooltip on peak --}}
                            <rect x="198" y="0" width="60" height="22" rx="5" fill="#1C2B5E"/>
                            <polygon points="225,22 232,30 239,22" fill="#1C2B5E"/>
                            <text x="228" y="14" text-anchor="middle" font-size="9" font-weight="bold" fill="white" font-family="sans-serif">+125%</text>

                            {{-- X-axis labels --}}
                            <text x="48"  y="172" text-anchor="middle" font-size="9" fill="#9CA3AF" font-family="sans-serif">Q1</text>
                            <text x="108" y="172" text-anchor="middle" font-size="9" fill="#9CA3AF" font-family="sans-serif">Q2</text>
                            <text x="168" y="172" text-anchor="middle" font-size="9" fill="#9CA3AF" font-family="sans-serif">Q3</text>
                            <text x="228" y="172" text-anchor="middle" font-size="9" fill="#1C2B5E" font-weight="bold" font-family="sans-serif">Q4</text>
                            <text x="288" y="172" text-anchor="middle" font-size="9" fill="#9CA3AF" font-family="sans-serif">Q5</text>
                            <text x="348" y="172" text-anchor="middle" font-size="9" fill="#9CA3AF" font-family="sans-serif">Q6</text>
                            <text x="408" y="172" text-anchor="middle" font-size="9" fill="#9CA3AF" font-family="sans-serif">Q7</text>
                        </svg>
                    </div>
                </div>
            </div>


            {{-- Kanan: Daftar Sektor (Card Style) --}}
            <div class="w-full lg:w-1/2">
                <div class="et-section-sub-title">Sektor Klien</div>
                <h3 class="et-section-title mb-6">
                    Organisasi yang Sudah <br>Kami Dampingi
                </h3>

                <ul class="space-y-3">
                    @foreach($sectors as $sector)
                    <li>
                        <a href="#" class="group flex items-center justify-between p-3 md:p-4 bg-white hover:bg-primary border border-transparent border-b-gray-100 hover:border-primary rounded-xl transition-all duration-300 shadow-sm hover:shadow-md">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-[#F8F9FA] group-hover:bg-white/10 flex items-center justify-center text-primary group-hover:text-white transition-colors duration-300 shrink-0">
                                    <i class="fa-solid fa-building text-xs"></i>
                                </div>
                                <span class="font-bold text-primary group-hover:text-white transition-colors duration-300 text-sm md:text-base">{{ $sector->name }}</span>
                            </div>
                            <span class="flex items-center justify-center bg-gray-50 group-hover:bg-secondary rounded-full w-7 h-7 transition-all duration-300 text-[10px] text-primary shrink-0">
                                <i class="fa-solid fa-arrow-right -rotate-45 group-hover:rotate-0 transition-transform duration-300"></i>
                            </span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@endif

{{-- ===== FAQ SECTION ===== --}}
@if($faqs->count())
<section class="faqs-section bg-white py-16 lg:py-24 relative overflow-hidden">
    <div class="absolute left-0 top-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-primary/5 rounded-full blur-3xl -z-10 -translate-x-1/2"></div>
    <div class="et-container relative z-10">
        <div class="text-center mb-12">
            <div class="et-section-sub-title">FAQ</div>
            <h2 class="et-section-title">
                Pertanyaan yang <br><span>Sering Diajukan</span>
            </h2>
        </div>

        <div class="flex flex-col lg:flex-row gap-10 items-start">
            <div class="w-full lg:w-3/5">
                <div class="space-y-4">
                    @foreach($faqs as $i => $faq)
                    <div class="accordion-item {{ $i === 0 ? 'open' : '' }} bg-white hover:bg-[#F8F9FA] rounded-xl border border-gray-200 overflow-hidden shadow-sm transition-colors duration-300">
                        <button class="accordion-button w-full flex items-center justify-between gap-4 text-left text-primary font-bold px-6 py-5" type="button">
                            {{ $faq->question }}
                            <span class="shrink-0 w-8 h-8 flex items-center justify-center bg-white border border-gray-100 rounded-full shadow-sm transition-transform duration-300 {{ $i === 0 ? 'text-secondary rotate-180 border-secondary/30' : 'text-primary' }}">
                                <i class="fa-solid fa-chevron-down text-sm"></i>
                            </span>
                        </button>
                        <div class="accordion-collapse">
                            <div class="px-6 pb-6">
                                <p class="text-primary/70 text-base leading-relaxed">{{ $faq->answer }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="w-full lg:w-2/5">
                <div class="bg-primary rounded-2xl p-8 lg:p-10 shadow-2xl relative overflow-hidden group">
                    <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-secondary rounded-full blur-2xl opacity-30 group-hover:opacity-50 transition-opacity duration-500"></div>
                    
                    <i class="fa-solid fa-comments text-9xl absolute -bottom-4 -right-4 text-white/10 group-hover:scale-110 transition-transform duration-500"></i>
                    
                    <div class="relative z-10">
                        <h3 class="text-white font-bold text-2xl mb-4 leading-tight">Masih ada pertanyaan? Kami siap membantu.</h3>
                        <p class="text-white/70 text-base mb-8">
                            Hubungi tim kami untuk mendapatkan kejelasan dan jadwal diskusi sebelum memulai kerja sama.
                        </p>
                        <a href="{{ route('contact.index') }}" class="et-btn bg-secondary w-full justify-center text-primary">
                            <span class="icon bg-white text-primary"><i class="fa-brands fa-whatsapp"></i></span>
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- ===== BLOG SECTION ===== --}}
@if($posts->count())
<section class="blog-section py-16 lg:py-24 bg-[#F8F9FA] border-t border-gray-200 relative">
    <div class="absolute right-0 top-0 w-64 h-64 bg-grid-pattern opacity-[0.04]"></div>
    
    <div class="et-container relative z-10">
        <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between gap-6 mb-12">
            <div>
                <div class="et-section-sub-title">Insight Terbaru</div>
                <h2 class="et-section-title">
                    Belajar dari <br><span>Blog Kami</span>
                </h2>
            </div>
            <a href="{{ route('blog.index') }}" class="et-btn shrink-0">
                <span class="icon"><i class="fa-solid fa-newspaper"></i></span>
                Semua Artikel
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <div class="blog-card flex flex-col group h-full relative">
                <div class="overflow-hidden relative aspect-[16/10]">
                    @if($post->thumbnail)
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center transition duration-700 group-hover:scale-110">
                            <i class="fa-solid fa-newspaper text-5xl text-white"></i>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    @if($post->category)
                        <div class="absolute top-4 left-4 bg-white/95 backdrop-blur text-primary text-xs font-bold px-3 py-1.5 rounded-md shadow-sm">
                            {{ $post->category->name }}
                        </div>
                    @endif
                </div>
                <div class="p-6 flex flex-col flex-1 bg-white">
                    <div class="text-xs text-primary/50 font-semibold mb-3">
                        <i class="fa-regular fa-calendar mr-1"></i> {{ $post->published_at->translatedFormat('d M Y') }}
                    </div>
                    <h5 class="text-lg font-bold text-primary leading-snug mb-4 group-hover:text-secondary transition-colors">
                        <a href="{{ route('blog.show', $post->slug) }}" class="before:absolute before:inset-0">{{ $post->title }}</a>
                    </h5>
                    
                    <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between text-sm font-bold text-primary group-hover:text-secondary transition-colors">
                        Baca Artikel
                        <i class="fa-solid fa-arrow-right -rotate-45 group-hover:rotate-0 transition-transform duration-300"></i>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===== CTA SECTION ===== --}}
<section class="py-12 bg-white relative overflow-hidden">
    <div class="et-container relative z-10">
        <div class="bg-primary rounded-3xl p-8 lg:p-14 flex flex-col lg:flex-row items-center justify-between gap-8 shadow-2xl relative overflow-hidden group">
            {{-- Abstract Shapes --}}
            <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
            <div class="absolute -top-32 -left-32 w-80 h-80 bg-secondary rounded-full blur-[80px] opacity-20 group-hover:opacity-40 transition-opacity duration-700"></div>
            <div class="absolute -bottom-32 -right-32 w-80 h-80 bg-[#344E9A] rounded-full blur-[80px] opacity-40 group-hover:opacity-60 transition-opacity duration-700"></div>
            
            <div class="absolute top-10 right-20 text-white/10 text-4xl animate-pulse"><i class="fa-solid fa-asterisk"></i></div>
            
            <h3 class="text-white text-3xl lg:text-4xl font-bold leading-tight max-w-2xl relative z-10 text-center lg:text-left">
                Siap mendiskusikan kebutuhan strategis organisasi Anda?
            </h3>
            <a href="{{ route('contact.index') }}" class="et-btn bg-secondary text-primary shrink-0 relative z-10 hover:scale-105 transition-transform duration-300 shadow-xl shadow-secondary/20">
                <span class="icon bg-white text-primary"><i class="fa-solid fa-comments"></i></span>
                Jadwalkan Diskusi
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Testimonial Swiper
    document.addEventListener('DOMContentLoaded', function () {
        if(document.querySelector('.testimonial-slider1')) {
            const testimonialSwiper = new Swiper('.testimonial-slider1', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 24,
                navigation: {
                    prevEl: '.array-prev',
                    nextEl: '.array-next',
                },
                autoplay: { delay: 5000, disableOnInteraction: false },
            });
        }
    });
</script>
@endpush
