<div>
    <div class="mb-4">
        @can('create', App\Models\ProductParticulars::class)
        <button class="btn btn-primary" wire:click="newProductParticulars">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\ProductParticulars::class)
        <button
            class="btn btn-danger"
             {{ empty($selected) ? 'disabled' : '' }} 
            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
            wire:click="destroySelected"
        >
            <i class="icon ion-md-trash"></i>
            @lang('crud.common.delete_selected')
        </button>
        @endcan
    </div>

    <x-modal
        id="product-all-product-particulars-modal"
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
                    <x-inputs.group class="col-sm-12 col-lg-6">
                        <x-inputs.text
                            name="productParticulars.particulars"
                            label="Particulars"
                            wire:model="productParticulars.particulars"
                            maxlength="255"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12 col-lg-6">
                        <x-inputs.text
                            name="productParticulars.quantity"
                            label="Quantity"
                            wire:model="productParticulars.quantity"
                            maxlength="255"
                        ></x-inputs.text>
                    </x-inputs.group>
                </div>
            </div>

            @if($editing) @endif

            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-light float-left"
                    wire:click="$toggle('showingModal')"
                >
                    <i class="icon ion-md-close"></i>
                    @lang('crud.common.cancel')
                </button>

                <button type="button" class="btn btn-primary" wire:click="save">
                    <i class="icon ion-md-save"></i>
                    @lang('crud.common.save')
                </button>
            </div>
        </div>
    </x-modal>

    <div class="table-responsive">
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
                        @lang('crud.product_all_product_particulars.inputs.particulars')
                    </th>
                    <th class="text-left">
                        @lang('crud.product_all_product_particulars.inputs.quantity')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($allProductParticulars as $productParticulars)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $productParticulars->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">
                        {{ $productParticulars->particulars ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ $productParticulars->quantity ?? '-' }}
                    </td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $productParticulars)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editProductParticulars({{ $productParticulars->id }})"
                            >
                                <i class="icon ion-md-create"></i>
                            </button>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">{{ $allProductParticulars->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
