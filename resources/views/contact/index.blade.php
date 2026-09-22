@extends('layouts.app')

@section('title', 'Hubungi Kami | Airlangga Consulting')

@section('content')
<div class="bg-[#1C2B5E] py-24 lg:py-32 relative overflow-hidden">
    <x-hero-bg />

    <div class="et-container relative z-10 text-center max-w-3xl mx-auto">
        <div class="et-section-sub-title !bg-white/10 !border-white/20 !text-white mb-4">Kontak</div>
        <h1 class="text-white text-4xl md:text-5xl lg:text-[52px] font-bold mb-6 leading-tight">Hubungi <span class="text-[#F5A800]">Kami</span></h1>
        <p class="text-white/65 max-w-2xl mx-auto text-lg leading-relaxed">Punya pertanyaan atau ingin mendiskusikan kebutuhan organisasi Anda? Tim kami siap membantu.</p>
    </div>
</div>

<div class="py-16 bg-[#F8F9FA]">
    <div class="et-container">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Info Kontak --}}
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="w-12 h-12 bg-[#F5A800]/10 rounded-full flex items-center justify-center text-[#F5A800] mb-4 text-xl">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <h3 class="font-bold text-primary mb-2">Kantor Pusat</h3>
                    <p class="text-primary/70 text-sm">Surabaya, Jawa Timur, Indonesia</p>
                </div>
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="w-12 h-12 bg-[#F5A800]/10 rounded-full flex items-center justify-center text-[#F5A800] mb-4 text-xl">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <h3 class="font-bold text-primary mb-2">Email</h3>
                    <a href="mailto:halo@airlanggaconsulting.id" class="text-primary/70 text-sm hover:text-[#F5A800]">halo@airlanggaconsulting.id</a>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="w-12 h-12 bg-[#F5A800]/10 rounded-full flex items-center justify-center text-[#F5A800] mb-4 text-xl">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <h3 class="font-bold text-primary mb-2">WhatsApp</h3>
                    <a href="https://wa.me/6281130009000" target="_blank" rel="noopener" class="text-primary/70 text-sm hover:text-[#F5A800]">0811-3000-9000</a>
                </div>
            </div>

            {{-- Form Kontak --}}
            <div class="lg:col-span-2">
                <div class="bg-white p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100">
                    <h3 class="font-bold text-2xl text-primary mb-6">Kirim Pesan</h3>
                    
                    @if(session('success'))
                        <div class="bg-green-50 text-green-700 p-4 rounded-lg mb-6 border border-green-200 flex items-center gap-3">
                            <i class="fa-solid fa-circle-check"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="name" class="block text-sm font-semibold text-primary mb-2">Nama Lengkap *</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required class="form-input @error('name') border-red-500 @enderror" placeholder="Masukkan nama Anda">
                                @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-semibold text-primary mb-2">Email *</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="form-input @error('email') border-red-500 @enderror" placeholder="email@contoh.com">
                                @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-primary mb-2">Nomor HP / WhatsApp</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form-input" placeholder="08123456789">
                            </div>
                            <div>
                                <label for="organization" class="block text-sm font-semibold text-primary mb-2">Nama Instansi / Perusahaan</label>
                                <input type="text" name="organization" id="organization" value="{{ old('organization') }}" class="form-input" placeholder="Nama organisasi">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="service_interest" class="block text-sm font-semibold text-primary mb-2">Layanan yang Diminati</label>
                            <select name="service_interest" id="service_interest" class="form-input bg-white">
                                <option value="">Pilih Layanan (Opsional)</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->name }}" @selected(old('service_interest') == $service->name)>{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="subject" class="block text-sm font-semibold text-primary mb-2">Subjek Pesan</label>
                            <input type="text" name="subject" id="subject" value="{{ old('subject') }}" class="form-input" placeholder="Topik pertanyaan Anda">
                        </div>

                        <div class="mb-8">
                            <label for="message" class="block text-sm font-semibold text-primary mb-2">Pesan *</label>
                            <textarea name="message" id="message" rows="5" required class="form-input @error('message') border-red-500 @enderror" placeholder="Tulis pesan atau pertanyaan Anda di sini...">{{ old('message') }}</textarea>
                            @error('message') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="et-btn w-full justify-center">
                            <span class="icon"><i class="fa-solid fa-paper-plane"></i></span>
                            Kirim Pesan Sekarang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
