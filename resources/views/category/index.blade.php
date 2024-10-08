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
      @can('create', App\Models\Category::class)
        <div class="right">
          <a onclick="openModal('create')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary cursor-pointer">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
          </a>
        </div>
      @endcan
    </div>

    <div class="text-6xl mb-6">
      <p class="text-primary">Categorias</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
      @foreach ($categories as $category)
      <div class="relative group w-96 mb-4">
        <div class="icons flex justify-between items-start p-5 group-hover:opacity-100 opacity-0 transition-opacity duration-300 absolute top-0 left-0 right-0 z-30">
          @can('edit', App\Models\Category::class)
            <a onclick="openModal('edit', {{ $category->id }}, '{{ $category->name }}', '{{ $category->url }}')">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
              </svg>
            </a>
          @endcan

          @can('destroy', App\Models\Category::class)
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary cursor-pointer" onclick="openModal('delete', {{ $category->id }}, '{{ $category->name }}')">
              <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
            </svg>
          @endcan
        </div>

        @can('index', App\Models\Word::class)
          <a href="/word/category/{{ $category->id }}">
            <div class="card image-full w-96 shadow-xl transition-opacity duration-300 hover:opacity-100 opacity-50 cursor-pointer">
              <figure class="object-contain w-96 h-96">
                <img src="{{ asset($category->url) }}" alt="{{ $category->name }}" class="object-scale-down h-48 w-96"/>
              </figure>
              <div class="card-body flex justify-end items-center">
                <h2 class="card-title select-none">{{ $category->name }}</h2>
              </div>
            </div>
          </a>
        @endcan
        
        @cannot('index', App\Models\Word::class)
          <div class="card image-full w-96 shadow-xl">
            <figure class="object-contain w-96 h-96">
              <img src="{{ asset($category->url) }}" alt="{{ $category->name }}" class="object-scale-down h-48 w-96"/>
            </figure>
            <div class="card-body flex justify-end items-center">
              <h2 class="card-title select-none">{{ $category->name }}</h2>
            </div>
          </div>
        @endcannot
      </div>
      @endforeach
    </div>

    <dialog id="modal" class="modal">
      <div class="modal-box">
        <form id="create-form" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <h3 class="text-lg font-bold text-primary">Criar Categoria</h3>
          <div class="mb-4">
            <input type="text" name="name" placeholder="Nome" class="input input-bordered input-secondary w-full max-w-xs" />
          </div>
          <div class="mb-4">
            <input type="file" name="img" accept="file" class="file-input file-input-bordered file-input-secondary w-full max-w-xs" />
          </div>
          <div class="flex gap-4">
            <button type="button" onclick="closeModal()" class="btn btn-secondary">Cancelar</button>
            <button type="submit" class="btn btn-primary">Criar Categoria</button>
          </div>
        </form>

        <form id="edit-form" action="" method="POST" enctype="multipart/form-data" style="display: none;">
          @csrf
          @method('PUT')
          <h3 class="text-lg font-bold text-primary">Editar Categoria</h3>
          <div class="mb-4">
            <input type="text" name="name" placeholder="Nome" class="input input-bordered input-secondary w-full max-w-xs" />
          </div>
          <div class="mb-4">
            <input type="file" name="img" accept="file" class="file-input file-input-bordered file-input-secondary w-full max-w-xs" />
          </div>
          <div class="flex gap-4">
            <button type="button" onclick="closeModal()" class="btn btn-secondary">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
          </div>
        </form>

        <div id="delete-confirmation" style="display: none;">
          <h2 class="text-lg font-bold text-primary">Atenção!</h2>
          <p>Todas as palavras desta categoria serão excluídas!</p>
          <div class="flex gap-4">
            <button type="button" onclick="closeModal()" class="btn btn-secondary">Cancelar</button>
            <form id="delete-form" action="" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-primary">Excluir</button>
            </form>
          </div>
        </div>
      </div>
    </dialog>
  </div>

  <script>
    function openModal(type, id = null, name = '', url = '') {
      const modal = document.getElementById('modal');
      const createForm = document.getElementById('create-form');
      const editForm = document.getElementById('edit-form');
      const deleteConfirmation = document.getElementById('delete-confirmation');
      const deleteForm = document.getElementById('delete-form');

      if(type === 'create') {
        createForm.style.display = 'block';
        editForm.style.display = 'none';
        deleteConfirmation.style.display = 'none';
      }
      else if (type === 'edit') {
        createForm.style.display = 'none';
        editForm.style.display = 'block';
        deleteConfirmation.style.display = 'none';

        editForm.action = `/category/${id}`;
        editForm.querySelector('input[name="name"]').value = name;
      }
      else if (type === 'delete') {
        createForm.style.display = 'none';
        editForm.style.display = 'none';
        deleteConfirmation.style.display = 'block';

        deleteForm.action = `/category/${id}`;
      }

      modal.showModal();
    }

    function closeModal() {
      const modal = document.getElementById('modal');
      modal.close();
    }
  </script>
</x-app-layout>
