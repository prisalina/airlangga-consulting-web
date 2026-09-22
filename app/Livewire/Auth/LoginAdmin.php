<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginAdmin extends Component
{
    public $email = '';
    public $password = '';

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
            session()->put('is_public_admin', true);
            return redirect()->route('contact.index');
        }

        $this->addError('email', 'Kredensial tidak cocok dengan data kami.');
    }

    public function render()
    {
        return view('livewire.auth.login-admin')
            ->layout('layouts.app');
    }
}

