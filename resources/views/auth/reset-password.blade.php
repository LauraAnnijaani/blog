@extends('partials.layout')
@section('title', 'Dashboard page')
@section('content')
    <div class="card bg-base-300">
        <div class="card-body">
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">{{ __('Email') }}</legend>
                    <input value="{{ old('email', $request->email) }}" name="email" type="email" required
                        autocomplete="username" class="input w-full @error('email') input-error @enderror"
                        placeholder="Email" readonly />
                    @error('email')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>

                <!-- New Password -->
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">{{ __('New Password') }}</legend>
                    <input name="password" type="password" required autocomplete="new-password"
                        class="input w-full @error('password') input-error @enderror" placeholder="New Password" />
                    @error('password')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>

                <!-- Confirm Password -->
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">{{ __('Confirm Password') }}</legend>
                    <input name="password_confirmation" type="password" required autocomplete="new-password"
                        class="input w-full @error('password_confirmation') input-error @enderror"
                        placeholder="Confirm Password" />
                    @error('password_confirmation')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>

                <div class="flex justify-end mt-4">
                    <button class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
