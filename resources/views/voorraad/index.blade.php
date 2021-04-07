<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voorraad') }}
        </h2>
    </x-slot>
	<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

		<div class="row">
			<div class="col-md-12">
				<div class="card">							 
					<div class="card-header">Alle Voorraden 
						@if (Auth::user())
							<a href="/voorraad/create" class="btn btn-success" style="float: right;">Voeg voorraad toe</a></div>
						@endif
					<div class="card-body">
						@if(Session::has('store_created'))
							<div class="alert alert-success" role="alert">
								{{Session::get('store_created')}}
							</div>
						@endif
						@if(Session::has('store_deleted'))
							<div class="alert alert-success" role="alert">
								{{Session::get('store_deleted')}}
							</div>
						@endif
					<table class="table table-striped">
							<thead>
								<tr>
									<th>Product</th>
									<th>Locatie</th>
									<th>Aantal</th>
									@if (Auth::user())
										<th>Action</th>
									@endif
								</tr>
							</thead>
							<tbody>
								
								
								@foreach ($rows as $row)
								<tr>
									<td>{{$row->product}}</td>
									<td>{{$row->locatie}}</td>
									<td>{{$row->aantal}}</td>
								

								@endforeach
								@foreach ($stores as $store)
									@if (Auth::user())
									<td>
										<!-- <a href="/stores/{{$store->id}}" class="btn btn-info">Details</a> -->
										<a href="/voorraad/{{$store->id}}/edit" class="btn btn-success">Edit</a>
										<a href="/voorraad/{{$store->id}}/destroy" class="btn btn-danger">Delete</a>
									</td>
									@endif
								@endforeach

								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>