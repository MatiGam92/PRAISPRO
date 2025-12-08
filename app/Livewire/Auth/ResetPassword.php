<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class ResetPassword extends Component
{
    public $token;
    public $email;
    public $password;
    public $password_confirmation;

    public function mount(?string $token = null)
    {
        $this->token = $token;
        $this->email = request()->string('email');

        // Buscamos el registro en la tabla password_resets
        $reset = DB::table('password_resets')
            ->where('token', $token)
            ->first();

        if (!$reset) {
            abort(404, 'Token inválido');
        }

        $this->email = $reset->email;
    }

    public function resetPassword()
    {
        $this->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('email', $this->email)->first();

        if (!$user) {
            abort(404, 'Usuario no encontrado');
        }

        // Actualizamos la contraseña
        $user->update([
            'password' => Hash::make($this->password)
        ]);

        // Eliminamos el token
        DB::table('password_resets')->where('email', $this->email)->delete();

        session()->flash('success', 'Tu contraseña ha sido actualizada.');

        return redirect()->route('login')->with('success', 'Contraseña restablecida correctamente.');
    }

    public function render()
    {
        return view('livewire.pages.reset-password')
            ->layout('components.layouts.guest');
    }
}

