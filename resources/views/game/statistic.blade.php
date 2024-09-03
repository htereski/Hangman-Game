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
          </div>
        <ul class="menu rounded-box w-56 text-4xl gap-10 flex flex-row justify-center items-center text-primary">
            <li><a href="{{ route('report') }}">Documento</a></li>
            <li><a href="{{ route('graph') }}">Gráfico</a></li>
        </ul>
    </div>
</x-app-layout>
