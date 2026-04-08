<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Auth;

class Login extends Component
{
    public $email;
    public $password;
    public $remember_me = false;

    protected $rules = [
        'email' => 'required|email:rfc,dns',
        'password' => 'required|min:6',
    ];

    public function mount()
    {
        if (auth()->check()) { // Use auth()->check() for clarity
            return redirect()->intended('/admin/dashboard');
        }
    }

    public function login()
    {
        // $this->validate();
        // dd($this->all());

        // Attempt to login
        if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
            
            return redirect()->intended('/admin/dashboard');
        } else {
            
            $this->addError('email', trans('auth.failed'));
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
