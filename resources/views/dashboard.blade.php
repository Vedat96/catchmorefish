<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- <x-jet-welcome /> -->
                <div class="row">
                    <div class="col-sm-8">
                    <!-- <h1>Search Article</h1> -->
                        <div class="container">
                        <p>
                            <form action="/voorraad" method="POST" role="search">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q"
                                        placeholder="Zoek artikel"> <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </p>
                        @if(isset($details))
                            <h5> The Search results for<b> {{ $query }} </b> are :</h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Locatie</th>
                                        <th>Aantal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($details as $rows)
                                    <tr>
                                        <td>{{$rows->product}}</td>
                                        <td>{{$rows->locatie}}</td>
                                        <td>{{$rows->aantal}}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @elseif(!isset($details))
                                @if(!empty($_POST['q'])) 
                                <p>No search results.</p>
                                Sorry. We Couldn't find any articles for you search query" <b>{{$_POST['q']}}</b>"
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
