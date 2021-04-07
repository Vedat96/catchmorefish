<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leveranciers') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						Alle leveranciers <a href="/leverancier/create" class="btn btn-success" style="float: right;">Voeg leveranciers toe</a>
					</div>
					<div class="card-body">
						@if(Session::has('factory_created'))
							<div class="alert alert-success" role="alert">
								{{Session::get('factory_created')}}
							</div>
						@endif
						@if(Session::has('factory_deleted'))
							<div class="alert alert-success" role="alert">
								{{Session::get('factory_deleted')}}
							</div>
						@endif
						<table class="table table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Fabriek</th>
									<th>Telefoon</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($factories as $factory)
								<tr>
									<td>{{$factory->id}}</td>
									<td>{{$factory->leverancier}}</td>
									<td>{{$factory->telefoon}}</td>
									<td>
										{{-- <a href="/leverancier/{{$factory->id}}" class="btn btn-info">Details</a> --}}
										<a href="/leverancier/{{$factory->id}}/edit" class="btn btn-success">Wijzig</a>
										<a href="/leverancier/{{$factory->id}}/destroy" class="btn btn-danger">Verwijder</a>
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