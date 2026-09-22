@section('title', 'Login Admin | PT. Airlangga Univ Konsultan')

<div>
    <div class="bg-[#1C2B5E] py-16 lg:py-20 relative overflow-hidden">
        <x-hero-bg />
        <div class="et-container relative z-10 text-center max-w-3xl mx-auto">
            <h1 class="text-white text-3xl font-bold mb-4">Login Khusus <span class="text-[#F5A800]">Admin</span></h1>
            <p class="text-white/65 max-w-xl mx-auto text-sm">Masuk untuk membalas komentar diskusi pengunjung sebagai Admin PT Airlangga Univ Konsultan.</p>
        </div>
    </div>

    <div class="py-16 bg-[#F8F9FA] min-h-[50vh] flex items-center justify-center">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 w-full max-w-md">
            <form wire:submit.prevent="login" class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-primary mb-2">Email Admin</label>
                    <input type="email" wire:model="email" class="form-input w-full" placeholder="admin@contoh.com" required>
                    @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-primary mb-2">Password</label>
                    <input type="password" wire:model="password" class="form-input w-full" placeholder="••••••••" required>
                    @error('password') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="pt-2">
                    <button type="submit" class="et-btn w-full justify-center">
                        <span class="icon"><i class="fa-solid fa-right-to-bracket"></i></span>
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

