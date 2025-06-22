import Choices from 'choices.js';
import 'choices.js/public/assets/styles/choices.min.css';

// exemplo inicialização, ou faça em outro arquivo que importa app.js
document.addEventListener('DOMContentLoaded', function () {
  const el = document.getElementById('select-participante-ata');
  if (el) {
    const choices = new Choices(el, {
      removeItemButton: true,
      searchEnabled: true,
      placeholderValue: 'Escolha um ou mais usuários',
      searchPlaceholderValue: 'Digite para buscar...',
      shouldSort: false,
      itemSelectText: '',
      noResultsText: 'Nenhum resultado encontrado',
      noChoicesText: 'Nenhuma opção disponível',
      itemDeleteText: 'Remover',
      width: '100%',
    });

  }
});

document.addEventListener('DOMContentLoaded', function () {
  const el = document.getElementById('select-participante-ata');
  if (el) {
    const choices = new Choices(el, {
      removeItemButton: true,
      searchEnabled: true,
      placeholderValue: 'Escolha um ou mais usuários',
      searchPlaceholderValue: 'Digite para buscar...',
      shouldSort: false,
      itemSelectText: '',
      noResultsText: 'Nenhum resultado encontrado',
      noChoicesText: 'Nenhuma opção disponível',
      itemDeleteText: 'Remover',
      width: '100%',
    });

  }
});