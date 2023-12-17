<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class NavigationPagination extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Model|Illuminate\Database\Eloquent\Model|\Illuminate\Pagination\LengthAwarePaginator $pagination
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation-pagination');
    }
}
