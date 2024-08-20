<x-guest-layout>
  <div class="flex flex-col items-center">
    <div class="top-menu w-full flex justify-between items-center px-4">
      <div class="left">
        <a onclick="settingsModal.showModal()" class="btn btn-ghost normal-case text-xl">Opções</a>

        <dialog id="settingsModal" class="modal">
          <div class="modal-box">
            <h3 class="text-lg font-bold">Hello!</h3>
            <p class="py-4">Press ESC key or click the button below to close</p>
            <div class="modal-action">
              <form method="dialog">
                <button class="btn">Close</button>
              </form>
            </div>
          </div>
        </dialog>
      </div>

      <div class="right">
        <a class="btn btn-ghost normal-case text-xl">Logar</a>
      </div>
    </div>

    <div class="text-6xl mb-6">
      Jogo da Forca
    </div>

    <ul class="menu bg-base-200 rounded-box w-56 text-4xl gap-10 flex flex-row justify-center items-center">
      <li><a>Jogar</a></li>
      <li><a>Estatísticas</a></li>
      <li><a>Categorias</a></li>
      <li><a>Palavras</a></li>
    </ul>
  </div>
</x-guest-layout>
