@extends('layouts.app')

@section('title', 'Program & Jadwal | Airlangga Consulting')

@section('content')
<div class="bg-[#1C2B5E] py-24 lg:py-32 relative overflow-hidden">
    <x-hero-bg />

    <div class="et-container relative z-10 text-center">
        <div class="et-section-sub-title !bg-white/10 !border-white/20 !text-white mb-4">Program & Jadwal</div>
        <h1 class="text-white text-4xl md:text-5xl lg:text-[52px] font-bold mb-6 leading-tight">Tingkatkan <span class="text-[#F5A800]">Kompetensi</span><br>Organisasi Anda</h1>
        <p class="text-white/65 max-w-2xl mx-auto text-lg leading-relaxed">
            Daftar pelatihan, lokakarya, dan program sertifikasi yang dirancang untuk menjawab tantangan industri dan birokrasi terkini.
        </p>
    </div>
</div>

<div class="py-16 bg-[#F8F9FA]">
    <div class="et-container">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($programs as $program)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition group flex flex-col h-full">
                <div class="relative aspect-video overflow-hidden bg-gray-100">
                    @if($program->thumbnail)
                        <img src="{{ asset('storage/' . $program->thumbnail) }}" alt="{{ $program->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-300">
                            <i class="fa-solid fa-chalkboard-user text-5xl"></i>
                        </div>
                    @endif
                    
                    @if($program->format)
                    <div class="absolute top-4 left-4 bg-primary text-white text-xs font-bold px-3 py-1 rounded">
                        {{ $program->format }}
                    </div>
                    @endif
                </div>

                <div class="p-6 flex flex-col flex-1">
                    <h3 class="text-xl font-bold text-primary mb-3 leading-snug">
                        <a href="{{ route('programs.show', $program->slug) }}" class="hover:text-[#F5A800] transition">{{ $program->title }}</a>
                    </h3>
                    
                    <div class="space-y-2 text-sm text-primary/70 mb-6">
                        <div class="flex items-start gap-3">
                            <i class="fa-regular fa-calendar mt-1 text-[#F5A800]"></i>
                            <span>
                                {{ $program->start_date ? $program->start_date->translatedFormat('d M Y') : 'Jadwal Menyusul' }}
                                @if($program->end_date && $program->start_date != $program->end_date)
                                    - {{ $program->end_date->translatedFormat('d M Y') }}
                                @endif
                            </span>
                        </div>
                        @if($program->location)
                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-location-dot mt-1 text-[#F5A800]"></i>
                            <span>{{ $program->location }}</span>
                        </div>
                        @endif
                    </div>

                    <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                        <span class="font-bold text-primary">{{ $program->formatted_price }}</span>
                        <a href="{{ route('programs.show', $program->slug) }}" class="et-btn !py-1.5 !px-4 !text-xs">
                            Detail
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20 bg-white rounded-2xl border border-gray-100">
                <i class="fa-regular fa-calendar-xmark text-6xl text-primary/20 mb-4 block"></i>
                <h3 class="text-xl font-bold text-primary mb-2">Belum Ada Program</h3>
                <p class="text-primary/60">Jadwal program pelatihan terbaru sedang kami susun.</p>
            </div>
            @endforelse
        </div>

        @if($programs->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $programs->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
