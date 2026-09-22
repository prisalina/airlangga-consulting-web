<div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
    {{-- Deep layered gradient base --}}
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 80% 60% at 70% 0%, #2a3f8a 0%, transparent 60%), radial-gradient(ellipse 60% 80% at 0% 100%, #0d1936 0%, transparent 70%), #1C2B5E;"></div>

    {{-- Grid pattern (subtle) --}}
    <div class="absolute inset-0 bg-grid-pattern opacity-[0.03] invert pointer-events-none"></div>

    {{-- Glow effect with slow breathing animation (pulse) --}}
    <div class="absolute -top-40 -right-40 w-[600px] h-[600px] rounded-full mix-blend-screen animate-pulse" style="background: radial-gradient(circle, rgba(245,168,0,0.15) 0%, transparent 65%); animation-duration: 6s;"></div>
    <div class="absolute -bottom-40 -left-20 w-[500px] h-[500px] rounded-full mix-blend-screen animate-pulse" style="background: radial-gradient(circle, rgba(45,107,238,0.2) 0%, transparent 70%); animation-duration: 8s; animation-delay: 2s;"></div>

    {{-- Ornamen Bergerak 1: Cincin besar berputar (Kiri Bawah) - Dibuat LEBIH TEBAL & JELAS --}}
    <div class="absolute -bottom-40 -left-20 pointer-events-none opacity-[0.35] animate-spin" style="animation-duration: 25s;">
        <svg width="500" height="500" viewBox="0 0 500 500" fill="none">
            <circle cx="250" cy="250" r="240" stroke="rgba(255,255,255,0.6)" stroke-width="2" stroke-dasharray="8 12"/>
            <circle cx="250" cy="250" r="210" stroke="#F5A800" stroke-width="3" stroke-dasharray="25 15 10 15"/>
            <circle cx="250" cy="250" r="180" stroke="rgba(255,255,255,0.7)" stroke-width="1.5" stroke-dasharray="5 5"/>
        </svg>
    </div>

    {{-- Ornamen Bergerak 2: Cincin besar berputar arah sebaliknya (Kanan Atas) - Dibuat LEBIH JELAS --}}
    <div class="absolute -top-32 -right-32 pointer-events-none opacity-[0.3] animate-spin" style="animation-duration: 35s; animation-direction: reverse;">
        <svg width="550" height="550" viewBox="0 0 550 550" fill="none">
            <circle cx="275" cy="275" r="260" stroke="#F5A800" stroke-width="2.5" stroke-dasharray="10 20"/>
            <circle cx="275" cy="275" r="220" stroke="rgba(255,255,255,0.4)" stroke-width="2" stroke-dasharray="40 20 15 20"/>
            <circle cx="275" cy="275" r="190" stroke="rgba(255,255,255,0.6)" stroke-width="1.5" stroke-dasharray="6 12"/>
        </svg>
    </div>

    {{-- Ornamen Statis: Lingkaran konsentris --}}
    <div class="absolute -bottom-32 -left-32 pointer-events-none opacity-[0.1]">
        <svg width="460" height="460" viewBox="0 0 460 460" fill="none">
            <circle cx="230" cy="230" r="140" stroke="#F5A800" stroke-width="1.5" stroke-dasharray="8 5"/>
            <circle cx="230" cy="230" r="60" stroke="#F5A800" stroke-width="1" stroke-dasharray="6 4"/>
        </svg>
    </div>

    {{-- Ornamen Statis: Lingkaran konsentris kanan atas --}}
    <div class="absolute -top-28 -right-28 pointer-events-none opacity-[0.08]">
        <svg width="400" height="400" viewBox="0 0 400 400" fill="none">
            <circle cx="200" cy="200" r="115" stroke="#F5A800" stroke-width="1.5" stroke-dasharray="8 5"/>
        </svg>
    </div>

    {{-- Garis "Shooting Star" Melayang (Elegan & Sangat Terlihat) --}}
    <div class="absolute left-0 top-1/3 opacity-60 animate-pulse pointer-events-none" style="animation-duration: 3s;">
        <div class="h-[2px] bg-gradient-to-r from-transparent via-[#F5A800] to-transparent w-48 rounded-full"></div>
    </div>
    <div class="absolute right-10 bottom-1/3 opacity-40 animate-pulse pointer-events-none" style="animation-duration: 4s; animation-delay: 1.5s;">
        <div class="h-[1.5px] bg-gradient-to-l from-transparent via-white to-transparent w-64 rounded-full"></div>
    </div>

    {{-- Floating shapes bergerak melayang (soft, tapi lebih tebal) --}}
    <div class="absolute top-24 left-1/4 w-4 h-4 rounded-full bg-[#F5A800] opacity-70 animate-pulse pointer-events-none" style="animation-duration: 3s;"></div>
    <div class="absolute top-44 left-16 w-3 h-3 rounded-full bg-white/60 animate-pulse pointer-events-none" style="animation-duration: 4s; animation-delay:1s;"></div>
    <div class="absolute bottom-24 left-1/3 w-12 h-12 border-2 border-white/30 rounded-full animate-bounce pointer-events-none" style="animation-duration: 4s;"></div>
    <div class="absolute bottom-16 left-16 w-8 h-8 border-[2px] border-[#F5A800]/50 rounded-full animate-bounce pointer-events-none" style="animation-duration: 5s; animation-delay: 1s;"></div>
    
    {{-- Animated sparkles (bintang berputar) - LEBIH TERANG --}}
    <div class="absolute top-1/2 right-1/4 pointer-events-none opacity-[0.5] animate-spin" style="animation-duration: 6s;">
        <svg width="32" height="32" viewBox="0 0 20 20" fill="none">
            <path d="M10 0 L11 9 L20 10 L11 11 L10 20 L9 11 L0 10 L9 9 Z" fill="#F5A800"/>
        </svg>
    </div>
    <div class="absolute top-20 right-16 pointer-events-none opacity-[0.4] animate-spin" style="animation-duration: 8s; animation-delay: 1s;">
        <svg width="24" height="24" viewBox="0 0 20 20" fill="none">
            <path d="M10 0 L11 9 L20 10 L11 11 L10 20 L9 11 L0 10 L9 9 Z" fill="#ffffff"/>
        </svg>
    </div>

    {{-- Ping radar halus - Dibuat lebih tebal & mencolok --}}
    <div class="absolute top-1/3 right-1/3 pointer-events-none">
        <div class="w-3 h-3 rounded-full bg-[#F5A800]/50 relative">
            <span class="absolute inset-0 rounded-full bg-[#F5A800]/60 animate-ping" style="animation-duration: 2s;"></span>
        </div>
    </div>
    <div class="absolute bottom-1/3 left-1/4 pointer-events-none">
        <div class="w-3 h-3 rounded-full bg-white/50 relative">
            <span class="absolute inset-0 rounded-full bg-white/40 animate-ping" style="animation-duration: 2.5s; animation-delay: 1s;"></span>
        </div>
    </div>

    {{-- Bottom fade ke warna section bawah --}}
    <div class="absolute bottom-0 left-0 right-0 h-16" style="background: linear-gradient(to bottom, transparent, rgba(248,249,250,0.05));"></div>
</div>
