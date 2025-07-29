<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryTab extends Component
{
    
     public function __construct() {}


   
    public function render(): View|Closure|string
    {
        $categories = \App\Models\Category::all(); // Fetch categories from the database
        return view('components.category-tab', [
            'categories' => $categories,
            ]);
    }
}
