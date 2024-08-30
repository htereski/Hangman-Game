<x-app-layout>
  <div class="flex flex-col items-center select-none">
    <div class="top-menu flex justify-between items-center px-4 w-[20%]">
      <div class="left">
        <a href="/">
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
          <h3 class="text-lg font-bold text-primary">Criar Categoria</h3>
          <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
              <input
                type="text"
                name="name"
                placeholder="Nome"
                class="input input-bordered input-secondary w-full max-w-xs" />
            </div>

            <div class="mb-4">
              <input
                type="file"
                name="img"
                accept="file"
                class="file-input file-input-bordered file-input-secondary w-full max-w-xs" />
            </div>

            <div class="flex gap-4">
              <button type="button" onclick="my_modal_1.close()" class="btn btn-secondary">Cancelar</button>
              <button type="submit" class="btn btn-primary">Criar Categoria</button>
            </div>
          </form>
        </div>
      </dialog>
    </div>

    <div class="text-6xl mb-6">
      <p class="text-primary">Categorias</p>
    </div>

    <div class="grid grid-rows-2 grid-flow-col gap-4">
      @foreach ($categories as $category)
      <a href="/word/category/{{ $category->id }}">
        <div class="card image-full w-96 shadow-xl mb-4 transition-opacity duration-300 hover:opacity-100 opacity-50 cursor-pointer">
          <figure class="object-contain w-96 h-96">
            <img src="{{ asset($category->url) }}" alt="{{ $category->name }}" class="object-scale-down h-48 w-96"/>
          </figure>
          <div class="card-body flex justify-end items-center">
            <h2 class="card-title select-none">{{ $category->name }}</h2>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</x-app-layout>
