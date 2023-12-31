<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;

    public Product $product;
    public $categories;
    public $photo;
    public string $search;
    public string $sku;
    public int $quantity;

    protected function rules()
    {
        $rules = [
            'product.category_id' => 'required',
            'product.price' => 'required|integer',
            'product.short_description' => 'required|min:4|max:255',
            'product.long_description' => 'required|min:4'
        ];

        if($this->product->id){

            $rules['product.name'] = 'required|min:3|max:255|unique:products,name,'. $this->product->id;
            $rules['product.price'] = 'required';
            $rules['product.skus.*.sku'] = 'nullable';
            $rules['product.skus.*.quantity'] = 'nullable';

        } else {

            $rules['product.name'] = 'required|min:3|max:255|unique:products,name';

        }

        return $rules;
    }

    public function mount($product  = null)
    {
        $this->product = $product ? $product->load(['photos', 'skus']) : new Product();

        $this->search = $product ? $product->category->name : "";

        $this->categories = Category::where('name', 'LIKE', "%{$this->search}%")->get();
    }

    public function render()
    {
        return view('livewire.products.create');
    }

    public function updatedSearch()
    {
        $this->categories = Category::where('name', 'LIKE', "%{$this->search}%")->get();
    }

    public function updatedPhoto()
    {
        $photo = $this->photo->storePublicly($this->product->id, 's3');
        $this->product->photos()->save((new Photo(['path' => $photo, 'featured' => 0])));

        session()->flash('message', 'foto enviada com sucesso');

        $this->product->load('photos');
    }

    public function save()
    {
        $this->validate();

        session()->flash('message', 'Produto criado com sucesso!');

        $this->product->save();
    }

    public function setFeatured(Photo $photo)
    {
        Photo::query()->where('product_id', $photo->product_id)->update(['featured' => 0]);
        
        $photo->featured = 1;
        $photo->save();

        session()->flash('message', 'Photo set as featured');

        $this->product->load('photos');
    }
    
    public function deletePhoto(Photo $photo)
    {
        Storage::disk('s3')->delete($photo->path);
        $photo->delete();
        
        session()->flash('message', 'Foto deletada');
        
        $this->product->load('photos');
    }

    public function saveSku($sku = null)
    {
        if($sku){

            $this->validate([
                'product.skus.*.sku' => 'required|unique:skus,sku,'. $sku['id'],
                'product.skus.*.quantity' => 'required|integer'
            ]);

            $update = Sku::find($sku['id']);
            $update->sku = $sku['sku'];
            $update->quantity = $sku['quantity'];
            $update->save();

        }else {

            $this->validate([
                'sku' => 'required|unique:skus,sku',
                'quantity' => 'required|integer',
            ]);

            $this->product->skus()->save((new Sku(['sku' => $this->sku, 'quantity' => $this->quantity])));
        }

        session()->flash('message', 'Sku created');

        $this->product->load('skus');
        $this->sku = '';
        $this->quantity = 0;
    }

    public function removeSku(Sku $sku)
    {
        $sku->delete();

        session()->flash('message', 'Sku deleted');

        $this->product->load('skus');
    }
}
