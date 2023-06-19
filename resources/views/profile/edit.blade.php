@if (auth()->user()->role === 'pembeli')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profile') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
    
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
    
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@else
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/create_edit.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/side-bar.css') }}"/>
        <script defer src="{{ asset('js/side-bar.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/home.css') }}"/>
        <title>Admin | PasarQ</title>
    </head>
    <body class="container">
        <?php
                $namaUser = auth()->user()->name;
                $roleUser = ucfirst(auth()->user()->role);
            ?>
        <header>
            <nav>
            <button type="button" id="toggle-btn">
            <i class="fa fa-bars"></i>
            </button>
            <span><a href="/">
                {{ $roleUser }} - PasarQ
            </a></span>
            <ul class="sidebar-menu">
            <li><a href="/profile" class="tombolnav"><i class="fa fa-home"> Profile{{ $roleUser }}</i></a></li>
            @if (auth()->user()->role === 'admin')
                <li><a href="/admin" class="tombolnav"><i class="fa fa-suitcase"> ListUser</i></a></li>
                <li><a href="/admin/kategori" class="tombolnav"><i class="fa fa-suitcase"> ListKategori</i></a></li>
            @else
                <li><a href="/dashboard" class="tombolnav"><i class="fa fa-suitcase"> ListProduk</i></a></li>
            @endif
            <li><a href="halaman3.html" class="tombolnav"><i class="fa fa-user"> Riwayat</i></a></li>
            <li><form method="POST" action="{{ route('logout') }}">
                                        @csrf
        
                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
            </ul>
          </nav>
        </header>
        <main class="container">
            <h1 style="text-align: center">Profile {{ $namaUser }}</h1>
            <hr class="garis">
            <div class="container">
                <form method="post" action="/profile" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')
            
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput name" name="name" value="{{ old('name', $user->name) }}" placeholder="Bejo">
                        <label for="floatingInput">Name</label>
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingInput name" name="email" value="{{ old('email', $user->email) }}" placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800">
                                {{ __('Your email address is unverified.') }}
        
                                <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>
        
                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                        @endif
                    </div>
                    <br>
                    <div class="flex items-center gap-4">
                        <x-primary-button class="btn btn-primary">{{ __('Save') }}</x-primary-button>
                        @if (session('status') === 'profile-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600"
                            >{{ __('Saved.') }}</p>
                        @endif
                    </div>
                </form>
                <hr>
                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')
            
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingInput current_password" name="current_password">
                        <label for="floatingInput current_password">Current Password</label>
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingInput password" name="password">
                        <label for="floatingInput password">New Password</label>
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingInput password_confirmation" name="password_confirmation">
                        <label for="floatingInput password_confirmation">Confirm Password</label>
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    </div>
                    <div class="flex items-center gap-4">
                        <x-primary-button class="btn btn-primary">{{ __('Save') }}</x-primary-button>
            
                        @if (session('status') === 'password-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600"
                            >{{ __('Saved.') }}</p>
                        @endif
                    </div>
                </form>
                @if (auth()->user()->role === 'penjual')
                <hr>
                <form method="post" action="/profile" class="p-6">
                    @csrf
                    @method('delete')
        
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Are you sure you want to delete your account?') }}
                    </h2>
        
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>
        
                    <div class="mt-6">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingInput password" name="password">
                            <label for="floatingInput password">Password</label>
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>
                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    </div>
        
                    <div class="mt-6 flex justify-end">
                        <a href="/"><button type="button" class="btn btn-primary">{{ __('Cancel') }}</button></a>
                        <x-danger-button class="btn" style="background-color: red;">
                            {{ __('Delete Account') }}
                        </x-danger-button>
                    </div>
                </form>
                @endif
            </div>
        </main>
        <footer></footer>
    </body>
    </html>
@endif