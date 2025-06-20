document.addEventListener("DOMContentLoaded", function () {
    const usersData = JSON.parse(document.getElementById('userData').getAttribute('data-users'));
    const dropdown = document.getElementById('dropdown');
    const dropdownList = document.getElementById('dropdown-list');
    const searchInput = document.getElementById('search-input');
    const optionsContainer = document.getElementById('options-container');
    const noResults = document.getElementById('no-results');
    const selectedOptionsText = document.getElementById('selected-options');
    const selectedOptions = new Set(); // Set para armazenar IDs dos usuários selecionados

    // Função para renderizar as opções dentro do dropdown
    function renderOptions(search = '') {
        optionsContainer.innerHTML = ''; // Limpa as opções antes de renderizar
        const filteredUsers = usersData.filter(user => user.name.toLowerCase().includes(search.toLowerCase()));

        if (filteredUsers.length === 0) {
            noResults.classList.remove('hidden');
        } else {
            noResults.classList.add('hidden');
        }

        filteredUsers.forEach(user => {
            const optionElement = document.createElement('div');
            optionElement.classList.add('cursor-pointer', 'hover:bg-gray-100', 'p-2', 'flex', 'items-center', 'transition', 'duration-150');
            optionElement.textContent = user.name;
            optionElement.dataset.id = user.id;

            // Adiciona o ícone de seleção ou de não seleção
            const icon = document.createElement('svg');
            icon.classList.add('w-5', 'h-5', 'mr-2');
            icon.setAttribute('xmlns', 'http://www.w3.org/2000/svg');
            icon.setAttribute('fill', 'none');
            icon.setAttribute('stroke', 'currentColor');
            icon.setAttribute('viewBox', '0 0 24 24');
            icon.setAttribute('stroke-width', '2');

            const iconPath = document.createElement('path');
            // Se o usuário estiver selecionado, exibe um checkmark, caso contrário, um círculo
            iconPath.setAttribute('stroke-linecap', 'round');
            iconPath.setAttribute('stroke-linejoin', 'round');
            iconPath.setAttribute('d', selectedOptions.has(user.id) ? 'M5 13l4 4L19 7' : 'M5 5m0 0a10 10 0 1 1 10 10A10 10 0 0 1 5 5z');
            icon.appendChild(iconPath);

            optionElement.prepend(icon);

            // Adiciona a classe para opções selecionadas
            if (selectedOptions.has(user.id)) {
                optionElement.classList.add('bg-gray-100');
            }

            // Não fecha o dropdown ao clicar na opção
            optionElement.addEventListener('click', function (event) {
                const id = user.id;
                if (selectedOptions.has(id)) {
                    selectedOptions.delete(id);
                    optionElement.classList.remove('bg-gray-100');
                    iconPath.setAttribute('d', 'M5 5m0 0a10 10 0 1 1 10 10A10 10 0 0 1 5 5z');
                } else {
                    selectedOptions.add(id);
                    optionElement.classList.add('bg-gray-100');
                    iconPath.setAttribute('d', 'M5 13l4 4L19 7');
                }
                updateSelectedOptions();
                event.stopPropagation(); // Impede o fechamento do dropdown
            });

            optionsContainer.appendChild(optionElement);
        });
    }

    // Atualiza a seleção exibida com os nomes selecionados
    function updateSelectedOptions() {
        const selectedUsers = [...selectedOptions].map(id => {
            const user = usersData.find(u => u.id === id);
            return user ? user.name : '';
        }).join(', ') || 'Escolha uma opção';

        selectedOptionsText.innerHTML = selectedUsers;
    }

    // Alterna a visibilidade do dropdown ao clicar na caixa
    dropdown.addEventListener('click', function (event) {
        event.stopPropagation(); // Impede que o click se propague para o documento
        dropdownList.classList.toggle('hidden');
        renderOptions(); // Atualiza as opções ao abrir o dropdown
    });

    // Filtra as opções com base na pesquisa
    searchInput.addEventListener('input', function () {
        renderOptions(searchInput.value);
    });

    // Fecha o dropdown se clicar fora dele
    document.addEventListener('click', function (event) {
        if (!dropdown.contains(event.target) && !searchInput.contains(event.target)) {
            dropdownList.classList.add('hidden');
        }
    });

    // Renderiza as opções iniciais
    renderOptions();
});
