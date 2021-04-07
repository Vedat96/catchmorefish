<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voeg locatie toe') }}
        </h2>
    </x-slot>
     <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						Voeg locatie toe
					</div>
					<div class="card-body">
						<form method="post" action="{{ route('locatie.store') }}">
				            {{ csrf_field() }}

				            <div class="form-group">
				                <label for="location-locatie">Locatie<span class="required">*</span></label>
				                <input   placeholder="Enter locatie"  
				                          id="location-locatie"
				                          required
				                          name="locatie"
				                          spellcheck="false"
				                          class="form-control"
				                           />
				            </div>

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