@extends('layouts.app')

@section('title', 'Studi Kasus & Portofolio | PT. Airlangga Univ Konsultan')

@section('content')
<div class="bg-[#1C2B5E] py-16 lg:py-20 relative overflow-hidden">
    <x-hero-bg />

    <div class="et-container relative z-10 text-center">
        <div class="et-section-sub-title !bg-white/10 !border-white/20 !text-white mb-4">Studi Kasus</div>
        <h1 class="text-white text-4xl md:text-5xl lg:text-[52px] font-bold mb-6 leading-tight">Jejak Karya &<br><span class="text-[#F5A800]">Dampak Kami</span></h1>
        <p class="text-white/65 max-w-2xl mx-auto text-lg leading-relaxed">
            Menelusuri proses dan metodologi bagaimana kami mendampingi mitra mencapai target, menyelesaikan masalah, dan bertransformasi.
        </p>
    </div>
</div>

<div class="py-16 bg-[#F8F9FA]">
    <div class="et-container">
        
        <div class="space-y-12">
            @forelse($caseStudies as $case)
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition duration-300 group flex flex-col md:flex-row">
                <div class="md:w-2/5 relative overflow-hidden">
                    @if($case->thumbnail)
                        <img src="{{ asset('storage/' . $case->thumbnail) }}" alt="{{ $case->title }}" class="w-full h-full object-cover min-h-[300px] group-hover:scale-105 transition duration-700">
                    @else
                        <div class="w-full h-full min-h-[300px] bg-gray-100 flex items-center justify-center text-gray-300">
                            <i class="fa-solid fa-image text-6xl"></i>
                        </div>
                    @endif
                    <div class="absolute top-4 left-4 flex flex-col gap-2">
                        @if($case->sector)
                            <span class="bg-[#F5A800] text-primary text-xs font-bold px-3 py-1 rounded shadow-sm">
                                {{ $case->sector }}
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="md:w-3/5 p-8 md:p-10 flex flex-col justify-center">
                    @if($case->client)
                        <div class="text-sm font-bold text-primary/60 mb-2 uppercase tracking-wider">{{ $case->client }}</div>
                    @endif
                    
                    <h2 class="text-2xl md:text-3xl font-bold text-primary mb-4 leading-snug">
                        <a href="{{ route('case-studies.show', $case->slug) }}" class="hover:text-[#F5A800] transition">{{ $case->title }}</a>
                    </h2>
                    
                    <p class="text-primary/70 mb-8 leading-relaxed">
                        {{ $case->excerpt }}
                    </p>

                    <div class="flex flex-wrap items-center justify-between gap-4 mt-auto pt-6 border-t border-gray-100">
                        <div class="flex items-center gap-6">
                            @if($case->service_type)
                                <div class="flex flex-col">
                                    <span class="text-[11px] text-primary/50 font-bold uppercase mb-0.5">Layanan</span>
                                    <span class="text-sm font-semibold text-primary">{{ $case->service_type }}</span>
                                </div>
                            @endif
                            @if($case->completed_at)
                                <div class="flex flex-col">
                                    <span class="text-[11px] text-primary/50 font-bold uppercase mb-0.5">Selesai</span>
                                    <span class="text-sm font-semibold text-primary">{{ $case->completed_at->translatedFormat('F Y') }}</span>
                                </div>
                            @endif
                        </div>
                        
                        <a href="{{ route('case-studies.show', $case->slug) }}" class="inline-flex items-center gap-2 font-bold text-primary group-hover:text-[#F5A800] transition">
                            Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-20 bg-white rounded-2xl border border-gray-100">
                <i class="fa-solid fa-folder-open text-6xl text-primary/20 mb-4 block"></i>
                <h3 class="text-xl font-bold text-primary mb-2">Belum Ada Studi Kasus</h3>
                <p class="text-primary/60">Dokumentasi portofolio sedang kami lengkapi.</p>
            </div>
            @endforelse
        </div>

        @if($caseStudies->hasPages())
        <div class="mt-16 flex justify-center">
            {{ $caseStudies->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
