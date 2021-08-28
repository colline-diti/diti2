<div>
    <div class="mb-4">
        @can('create', App\Models\RequisitionDelivery::class)
        <button class="btn btn-sm btn-primary" wire:click="newRequisitionDelivery">
            <i class="icon ti-plus"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\RequisitionDelivery::class)
        <button
            class="btn btn-sm btn-danger"
             {{ empty($selected) ? 'disabled' : '' }} 
            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
            wire:click="destroySelected"
        >
            <i class="icon ti-trash"></i>
            @lang('crud.common.delete_selected')
        </button>
        @endcan
    </div>

    <x-modal
        id="requisition-item-requisition-deliveries-modal"
        wire:model="showingModal"
    >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div>
                    <x-inputs.group class="col-sm-12 col-lg-6 ">
                        <x-inputs.text
                            name="requisitionDelivery.item_quantity"
                            label="Item Quantity"
                            wire:model="requisitionDelivery.item_quantity"
                            maxlength="255"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12 col-lg-6">
                        <x-inputs.date
                            name="requisitionDeliveryDeliveryDate"
                            label="Delivery Date"
                            wire:model="requisitionDeliveryDeliveryDate"
                            max="255"
                        ></x-inputs.date>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12 col-lg-6">
                        <x-inputs.text
                            name="requisitionDelivery.remarks"
                            label="Remarks"
                            wire:model="requisitionDelivery.remarks"
                            maxlength="255"
                        ></x-inputs.text>
                    </x-inputs.group>
                </div>
            </div>

            @if($editing) @endif

            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-sm btn-light float-left"
                    wire:click="$toggle('showingModal')"
                >
                    <i class="icon ti-close"></i>
                    @lang('crud.common.cancel')
                </button>

                <button type="button" class="btn btn-sm btn-primary" wire:click="save">
                    <i class="icon ti-save"></i>
                    @lang('crud.common.save')
                </button>
            </div>
        </div>
    </x-modal>

    <div class="table-responsive col-lg-12">
        <table class="table table-borderless table-hover">
            <thead>
                <tr>
                    <th>
                        <input
                            type="checkbox"
                            wire:model="allSelected"
                            wire:click="toggleFullSelection"
                            title="{{ trans('crud.common.select_all') }}"
                        />
                    </th>
                    <th class="text-left">
                        @lang('crud.requisition_item_requisition_deliveries.inputs.item_quantity')
                    </th>
                    <th class="text-left">
                        @lang('crud.requisition_item_requisition_deliveries.inputs.delivery_date')
                    </th>
                    <th class="text-left">
                        @lang('crud.requisition_item_requisition_deliveries.inputs.remarks')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($requisitionDeliveries as $requisitionDelivery)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $requisitionDelivery->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">
                        {{ $requisitionDelivery->item_quantity ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ $requisitionDelivery->delivery_date ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ $requisitionDelivery->remarks ?? '-' }}
                    </td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $requisitionDelivery)
                            <button
                                type="button"
                                class="btn btn-sm btn-light"
                                wire:click="editRequisitionDelivery({{ $requisitionDelivery->id }})"
                            >
                                <i class="icon ti-pencil-alt"></i>
                            </button>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">{{ $requisitionDeliveries->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
