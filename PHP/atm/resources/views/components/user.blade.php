<div class="modal fade text-start text-dark" id="{{ $setID() }}" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ $setRoute() }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@if($mode == 'add'){{ __('messages.add account') }}@else{{ __('messages.update account') }}@endif</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="account_number" class="form-label">{{ __('messages.account number') }}</label>
                        <input type="text" class="form-control @error('account_number') is-invalid @enderror"
                               id="account_number" name="account_number"
                               value="{{ old('account_number') ?? $oldField('account_number') }}">
                        @error('account_number')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('messages.password') }}</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror"
                               id="password" name="password" value="{{ old('password') }}">
                        @error('password')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('messages.name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                               name="name" value="{{ old('name') ?? $oldField('name') }}">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="balance" class="form-label">{{ __('messages.balance') }}</label>
                        <input type="text" class="form-control @error('balance') is-invalid @enderror"
                               id="balance" name="balance" value="{{ old('balance') ?? $oldField('balance') }}">
                        @error('balance')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                    <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('messages.cancel') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
