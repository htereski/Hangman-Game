<x-app-layout>

  <div class="top-menu flex justify-between items-center px-4 w-[100%] ml-[30%]">
    <div class="left">
      <a href="/">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="stroke-2 size-6 cursor-pointer text-primary">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061A1.125 1.125 0 0 1 21 8.689v8.122ZM11.25 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061a1.125 1.125 0 0 1 1.683.977v8.122Z" />
        </svg>
      </a>
    </div>
  </div>

  <div class="flex justify-center items-center flex-col gap-10">
    <div>
      <table class="table mt-3 text-center">
        <thead class="text-primary font-bold">
          <tr>
            <th>ID</th>
            <th>Status</th>
            <th>Tentativas restantes</th>
            <th>Data de Criação</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($games as $game)
            <tr>
              <td>{{ $game->id }}</td>
              <td>{{ $game->status }}</td>
              <td>{{ 7 - $game->attempts }}</td>
              <td>{{ $game->created_at }}</td>
              <td>
                  @if ($game->status === "JOGANDO")
                    <a href="{{ route('game.show', $game->id) }}" class="btn btn-primary">Continuar</a>
                  @endif
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>

    <div>
      <a href="{{ route('game.create') }}" class="btn btn-primary">Novo Jogo</a>
    </div>
  </div>
</x-app-layout>
