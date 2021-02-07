<x-user_layout>
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="p-3">
                    <div class="h2 text-center mb-4 text-light border-bottom border-white pb-3">{{ __('Reset Password') }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
    
                            <div class="form-group row">
                                <div class="col-12">
                                    <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-custom px-3 text-center @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row my-4">
                                <div class="col-md-6 mx-auto text-center">
                                    <button type="submit" class="btn btn-lg btn-outline-light">
                                        {{ __('Send Link') }}
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


