<div class="absolute inset-0 z-0 pointer-events-none">
    {{-- Deep layered gradient --}}
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 80% 60% at 70% 0%, #2a3f8a 0%, transparent 60%), radial-gradient(ellipse 60% 80% at 0% 100%, #0d1936 0%, transparent 70%), #1C2B5E;"></div>

    {{-- Amber glow top-right --}}
    <div class="absolute -top-40 -right-40 w-[600px] h-[600px] rounded-full" style="background: radial-gradient(circle, rgba(245,168,0,0.18) 0%, transparent 65%);"></div>

    {{-- Blue glow bottom-left --}}
    <div class="absolute -bottom-40 -left-20 w-[500px] h-[500px] rounded-full" style="background: radial-gradient(circle, rgba(45,67,138,0.8) 0%, transparent 70%);"></div>

    {{-- SVG decorative shapes --}}
    <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
        {{-- Large ring top-right --}}
        <circle cx="90%" cy="10%" r="220" fill="none" stroke="rgba(245,168,0,0.07)" stroke-width="60"/>
        {{-- Medium ring bottom-left --}}
        <circle cx="5%" cy="95%" r="160" fill="none" stroke="rgba(255,255,255,0.04)" stroke-width="40"/>
        {{-- Small solid circle --}}
        <circle cx="82%" cy="75%" r="8" fill="rgba(245,168,0,0.25)"/>
        <circle cx="18%" cy="20%" r="5" fill="rgba(245,168,0,0.2)"/>
        <circle cx="60%" cy="85%" r="4" fill="rgba(255,255,255,0.12)"/>
        {{-- Curved arc top-left --}}
        <path d="M -80 200 Q 150 -50 400 120" fill="none" stroke="rgba(255,255,255,0.04)" stroke-width="2"/>
        {{-- Dot cluster right --}}
        <circle cx="92%" cy="45%" r="3" fill="rgba(245,168,0,0.18)"/>
        <circle cx="94%" cy="52%" r="2" fill="rgba(245,168,0,0.12)"/>
        <circle cx="89%" cy="50%" r="2.5" fill="rgba(245,168,0,0.15)"/>
        {{-- Dot cluster left --}}
        <circle cx="8%" cy="60%" r="3" fill="rgba(255,255,255,0.08)"/>
        <circle cx="11%" cy="67%" r="2" fill="rgba(255,255,255,0.06)"/>
        <circle cx="6%" cy="65%" r="2" fill="rgba(255,255,255,0.07)"/>
    </svg>

    {{-- Bottom fade --}}
    <div class="absolute bottom-0 left-0 right-0 h-16" style="background: linear-gradient(to bottom, transparent, rgba(248,249,250,0.08));"></div>
</div>
