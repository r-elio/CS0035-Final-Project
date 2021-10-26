<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BalanceInquiry extends Component
{
    public function render()
    {
        return view('livewire.balance-inquiry')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['title' => __('messages.balance inquiry')]);
    }
}
