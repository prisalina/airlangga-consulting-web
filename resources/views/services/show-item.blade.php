@extends('layouts.app')

@section('title', $serviceItem->name . ' | Airlangga Consulting')

@section('content')

{{-- Breadcrumb & Title --}}
<div class="bg-[#F8F9FA] py-12 border-b border-gray-200">
    <div class="et-container">
        <nav class="flex text-sm text-primary/60 mb-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li><a href="{{ route('home') }}" class="hover:text-primary">Beranda</a></li>
                <li><i class="fa-solid fa-chevron-right text-[10px]"></i></li>
                <li><a href="{{ route('services.index') }}" class="hover:text-primary">Layanan</a></li>
                <li><i class="fa-solid fa-chevron-right text-[10px]"></i></li>
                <li><a href="{{ route('services.index') }}#{{ $serviceItem->service->slug }}" class="hover:text-primary">{{ $serviceItem->service->name }}</a></li>
                <li><i class="fa-solid fa-chevron-right text-[10px]"></i></li>
                <li class="text-[#F5A800] font-medium" aria-current="page">{{ $serviceItem->name }}</li>
            </ol>
        </nav>
        
        <h1 class="text-3xl md:text-4xl font-bold text-primary">{{ $serviceItem->name }}</h1>
        @if($serviceItem->description)
            <p class="mt-4 text-primary/70 max-w-3xl text-lg">{{ $serviceItem->description }}</p>
        @endif
    </div>
</div>

<div class="py-16">
    <div class="et-container">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            {{-- Main Content --}}
            <div class="lg:col-span-2">
                @if($serviceItem->image)
                    <img src="{{ asset('storage/' . $serviceItem->image) }}" alt="{{ $serviceItem->name }}" class="w-full rounded-2xl shadow-sm mb-8">
                @endif

                <div class="prose prose-lg prose-primary max-w-none prose-headings:font-bold prose-headings:text-primary prose-a:text-[#F5A800]">
                    {!! $serviceItem->content !!}
                </div>

                <div class="mt-12 p-8 bg-primary rounded-2xl text-white">
                    <h3 class="text-2xl font-bold mb-4">Tertarik dengan layanan ini?</h3>
                    <p class="text-white/80 mb-6">Konsultasikan kebutuhan spesifik Anda dengan tim kami dan dapatkan proposal penawaran.</p>
                    <a href="{{ route('contact.index') }}?service={{ urlencode($serviceItem->name) }}" class="et-btn bg-secondary text-primary">
                        <span class="icon"><i class="fa-solid fa-arrow-right"></i></span>
                        Minta Penawaran
                    </a>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="lg:col-span-1 space-y-8">
                {{-- Category Info --}}
                <div class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm">
                    <h4 class="font-bold text-primary mb-4 pb-4 border-b border-gray-100">Kategori Layanan Utama</h4>
                    <a href="{{ route('services.index') }}#{{ $serviceItem->service->slug }}" class="group block">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-[#F5A800]/10 text-[#F5A800] flex items-center justify-center shrink-0">
                                <i class="fa-solid {{ $serviceItem->service->icon ?: 'fa-briefcase' }}"></i>
                            </div>
                            <div>
                                <h5 class="font-bold text-primary group-hover:text-[#F5A800] transition">{{ $serviceItem->service->name }}</h5>
                                <span class="text-sm text-primary/60 flex items-center gap-1 mt-1">
                                    Lihat layanan terkait <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Related Sub-Services --}}
                @if($relatedItems->count())
                <div class="bg-[#F8F9FA] rounded-xl p-6">
                    <h4 class="font-bold text-primary mb-4">Sub-Layanan Lainnya</h4>
                    <ul class="space-y-3">
                        @foreach($relatedItems as $related)
                        <li>
                            <a href="{{ route('services.show', $related->slug) }}" class="block p-3 rounded-lg bg-white border border-gray-100 hover:border-[#F5A800] hover:shadow-sm transition group">
                                <span class="font-semibold text-primary group-hover:text-[#F5A800] block mb-1 text-sm">{{ $related->name }}</span>
                                <span class="text-xs text-primary/60 line-clamp-1">{{ $related->description }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
