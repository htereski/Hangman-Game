<x-app-layout>
    <h1>Jogo da Forca</h1>

    @php
        $word = $game->word->name;
        $typedLetters = str_split($game->typed_word);
        $progress = '';

        foreach (str_split($word) as $letter) {
            $progress .= in_array($letter, $typedLetters) ? $letter : '_';
        }
    @endphp

    <p><strong>Palavra:</strong> {{ $progress }}</p>
    <p><strong>Tentativas restantes:</strong> {{ 7 - $game->attempts }}</p>
    <p><strong>Letras inseridas:</strong> {{ implode(', ', $typedLetters) }}</p>

    @if ($game->status == 'JOGANDO')
        <form action="{{ route('game.letter', $game->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="letter">Digite uma letra:</label>
                <input type="text" name="letter" id="letter" maxlength="1" required class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Enviar</button>
        </form>
    @endif

    @if ($game->status == 'GANHOU')
        <p class="alert alert-success">Parabéns! Você ganhou! A palavra era: <strong>{{ $word }}</strong></p>
        <a href="{{ route('game.create') }}" class="btn btn-primary">Novo Jogo</a>
    @endif

    @if ($game->status == 'PERDEU')
        <p class="alert alert-danger">Você perdeu! A palavra era: <strong>{{ $word }}</strong></p>
        <a href="{{ route('game.create') }}" class="btn btn-primary">Novo Jogo</a>
    @endif
</x-app-layout>
