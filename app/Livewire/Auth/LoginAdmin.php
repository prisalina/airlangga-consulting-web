<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginAdmin extends Component
{
    public $username = '';
    public $password = '';

    protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        // Bisa login pakai email atau username
        $fieldType = filter_var($this->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$fieldType => $this->username, 'password' => $this->password])) {
            session()->regenerate();
            session()->put('is_public_admin', true);
            return redirect()->route('contact.index');
        }

        $this->addError('username', 'Kredensial tidak cocok dengan data kami.');
    }

    public function render()
    {
        return view('livewire.auth.login-admin')
            ->layout('layouts.app');
    }
}

