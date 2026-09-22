@extends('layouts.app')

@section('title', 'Tentang Kami | PT. Airlangga Univ Konsultan')

@section('content')

{{-- Header Banner --}}
<div class="bg-[#1C2B5E] py-16 lg:py-20 relative overflow-hidden">
    <x-hero-bg />

    <div class="et-container relative z-10 text-center">
        <div class="et-section-sub-title !bg-white/10 !border-white/20 !text-white mb-4">Tentang Kami</div>
        <h1 class="text-white text-4xl md:text-5xl lg:text-[52px] font-bold mb-6 leading-tight">Mengenal Lebih Dekat<br><span class="text-[#F5A800]">PT. Airlangga Univ Konsultan</span></h1>
        <p class="text-white/65 max-w-2xl mx-auto text-lg leading-relaxed">
            Mitra strategis dalam transformasi organisasi, pengembangan SDM, dan inovasi bisnis yang berkelanjutan.
        </p>
    </div>
</div>

{{-- Story Section --}}
<div class="py-20">
    <div class="et-container">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            <div>
                <img src="{{ asset('images/about-consulting.jpg') }}" alt="Tentang Kami" class="w-full rounded-2xl shadow-xl" onerror="this.src='https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&q=80'">
            </div>
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-primary mb-6">Profil & Sejarah <span class="text-[#F5A800]">Perusahaan</span></h2>
                <div class="space-y-4 text-primary/70 leading-relaxed text-justify">
                    <p>
                        <strong>PT. Airlangga Univ Konsultan</strong> adalah perusahaan yang membantu organisasi, perusahaan, instansi pemerintah, maupun individu dalam meningkatkan kinerja dan mencapai tujuan strategis melalui layanan konsultasi yang berbasis keilmuan dan praktik profesional.
                    </p>
                    <p>
                        Kami memposisikan diri bukan sekadar sebagai pembuat laporan, melainkan sebagai <strong class="text-primary">pendamping transformasi</strong> yang memastikan setiap strategi dapat dieksekusi dengan baik di lapangan untuk menjawab tantangan dinamika bisnis dan birokrasi di Indonesia.
                    </p>
                </div>
                
                {{-- Info Legalitas Highlight Box --}}
                <div class="mt-6 p-5 bg-[#1C2B5E]/5 border-l-4 border-[#F5A800] rounded-r-xl">
                    <div class="flex items-start gap-4">
                        <i class="fa-solid fa-scale-balanced text-xl text-[#F5A800] mt-1"></i>
                        <p class="text-sm text-primary/80 leading-relaxed text-justify">
                            Airlangga Univ Konsultan dibentuk pada tanggal <strong>23 Maret 2021</strong> sesuai Akta Pendirian Perusahaan No. 14 Tanggal 23 Maret 2021, serta mendapatkan pengesahan sesuai dengan Keputusan Menteri Hukum & Hak Asasi Manusia Republik Indonesia <span class="font-semibold text-primary">AHU-00064.AH.02.01.Tahun 2020</span>.
                        </p>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-10">
                    <div class="bg-[#F8F9FA] p-6 rounded-xl border border-gray-100">
                        <i class="fa-solid fa-eye text-3xl text-[#F5A800] mb-4"></i>
                        <h4 class="font-bold text-primary mb-2">Visi</h4>
                        <p class="text-sm text-primary/70">Menjadi mitra konsultan terpercaya di tingkat nasional yang mendorong keunggulan organisasi.</p>
                    </div>
                    <div class="bg-[#F8F9FA] p-6 rounded-xl border border-gray-100">
                        <i class="fa-solid fa-bullseye text-3xl text-[#F5A800] mb-4"></i>
                        <h4 class="font-bold text-primary mb-2">Misi</h4>
                        <p class="text-sm text-primary/70">Memberikan solusi aplikatif berbasis riset, data, dan pemahaman mendalam atas konteks klien.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Stats Section --}}
@if($stats->count())
<div class="bg-[#F8F9FA] py-16 border-y border-gray-200">
    <div class="et-container">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            @foreach($stats as $stat)
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-primary mb-2">{{ $stat->value }}</div>
                <div class="text-primary/70 font-medium">{{ $stat->label }}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

{{-- Team Section --}}
@if($teams->count())
<div class="py-20">
    <div class="et-container">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="et-section-sub-title mb-4">Tim Kami</div>
            <h2 class="et-section-title">Para Ahli di Balik <span>Airlangga</span></h2>
            <p class="text-primary/70 mt-4">Kami adalah kolaborasi antara akademisi, praktisi industri, dan spesialis teknis yang mendedikasikan diri untuk merumuskan solusi terbaik.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($teams as $member)
            <div class="bg-white border border-gray-100 rounded-2xl p-6 text-center shadow-sm hover:shadow-md transition group">
                <div class="w-32 h-32 mx-auto mb-6 rounded-full overflow-hidden border-4 border-[#F8F9FA] group-hover:border-[#F5A800] transition duration-300">
                    @if($member->photo)
                        <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-primary flex items-center justify-center text-white text-4xl font-bold">
                            {{ $member->initial }}
                        </div>
                    @endif
                </div>
                <h4 class="font-bold text-primary text-lg mb-1">{{ $member->name }}</h4>
                <p class="text-[#F5A800] text-sm font-medium mb-4">{{ $member->position }}</p>
                @if($member->bio)
                    <p class="text-primary/60 text-sm mb-4 line-clamp-3">{{ $member->bio }}</p>
                @endif
                @if($member->linkedin)
                    <a href="{{ $member->linkedin }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gray-50 text-primary hover:bg-[#F5A800] hover:text-white transition">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

{{-- CTA Section --}}
<div class="py-20 bg-white">
    <div class="et-container">
        <div class="bg-primary rounded-3xl p-10 lg:p-16 text-center">
            <h2 class="text-white text-3xl lg:text-4xl font-bold mb-6">Siap Memulai Transformasi?</h2>
            <p class="text-white/80 max-w-2xl mx-auto mb-10">Mari jadwalkan diskusi awal. Tim ahli kami akan memetakan tantangan yang Anda hadapi dan menawarkan pendekatan solusi terbaik tanpa komitmen biaya di awal.</p>
            <a href="{{ route('contact.index') }}" class="et-btn bg-secondary text-primary">
                <span class="icon"><i class="fa-solid fa-comments"></i></span>
                Jadwalkan Konsultasi Gratis
            </a>
        </div>
    </div>
</div>
@endsection
