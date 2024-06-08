<form method="POST" action="{{ route('register') }}">
    @csrf

    <div>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom">
    </div>

    <div>
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" >
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
    </div>

    <div>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password">
    </div>

    <!-- Vous pouvez ajouter d'autres champs ici si nécessaire -->

    <button type="submit">S'inscrire</button>
</form>
