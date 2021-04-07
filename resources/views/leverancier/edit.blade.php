<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wijzig leverancier') }}
        </h2>
    </x-slot>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card">
					<div class="card-header">
						Wijzig leverancier
					</div>
					<div class="card-body">
						@if(Session::has('factory_updated'))
							<div class="alert alert-success" role="alert">
								{{Session::get('factory_updated')}}
							</div>
						@endif
						<form method="POST" action="{{ route('leverancier.update') }}">
				            {{ csrf_field() }}
	                		<input type="hidden" name="id" value="{{$factory->id}}}">

				            <div class="form-group">
				                <label for="factory-leverancier">Leverancier<span class="required">*</span></label>
				                <input   placeholder="Enter leverancier"  
				                          id="factory-leverancier"
				                          required
				                          name="leverancier"
				                          spellcheck="false"
				                          class="form-control"
				                          value="{{$factory->leverancier}}" 
				                           />
				            </div>

				        	<div class="form-group">
				                <label for="factory-telefoon">Telefoon<span class="required">*</span></label>
				                <input   placeholder="Enter telefoon"  
				                          id="factory-telefoon"
				                          required
				                          name="telefoon"
				                          spellcheck="false"
				                          class="form-control"
				                          value="{{$factory->telefoon}}" 
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
