@extends('layouts.guest')

@section('content')
    <div class="account-card-box">
        <div class="card mb-0">
            <div class="card-body p-4">
                <a href="{{ route('home.index') }}" class="mb-4">
                    <span><img src="{{ asset('dashboard/assets/images/logo.png') }}" class="mx-auto" alt=""
                            height="28"></span>
                </a>
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                    </div>
                @endif

                <div class="mt-4 flex items-center justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <x-button type="submit" class="btn btn-primary waves-effect waves-light">
                                {{ __('Resend Verification') }}
                            </x-button>
                        </div>
                    </form>

                    <div>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf

                            <button type="submit"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div> <!-- end card-body -->
        </div>
        <!-- end card -->
    </div>
@endsection
