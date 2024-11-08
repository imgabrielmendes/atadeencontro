<div x-data="{
    options: [...new Set(JSON.parse($refs.userData.dataset.users).map(opt => JSON.stringify(opt)))].map(e => JSON.parse(e)),
    selectedOptions: [],
    isOpen: false,
    search: '',
    toggleDropdown() {
        this.isOpen = !this.isOpen;
    },
    selectOption(option) {
        if (!this.selectedOptions.includes(option)) {
            this.selectedOptions.push(option);
        } else {
            this.selectedOptions = this.selectedOptions.filter(opt => opt.id !== option.id);
        }
    },
    closeDropdown(event) {
        if (!this.$el.contains(event.target)) {
            this.isOpen = false;
        }
    },
    isSelected(option) {
        return this.selectedOptions.includes(option);
    }
}" @click.document="closeDropdown($event)" class="relative w-full mx-auto">

    <div x-ref="userData" data-users="{{ json_encode($usuarios->values()) }}"></div>

    <div @click="toggleDropdown" class="border border-gray-300 rounded-lg p-3 bg-white cursor-pointer flex justify-between items-center shadow-md hover:shadow-lg transition duration-150">
        <span x-text="selectedOptions.length > 0 ? selectedOptions.map(opt => opt.name).join(', ') : 'Escolha uma opção'" class="text-gray-700"></span>
        <svg :class="{'rotate-180': isOpen}" class="w-5 h-5 text-gray-500 transform transition-transform duration-200 ml-2" fill="none" stroke="currentColor" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </div>

    <div x-show="isOpen" class="absolute z-10 w-full mt-2 bg-white border border-gray-300 rounded-lg shadow-lg transition-all duration-300 ease-in-out">
        <!-- Caixa de pesquisa -->
        <div class="flex items-center border-b border-gray-300 p-2">
            <input 
                type="text" 
                placeholder="Pesquisar..." 
                x-model="search" 
                class="border-none w-full focus:outline-none focus:ring focus:ring-blue-500 rounded-lg p-2"
            />
            <svg class="w-5 h-5 text-gray-400 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6M11 4a7 7 0 100 14 7 7 0 000-14z" />
            </svg>
        </div>

        <template x-for="option in options.filter(opt => opt.name.toLowerCase().includes(search.toLowerCase()))" :key="option.id">
            <div @click="selectOption(option)" class="cursor-pointer hover:bg-gray-100 p-2 flex items-center transition duration-150">
                <span class="mr-2 flex-shrink-0">
                    <svg 
                        x-show="isSelected(option)" 
                        xmlns="http://www.w3.org/2000/svg" 
                        class="w-4 h-4 text-green-500" 
                        fill="currentColor" 
                        viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="5" />
                    </svg>
                    <svg 
                        x-show="!isSelected(option)" 
                        xmlns="http://www.w3.org/2000/svg" 
                        class="w-4 h-4 text-gray-500" 
                        fill="none" 
                        stroke="currentColor" 
                        viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="5" stroke-width="2" />
                    </svg>
                </span>
                <span x-text="option.name" class="text-gray-700 font-semibold"></span>
            </div>
        </template>

        <div x-show="options.filter(opt => opt.name.toLowerCase().includes(search.toLowerCase())).length === 0" class="p-2 text-gray-500 text-center">
            Nenhuma opção encontrada
        </div>
    </div>
</div>
