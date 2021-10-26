<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $form = [
        'account_id' => '',
        'password' => '',
    ];

    public function render()
    {
        return view('livewire.login')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['title' => __('messages.atm')]);
    }

    public function submit(){
        $this->validate([
            'form.account_id' => 'required|numeric|integer|min:0',
            'form.password' => 'required',
        ]);

        if (!(auth()->attempt($this->form))){
            $this->form['password'] = '';
            return back()->with('invalid_login', 'invalid_login');
        }

        if (auth()->user()->is_admin){
            return redirect()->route('admin', app()->getLocale());
        }
        else {
            return redirect()->route('user', app()->getLocale());
        }
    }
}
