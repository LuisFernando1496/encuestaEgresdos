<x-guest-layout>
    
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
        <div id="credentials">
            <div>
                <x-jet-label for="name" value="Nombre Completo" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="Contraseña" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="Confirmar Contraseña" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                   Ya tengo una cuenta
                </a>

                <x-jet-button class="ml-4" onclick="complidForm(event,navigate = 2)">
                    Siguiente
                </x-jet-button>
            </div>
        </div>
        <div id="address" style="display: none">
            <div >
                <x-jet-label for="country" value="Pais" />
                <x-jet-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required autofocus autocomplete="country" />
                   
            </div>
            <div >
                <x-jet-label for="state" value="Estado" />
                <x-jet-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required autofocus autocomplete="state" />
                   
            </div>
            <div >
                <x-jet-label for="city" value="ciudad" />
                <x-jet-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus autocomplete="city" />
                   
            </div>
            <div >
                <x-jet-label for="colony" value="Colonia" />
                <x-jet-input id="colony" class="block mt-1 w-full" type="text" name="colony" :value="old('colony')" required autofocus autocomplete="colony" />
                   
            </div>
            <div >
                <x-jet-label for="street" value="Calle" />
                <x-jet-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')" required autofocus autocomplete="street" />    
            </div>
            <div >
                <x-jet-label for="zip_code" value="Codigo Postal" />
                <x-jet-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code" :value="old('zip_code')" required autofocus autocomplete="zip_code" />    
            </div>
            <div >
                <x-jet-label for="number_ext" value="Numero ext" />
                <x-jet-input id="number_ext" class="block mt-1 w-full" type="text" name="number_ext" :value="old('number_ext')" required autofocus autocomplete="number_ext" />    
            </div>
            <div >
                <x-jet-label for="number_int" value="Numero int" />
                <x-jet-input id="number_int" class="block mt-1 w-full" type="text" name="number_int" :value="old('number_int')" required autofocus autocomplete="number_int" />    
            </div>
            <div >
                <x-jet-label for="reference" value="Referencia" />
                <x-jet-input id="reference" class="block mt-1 w-full" type="text" name="reference" :value="old('reference')" required autofocus autocomplete="reference" />    
            </div>
            <div >
                <x-jet-label for="smart_phone" value="Celular" />
                <x-jet-input id="smart_phone" class="block mt-1 w-full" type="text" name="smart_phone" :value="old('smart_phone')" required autofocus autocomplete="smart_phone" />    
            </div>

             
       
       <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                   Ya tengo una cuenta
                </a>

                <x-jet-button class="ml-4" onclick="complidForm(event,navigate = 1)">
                   Volver
                </x-jet-button>
                <x-jet-button class="ml-4" onclick="complidForm(event,navigate = 3)">
                    Siguiente
                </x-jet-button>
            </div>
        </div>
        <div id="graduated" style="display: none">

            <div >
                <x-jet-label for="enrollment" value="Matricula" />
                <x-jet-input id="enrollment" class="block mt-1 w-full" type="number" name="enrollment" :value="old('enrollment')" required autofocus autocomplete="enrollment" />    
            </div>
             <div id="ok_graduate"></div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                   Ya tengo una cuenta
                </a>

                <x-jet-button class="ml-4" onclick="complidForm(event, navigate = 2)">
                   Volver
                </x-jet-button>
                <x-jet-button class="ml-4" >
                    Registrar
                </x-jet-button>
            </div>
        </div>
        </form>
    </x-jet-authentication-card>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
      let graduate = localStorage.getItem('option');
        const complidForm = (event,navigate) =>{
            event.preventDefault();
            
            let optionGraduate = document.getElementById('ok_graduate');
            console.log(graduate);
            if(navigate == 1){
                document.getElementById("credentials").style.display = "block";
                document.getElementById("graduated").style.display = "none";
                document.getElementById("address").style.display = "none";
            }
            if(navigate == 2){
                document.getElementById("graduated").style.display = "none";
                document.getElementById("credentials").style.display = "none";
                document.getElementById("address").style.display = "block";
            }
            if(navigate == 3){
                document.getElementById("graduated").style.display = "block";
                document.getElementById("credentials").style.display = "none";
                document.getElementById("address").style.display = "none";
            }
            

        }
        if(graduate == 1){
               $("#ok_graduate").append(
             '<div>'+
                '<label for="date_graduate">Fecha de egreso</label>'+
                '<input id="date_graduate" class="block mt-1 w-full" type="text" name="date_graduate"  required  autocomplete="date_graduate" /> '   
            + '</div>'
            + '<div>'+
                '<label for="phone_house" value="">Telefono de casa</label>'+
                '<input id="phone_house" class="block mt-1 w-full" type="text" name="phone_house" :value="old("phone_house")" required  autocomplete="phone_house" /> '   
            + '</div>');
            }
    </script>
</x-guest-layout>
