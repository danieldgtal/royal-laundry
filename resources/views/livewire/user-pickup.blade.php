<div class="row">
    <!-- Item drop off modal -->
    <div wire:ignore.self class="modal fade" id="userPickUp" tabindex="-1" data-backdrop="static" role="dialog"
        data-keyboard="false" aria-labelledby="userPickUpModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userPickUp">Pickup Items</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addUserPickUp">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="contactNumber">PickUp Date</label>
                                <div class="input-group">
                                    <input wire:model="pickup_date" type="text" class="form-control"
                                        placeholder="mm/dd/yyyy" data-provide="datepicker" data-date-autoclose="true"
                                        onchange="this.dispatchEvent(new InputEvent('input'))">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="icon-calender"></i></span>
                                    </div>
                                </div>
                                @error('pickup_date')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="pickupDay">PickUp Time</label>
                                <div class="input-group clockpicker" data-placement="bottom" data-align="top"
                                    data-autoclose="true">
                                    <input type="text" class="form-control" wire:model="pickup_time" value=""
                                        onchange="this.dispatchEvent(new InputEvent('input'))">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                    </div>
                                </div>
                                @error('pickup_time')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="customerName">Laundry Items</label>
                            <textarea class="form-control" id="laundryItems" rows="3" wire:model.lazy="pickup_items"></textarea>
                            @error('pickup_items')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="laundryItems">PickUp Note</label>
                            <textarea class="form-control" id="laundryItems" rows="3" wire:model.lazy="pickup_note"></textarea>
                            @error('pickup_note')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">PickUp Branch</label>
                            <select name="" id="" wire:model.lazy="pickup_branch" class="form-control"
                                required>
                                <option value="">--Select Branch--</option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                            @error('pickup_branch')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" wire:click="addUserPickUp">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <!-- Item pick up table -->
        <div class="card-box">
            <h4 class="header-title">Item Pick Up</h4>

            <p class="sub-header">Our laundry management system allows you to conveniently schedule a pickup for
                your laundry items.
                You have the option to schedule a pickup at a particular location of your choice or register a
                drop-off at one of our branches.</p>
            @if (session()->has('message'))
                <div class="alert alert-success text-center">{{ session('message') }}</div>
            @endif
            <div class="card-body">
                <!-- Button trigger modal for item drop off -->
                <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal"
                    data-target="#userPickUp">
                    <i class="fa fa-plus"></i> Item Drop Off
                </button>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>PickupID</th>
                                <th>Date</th>
                                <th>Branch</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($items->count() > 0)
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->pickup_id }}</td>
                                        <td>{{ $item->pickup_date }}</td>
                                        <td>
                                            @php
                                                $itemBranch = DB::table('branches')
                                                    ->where('id', $item->branch_id)
                                                    ->first();
                                            @endphp
                                            {{ $itemBranch->name }}
                                        </td>
                                        <td><span
                                                class="badge {{ $item->pickup_status == 'pending' ? 'bg-warning' : ($item->pickup_status == 'completed' ? 'bg-success' : ($item->pickup_status == 'cancelled' ? 'bg-danger' : 'bg-secondary')) }}">
                                                {{ $item->pickup_status }}
                                            </span>
                                        </td>
                                        <td>N/A</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" style="text-align: center">
                                        No Pickup Found
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- Pagination buttons -->
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="datatable-buttons_info" role="status" aria-live="polite">
                            Showing {{ $items->firstItem() }} to {{ $items->lastItem() }} of {{ $items->total() }}
                            entries
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="d-flex justiy-content-center flex-wrap">
                            {{ $items->links('vendor.livewire.bootstrap') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#userPickUp').modal('hide');
        });
    </script>
@endpush
