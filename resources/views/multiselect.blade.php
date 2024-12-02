<div class="relative w-full mx-auto">
    <div id="userData" data-users="{{ json_encode($usuarios->values()) }}"></div>

    <!-- Dropdown -->
    <div id="dropdown" class="border border-gray-300 rounded-lg p-3 bg-white cursor-pointer flex justify-between items-center shadow-md hover:shadow-lg transition duration-150">
        <span id="selected-options" class="text-gray-700">Escolha uma opção</span>
        <svg id="dropdown-icon" class="w-5 h-5 text-gray-500 transform transition-transform duration-200 ml-2" fill="none" stroke="currentColor" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </div>

    <!-- Dropdown List -->
    <div id="dropdown-list" class="absolute z-10 w-full mt-2 bg-white border border-gray-300 rounded-lg shadow-lg transition-all duration-300 ease-in-out hidden">
        <!-- Caixa de pesquisa -->
        <input id="search-input" type="text" placeholder="Pesquisar..." class="border-none w-full focus:outline-none focus:ring focus:ring-blue-500 rounded-lg p-2" />
        <div id="options-container" class="max-h-60 overflow-y-auto"></div>
        <div id="no-results" class="p-2 text-gray-500 text-center hidden">Nenhuma opção encontrada</div>
    </div>

    {{-- <script src="{{ asset('js/custom/dadousu.js') }}" defer></script> --}}
</div>
