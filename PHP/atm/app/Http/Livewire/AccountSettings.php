<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AccountSettings extends Component
{
    public function render()
    {
        return view('livewire.account-settings')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['title' => __('messages.account settings')]);
    }
}
