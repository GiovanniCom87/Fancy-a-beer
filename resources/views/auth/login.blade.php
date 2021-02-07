<x-user_layout>
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="p-3">
                    <div class="h2 text-center mb-4 text-light border-bottom border-white pb-3">{{ __('Login') }}</div>
    
                    <div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="form-group row">    
                                <div class="col-12">
                                    <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-custom px-3 text-center @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback text-center" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-12">
                                    <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-custom px-3 text-center @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback text-center" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-4">
                                <div class="col-6 pl-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label text-light" for="remember">
                                            Ricordami
                                        </label>
                                    </div>
                                   
                                </div>
                                <div class="col-6 text-right">
                                    @if (Route::has('password.request'))
                                    <a class="text-light" href="{{ route('password.request') }}">
                                        Password dimenticata?
                                    </a>
                                @endif
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <div class="col-md-6 mx-auto text-center">

                                    <button type="submit" class="btn btn-lg btn-outline-light">
                                        {{ __('Login') }}
                                    </button>
    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user_layout>


