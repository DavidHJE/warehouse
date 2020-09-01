@extends('layouts.index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Entrepôt</h1>
    <a href="{{url('/warehouses/create')}}" class="btn btn-success">Ajouter</a>
</div>

<div>

    @if (session()->has('message'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session()->get('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @endif

    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom de l'entrepôt</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($warehouses as $warehouse)

            <tr>
                <th scope="row" class="align-middle">{{($loop->index)+1}}</th>
                <td class="align-middle">{{$warehouse->name}}</td>
                <td>
                    <a href="{{route('warehouses.edit', $warehouse->id)}}" class="btn btn-warning">Modifier</a>
                    <a href="#" class="btn btn-danger"
                    onclick="event.preventDefault();
                        document.getElementById('form-destroy-{{$warehouse->id}}').submit();">
                        Supprimer
                    </a>
                    <form style="diplay:none" id="{{'form-destroy-'.$warehouse->id}}" method="post" action="{{route('warehouses.destroy', $warehouse->id)}}">
                        @csrf
                        @method('delete')
                    </form>
                </td>
            </tr>

            @empty
                <tr>
                    <td colspan="3" class="text-center">Pas d'entrepot enregistrer</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
