<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductParticulars;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductAllProductParticularsDetail extends Component
{
    use AuthorizesRequests;

    public Product $product;
    public ProductParticulars $productParticulars;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New ProductParticulars';

    protected $rules = [
        'productParticulars.particulars' => ['required', 'max:255', 'string'],
        'productParticulars.quantity' => ['required', 'max:255'],
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->resetProductParticularsData();
    }

    public function resetProductParticularsData()
    {
        $this->productParticulars = new ProductParticulars();

        $this->dispatchBrowserEvent('refresh');
    }

    public function newProductParticulars()
    {
        $this->editing = false;
        $this->modalTitle = trans(
            'crud.product_all_product_particulars.new_title'
        );
        $this->resetProductParticularsData();

        $this->showModal();
    }

    public function editProductParticulars(
        ProductParticulars $productParticulars
    ) {
        $this->editing = true;
        $this->modalTitle = trans(
            'crud.product_all_product_particulars.edit_title'
        );
        $this->productParticulars = $productParticulars;

        $this->dispatchBrowserEvent('refresh');

        $this->showModal();
    }

    public function showModal()
    {
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function hideModal()
    {
        $this->showingModal = false;
    }

    public function save()
    {
        $this->validate();

        if (!$this->productParticulars->product_id) {
            $this->authorize('create', ProductParticulars::class);

            $this->productParticulars->product_id = $this->product->id;
        } else {
            $this->authorize('update', $this->productParticulars);
        }

        $this->productParticulars->save();

        $this->hideModal();
    }

    public function destroySelected()
    {
        $this->authorize('delete-any', ProductParticulars::class);

        ProductParticulars::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetProductParticularsData();
    }

    public function toggleFullSelection()
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->product->allProductParticulars as $productParticulars) {
            array_push($this->selected, $productParticulars->id);
        }
    }

    public function render()
    {
        return view('livewire.product-all-product-particulars-detail', [
            'allProductParticulars' => $this->product
                ->allProductParticulars()
                ->paginate(20),
        ]);
    }
}
