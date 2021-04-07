<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wijzig locatie') }}
        </h2>
    </x-slot>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card">
					<div class="card-header">
						Wijzig locatie
					</div>
					<div class="card-body">
						@if(Session::has('article_updated'))
							<div class="alert alert-success" role="alert">
								{{Session::get('article_updated')}}
							</div>
						@endif
						<form method="POST" action="{{ route('locatie.update') }}">
				            {{ csrf_field() }}
	                		<input type="hidden" name="id" value="{{$location->id}}}">

				            <div class="form-group">
				                <label for="location-locatie">Locatie<span class="required">*</span></label>
				                <input   placeholder="location"  
				                          id="location-locatie"
				                          required
				                          name="locatie"
				                          spellcheck="false"
				                          class="form-control"
				                          value="{{$location->locatie}}" 
				                           />
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
	</div>
</x-app-layout>
