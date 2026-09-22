@extends('layouts.app')

@section('title', $program->title . ' | Airlangga Consulting')

@section('content')
<div class="py-12 bg-[#F8F9FA] border-b border-gray-200">
    <div class="et-container">
        <nav class="flex text-sm text-primary/60 mb-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li><a href="{{ route('home') }}" class="hover:text-primary">Beranda</a></li>
                <li><i class="fa-solid fa-chevron-right text-[10px]"></i></li>
                <li><a href="{{ route('programs.index') }}" class="hover:text-primary">Program</a></li>
                <li><i class="fa-solid fa-chevron-right text-[10px]"></i></li>
                <li class="text-[#F5A800] font-medium truncate max-w-[200px]">{{ $program->title }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="py-16">
    <div class="et-container">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            
            <div class="lg:col-span-2">
                <h1 class="text-3xl md:text-4xl font-bold text-primary leading-tight mb-6">{{ $program->title }}</h1>
                
                @if($program->thumbnail)
                    <img src="{{ asset('storage/' . $program->thumbnail) }}" alt="{{ $program->title }}" class="w-full rounded-2xl shadow-sm mb-10 aspect-video object-cover">
                @endif

                <div class="prose prose-lg prose-primary max-w-none">
                    {!! $program->content !!}
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] p-8 sticky top-32">
                    <h3 class="font-bold text-xl text-primary mb-6 pb-4 border-b border-gray-100">Informasi Program</h3>
                    
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start gap-4 text-primary/80">
                            <i class="fa-regular fa-calendar-check text-[#F5A800] mt-1 text-lg w-5 text-center"></i>
                            <div>
                                <span class="block font-semibold text-primary">Tanggal Pelaksanaan</span>
                                {{ $program->start_date ? $program->start_date->translatedFormat('d M Y') : 'Jadwal Menyusul' }}
                                @if($program->end_date && $program->start_date != $program->end_date)
                                    - {{ $program->end_date->translatedFormat('d M Y') }}
                                @endif
                            </div>
                        </li>
                        
                        <li class="flex items-start gap-4 text-primary/80">
                            <i class="fa-solid fa-video text-[#F5A800] mt-1 text-lg w-5 text-center"></i>
                            <div>
                                <span class="block font-semibold text-primary">Format</span>
                                {{ $program->format ?: 'TBA' }}
                            </div>
                        </li>

                        @if($program->location)
                        <li class="flex items-start gap-4 text-primary/80">
                            <i class="fa-solid fa-location-dot text-[#F5A800] mt-1 text-lg w-5 text-center"></i>
                            <div>
                                <span class="block font-semibold text-primary">Lokasi</span>
                                {{ $program->location }}
                            </div>
                        </li>
                        @endif

                        @if($program->quota)
                        <li class="flex items-start gap-4 text-primary/80">
                            <i class="fa-solid fa-users text-[#F5A800] mt-1 text-lg w-5 text-center"></i>
                            <div>
                                <span class="block font-semibold text-primary">Kuota Peserta</span>
                                Maksimal {{ $program->quota }} Orang
                            </div>
                        </li>
                        @endif
                    </ul>

                    <div class="bg-[#F8F9FA] rounded-xl p-4 mb-6 text-center">
                        <span class="block text-sm text-primary/60 mb-1">Investasi Program</span>
                        <span class="block text-2xl font-bold text-primary">{{ $program->formatted_price }}</span>
                    </div>

                    @if($program->registration_link)
                        <a href="{{ $program->registration_link }}" target="_blank" rel="noopener" class="et-btn w-full justify-center text-center !text-base !py-3">
                            <span class="icon"><i class="fa-solid fa-check"></i></span>
                            Daftar Sekarang
                        </a>
                    @else
                        <a href="{{ route('contact.index') }}?service=Program:+{{ urlencode($program->title) }}" class="et-btn w-full justify-center text-center !text-base !py-3">
                            <span class="icon"><i class="fa-brands fa-whatsapp"></i></span>
                            Hubungi Admin
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
