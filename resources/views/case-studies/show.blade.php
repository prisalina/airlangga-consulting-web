@extends('layouts.app')

@section('title', $caseStudy->title . ' | Airlangga Consulting')

@section('content')
<div class="py-12 bg-[#F8F9FA] border-b border-gray-200">
    <div class="et-container">
        <nav class="flex text-sm text-primary/60 mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li><a href="{{ route('home') }}" class="hover:text-primary">Beranda</a></li>
                <li><i class="fa-solid fa-chevron-right text-[10px]"></i></li>
                <li><a href="{{ route('case-studies.index') }}" class="hover:text-primary">Studi Kasus</a></li>
                <li><i class="fa-solid fa-chevron-right text-[10px]"></i></li>
                <li class="text-[#F5A800] font-medium truncate max-w-[200px]">{{ $caseStudy->title }}</li>
            </ol>
        </nav>

        <div class="max-w-4xl mx-auto text-center">
            @if($caseStudy->client)
                <div class="inline-block bg-primary/5 text-primary text-sm font-bold px-4 py-1.5 rounded-full mb-6 uppercase tracking-widest border border-primary/10">
                    Klien: {{ $caseStudy->client }}
                </div>
            @endif
            
            <h1 class="text-3xl md:text-5xl font-bold text-primary leading-tight mb-8">{{ $caseStudy->title }}</h1>
            
            <div class="flex flex-wrap items-center justify-center gap-x-10 gap-y-4 text-primary/80 border-y border-gray-200 py-4 mb-10">
                @if($caseStudy->sector)
                <div class="flex flex-col items-center">
                    <span class="text-xs font-bold uppercase text-primary/50 mb-1">Sektor</span>
                    <span class="font-semibold">{{ $caseStudy->sector }}</span>
                </div>
                @endif
                
                @if($caseStudy->service_type)
                <div class="flex flex-col items-center">
                    <span class="text-xs font-bold uppercase text-primary/50 mb-1">Layanan</span>
                    <span class="font-semibold">{{ $caseStudy->service_type }}</span>
                </div>
                @endif
                
                @if($caseStudy->completed_at)
                <div class="flex flex-col items-center">
                    <span class="text-xs font-bold uppercase text-primary/50 mb-1">Penyelesaian</span>
                    <span class="font-semibold">{{ $caseStudy->completed_at->translatedFormat('F Y') }}</span>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="py-16">
    <div class="et-container max-w-4xl">
        @if($caseStudy->thumbnail)
            <div class="w-full aspect-[21/9] rounded-2xl overflow-hidden mb-16 shadow-lg">
                <img src="{{ asset('storage/' . $caseStudy->thumbnail) }}" alt="{{ $caseStudy->title }}" class="w-full h-full object-cover">
            </div>
        @endif

        <article class="prose prose-lg prose-primary max-w-none prose-img:rounded-xl prose-img:shadow-sm prose-headings:font-bold prose-headings:text-primary">
            {!! $caseStudy->content !!}
        </article>

        <div class="mt-20 p-10 bg-[#1C2B5E] rounded-3xl text-center relative overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 right-0 w-64 h-64 bg-[#F5A800] rounded-full blur-3xl"></div>
            </div>
            <div class="relative z-10">
                <h3 class="text-2xl font-bold text-white mb-4">Ingin mencapai hasil serupa?</h3>
                <p class="text-white/80 mb-8 max-w-lg mx-auto">Kami siap merumuskan strategi dan mendampingi transformasi organisasi Anda menuju performa optimal.</p>
                <a href="{{ route('contact.index') }}" class="et-btn bg-secondary text-primary">
                    <span class="icon"><i class="fa-solid fa-arrow-right"></i></span>
                    Mulai Diskusi
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
