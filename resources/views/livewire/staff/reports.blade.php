<div class="row">
    <!-- Modal -->
    <div class="modal fade" id="comment" tabindex="-1" role="dialog" aria-labelledby="newOrderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newOrderModalLabel">Feedback</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="">Feedback Comment</label>
                            <textarea class="form-control" cols="30" rows="10" wire:model="comment" disabled></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title">Feedback Section</h4>
            <p class="sub-header">
                Users Comment/Feedback View and Management
            </p>
            @if (session()->has('message'))
                <div class="alert alert-success text-center">{{ session('message') }}</div>
            @endif
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="dataTables_length" id="datatable_length">
                        <label>Show
                            <select aria-controls="datatable" wire:model="per_page"
                                class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            entries</label>
                        @error('per_page')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <table id="datatable"
                        class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                        style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                        aria-describedby="datatable_info">
                        <thead>
                            <tr role="row">
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($comments)
                                @foreach ($comments as $comment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $comment->name }}</td>
                                        <td>{{ $comment->email }}</td>
                                        <td>{{ $comment->phone }}</td>
                                        <td>{{ $comment->subject }}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-primary"
                                                wire:click="viewComment({{ $comment->id }})">view</a>
                                            <a href="#" class="btn btn-sm btn-danger"
                                                wire:click="deleteDialog({{ $comment->id }})">delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Pagination buttons -->
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="datatable-buttons_info" role="status" aria-live="polite">
                        Showing {{ $comments->firstItem() }} to {{ $comments->lastItem() }} of
                        {{ $comments->total() }}
                        entries
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="d-flex justiy-content-center flex-wrap">
                        {{ $comments->links('vendor.livewire.bootstrap') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('show-delete-alert', event => {
            $('#sa-warning').modal('show');
        });
    </script>
    <!--Sweet alert delete script -->
    <script>
        window.addEventListener('show-delete-alert', event => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('confirmDelete')
                }
            })
        })

        window.addEventListener('itemDeleted', event => {
            Swal.fire(
                'Deleted',
                'Comment has been deleted',
                'success',
            )
        })
    </script>
    <script>
        window.addEventListener('show-comment-info', event => {
            $('#comment').modal('show');
        });
    </script>
@endpush
