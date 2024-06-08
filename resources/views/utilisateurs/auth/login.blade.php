<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <input type="email" name="email" placeholder="Adresse email" value="{{ old('email') }}">
        @error('email')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <input type="password" name="password" placeholder="Mot de passe">
        @error('password')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <button type="submit">Se connecter</button>
</form>

