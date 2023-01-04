@extends('./../layouts.app')
@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('Change Password') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('user.postChangePassword', $users->id) }}">
                @csrf
                @method('put')
                <div class="row mb-3">
                    <label for="current_password" class="col-md-4 col-form-label text-md-end">{{ __('Current Password')
                        }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="form-control @error('current_password') is-invalid @enderror"
                            name="current_password">

                        @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="new_password" class="col-md-4 col-form-label text-md-end">{{ __('New Password')
                        }}</label>

                    <div class="col-md-6">
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                            name="new_password">
                        @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password')
                        }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation">
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Change') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
