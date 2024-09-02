<x-app-layout>
  <div class="flex flex-col items-center">
    <div class="top-menu flex justify-between items-center px-4 w-[20%]">
      <div class="left">
        <a href="/category">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="stroke-2 size-6 cursor-pointer text-primary">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061A1.125 1.125 0 0 1 21 8.689v8.122ZM11.25 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061a1.125 1.125 0 0 1 1.683.977v8.122Z" />
          </svg>
        </a>
      </div>

      <div class="right">
        <a onclick="my_modal_1.showModal()">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary cursor-pointer">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
          </svg>
        </a>
      </div>

      <dialog id="my_modal_1" class="modal">
        <div class="modal-box">
          <h3 class="text-lg font-bold text-primary">Criar Palavra(s)</h3>
          <form action="{{ route('word.store') }}" method="POST">
            @csrf
            <div class="mb-4">
              <input
                type="text"
                name="name"
                placeholder="Nome"
                class="input input-bordered input-secondary w-full max-w-xs" />
            </div>

            <div class="mb-4 hidden">
              <input
                type="text"
                value="{{ $category->id }}"
                name="category_id"
                placeholder="Nome"
                class="input input-bordered input-secondary w-full max-w-xs" />
            </div>

            <div class="flex gap-4">
              <button type="button" onclick="my_modal_1.close()" class="btn btn-secondary">Cancelar</button>
              <button type="submit" class="btn btn-primary">Cadastrar Palavra(s)</button>
            </div>
          </form>
        </div>
      </dialog>
    </div>

    <div class="text-6xl mb-6">
      <p class="text-primary">{{$category->name}}</p>
    </div>

    <ul>
      @foreach($words as $word)
        <div class="words flex justify-end items-center gap-10">
          <li class="text-primary text-4xl">{{ $word->name }}</li>
          <a href="">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary cursor-pointer">
              <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" onclick="my_modal_2.showModal()" />
            </svg>
          </a>
          <dialog id="my_modal_2" class="modal">
            <div class="modal-box">
              <h3 class="text-lg font-bold text-primary">Criar Palavra(s)</h3>
              <form action="{{ route('word.update', $word->id) }}" method="PUT">
                @csrf
                <div class="mb-4">
                  <input
                    type="text"
                    name="name"
                    placeholder="Nome"
                    class="input input-bordered input-secondary w-full max-w-xs" />
                </div>

                <div class="mb-4 hidden">
                  <input
                    type="text"
                    value="{{ $category->id }}"
                    name="category_id"
                    placeholder="Nome"
                    class="input input-bordered input-secondary w-full max-w-xs" />
                </div>

                <div class="flex gap-4">
                  <button type="button" onclick="my_modal_1.close()" class="btn btn-secondary">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Cadastrar Palavra(s)</button>
                </div>
              </form>
            </div>
          </dialog>

          <form action="{{ route('word.destroy', [$word->id]) }}" method="POST" id="delete-form-{{ $word->id }}">
            @csrf
            @method('DELETE')
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary cursor-pointer" onclick="document.getElementById('delete-form-{{ $word->id }}').submit();">
              <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>
          </form>
        </div>
      @endforeach
    </ul>

  </div>
</x-app-layout>
