<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RequisitionItem;
use App\Models\RequisitionDelivery;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RequisitionItemRequisitionDeliveriesDetail extends Component
{
    use AuthorizesRequests;

    public RequisitionItem $requisitionItem;
    public RequisitionDelivery $requisitionDelivery;
    public $requisitionDeliveryDeliveryDate;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New RequisitionDelivery';

    protected $rules = [
        'requisitionDelivery.item_quantity' => [
            'required',
            'max:255',
            'string',
        ],
        'requisitionDeliveryDeliveryDate' => ['required', 'date'],
        'requisitionDelivery.remarks' => ['required', 'max:255', 'string'],
    ];

    public function mount(RequisitionItem $requisitionItem)
    {
        $this->requisitionItem = $requisitionItem;
        $this->resetRequisitionDeliveryData();
    }

    public function resetRequisitionDeliveryData()
    {
        $this->requisitionDelivery = new RequisitionDelivery();

        $this->requisitionDeliveryDeliveryDate = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newRequisitionDelivery()
    {
        $this->editing = false;
        $this->modalTitle = trans(
            'crud.requisition_item_requisition_deliveries.new_title'
        );
        $this->resetRequisitionDeliveryData();

        $this->showModal();
    }

    public function editRequisitionDelivery(
        RequisitionDelivery $requisitionDelivery
    ) {
        $this->editing = true;
        $this->modalTitle = trans(
            'crud.requisition_item_requisition_deliveries.edit_title'
        );
        $this->requisitionDelivery = $requisitionDelivery;

        $this->requisitionDeliveryDeliveryDate = $this->requisitionDelivery->delivery_date->format(
            'Y-m-d'
        );

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

        if (!$this->requisitionDelivery->requisition_item_id) {
            $this->authorize('create', RequisitionDelivery::class);

            $this->requisitionDelivery->requisition_item_id =
                $this->requisitionItem->id;
        } else {
            $this->authorize('update', $this->requisitionDelivery);
        }

        $this->requisitionDelivery->delivery_date = \Carbon\Carbon::parse(
            $this->requisitionDeliveryDeliveryDate
        );

        $this->requisitionDelivery->save();

        $this->hideModal();
    }

    public function destroySelected()
    {
        $this->authorize('delete-any', RequisitionDelivery::class);

        RequisitionDelivery::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetRequisitionDeliveryData();
    }

    public function toggleFullSelection()
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach (
            $this->requisitionItem->requisitionDeliveries
            as $requisitionDelivery
        ) {
            array_push($this->selected, $requisitionDelivery->id);
        }
    }

    public function render()
    {
        return view('livewire.requisition-item-requisition-deliveries-detail', [
            'requisitionDeliveries' => $this->requisitionItem
                ->requisitionDeliveries()
                ->paginate(20),
        ]);
    }
}
