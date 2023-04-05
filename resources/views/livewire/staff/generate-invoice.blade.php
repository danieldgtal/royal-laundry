<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h3 class="box-title">Generate Invoice</h3>
            @if (session()->has('message'))
                <div class="alert alert-success text-center" id="alert">{{ session('message') }}</div>
            @endif
            <div class="row">
                <div class="table-responsive">
                    <form wire:submit.prevent="submitOrder">
                        <table class="table min-w-full">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                                        Item Category</th>
                                    <th
                                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                                        Item Name</th>


                                    <th
                                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                                        Quantity
                                    </th>

                                    <th
                                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                                        Package Unit
                                    </th>
                                    <th
                                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <select id="" class="form-control" wire:model="selected_category">
                                                <option value="">--Select Category--</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('selected_category')
                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </td>

                                    <td>
                                        @if (!is_null($selected_category))
                                            <div class="form-group">
                                                <select id="" class="form-control" wire:model="selected_item"
                                                    wire:change="getItemPrice">
                                                    <option value="">--Select Item--</option>
                                                    @foreach ($items as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('selected_item')
                                                <span class="text-danger"
                                                    style="font-size: 11.5px;">{{ $message }}</span>
                                            @enderror
                                        @endif
                                    </td>
                                    <td>
                                        <input wire:model="quantity" type="number"
                                            class="text-sm sm:text-base px-2 pr-2 form-control rounded-lg border border-gray-400 py-1 focus:outline-none focus:border-blue-400"
                                            style="width: 50px" min="1" />
                                        @error('quantity')
                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td>
                                        @if (!is_null($selected_item_price))
                                            {{ $selected_item_package_unit }}
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <button type="submit" class="btn btn-sm btn-primary"
                                                wire:click.prevent="addToCart">
                                                Add to Cart
                                            </button>

                                        </div>
                                    </td>
                                <tr>
                                    <td colspan="4">
                                        <a type="button" href="{{ route('staff.view_generated_invoice') }}"
                                            class="btn btn-dark btn-rounded">Check Item List
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
@endpush
