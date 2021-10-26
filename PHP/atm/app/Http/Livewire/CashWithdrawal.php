<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CashWithdrawal extends Component
{
    public $form = [
        'amount' => '',
    ];

    public function render()
    {
        return view('livewire.cash-withdrawal')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['title' => __('messages.cash withdrawal')]);
    }

    public function submit(){
        $this->validate([
            'form.amount' => 'required|numeric|integer|min:100'
        ]);

        if ($this->form['amount'] % 100 != 0){
            $this->form['amount'] = '';
            return back()->with('invalid_amount', 'invalid_amount');
        }

        $user = auth()->user();
        if ($user->balance < $this->form['amount']){
            $this->form['amount'] = '';
            return back()->with('invalid_withdraw','invalid_withdraw');
        }

        $user->balance = intval($user->balance) - intval($this->form['amount']);
        $user->save();

        return redirect()->route('user', app()->getLocale());
    }
}
