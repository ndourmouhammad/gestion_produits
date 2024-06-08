<div class="container">
    <h2>Commander le produit: {{ $produit->designation }}</h2>
    <form action="{{ route('produit.placeOrder', $produit->id) }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="adresse_livraison">Adresse de livraison</label>
            <input type="text" name="adresse_livraison" class="form-control" id="adresse_livraison" value="{{ old('adresse_livraison')}}">
            @error('adresse_livraison')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" class="form-control" id="telephone" value="{{ old('telephone')}}">
            @error('telephone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Commander</button>
    </form>
</div>
