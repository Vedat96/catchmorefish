<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mt-4">
                <x-jet-label for="voorletters" value="{{ __('Voorletters') }}" />
                <x-jet-input id="voorletters" class="block mt-1 w-full" type="text" name="voorletters" :value="old('voorletters')" required autofocus autocomplete="voorletters" />
            </div>

            <div class="mt-4">
                <x-jet-label for="voorvoegsels" value="{{ __('Voorvoegsels') }}" />
                <x-jet-input id="voorvoegsels" class="block mt-1 w-full" type="text" name="voorvoegsels" :value="old('voorvoegsels')" autocomplete="voorvoegsels" />
            </div>

            <div class="mt-4">
                <x-jet-label for="naam" value="{{ __('Naam') }}" />
                <x-jet-input id="naam" class="block mt-1 w-full" type="text" name="naam" :value="old('naam')" required autofocus autocomplete="naam" />
            </div>

            <div class="mt-4">
                <x-jet-label for="achternaam" value="{{ __('Achternaam') }}" />
                <x-jet-input id="achternaam" class="block mt-1 w-full" type="text" name="achternaam" :value="old('achternaam')" required autofocus autocomplete="achternaam" />
            </div>

            <div class="mt-4">
                <x-jet-label for="gebruikersnaam" value="{{ __('Gebruikersnaam') }}" />
                <x-jet-input id="gebruikersnaam" class="block mt-1 w-full" type="text" name="gebruikersnaam" :value="old('gebruikersnaam')" required autofocus autocomplete="gebruikersnaam" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
