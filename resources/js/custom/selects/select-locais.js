import $ from 'jquery';

document.addEventListener('DOMContentLoaded', () => {
  $('#select-local-ata').select2({
    width: '100%',
    theme: 'bootstrap-5',
    placeholder: 'Selecione o local da reunião'
  });
});
