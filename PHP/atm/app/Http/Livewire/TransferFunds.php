<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TransferFunds extends Component
{
    public function render()
    {
        return view('livewire.transfer-funds')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['title' => __('messages.transfer funds')]);
    }
}
