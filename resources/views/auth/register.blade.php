@extends('layouts.app')

@section('content')
<style>
    body{
        background: rgb(104,98,233);
background: -moz-linear-gradient(90deg, rgba(104,98,233,1) 0%, rgba(21,115,134,1) 32%, rgba(51,175,144,1) 82%, rgba(0,255,252,1) 100%);
background: -webkit-linear-gradient(90deg, rgba(104,98,233,1) 0%, rgba(21,115,134,1) 32%, rgba(51,175,144,1) 82%, rgba(0,255,252,1) 100%);
background: linear-gradient(90deg, rgba(104,98,233,1) 0%, rgba(21,115,134,1) 32%, rgba(51,175,144,1) 82%, rgba(0,255,252,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#6862e9",endColorstr="#00fffc",GradientType=1);
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inscription') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="speciality" class="col-md-4 col-form-label text-md-end">{{ __('Spécialité') }}</label>

                            <div class="col-md-6">
                                <select id="speciality" class="form-select @error('speciality') is-invalid @enderror" name="speciality" required>
                                    <option value="">---Sélectionnez la spécialité---</option>
                                    <option value="informatique" {{ old('speciality') == 'informatique' ? 'selected' : '' }}>Informatique</option>
                                    <option value="mathematiques" {{ old('speciality') == 'mathematiques' ? 'selected' : '' }}>Mathématiques</option>
                                    <option value="physique" {{ old('speciality') == 'physique' ? 'selected' : '' }}>Physique</option>
                                    <option value="langue" {{ old('speciality') == 'langue' ? 'selected' : '' }}>Langue</option>
                                </select>

                                @error('speciality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmez le mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('s\'inscrire') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
