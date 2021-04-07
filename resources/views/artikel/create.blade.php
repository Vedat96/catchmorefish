<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voeg artikel toe') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						Voeg artikel toe
					</div>
					<div class="card-body">
						<form method="post" action="{{ route('artikel.store') }}">
				            {{ csrf_field() }}
				        	
        <!-- 'factory_id',2222 -->
<!--                 			@if($factories == null)
                            <input class="form-control" type="hidden" name="factory_id" value="{{$factory_id}}">
                            
                            @endif -->
                            <!-- @if($factories != null) -->

        					<div class="form-group">
        						<label for="factory-content">Kies fabriek</label>
	        					<select name="leverancier_id" required>
	                                    @foreach($factories as $factory)
	                                    <option value="{{$factory->id}}">{{$factory->leverancier}}</option>
	                                    @endforeach
	                            </select>   
                        	</div>
                            <!-- @endif -->

				        	<div class="form-group">
				                <label for="article-product">Product<span class="required">*</span></label>
				                <input   placeholder="Enter product"  
				                          id="article-product"
				                          required
				                          name="product"
				                          spellcheck="false"
				                          class="form-control"                    
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