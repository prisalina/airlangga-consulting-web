<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;

class PublicComments extends Component
{
    public $name = '';
    public $content = '';
    public $reply_to = null;
    public $reply_content = '';

    protected $rules = [
        'content' => 'required|min:3',
        'reply_content' => 'required|min:3',
    ];

    public function postComment()
    {
        $this->validate([
            'content' => 'required|min:3'
        ]);

        $data = [
            'content' => $this->content,
            'parent_id' => null,
        ];

        if (session('is_public_admin') && auth()->check()) {
            $data['user_id'] = auth()->id();
        } else {
            $data['name'] = 'Anonim';
        }

        Comment::create($data);

        $this->reset(['content']);
        session()->flash('message', 'Komentar berhasil dikirim.');
    }

    public function setReply($commentId)
    {
        $this->reply_to = $commentId;
        $this->reply_content = '';
    }

    public function cancelReply()
    {
        $this->reply_to = null;
    }

    public function postReply($parentId)
    {
        $this->validate([
            'reply_content' => 'required|min:3'
        ]);

        $data = [
            'content' => $this->reply_content,
            'parent_id' => $parentId,
        ];

        if (session('is_public_admin') && auth()->check()) {
            $data['user_id'] = auth()->id();
        } else {
            $data['name'] = 'Anonim';
        }

        Comment::create($data);

        $this->reply_to = null;
        session()->flash('message', 'Balasan berhasil dikirim.');
    }

    public function render()
    {
        $comments = Comment::whereNull('parent_id')
            ->with(['replies.user', 'user'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.public-comments', [
            'comments' => $comments
        ]);
    }
}

