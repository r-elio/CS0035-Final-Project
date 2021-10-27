<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Admin extends Component
{
    public $columns = array();
    public $column = '';
    public $search = '';
    public $sortField = 'account_id';
    public $sortDirection = 'asc';

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->columns = $this->generateColumns();
        $this->column = array_key_first($this->columns);
    }

    public function render()
    {
        $users = \App\Models\User::where('is_admin', 0)
            ->search($this->columns[$this->column], $this->search)
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);
        return view('livewire.admin', [
            'users' => $users,
        ])
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['title' => __('messages.admin')]);
    }

    public function generateColumns()
    {
        $columns = array();
        $columns[__('messages.account number')] = 'account_id';
        $columns[__('messages.password')] = 'password';
        $columns[__('messages.name')] = 'name';
        $columns[__('messages.balance')] = 'balance';
        return $columns;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        }
        else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }
}
