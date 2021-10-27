<?php

namespace App\View\Components;

use Illuminate\View\Component;

class User extends Component
{
    public $mode;
    public $user;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $user = null)
    {
        $this->mode = $mode;
        $this->user = $user;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_account';
        }
        elseif (strtolower($this->mode) === 'update'){
            return 'update_account_' . $this->user->id;
        }
        else {
            return null;
        }
    }

    public function setRoute(){
        if (strtolower($this->mode) === 'add'){
            return route('admin.add', app()->getLocale());
        }
        elseif (strtolower($this->mode) === 'update'){
            return route('admin.update', [app()->getLocale(), $this->user]);
        }
        else {
            return null;
        }
    }

    public function oldField($string){
        if (strtolower($this->mode) === 'update'){
            switch ($string){
                case 'account_number':
                    return $this->user->account_id;
                case 'name':
                    return $this->user->name;
                case 'balance':
                    return $this->user->balance;
                default:
                    return null;
            }
        }
        return null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user');
    }
}
