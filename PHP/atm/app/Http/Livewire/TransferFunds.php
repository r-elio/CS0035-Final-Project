<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TransferFunds extends Component
{
    public $form = [
        'transferee' => '',
        'amount_transfer' => '',
    ];

    public function render()
    {
        return view('livewire.transfer-funds')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['title' => __('messages.transfer funds')]);
    }

    public function submit(){
        $this->validate([
           'form.transferee' => 'required|numeric|integer|min:0',
           'form.amount_transfer' => 'required|numeric|min:1',
        ]);

        $transferee = \App\Models\User::firstWhere('account_id',$this->form['transferee']);
        if (!$transferee){
            $this->form['transferee'] = '';
            return back()->with('invalid_transferee', 'invalid_transferee');
        }

        $user = auth()->user();
        if ($transferee->id == $user->getAuthIdentifier()){
            $this->form['transferee'] = '';
            return back()->with('invalid_transferee_own', 'invalid_transferee_own');
        }

        if ($user->balance < $this->form['amount_transfer']){
            $this->form['amount_transfer'] = '';
            return back()->with('invalid_amount', 'invalid_amount');
        }

        $transferee->balance = floatval($transferee->balance) + floatval($this->form['amount_transfer']);
        $user->balance = floatval($user->balance) - floatval($this->form['amount_transfer']);

        $transferee->save();
        $user->save();

        return redirect()->route('user', app()->getLocale());
    }
}
