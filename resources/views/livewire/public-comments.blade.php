<div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col h-full max-h-[800px]">
    <h3 class="font-bold text-2xl text-primary mb-4">Ruang Diskusi</h3>
    
    @if (session()->has('message'))
        <div class="bg-green-50 text-green-700 p-3 rounded-lg mb-4 border border-green-200 text-sm flex items-center gap-2">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('message') }}
        </div>
    @endif

    {{-- Form Tambah Komentar Utama --}}
    <div class="mb-6 bg-gray-50 p-4 rounded-xl border border-gray-100">
        <h4 class="font-bold text-sm text-primary mb-3">Tinggalkan Pesan / Pertanyaan</h4>
        <form wire:submit.prevent="postComment" class="space-y-3">
            @if(!session('is_public_admin') || !auth()->check())
            <div class="text-sm font-semibold text-gray-500 flex items-center gap-2 mb-2">
                <i class="fa-solid fa-user-secret"></i> Memposting secara Anonim
            </div>
            @elseif(auth()->user()->role === 'super_admin')
            <div class="text-sm font-semibold text-secondary flex items-center gap-2 mb-2">
                <i class="fa-solid fa-shield-halved"></i> Memposting sebagai Admin PT Airlangga Univ Konsultan
            </div>
            @else
            <div class="text-sm font-semibold text-blue-600 flex items-center gap-2 mb-2">
                <i class="fa-solid fa-user-check"></i> Memposting sebagai {{ auth()->user()->name }}
            </div>
            @endif
            <div>
                <textarea wire:model="content" placeholder="Tulis komentar..." rows="3" class="form-input text-sm px-3 py-2 @error('content') border-red-500 @enderror"></textarea>
                @error('content') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="et-btn py-2 px-4 text-sm w-full justify-center">Kirim Komentar</button>
        </form>
    </div>

    {{-- Daftar Komentar (Scrollable) --}}
    <div class="flex-1 overflow-y-auto pr-2 space-y-4 custom-scrollbar">
        @forelse($comments as $comment)
            <div class="border-b border-gray-100 pb-4 last:border-0 last:pb-0">
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0 {{ $comment->user_id ? 'bg-secondary text-primary' : 'bg-primary/10 text-primary' }}">
                        <i class="fa-solid {{ $comment->user_id ? 'fa-user-tie' : 'fa-user' }} text-sm"></i>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-1">
                            @if($comment->user_id)
                                @if($comment->user->role === 'super_admin')
                                    <span class="font-bold text-sm text-secondary flex items-center gap-1"><i class="fa-solid fa-circle-check text-[10px]"></i> Admin PT Airlangga Univ Konsultan</span>
                                @else
                                    <span class="font-bold text-sm text-blue-600 flex items-center gap-1"><i class="fa-solid fa-user-check text-[10px]"></i> {{ $comment->user->name }}</span>
                                @endif
                            @else
                                <span class="font-bold text-sm text-primary">{{ $comment->name ?? 'Anonim' }}</span>
                            @endif
                            <span class="text-[10px] text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-2">{{ $comment->content }}</p>
                        
                        <button wire:click="setReply({{ $comment->id }})" class="text-xs font-semibold text-primary hover:text-secondary flex items-center gap-1 transition-colors">
                            <i class="fa-solid fa-reply"></i> Balas
                        </button>
                    </div>
                </div>

                {{-- Balasan --}}
                @if($comment->replies->count() > 0)
                    <div class="ml-11 mt-3 space-y-3">
                        @foreach($comment->replies as $reply)
                            <div class="flex items-start gap-2">
                                <div class="w-6 h-6 rounded-full flex items-center justify-center shrink-0 {{ $reply->user_id ? 'bg-secondary text-primary' : 'bg-primary/10 text-primary' }}">
                                    <i class="fa-solid {{ $reply->user_id ? 'fa-user-tie' : 'fa-user' }} text-[10px]"></i>
                                </div>
                                <div class="flex-1 bg-gray-50 p-2.5 rounded-lg border border-gray-100">
                                    <div class="flex items-center justify-between mb-1">
                                        @if($reply->user_id)
                                            @if($reply->user->role === 'super_admin')
                                                <span class="font-bold text-xs text-secondary flex items-center gap-1"><i class="fa-solid fa-circle-check text-[8px]"></i> Admin PT Airlangga Univ Konsultan</span>
                                            @else
                                                <span class="font-bold text-xs text-blue-600 flex items-center gap-1"><i class="fa-solid fa-user-check text-[8px]"></i> {{ $reply->user->name }}</span>
                                            @endif
                                        @else
                                            <span class="font-bold text-xs text-primary">{{ $reply->name ?? 'Anonim' }}</span>
                                        @endif
                                        <span class="text-[9px] text-gray-400">{{ $reply->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-xs text-gray-600">{{ $reply->content }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- Form Balas --}}
                @if($reply_to === $comment->id)
                    <div class="ml-11 mt-3 bg-blue-50/50 p-3 rounded-xl border border-blue-100">
                        <form wire:submit.prevent="postReply({{ $comment->id }})" class="space-y-2">
                            @if(!session('is_public_admin') || !auth()->check())
                            <div class="text-xs font-semibold text-gray-500 flex items-center gap-1 mb-1">
                                <i class="fa-solid fa-user-secret"></i> Membalas secara Anonim
                            </div>
                            @elseif(auth()->user()->role === 'super_admin')
                            <div class="text-xs font-semibold text-secondary flex items-center gap-1 mb-1">
                                <i class="fa-solid fa-shield-check"></i> Membalas sebagai Admin
                            </div>
                            @else
                            <div class="text-xs font-semibold text-blue-600 flex items-center gap-1 mb-1">
                                <i class="fa-solid fa-user-check"></i> Membalas sebagai {{ auth()->user()->name }}
                            </div>
                            @endif
                            <div>
                                <textarea wire:model="reply_content" placeholder="Tulis balasan..." rows="2" class="form-input text-xs px-2 py-1.5 @error('reply_content') border-red-500 @enderror"></textarea>
                                @error('reply_content') <span class="text-red-500 text-[10px] mt-0.5">{{ $message }}</span> @enderror
                            </div>
                            <div class="flex items-center gap-2">
                                <button type="submit" class="bg-primary text-white text-xs font-bold py-1.5 px-3 rounded hover:bg-secondary hover:text-primary transition-colors">Kirim</button>
                                <button type="button" wire:click="cancelReply" class="text-gray-400 hover:text-gray-600 text-xs font-semibold">Batal</button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        @empty
            <div class="text-center py-8 text-gray-400 text-sm">
                Belum ada diskusi. Jadilah yang pertama!
            </div>
        @endforelse
    </div>
    
    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</div>

