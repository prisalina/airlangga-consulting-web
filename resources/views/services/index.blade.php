@extends('layouts.app')

@section('title', 'Layanan Kami | PT. Airlangga Univ Konsultan')

@section('content')

{{-- Header Banner --}}
<div class="bg-[#1C2B5E] py-16 lg:py-20 relative overflow-hidden">
    <x-hero-bg />

    <div class="et-container relative z-10 text-center">
        <div class="et-section-sub-title !bg-white/10 !border-white/20 !text-white mb-5">Layanan</div>
        <h1 class="text-white text-4xl md:text-5xl lg:text-[52px] font-bold mb-6 leading-tight">Solusi Strategis untuk<br><span class="text-[#F5A800]">Organisasi Anda</span></h1>
        <p class="text-white/65 max-w-2xl mx-auto text-lg leading-relaxed">
            Pilih bidang layanan yang sesuai dengan tantangan yang sedang dihadapi. Kami menawarkan pendampingan dari tahap asesmen hingga implementasi.
        </p>
    </div>
</div>

<div class="py-20 bg-[#F8F9FA]">
    <div class="et-container">
        
        @forelse($services as $index => $service)
            <div id="{{ $service->slug }}" class="scroll-mt-32 mb-20 last:mb-0">
                <div class="flex flex-col lg:flex-row items-center gap-10 {{ $index % 2 !== 0 ? 'lg:flex-row-reverse' : '' }}">
                    <div class="w-full lg:w-1/2">
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-full rounded-2xl shadow-lg">
                        @else
                            <div class="w-full aspect-[4/3] rounded-2xl bg-white border border-gray-100 flex items-center justify-center text-primary/10 shadow-sm">
                                <i class="fa-solid {{ $service->icon ?: 'fa-briefcase' }} text-9xl"></i>
                            </div>
                        @endif
                    </div>
                    
                    <div class="w-full lg:w-1/2">
                        <div class="inline-flex items-center gap-3 text-[#F5A800] font-bold text-sm mb-4 bg-[#F5A800]/10 px-4 py-2 rounded-full">
                            <i class="fa-solid {{ $service->icon ?: 'fa-briefcase' }}"></i>
                            Layanan {{ $index + 1 }}
                        </div>
                        <h2 class="text-3xl font-bold text-primary mb-4">{{ $service->name }}</h2>
                        <div class="text-primary/70 leading-relaxed mb-8 prose prose-primary">
                            @if($service->description)
                                <p>{{ $service->description }}</p>
                            @else
                                <p>{{ $service->short_description }}</p>
                            @endif
                        </div>

                        @if($service->items->count())
                        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                            <h4 class="font-bold text-primary mb-4 text-sm uppercase tracking-wider">Sub-Layanan:</h4>
                            <ul class="space-y-3">
                                @foreach($service->items as $item)
                                <li>
                                    <a href="{{ route('services.show', $item->slug) }}" class="group flex items-start gap-3">
                                        <i class="fa-solid fa-check text-[#F5A800] mt-1"></i>
                                        <div>
                                            <span class="font-semibold text-primary group-hover:text-[#F5A800] transition block">{{ $item->name }}</span>
                                            <span class="text-sm text-primary/60 line-clamp-1">{{ $item->description }}</span>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            @if(!$loop->last)
                <hr class="border-gray-200 my-16">
            @endif
        @empty
            <div class="text-center py-10">
                <p class="text-primary/60">Belum ada layanan yang ditambahkan.</p>
            </div>
        @endforelse

    </div>
</div>

{{-- CTA Section --}}
<div class="py-20 bg-white">
    <div class="et-container text-center">
        <h2 class="text-3xl font-bold text-primary mb-6">Butuh Penjelasan Lebih Lanjut?</h2>
        <p class="text-primary/70 max-w-2xl mx-auto mb-10">Setiap organisasi memiliki keunikan masalahnya masing-masing. Mari diskusi untuk menemukan pendekatan layanan mana yang paling tepat untuk Anda.</p>
        <a href="{{ route('contact.index') }}" class="et-btn">
            <span class="icon"><i class="fa-brands fa-whatsapp"></i></span>
            Hubungi Konsultan Kami
        </a>
    </div>
</div>

@endsection
