@extends('layouts.app')

@section('title', 'Blog & Insight | PT. Airlangga Univ Konsultan')

@section('content')

<div class="bg-[#1C2B5E] py-16 lg:py-20 relative overflow-hidden">
    <x-hero-bg />

    <div class="et-container relative z-10 text-center max-w-3xl mx-auto">
        <div class="et-section-sub-title !bg-white/10 !border-white/20 !text-white mb-4">Blog & Insight</div>
        <h1 class="text-white text-4xl md:text-5xl lg:text-[52px] font-bold mb-6 leading-tight">Insight & <span class="text-[#F5A800]">Artikel</span></h1>
        <p class="text-white/65 max-w-2xl mx-auto text-lg leading-relaxed">Temukan berbagai tulisan, pemikiran, dan studi kasus terbaru seputar manajemen, transformasi organisasi, bisnis, dan pengembangan SDM.</p>
    </div>
</div>

<div class="py-16">
    <div class="et-container">
        
        {{-- Categories Filter --}}
        @if($categories->count())
        <div class="flex flex-wrap items-center justify-center gap-3 mb-12">
            <a href="{{ route('blog.index') }}" class="px-5 py-2 rounded-full border {{ !request('kategori') ? 'bg-primary text-white border-primary' : 'bg-white text-primary/70 border-gray-200 hover:border-[#F5A800] hover:text-[#F5A800]' }} transition text-sm font-semibold">
                Semua Topik
            </a>
            @foreach($categories as $category)
                @if($category->posts_count > 0)
                <a href="{{ route('blog.index', ['kategori' => $category->slug]) }}" class="px-5 py-2 rounded-full border {{ request('kategori') == $category->slug ? 'bg-primary text-white border-primary' : 'bg-white text-primary/70 border-gray-200 hover:border-[#F5A800] hover:text-[#F5A800]' }} transition text-sm font-semibold">
                    {{ $category->name }} <span class="ml-1 opacity-70">({{ $category->posts_count }})</span>
                </a>
                @endif
            @endforeach
        </div>
        @endif

        {{-- Posts Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
            <div class="blog-card flex flex-col h-full bg-white border border-gray-100 group">
                <div class="overflow-hidden aspect-[16/10] relative">
                    @if($post->thumbnail)
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
                    @else
                        <div class="w-full h-full bg-[#F8F9FA] flex items-center justify-center text-primary/20">
                            <i class="fa-solid fa-newspaper text-5xl"></i>
                        </div>
                    @endif
                    @if($post->category)
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur text-primary text-xs font-bold px-3 py-1.5 rounded-md">
                            {{ $post->category->name }}
                        </div>
                    @endif
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <div class="text-xs text-primary/60 mb-3 flex items-center gap-2">
                        <i class="fa-regular fa-calendar"></i>
                        {{ $post->published_at->translatedFormat('d F Y') }}
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-3 leading-snug group-hover:text-[#F5A800] transition">
                        <a href="{{ route('blog.show', $post->slug) }}" class="before:absolute before:inset-0">{{ $post->title }}</a>
                    </h3>
                    <p class="text-primary/70 text-sm line-clamp-3 mb-6">{{ $post->excerpt }}</p>
                    
                    <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between text-sm font-bold text-primary group-hover:text-[#F5A800] transition">
                        Baca Selengkapnya
                        <i class="fa-solid fa-arrow-right"></i>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16 bg-[#F8F9FA] rounded-2xl">
                <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center text-primary/20 text-3xl mx-auto mb-4">
                    <i class="fa-solid fa-inbox"></i>
                </div>
                <h3 class="text-xl font-bold text-primary mb-2">Belum Ada Artikel</h3>
                <p class="text-primary/60">Artikel dan insight terbaru sedang dalam persiapan. Silakan kembali lagi nanti.</p>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($posts->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $posts->withQueryString()->links() }}
        </div>
        @endif

    </div>
</div>

@endsection

