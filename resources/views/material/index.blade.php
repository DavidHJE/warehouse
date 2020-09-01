@extends('layouts.index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Matériel</h1>
    <a href="{{route('materials.create')}}" class="btn btn-success">Ajouter</a>
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
                <th scope="col">Nom du matériel</th>
                <th scope="col">Catégorie du matériel</th>
                <th scope="col">Etat du matériel</th>
                <th scope="col">Entrepot</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($materials as $material)

            <tr>
                <th scope="row" class="align-middle">{{($loop->index)+1}}</th>
                <td class="align-middle">{{$material->name}}</td>
                <td class="align-middle">{{$material->category->name}}</td>
                <td class="align-middle">{{$material->state->name}}</td>
                <td class="align-middle">
                    @if (is_null($material->warehouse_id))

                    N'est pas dans un entrepôt

                    @else

                    {{$material->warehouse->name}}

                    @endif
                </td>
                <td>
                    <a href="{{route('materials.edit', $material->id)}}" class="btn btn-warning">Modifier</a>
                    <a href="#" class="btn btn-danger"
                    onclick="event.preventDefault();
                        document.getElementById('form-destroy-{{$material->id}}').submit();">
                        Supprimer
                    </a>
                    <form style="diplay:none" id="{{'form-destroy-'.$material->id}}" method="post" action="{{route('materials.destroy', $material->id)}}">
                        @csrf
                        @method('delete')
                    </form>
                </td>
            </tr>

            @empty
                <tr>
                    <td colspan="6" class="text-center">Pas de matériel enregistrer</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
