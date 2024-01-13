<?php

namespace App\Http\Livewire\Ecommerce\Components;

use App\Models\Category;
use Illuminate\Support\Collection;
use Livewire\Component;

class Filters extends Component
{
    public Collection $filters;

    public function mount()
    {
        $this->filters = collect([]);
    }

    public function render()
    {
        return view('livewire.ecommerce.components.filters', [
            'categories' => Category::all(),
        ]);
    }

    public function addFilter(Category $category)
    {
        $isset = $this->filters->where('id', $category->id);

        if($isset->count() === 0){
            $this->filters->add($category);
        }

        $this->emit('filtersAdded', $this->filters);
    }

    public function removeFilter(Category $category)
    {
        $this->filters = $this->filters->whereNotIn('id', $category->id);

        $this->emit('filtersRemoved', $this->filters);
    }
}
