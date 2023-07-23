<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brands;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $brand_id;

    public function deleteBrand( $brand_id )
    {
      dd($brand_id);
       $this->$brand_id = $brands_id; 
    }

    public function render()
    {
        $brands = Brands::orderby('id', 'DESC')->paginate(20);
        return view('livewire.admin.brand.index', ['brands' => $brands]);
    }
}