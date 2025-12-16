<?php

namespace App\Livewire\Member;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

#[Layout('member.layouts')]
class Profil extends Component
{
    public $name;
    public $email;
    public $phone;
    public $gender;
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone ?? '';
        $this->gender = $user->gender ?? '';
    }

    public function getInitials()
    {
        $names = explode(' ', $this->name);
        if (count($names) >= 2) {
            return strtoupper(substr($names[0], 0, 1) . substr($names[1], 0, 1));
        }
        return strtoupper(substr($this->name, 0, 2));
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:male,female',
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'gender' => $this->gender,
        ]);

        session()->flash('message', 'Profil berhasil diperbarui!');
        session()->flash('alert-type', 'success');
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($this->current_password, $user->password)) {
            session()->flash('password_error', 'Password saat ini tidak sesuai!');
            return;
        }

        $user->update([
            'password' => Hash::make($this->new_password),
        ]);

        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
        session()->flash('password_message', 'Password berhasil diperbarui!');
        session()->flash('password-alert-type', 'success');
    }

    public function render()
    {
        return view('livewire.member.profil');
    }
}
