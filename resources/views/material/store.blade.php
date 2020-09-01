@extends('layouts.index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Matériel</h1>
    <a href="{{route('materials.index')}}" class="btn btn-secondary">Retour</a>
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

    <form method="post" action="{{route('materials.store')}}">
        @csrf

        <div class="form-group">
            <label for="name">Nom du matériel</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Nom du matériel">
        </div>

        <div class="form-group">
            <label for="category">Categorie</label>

            @if($categories->isNotempty())

            <select class="browser-default custom-select" id="category" name="category_id">
                <option selected></option>
                @foreach ($categories as $category)

                <option value="{{$category->id}}">{{$category->name}}</option>

                @endforeach

            </select>

            @else

            <div class="alert alert-danger" role="alert">
                <strong>Pas de catégorie enregistré</strong>
            </div>

            @endif

        </div>

        <div class="form-group">
            <label for="supplier">Fournisseur</label>

            @if($suppliers->isNotempty())

            <select class="browser-default custom-select" id="supplier" name="supplier_id">
                <option selected></option>
                @foreach ($suppliers as $supplier)

                <option value="{{$supplier->id}}">{{$supplier->name}}</option>

                @endforeach

            </select>

            @else

            <div class="alert alert-danger" role="alert">
                <strong>Pas de fournisseur enregistré</strong>
            </div>

            @endif

        </div>

        <div class="form-group">
            <label for="warranty">Garanti</label>
            <input type="text" name="warranty" class="form-control" id="warranty" placeholder="Garanti">
        </div>

        <div class="form-group">
        <label for="state">Etat</label>

        @if($states->isNotempty())

        <select class="browser-default custom-select" id="state" name="state_id">
            <option selected></option>
            @foreach ($states as $state)

            <option value="{{$state->id}}">{{$state->name}}</option>

            @endforeach

        </select>

        @else

        <div class="alert alert-danger" role="alert">
            <strong>Pas d'état enregistré</strong>
        </div>

        @endif

        <div class="form-group">
            <label for="warehouse">Entrepot</label>

            @if($warehouses->isNotempty())

            <select class="browser-default custom-select" id="warehouse" name="warehouse_id">
                <option selected></option>
                @foreach ($warehouses as $warehouse)

                <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>

                @endforeach

            </select>

            @else

            <div class="alert alert-danger" role="alert">
                <strong>Pas d'entrepot enregistré</strong>
            </div>

            @endif

        </div>

        <div class="form-group">
            <label for="spot">Emplacement dans l'entrepot</label>
            <input type="text" name="spot" class="form-control" id="spot" placeholder="Emplacement dans l'entrepot">
        </div>

        <input type="submit" class="btn btn-primary mt-2" value="Ajouter">

    </form>
</div>

@endsection
