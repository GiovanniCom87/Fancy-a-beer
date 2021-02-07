<x-user_layout>
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="p-3">
                    <div class="h2 text-center mb-4 text-light border-bottom border-white pb-3">{{ __('Register') }}</div>
    
                    <div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <div class="form-group row">    
                                <div class="col-12">
                                    <input id="name" type="text" class="form-custom px-3 text-center @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-12">
                                    <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-custom px-3 text-center @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback text-center" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-12">
                                    <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-custom px-3 text-center @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-12">
                                    <input id="password-confirm" placeholder="{{ __('Confirm Password') }}" type="password" class="form-custom px-3 text-center" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="form-group row my-4">
                                <div class="col-md-6 mx-auto text-center">
                                    <button type="submit" class="btn btn-lg btn-outline-light">
                                        {{ __('Register') }}
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


