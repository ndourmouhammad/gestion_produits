<h2>Modifier la commande: {{ $commande->reference }}</h2>
<form action="{{ route('commandes.update', $commande->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="adresse_livraison">Adresse de livraison</label>
        <input type="text" name="adresse_livraison" class="form-control" value="{{ $commande->adresse_livraison }}" >
        @error('adresse_livraison')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="telephone">Téléphone</label>
        <input type="text" name="telephone" class="form-control" value="{{ $commande->telephone }}" >
        @error('telephone')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="etat_commande{{ $commande->id }}">État</label>
        <select class="form-control" id="etat_commande{{ $commande->id }}" name="etat_commande">
            <option value="valide" {{ $commande->etat == 'valide' ? 'selected' : '' }}>validé</option>
            <option value="annule" {{ $commande->etat == 'annule' ? 'selected' : '' }}>annulé</option>
            <option value="encours" {{ $commande->etat == 'encours' ? 'selected' : '' }}>en cours</option>
        </select>
        @error('etat_commande')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
</div>