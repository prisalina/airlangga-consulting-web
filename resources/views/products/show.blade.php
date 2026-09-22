@extends('layouts.app')

@section('title', $product->title . ' | PT. Airlangga Univ Konsultan')

@section('content')
<div class="py-12 bg-[#F8F9FA] border-b border-gray-200">
    <div class="et-container">
        <nav class="flex text-sm text-primary/60" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li><a href="{{ route('home') }}" class="hover:text-primary">Beranda</a></li>
                <li><i class="fa-solid fa-chevron-right text-[10px]"></i></li>
                <li><a href="{{ route('products.index') }}" class="hover:text-primary">Produk Digital</a></li>
                <li><i class="fa-solid fa-chevron-right text-[10px]"></i></li>
                <li class="text-[#F5A800] font-medium truncate max-w-[200px]">{{ $product->title }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="py-16">
    <div class="et-container">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start mb-16">
            
            {{-- Image Viewer --}}
            <div class="bg-[#F8F9FA] rounded-3xl p-8 lg:p-12 border border-gray-100 flex items-center justify-center">
                @if($product->thumbnail)
                    <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="{{ $product->title }}" class="w-full h-auto max-h-[500px] object-contain drop-shadow-xl rounded-xl">
                @else
                    <div class="w-full aspect-square flex items-center justify-center text-gray-300">
                        <i class="fa-solid fa-box-open text-9xl"></i>
                    </div>
                @endif
            </div>

            {{-- Product Info --}}
            <div>
                @if($product->category)
                    <span class="inline-block bg-[#F5A800]/10 text-[#F5A800] font-bold px-3 py-1 rounded-md text-sm mb-4 border border-[#F5A800]/20">
                        {{ $product->category }}
                    </span>
                @endif
                
                <h1 class="text-3xl md:text-4xl font-bold text-primary leading-tight mb-4">{{ $product->title }}</h1>
                
                <div class="text-3xl font-bold text-primary mb-6 pb-6 border-b border-gray-100">
                    {{ $product->formatted_price }}
                </div>

                <div class="prose prose-primary mb-8">
                    <p class="text-lg text-primary/80">{{ $product->description }}</p>
                </div>

                <ul class="space-y-3 mb-10">
                    <li class="flex items-center gap-3 text-primary/80">
                        <i class="fa-solid fa-check-circle text-green-500"></i> Lifetime Access (Akses Selamanya)
                    </li>
                    <li class="flex items-center gap-3 text-primary/80">
                        <i class="fa-solid fa-check-circle text-green-500"></i> Free Update jika ada versi terbaru
                    </li>
                    <li class="flex items-center gap-3 text-primary/80">
                        <i class="fa-solid fa-check-circle text-green-500"></i> Mendukung modifikasi & kustomisasi
                    </li>
                </ul>

                <div class="flex gap-4">
                    @if($product->purchase_link)
                        <a href="{{ $product->purchase_link }}" target="_blank" rel="noopener" class="et-btn !px-8 !py-4 flex-1 justify-center text-center !text-base">
                            <span class="icon"><i class="fa-solid fa-cart-shopping"></i></span>
                            Beli Sekarang
                        </a>
                    @else
                        <a href="{{ route('contact.index') }}?service=Produk:+{{ urlencode($product->title) }}" class="et-btn !px-8 !py-4 flex-1 justify-center text-center !text-base">
                            <span class="icon"><i class="fa-brands fa-whatsapp"></i></span>
                            Pesan via WhatsApp
                        </a>
                    @endif
                </div>
            </div>

        </div>

        {{-- Product Details Content --}}
        @if($product->content)
        <div class="max-w-4xl mx-auto border-t border-gray-200 pt-16">
            <h2 class="text-2xl font-bold text-primary mb-8 text-center">Deskripsi Lengkap</h2>
            <div class="prose prose-lg prose-primary max-w-none">
                {!! $product->content !!}
            </div>
        </div>
        @endif

    </div>
</div>
@endsection
