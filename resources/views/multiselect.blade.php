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
}" @click.document="closeDropdown($event)">

    <div x-ref="userData" data-users="{{ json_encode($usuarios->values()) }}"></div>

    <!-- Trigger do Dropdown -->
    <div @click="toggleDropdown" class="border border-gray-300 rounded-lg p-3 bg-white cursor-pointer flex justify-between items-center shadow-sm hover:shadow-lg transition duration-150">
        <span x-text="selectedOptions.length > 0 ? selectedOptions.map(opt => opt.name).join(', ') : 'Escolha uma opção'" class="text-gray-700"></span>
        <svg :class="{'rotate-180': isOpen}" class="w-5 h-5 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </div>

    <!-- Menu Dropdown -->
    <div x-show="isOpen" class="absolute z-10 w-full mt-2 bg-white border border-gray-300 rounded-lg shadow-lg">
        <input type="text" x-model="search" placeholder="Pesquise um usuário..." class="w-full border border-gray-300 rounded-lg p-2 mb-2 focus:outline-none focus:border-blue-500 placeholder-gray-400" />

        <template x-for="option in options.filter(opt => opt.name.toLowerCase().includes(search.toLowerCase()))" :key="option.id">
            <div @click="selectOption(option)" class="cursor-pointer hover:bg-gray-100 p-2 flex items-center">
                <span x-show="isSelected(option)" class="text-green-500 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </span>
                <span x-text="option.name" class="text-gray-700 font-semibold"></span>
            </div>
        </template>
    </div>
</div>
