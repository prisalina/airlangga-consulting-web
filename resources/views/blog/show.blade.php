@extends('layouts.app')

@section('title', $post->meta_title ?: $post->title . ' | Airlangga Consulting')
@section('description', $post->meta_description ?: $post->excerpt)

@section('content')

<div class="py-16">
    <div class="et-container max-w-4xl">
        {{-- Breadcrumb --}}
        <nav class="flex text-sm text-primary/60 mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li><a href="{{ route('home') }}" class="hover:text-primary">Beranda</a></li>
                <li><i class="fa-solid fa-chevron-right text-[10px]"></i></li>
                <li><a href="{{ route('blog.index') }}" class="hover:text-primary">Blog</a></li>
                @if($post->category)
                <li><i class="fa-solid fa-chevron-right text-[10px]"></i></li>
                <li><a href="{{ route('blog.index', ['kategori' => $post->category->slug]) }}" class="hover:text-primary">{{ $post->category->name }}</a></li>
                @endif
            </ol>
        </nav>

        {{-- Post Header --}}
        <header class="mb-10 text-center">
            @if($post->category)
                <span class="inline-block bg-[#F5A800]/10 text-[#F5A800] text-sm font-bold px-4 py-1.5 rounded-full mb-6">
                    {{ $post->category->name }}
                </span>
            @endif
            <h1 class="text-3xl md:text-5xl font-bold text-primary leading-tight mb-6">{{ $post->title }}</h1>
            
            <div class="flex items-center justify-center gap-4 text-sm text-primary/60">
                <span class="flex items-center gap-2"><i class="fa-regular fa-calendar"></i> {{ $post->published_at->translatedFormat('d F Y') }}</span>
                <span class="w-1 h-1 rounded-full bg-primary/30"></span>
                <span class="flex items-center gap-2"><i class="fa-regular fa-clock"></i> {{ max(1, ceil(str_word_count(strip_tags($post->content)) / 200)) }} menit baca</span>
            </div>
        </header>

        {{-- Thumbnail --}}
        @if($post->thumbnail)
            <div class="w-full aspect-[16/9] md:aspect-[21/9] rounded-2xl overflow-hidden mb-12 shadow-md">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
            </div>
        @endif

        {{-- Content --}}
        <article class="prose prose-lg prose-primary max-w-none prose-img:rounded-xl prose-img:shadow-sm prose-headings:font-bold prose-headings:text-primary prose-a:text-[#F5A800]">
            {!! $post->content !!}
        </article>

        {{-- Share / Footer --}}
        <div class="mt-16 pt-8 border-t border-gray-200 flex items-center justify-between">
            <a href="{{ route('blog.index') }}" class="text-primary font-bold hover:text-[#F5A800] transition flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Artikel
            </a>
            
            <div class="flex items-center gap-3">
                <span class="text-sm text-primary/60 font-semibold">Bagikan:</span>
                <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-primary hover:bg-[#25D366] hover:text-white transition">
                    <i class="fa-brands fa-whatsapp text-lg"></i>
                </a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($post->title) }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-primary hover:bg-[#0A66C2] hover:text-white transition">
                    <i class="fa-brands fa-linkedin-in text-lg"></i>
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Related Posts --}}
@if($related->count())
<div class="bg-[#F8F9FA] py-16">
    <div class="et-container">
        <h3 class="text-2xl font-bold text-primary mb-8 text-center">Artikel Terkait</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($related as $rel)
            <div class="blog-card bg-white border border-gray-100 p-4 group">
                <a href="{{ route('blog.show', $rel->slug) }}" class="block">
                    @if($rel->thumbnail)
                        <img src="{{ asset('storage/' . $rel->thumbnail) }}" class="w-full h-40 object-cover rounded-xl mb-4" alt="{{ $rel->title }}">
                    @endif
                    <h4 class="font-bold text-primary text-lg mb-2 group-hover:text-[#F5A800] transition leading-tight">{{ $rel->title }}</h4>
                    <p class="text-sm text-primary/60 flex items-center gap-2">
                        <i class="fa-regular fa-calendar"></i> {{ $rel->published_at->translatedFormat('d M Y') }}
                    </p>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

@endsection
