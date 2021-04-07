<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voeg medewerker toe') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Voeg medewerker toe
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('medewerkers.store') }}">
                            {{ csrf_field() }}
                            
                            <div class="form-group">
                            <label for="medewerker-voorletters">Voorletters<span class="required">*</span></label>
                            <input   placeholder="voorletters"  
                                      id="medewerker-voorletters"
                                      required
                                      name="voorletters"
                                      spellcheck="false"
                                      class="form-control" 
                                       />
                            </div>

                            <div class="form-group">
                                <label for="medewerker-voorvoegsels">Voorvoegsels</label>
                                <input   placeholder="voorvoegsels"  
                                          id="medewerker-voorvoegsels"
                                          name="voorvoegsels"
                                          spellcheck="false"
                                          class="form-control"
                                           />
                            </div>
                            <div class="form-group">
                                <label for="medewerker-naam">Naam<span class="required">*</span></label>
                                <input   placeholder="naam"  
                                          id="medewerker-naam"
                                          required
                                          name="naam"
                                          spellcheck="false"
                                          class="form-control"
                                           />
                            </div>

                            <div class="form-group">
                                <label for="medewerker-achternaam">Achternaam<span class="required">*</span></label>
                                <input   placeholder="achternaam"  
                                          id="medewerker-achternaam"
                                          required
                                          name="achternaam"
                                          spellcheck="false"
                                          class="form-control"
                                           />
                            </div>

                            <div class="form-group">
                                <label for="medewerker-gebruikersnaam">Gebruikersnaam<span class="required">*</span></label>
                                <input   placeholder="gebruikersnaam"  
                                          id="medewerker-gebruikersnaam"
                                          required
                                          name="gebruikersnaam"
                                          spellcheck="false"
                                          class="form-control"
                                           />
                            </div>

                            <div class="form-group">
                                <label for="medewerker-password">Wachtwoord<span class="required">*</span></label>
                                <input   placeholder="wachtwoord"  
                                          id="medewerker-password"
                                          required
                                          name="password"
                                          spellcheck="false"
                                          class="form-control"
                                          type="password" 
                                           />
                            </div>
                            
                                @if(Auth::user()->admin_medewerker == 1)

                                    <div class="form-group">
                                        Rol
                                        <select name="admin_medewerker">
                                              <option value="1">Admin</option>
                                              <option value="0">Medewerker</option>   
                                        </select>
                                    </div>
                                @endif

                            <div class="form-group">
                                <input type="submit" class="btn btn-success"
                                       value="Voeg toe"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>