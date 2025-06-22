import $ from 'jquery';
window.$ = window.jQuery = $;

import Choices from 'choices.js';
import 'choices.js/public/assets/styles/choices.min.css';

import select2 from 'select2/dist/js/select2.full.js';
select2($); // <<< muito importante

import 'select2/dist/css/select2.min.css';
import 'select2-bootstrap-5-theme/dist/select2-bootstrap-5-theme.min.css';

import Swal from 'sweetalert2';
window.Swal = Swal;

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import './custom/selects/select-locais';
import './custom/selects/select-user';

import './custom/home';
import './custom/registro-ata';
import './custom/registro-participante';
