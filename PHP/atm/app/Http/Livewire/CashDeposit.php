<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CashDeposit extends Component
{
    public function render()
    {
        return view('livewire.cash-deposit')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['title' => __('messages.cash deposit')]);
    }
}
