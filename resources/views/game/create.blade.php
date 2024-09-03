<x-app-layout>
    <div class="left">
        <a href="{{ route('game.index') }}">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="stroke-2 size-6 cursor-pointer text-primary">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061A1.125 1.125 0 0 1 21 8.689v8.122ZM11.25 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061a1.125 1.125 0 0 1 1.683.977v8.122Z" />
          </svg>
        </a>
    </div>
    <h1>Novo Jogo da Forca</h1>

    <form action="{{ route('game.store') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Iniciar Novo Jogo</button>
    </form>
</x-app-layout>
