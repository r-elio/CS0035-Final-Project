<div class="container px-5">
    <div class="d-sm-flex my-3 col-6 mx-auto justify-content-center align-items-center">
        <div class="input-group mb-3">
            <span class="input-group-text">{{ __('messages.search') }}</span>
            <input wire:model="search" type="text" class="form-control w-auto">
            <select wire:model="column" class="form-select bg-dark text-white">
                @foreach($columns as $column_key => $column_item)
                    <option>{{ $column_key }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="card bg-dark text-white rounded">
        <div class="card-body p-5">
            @if($users->count())
                <div class="table-responsive">
                    <table class="table table-dark table-striped table-hover">
                        <thead class="text-center">
                        <tr>
                            <th wire:click="sortBy('account_id')">
                                {{ __('messages.account number') }}
                                @if($sortField === 'account_id')
                                    @if($sortDirection == 'asc')
                                        <i class="bi bi-arrow-up-short"></i>
                                    @else
                                        <i class="bi bi-arrow-down-short"></i>
                                    @endif
                                @endif
                            </th>
                            <th wire:click="sortBy('password')">
                                {{ __('messages.password') }}
                                @if($sortField === 'password')
                                    @if($sortDirection == 'asc')
                                        <i class="bi bi-arrow-up-short"></i>
                                    @else
                                        <i class="bi bi-arrow-down-short"></i>
                                    @endif
                                @endif
                            </th>
                            <th wire:click="sortBy('name')">
                                {{ __('messages.name') }}
                                @if($sortField === 'name')
                                    @if($sortDirection == 'asc')
                                        <i class="bi bi-arrow-up-short"></i>
                                    @else
                                        <i class="bi bi-arrow-down-short"></i>
                                    @endif
                                @endif
                            </th>
                            <th wire:click="sortBy('balance')">
                                {{ __('messages.balance') }}
                                @if($sortField === 'balance')
                                    @if($sortDirection == 'asc')
                                        <i class="bi bi-arrow-up-short"></i>
                                    @else
                                        <i class="bi bi-arrow-down-short"></i>
                                    @endif
                                @endif
                            </th>
                            <th>
                                {{ __('messages.action') }}
                            </th>
                        </tr>
                        </thead>
                        <tbody wire:loading.class="opacity-50" class="text-end">
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->account_id }}</td>
                                <td class="text-center">{{ $user->password }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ number_format($user->balance,2) }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-light btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#update_account_{{ $user->id }}">
                                        {{ __('messages.update') }}
                                    </button>
                                    <button type="button" class="btn btn-outline-light btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#remove_account_{{ $user->id }}">
                                        {{ __('messages.remove') }}
                                    </button>
                                </td>
                            </tr>

                            <x-user mode="update" :user="$user"/>

                            <!-- Remove Modal -->
                            <div class="modal fade text-dark" id="remove_account_{{ $user->id }}" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ __('messages.remove account') }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            {{ __('messages.remove account content') }}
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <form action="{{ route('admin.remove', [app()->getLocale(), $user]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary">Yes</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">No
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center pt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            @else
                <p class="lead text-center">{{ __('messages.no existing account') }}</p>
            @endif
        </div>
    </div>

    <x-user mode="add"/>

    @if(count($errors) > 0)
        <script>
            $(document).ready(function () {
                $('#{{ session('modal_id') }}').modal('show');
            });
        </script>
    @endif
</div>
