@extends('layouts.index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Ajouter un fournisseur</h1>
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
    <form method="post" action="{{route('suppliers.store')}}">
        @csrf
        <div class="form-row">
            <label for="name" class="col-form-label">Nom du fournisseur</label>
            <div class="col">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nom du fournisseur">
            </div>
            <input type="submit" class="btn btn-success" value="Ajouter">
        </div>
    </form>

</div>

@endsection
