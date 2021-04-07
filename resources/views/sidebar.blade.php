<div class="d-none d-xl-block" id="sidebar">

    @if (Auth::user())
        <div>
        <!-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"> -->
            <x-jet-nav-link href="{{ route('artikel') }}" :active="request()->routeIs('artikel')">
                {{ __('Artikelen') }}
        </x-jet-nav-link>
        </div>
            <!-- vanaf hier alleen admin -->
        @if(Auth::user()->admin_medewerker == 1)
            <div>
            <!-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"> -->
                <x-jet-nav-link href="{{ route('leverancier') }}" :active="request()->routeIs('leverancier')">
                    {{ __('Leveranciers') }}
                </x-jet-nav-link>
            </div>
            <div>
            <!-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"> -->
                <x-jet-nav-link href="{{ route('locatie') }}" :active="request()->routeIs('locatie')">
                    {{ __('Locaties') }}
                </x-jet-nav-link>
            </div>
            <div>
            <!-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"> -->
                <x-jet-nav-link href="{{ route('medewerkers') }}" :active="request()->routeIs('medewerkers')">
                    {{ __('Medewerkers') }}
                </x-jet-nav-link>
            </div>
        @endif
    @endif
</div>
