<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voeg voorraad toe') }}
        </h2>
    </x-slot>
     <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						Voeg voorraad toe
					</div>
					<div class="card-body">
						<form method="post" action="{{ route('voorraad.store') }}">
				            {{ csrf_field() }}
				        	
        <!-- 'artikel_id',2222 -->
<!--                 			@if($articles == null)
                            <input class="form-control" type="hidden" name="artikel_id" value="{{$artikel_id}}">
                            
                            @endif -->
                            <!-- @if($articles != null) -->

        					<div class="form-group">
        						<label for="voorraad-artikel">Kies artikel</label>
	        					<select name="artikel_id" required>
	                                    @foreach($articles as $article)
	                                    <option value="{{$article->id}}">{{$article->product}}</option>
	                                    @endforeach
	                            </select>   
                        	</div>
                            <!-- @endif -->

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
				                           />
				            </div>

				            <div class="form-group">
				                <input type="submit" class="btn btn-success"
				                       value="Create"/>
				            </div>
				        </form>
					</div>
				</div>
			</div>
		</div>
	</div>

</x-app-layout>