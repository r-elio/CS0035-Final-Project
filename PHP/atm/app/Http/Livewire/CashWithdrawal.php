<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CashWithdrawal extends Component
{
    public function render()
    {
        return view('livewire.cash-withdrawal')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['title' => __('messages.cash withdrawal')]);
    }
}
