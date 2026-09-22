@extends('layouts.app')

@section('title', 'Produk Digital | PT. Airlangga Univ Konsultan')

@section('content')
<div class="bg-[#1C2B5E] py-16 lg:py-20 relative overflow-hidden">
    <x-hero-bg />

    <div class="et-container relative z-10 text-center">
        <div class="et-section-sub-title !bg-white/10 !border-white/20 !text-white mb-4">Produk Digital</div>
        <h1 class="text-white text-4xl md:text-5xl lg:text-[52px] font-bold mb-6 leading-tight">Modul, Template &<br><span class="text-[#F5A800]">Tools Manajemen</span></h1>
        <p class="text-white/65 max-w-2xl mx-auto text-lg leading-relaxed">
            Dapatkan berbagai resources siap pakai untuk mengoptimalkan operasional dan kinerja organisasi Anda secara mandiri.
        </p>
    </div>
</div>

<div class="py-16 bg-[#F8F9FA]">
    <div class="et-container">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($products as $product)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md hover:-translate-y-1 transition duration-300 group flex flex-col h-full relative">
                <div class="relative aspect-[4/3] overflow-hidden bg-gray-100 border-b border-gray-100 p-6 flex items-center justify-center">
                    @if($product->thumbnail)
                        <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="{{ $product->title }}" class="w-full h-full object-contain group-hover:scale-105 transition duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-300">
                            <i class="fa-solid fa-box-open text-6xl"></i>
                        </div>
                    @endif
                    
                    @if($product->category)
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur text-primary text-xs font-bold px-2 py-1 rounded shadow-sm border border-gray-100">
                        {{ $product->category }}
                    </div>
                    @endif
                </div>

                <div class="p-6 flex flex-col flex-1">
                    <h3 class="text-lg font-bold text-primary mb-2 leading-snug">
                        <a href="{{ route('products.show', $product->slug) }}" class="hover:text-[#F5A800] transition before:absolute before:inset-0">{{ $product->title }}</a>
                    </h3>
                    <p class="text-sm text-primary/60 line-clamp-2 mb-4">{{ $product->description }}</p>

                    <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                        <span class="font-bold text-lg text-primary">{{ $product->formatted_price }}</span>
                        <a href="{{ route('products.show', $product->slug) }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-primary/5 text-primary group-hover:bg-primary group-hover:text-white transition">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20 bg-white rounded-2xl border border-gray-100">
                <i class="fa-solid fa-box-open text-6xl text-primary/20 mb-4 block"></i>
                <h3 class="text-xl font-bold text-primary mb-2">Belum Ada Produk</h3>
                <p class="text-primary/60">Produk digital terbaru sedang dalam tahap penyempurnaan.</p>
            </div>
            @endforelse
        </div>

        @if($products->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $products->links() }}
        </div>
        @endif
    </div>
</div>
@endsection

