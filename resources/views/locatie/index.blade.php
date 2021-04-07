<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Locaties') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						Alle locaties <a href="/locatie/create" class="btn btn-success" style="float: right;">Voeg locatie toe</a>
					</div>
					<div class="card-body">
						@if(Session::has('location_created'))
							<div class="alert alert-success" role="alert">
								{{Session::get('location_created')}}
							</div>
						@endif
						@if(Session::has('location_deleted'))
							<div class="alert alert-success" role="alert">
								{{Session::get('location_deleted')}}
							</div>
						@endif

						<table class="table table-striped">
							<thead>
								<tr>
									<th>Alle locaties</th>
									<th>Actions</th>


								</tr>
							</thead>
							<tbody>
								@foreach ($locations as $location)
								<tr>
									<td>{{$location->locatie}}</td>

									<td>
										<!-- {{-- <a href="/locations/{{$location->id}}" class="btn btn-info">Details</a> --}} -->
										<a href="/locatie/{{$location->id}}/edit" class="btn btn-success">Wijzig</a>
										<a href="/locatie/{{$location->id}}/destroy" class="btn btn-danger">Verwijder</a>
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