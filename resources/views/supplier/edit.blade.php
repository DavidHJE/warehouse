@extends('layouts.index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Modifier un fournisseur</h1>
    <a href="{{route('suppliers.index')}}" class="btn btn-secondary">Retour</a>
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
    <form method="post" action="{{route('suppliers.update', $supplier->id)}}">
        @csrf
        @method('patch')
        <div class="form-row">
            <label for="name" class="col-form-label">Nom du fournisseur</label>
            <div class="col">
                <input type="text" class="form-control" id="name" name="name" value="{{$supplier->name}}" placeholder="Nom du fournisseur">
            </div>
            <input type="submit" class="btn btn-success" value="Modifier">
        </div>
    </form>

</div>

@endsection
