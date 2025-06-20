import $ from 'jquery';


document.addEventListener("DOMContentLoaded", function () {
  $('#select-participante-ata').select2({
    width: '100%',
    theme: 'bootstrap-5',
    placeholder: "Escolha um ou mais usuários"
  });
});
