
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Medewerkers') }}
        </h2>
    </x-slot>
	<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

		<div class="row">
			<div class="col-md-12">
				<div class="card">							
					<div class="card-header">
						Alle medewerkers
						{{-- @if(Auth::user()->admin()) --}}
						<a href="/medewerkers/create" class="btn btn-success" style="float: right;">Voeg medewerker toe</a>
						{{-- @endif --}}
					</div>
					<div class="card-body">
						@if(Session::has('medeweker_created'))
							<div class="alert alert-success" role="alert">
								{{Session::get('medeweker_created')}}
							</div>
						@endif
						@if(Session::has('medewerker_deleted'))
							<div class="alert alert-success" role="alert">
								{{Session::get('medewerker_deleted')}}
							</div>
						@endif
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Voorletters</th>
									<th>voorvoegsels</th>
									<th>Naam</th>
									<th>Achternaam</th>
									<th>Gebruikersnaam</th>
									<th>Rol</th>
									<th>Action</th>

								</tr>
							</thead>
							<tbody>
								@foreach ($medewerkers as $medewerker)
								<tr>
									<td>{{$medewerker->voorletters}}</td>
									<td>{{$medewerker->voorvoegsels}}</td>
									<td>{{$medewerker->naam}}</td>
									<td>{{$medewerker->achternaam}}</td>
									<td>{{$medewerker->gebruikersnaam}}</td>
									<td>{{$medewerker->admin_medewerker}}</td>

										

									<td>
										{{-- <a href="/medewerkers/{{$medewerker->id}}" class="btn btn-info">Details</a> --}}
										<a href="/medewerkers/{{$medewerker->id}}/edit" class="btn btn-success">Wijzig</a>
										@if($medewerker->admin_medewerker != 1)
										<a href="/medewerkers/{{$medewerker->id}}/destroy" class="btn btn-danger">Verwijder</a>
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>