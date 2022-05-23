 <x-guest-layout>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

     <link rel="stylesheet" href="{{ asset('css/style_login.css') }}">
     {{-- <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
       
            
         
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card> --}}
   
   
    
     <section class="ftco-section">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Sistema para el seguimiento de egresados</h2>
                    <x-jet-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
          
                 </div>
             </div>
             <div class="row justify-content-center">
                 <div class="col-md-12 col-lg-10">
                     <div class="wrap d-md-flex">
                         <div class="img" style="background-image: url(img/img-sistemas.png);">
                         </div>
                         <div class="login-wrap p-4 p-md-5">
                             <div class="d-flex">
                                 <div class="w-100">
                                     <h3 class="mb-4">Login</h3>
                                 </div>

                             </div>
                            
                        
                               
                             <form method="POST" action="{{ route('login') }}" class="signin-form">
                                 @csrf

                                 <div class="form-group mb-3">
                                     <label class="label" for="name">{{ __('Email') }}</label>
                                     <input type="text" class="form-control" placeholder="ejemplo@gmail.com"
                                         name="email" value="{{old('email')}}" required autofocus>
                                 </div>
                                 <div class="form-group mb-3">
                                     <label class="label" for="password">{{ __('Password') }}</label>
                                     <input type="password" class="form-control" placeholder="Password" name="password" required>
                                 </div>
                                 <div class="form-group">
                                     <button type="submit" class="form-control btn btn-primary rounded submit px-3"> {{ __('Log in') }}
                                        </button>
                                 </div>
                                 <div class="form-group d-md-flex">
                                     <div class="w-50 text-left">
                                         <label class="checkbox-wrap checkbox-primary mb-0">{{ __('Remember me') }}
                                             <input type="checkbox" id="remember_me" name="remember">
                                             <span class="checkmark"></span>
                                         </label>
                                     </div>
                                     <div class="w-50 text-md-right">
                                         
                                         <a href="{{ route('password.request') }}"> {{ __('Forgot your password?') }}</a>
                                         
                                     </div>
                                 </div>
                             </form>
                           
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>

 </x-guest-layout>
