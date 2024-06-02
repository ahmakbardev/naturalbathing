<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginModal extends Component
{
    public $email;
    public $password;
    public $loggedIn = false; // Inisialisasi properti loggedIn
    public $modalHidden = true; // Inisialisasi properti modalHidden

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function mount()
    {
        // Periksa apakah pengguna sudah login saat komponen dimuat
        if (Auth::check()) {
            $this->loggedIn = true;
        }

        // Set properti modalHidden menjadi true saat halaman dimuat
        $this->modalHidden = true;
    }

    // Metode untuk menangani login
    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('message', 'Login successful.');
            $this->loggedIn = true; // Set loggedIn ke true setelah login berhasil
            // Set properti modalHidden menjadi true setelah login berhasil
            $this->modalHidden = true;
            return redirect()->intended('/');
        } else {
            $errors = [];

            if (!User::where('email', $this->email)->exists()) {
                $errors['email'] = 'Email tidak terdaftar.';
            } else {
                $errors['password'] = 'Password salah.';
            }

            $this->addError('email', $errors['email'] ?? null);
            $this->addError('password', $errors['password'] ?? null);

            // Set properti modalHidden menjadi false jika login gagal
            $this->modalHidden = false;
        }
    }

    public function render()
    {
        return view('livewire.login-modal');
    }
}
