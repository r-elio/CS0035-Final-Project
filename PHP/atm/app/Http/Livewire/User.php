<?php

namespace App\Http\Livewire;

use Livewire\Component;

class User extends Component
{
    public function render()
    {
        return view('livewire.user')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['title' => auth()->user()->name]);;
    }
}
