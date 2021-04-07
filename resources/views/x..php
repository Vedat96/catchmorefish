@if (Auth::user())
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-jet-nav-link href="/artikel" :active="request()->routeIs('artikel')">
            {{ __('Artikelen') }}
    </x-jet-nav-link>
    </div>
        <!-- vanaf hier alleen admin -->
    @if(Auth::user()->admin_medewerker == 1)
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="/leverancier" :active="request()->routeIs('leverancier')">
                {{ __('Leveranciers') }}
            </x-jet-nav-link>
        </div>
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="/locatie" :active="request()->routeIs('locatie')">
                {{ __('Locaties') }}
            </x-jet-nav-link>
        </div>
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="/medewerkers" :active="request()->routeIs('medewerkers')">
                {{ __('Medewerkers') }}
            </x-jet-nav-link>
        </div>
    @endif
