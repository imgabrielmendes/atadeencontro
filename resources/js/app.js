import $ from 'jquery';
window.$ = window.jQuery = $;

// Importa o CSS do Select2 (opcional, mas recomendado)
import 'select2/dist/css/select2.min.css';

// Importa o plugin Select2 (sem atribuição, ele estende o jQuery global)
import 'select2';

// Depois importe o restante
import Swal from 'sweetalert2';
window.Swal = Swal;

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import './custom/home';
import './custom/registro-ata';
import './custom/selects/select-locais';
import './custom/selects/select-user';
