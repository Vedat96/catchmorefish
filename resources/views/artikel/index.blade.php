<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artikelen') }}
        </h2>
    </x-slot>
	<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

		<div class="row">
			<div class="col-md-12">
				<div class="card">							
					<div class="card-header">
						Alle artikelen
						{{-- @if(Auth::user()->admin()) --}}
						<a href="/artikel/create" class="btn btn-success" style="float: right;">Voeg artikel toe</a>
						{{-- @endif --}}
					</div>
					<div class="card-body">
						@if(Session::has('article_created'))
							<div class="alert alert-success" role="alert">
								{{Session::get('article_created')}}
							</div>
						@endif
						@if(Session::has('article_deleted'))
							<div class="alert alert-success" role="alert">
								{{Session::get('article_deleted')}}
							</div>
						@endif
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Product</th>
									<th>Type</th>
									<th>Inkoopprijs</th>
									<th>Verkoopprijs</th>

									<th>Action</th>

								</tr>
							</thead>
							<tbody>
								@foreach ($articles as $article)
								<tr>
									<td>{{$article->product}}</td>
									<td>{{$article->type}}</td>
									<td>{{$article->inkoopprijs}}</td>
									<td>{{$article->verkoopprijs}}</td>
										

									<td>
										{{-- <a href="/artikel/{{$article->id}}" class="btn btn-info">Details</a> --}}
										<a href="/artikel/{{$article->id}}/edit" class="btn btn-success">Wijzig</a>
										<a href="/artikel/{{$article->id}}/destroy" class="btn btn-danger">Verwijder</a>
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