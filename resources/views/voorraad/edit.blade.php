<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wijzig voorraad') }}
        </h2>
    </x-slot>
     <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						Wijzig voorraad
					</div>
					<div class="card-body">
						@if(Session::has('store_updated'))
							<div class="alert alert-success" role="alert">
								{{Session::get('store_updated')}}
							</div>
						@endif
						<form method="post" action="{{ route('voorraad.update') }}">
				            {{ csrf_field() }}
				            <input type="hidden" name="id" value="{{$store->id}}}">

                          
                            <div class="form-group">
        						<label for="voorraad-product">Kies artikel</label>
	        					<select name="artikel_id" required>
	                                    @foreach($articles as $article)
	                                    <option value="{{$article->id}}">{{$article->product}}</option>
	                                    @endforeach
	                            </select>   
                        	</div>

                            <div class="form-group">
        						<label for="voorraad-locatie">Kies locatie</label>
	        					<select name="locatie_id" required>
	                                    @foreach($locations as $location)
	                                    <option value="{{$location->id}}">{{$location->locatie}}</option>
	                                    @endforeach
	                            </select>   
                        	</div>
                        	
				        	<div class="form-group">
				                <label for="voorraad-aantal">Aantal<span class="required">*</span></label>
				                <input   placeholder="Enter aantal"  
				                          id="voorraad-aantal"
				                          required
				                          name="aantal"
				                          spellcheck="false"
				                          class="form-control"
				                          value="{{$store->aantal}}"                
				                           />
				            </div>

				            <div class="form-group">
				                <input type="submit" class="btn btn-success"
				                       value="Edit"/>
				            </div>
				        </form>
					</div>
				</div>
			</div>
		</div>
	</div>

</x-app-layout>