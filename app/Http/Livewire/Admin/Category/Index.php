<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.category.index')
                    ->extends('layouts.admin')
                    ->section('content');
    }
}