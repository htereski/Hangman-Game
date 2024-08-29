<x-guest-layout>
  <div class="flex flex-col items-center">
    <div class="top-menu w-full flex justify-between items-center px-4">
      <div class="left">
        <a href="/">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="stroke-2 size-6 cursor-pointer text-primary">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061A1.125 1.125 0 0 1 21 8.689v8.122ZM11.25 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061a1.125 1.125 0 0 1 1.683.977v8.122Z" />
          </svg>
        </a>

        <dialog id="settingsModal" class="modal text-primary">
          <div class="modal-box flex flex-col items-center justify-center">
            <div class="dropdown mb-72 flex flex-col items-center justify-center">
              <div tabindex="0" role="button" class="btn m-1 mt-10">
                Tema
                <svg
                  width="12px"
                  height="12px"
                  class="inline-block h-2 w-2 fill-current opacity-60"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 2048 2048">
                  <path d="M1799 349l242 241-1017 1017L7 590l242-241 775 775 775-775z"></path>
                </svg>
              </div>
              <ul tabindex="0" class="dropdown-content bg-base-300 rounded-box z-[1] w-52 p-2 shadow-2xl  top-[100%] ring-offset-0">
                <li>
                  <input
                    type="radio"
                    name="theme-dropdown"
                    class="theme-controller btn btn-sm btn-block btn-ghost text-center"
                    aria-label="Dracula"
                    value="default" />
                </li>
                <li>
                  <input
                    type="radio"
                    name="theme-dropdown"
                    class="theme-controller btn btn-sm btn-block btn-ghost text-center"
                    aria-label="Cyberpunk"
                    value="cyberpunk" />
                </li>
                <li>
                  <input
                    type="radio"
                    name="theme-dropdown"
                    class="theme-controller btn btn-sm btn-block btn-ghost text-center"
                    aria-label="Aqua"
                    value="aqua" />
                </li>
                <li>
                  <input
                    type="radio"
                    name="theme-dropdown"
                    class="theme-controller btn btn-sm btn-block btn-ghost text-center"
                    aria-label="Synthwave"
                    value="synthwave" />
                </li>
                <li>
                  <input
                    type="radio"
                    name="theme-dropdown"
                    class="theme-controller btn btn-sm btn-block btn-ghost text-center"
                    aria-label="Retro"
                    value="retro" />
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
      <p class="text-primary">Palavras</p>
    </div>

  </div>
</x-guest-layout>
