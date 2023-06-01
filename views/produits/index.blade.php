@extends('produits.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Liste des articles</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('produits.create') }}"> Nouveau Produit</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>libelle</th>
            <th>prix</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($produits as $produit)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $produit->libelle }}</td>
            <td>{{ $produit->prix }}</td>
            <td>
                <form action="{{ route('produits.destroy',$produit->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('produits.show',$produit->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('produits.edit',$produit->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" onclick="return confirmDelete()"  class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $produits->links() !!}
      
@endsection