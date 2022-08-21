<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="text" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
        @php
            $logged = Auth::user();
        @endphp
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="smart_phone" />
            <x-jet-input id="email" type="text" class="mt-1 block w-full" wire:model.defer="state.smart_phone" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="date_graduate" value="date_graduate" />
            <x-jet-input id="date_graduate" name="date_graduate" type="date" value="{{Carbon\Carbon::parse($logged->contactInformation->date_graduate)->format('Y-m-d')}}" class="mt-1 block w-full"  model.defer="state.date_graduate"/>
            <x-jet-input-error for="date_graduate" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="enrollment" value="enrollment" />
            <x-jet-input id="enrollment" name="enrollment" type="text" value="{{$logged->contactInformation->enrollment}}" class="mt-1 block w-full" wire:model.defer="state.enrollment"/>
            <x-jet-input-error for="enrollment" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="second_email" value="second_email" />
            <x-jet-input id="second_email" name="second_email" type="text" value="{{$logged->contactInformation->second_email}}" class="mt-1 block w-full" wire:model.defer="state.second_email"/>
            <x-jet-input-error for="second_email" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="address" value="address" />
            <x-jet-input id="address" name="address" type="text" value="{{$logged->contactInformation->address}}" class="mt-1 block w-full"  wire:model.defer="state.address"/>
            <x-jet-input-error for="address" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phone_house" value="phone_house" />
            <x-jet-input id="phone_house" name="phone_house" type="text" value="{{$logged->contactInformation->phone_house}}" class="mt-1 block w-full"  wire:model.defer="state.phone_house"/>
            <x-jet-input-error for="phone_house" class="mt-2" />
        </div>
       
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
