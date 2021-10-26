<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AccountSettings extends Component
{
    public $form = [
        'old_pin' => '',
        'new_pin' => '',
        'new_pin_confirmation' => '',
    ];

    public function render()
    {
        return view('livewire.account-settings')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['title' => __('messages.account settings')]);
    }

    public function submit()
    {
        $this->validate([
            'form.old_pin' => 'required|current_password',
            'form.new_pin' => 'required|confirmed',
        ]);

        $user = Auth::user();
        $user->update([
            'password' => Hash::make($this->form['new_pin']),
        ]);

        return redirect()->route('user', app()->getLocale());
    }
}
