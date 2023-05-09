<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class Index extends Component
{

    use WithPagination;

    public function render()
    {
        return view('livewire.categories.index', [
            'categories' => Category::paginate(5)
        ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
    }
}
