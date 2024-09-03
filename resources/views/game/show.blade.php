<x-app-layout>
  <div class="top-menu flex justify-between items-center px-4 w-[100%] ml-[30%]">
    <div class="left">
      <a href="{{ route('game.index') }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="stroke-2 size-6 cursor-pointer text-primary">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061A1.125 1.125 0 0 1 21 8.689v8.122ZM11.25 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061a1.125 1.125 0 0 1 1.683.977v8.122Z" />
        </svg>
      </a>
    </div>
  </div>

  @php
    $word = $game->word->name;
    $typedLetters = str_split($game->typed_word);
    $progress = '';

    foreach (str_split($word) as $letter) {
      $progress .= in_array($letter, $typedLetters) ? $letter : '_';
    }
  @endphp

  <div class="flex flex-col items-center justify-center gap-5">
    <h1 class="text-6xl tracking-[.25em]">{{$progress}}</h1>
    <p><strong>Categoria:</strong> {{ $category->name }}</p>
    <p><strong>Tentativas restantes:</strong> {{ 7 - $game->attempts }}</p>
    <p><strong>Letras inseridas:</strong> {{ implode(', ', $typedLetters) }}</p>

    @if ($game->status == 'JOGANDO')
      <form action="{{ route('game.letter', $game->id) }}" method="POST" class="flex justify-center items-center gap-5 flex-col">
        @csrf
        <div class="form-group">
          <label for="letter">Digite uma letra:</label>
          <input type="text" name="letter" id="letter" maxlength="1" required class="form-control text-primary" autofocus>
        </div>

        <div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
      </form>
    @endif
  </div>

  <div class="flex flex-col items-center justify-center gap-5 mt-20">
    <div>
      @if ($game->status == 'GANHOU')
        <div class="flex flex-col items-center justify-center gap-5">
          <p class="alert alert-success text-center">Parabéns! Você ganhou! A palavra era: <strong>{{ $word }}</strong></p>
          <a href="{{ route('game.create') }}" class="btn btn-primary">Novo Jogo</a>
        </div>
      @endif

      @if ($game->status == 'PERDEU')
        <div class="flex flex-col items-center justify-center gap-5">
          <p class="alert alert-danger">Você perdeu! A palavra era: <strong>{{ $word }}</strong></p>
          <a href="{{ route('game.create') }}" class="btn btn-primary text-white font-bold">Novo Jogo</a>
        </div>
      @endif
    </div>
  </div>
</x-app-layout>
