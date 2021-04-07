<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wijzig artikel') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card">
					<div class="card-header">
						Wijzig artikel
					</div>
					<div class="card-body">
						@if(Session::has('article_updated'))
							<div class="alert alert-success" role="alert">
								{{Session::get('article_updated')}}
							</div>
						@endif
						<form method="POST" action="{{ route('artikel.update') }}">
				            {{ csrf_field() }}
	                		<input type="hidden" name="id" value="{{$article->id}}}">

				            <div class="form-group">
				                <label for="article-product">Product<span class="required">*</span></label>
				                <input   placeholder="Enter product"  
				                          id="article-product"
				                          required
				                          name="product"
				                          spellcheck="false"
				                          class="form-control"
				                          value="{{$article->product}}" 
				                           />
				            </div>

				        	<div class="form-group">
				                <label for="article-type">Type<span class="required">*</span></label>
				                <input   placeholder="Enter type"  
				                          id="article-type"
				                          required
				                          name="type"
				                          spellcheck="false"
				                          class="form-control"
				                          value="{{$article->type}}" 
				                           />
				            </div>

				            <div class="form-group">
				                <label for="article-inkoopprijs">Inkoopprijs<span class="required">*</span></label>
				                <input   placeholder="Enter inkoopprijs"  
				                          id="article-inkoopprijs"
				                          required
				                          name="inkoopprijs"
				                          spellcheck="false"
				                          class="form-control"
				                          value="{{$article->inkoopprijs}}" 
				                           />
				            </div>

				        	<div class="form-group">
				                <label for="article-verkoopprijs">Verkoopprijs<span class="required">*</span></label>
				                <input   placeholder="Enter verkoopprijs"  
				                          id="article-verkoopprijs"
				                          required
				                          name="verkoopprijs"
				                          spellcheck="false"
				                          class="form-control"
				                          value="{{$article->verkoopprijs}}" 
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
