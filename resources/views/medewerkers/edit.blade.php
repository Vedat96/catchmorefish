<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wijzig medewerker') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Wijzig medewerker
                    </div>
                    <div class="card-body">
                    @if(Session::has('medewerker_updated'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('medewerker_updated')}}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('medewerkers.update') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$medewerker->id}}}">

                        <div class="form-group">
                            <label for="medewerker-voorletters">Voorletters<span class="required">*</span></label>
                            <input   placeholder="Enter voorletters"  
                                      id="medewerker-voorletters"
                                      required
                                      name="voorletters"
                                      spellcheck="false"
                                      class="form-control"
                                      value="{{$medewerker->voorletters}}" 
                                       />
                        </div>

                        <div class="form-group">
                            <label for="medewerker-voorvoegsels">Voorvoegsels</label>
                            <input   placeholder="Enter voorvoegsels"  
                                      id="medewerker-voorvoegsels"
                                      name="voorvoegsels"
                                      spellcheck="false"
                                      class="form-control"
                                      value="{{$medewerker->voorvoegsels}}" 
                                       />
                        </div>
                        <div class="form-group">
                            <label for="medewerker-naam">Naam<span class="required">*</span></label>
                            <input   placeholder="Enter naam"  
                                      id="medewerker-naam"
                                      required
                                      name="naam"
                                      spellcheck="false"
                                      class="form-control"
                                      value="{{$medewerker->naam}}" 
                                       />
                        </div>
                        <div class="form-group">
                            <label for="medewerker-achternaam">Achternaam<span class="required">*</span></label>
                            <input   placeholder="Enter achternaam"  
                                      id="medewerker-achternaam"
                                      required
                                      name="achternaam"
                                      spellcheck="false"
                                      class="form-control"
                                      value="{{$medewerker->achternaam}}" 
                                       />
                        </div>

                        <div class="form-group">
                            <label for="medewerker-gebruikersnaam">Gebruikersnaam<span class="required">*</span></label>
                            <input   placeholder="Enter gebruikersnaam"  
                                      id="medewerker-gebruikersnaam"
                                      required
                                      name="gebruikersnaam"
                                      spellcheck="false"
                                      class="form-control"
                                      value="{{$medewerker->gebruikersnaam}}" 
                                       />
                        </div>

                        <div class="form-group">
                            <label for="medewerker-password">Wachtwoord<span class="required">*</span></label>
                            <input   placeholder="Enter password"  
                                      id="medewerker-password"
                                      required
                                      name="password"
                                      spellcheck="false"
                                      class="form-control"
                                      value=""
                                      type="password" 
                                       />
                        </div>

                        

                                <div class="form-group">
                                    Rol
                                    <select name="admin_medewerker" value='admin_medewerker'>
                                          <option value="1">Admin</option>
                                          <option value="0">Medewerker</option>
                                    </select>
                                </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success"
                                   value="Wijzig"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>