<x-guest-layout>
  <div class="flex flex-col items-center select-none">
      <div class="top-menu flex justify-between items-center px-4 w-[20%]">
          <div class="left">
              <svg xmlns="http://www.w3.org/2000/svg" onclick="settingsModal.showModal()" fill="none"
                  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                  class="stroke-2 size-6 cursor-pointer text-primary">
                  <path stroke-linecap="round" stroke-linejoin="round"
                      d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
              </svg>

          </div>
      </div>

      <dialog id="settingsModal" class="modal text-primary">
          <div class="modal-box flex flex-col items-center justify-center">
              <div class="dropdown mb-72 flex flex-col items-center justify-center">
                  <div tabindex="0" role="button" class="btn m-1 mt-10">
                      Tema
                      <svg width="12px" height="12px" class="inline-block h-2 w-2 fill-current opacity-60"
                          xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2048 2048">
                          <path d="M1799 349l242 241-1017 1017L7 590l242-241 775 775 775-775z"></path>
                      </svg>
                  </div>
                  <ul tabindex="0"
                      class="dropdown-content bg-base-300 rounded-box z-[1] w-52 p-2 shadow-2xl  top-[100%] ring-offset-0">
                      <li>
                        <input type="radio" name="theme-dropdown"
                          class="theme-controller btn btn-sm btn-block btn-ghost text-center" aria-label="Claro"
                          data-set-theme="winter" value="winter" />
                      </li>
                      <li>
                        <input type="radio" name="theme-dropdown"
                          class="theme-controller btn btn-sm btn-block btn-ghost text-center" aria-label="Escuro"
                          data-set-theme="dracula" value="dracula" />
                      </li>
                  </ul>
              </div>

              <div class="modal-action">
                  <form method="dialog">
                      <button class="btn">Fechar</button>
                  </form>
              </div>
          </div>
      </dialog>
    </div>

  </div>

    <div class="text-6xl mb-6">
        <p class="text-primary">Jogo da Forca</p>
    </div>

    <ul class="menu rounded-box w-56 text-4xl gap-10 flex flex-row justify-center items-center text-primary">
        @guest
            <li><a href="{{ route('login') }}">Entrar</a></li>
        @endguest
        @auth
            <li><a href="{{ route('game.index') }}">Jogar</a></li>
            <li><a href="{{ route('statistics') }}">Estatísticas</a></li>
            <li><a href="{{ route('category.index') }}">Categorias</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" {{ route('logout') }}
                        onclick="event.preventDefault();
                                                  this.closest('form').submit();">Sair</button>
                </form>
            </li>
        @endauth
    </ul>
    </div>
    </div>
    
</x-guest-layout>
