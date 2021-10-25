<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Admin extends Component
{
    public function render()
    {
        return view('livewire.admin')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['title' => __('messages.admin')]);;
    }
}
