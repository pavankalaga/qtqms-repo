<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Register extends Component
{
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';
    public $role;

    public function mount()
    {
        if (auth()->user()) {
            return redirect()->intended('/admin/dashboard');
        }
    }

    public function updatedEmail()
    {
        $this->validate(['email' => 'required|email:rfc,dns|unique:users']);
    }

    public function register()
    {
        $this->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|same:passwordConfirmation|min:6',
            'role' => 'required|integer|in:1,2,3',
        ]);

        $user = User::create([
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'remember_token' => Str::random(10),
            'role' => $this->role,
        ]);

        auth()->login($user);

        // Redirect based on role
        return redirect()->intended('/admin/dashboard');
    }

  

    public function render()
    {
        return view('livewire.auth.register');
    }
}
