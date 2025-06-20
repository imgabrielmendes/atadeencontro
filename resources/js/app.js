import './bootstrap'; // esse arquivo deve existir em resources/js/bootstrap.js para configuração ou
import 'bootstrap'; // importa o bootstrap do node_modules direto

import Alpine from 'alpinejs';
import axios from 'axios';
import $ from 'jquery';
import 'select2';
import Swal from 'sweetalert2';

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Alpine = Alpine;
window.$ = window.jQuery = $;
window.Swal = Swal;

Alpine.start();


import './custom/home';
import './custom/registro-ata';
import './custom/alerts';
import './custom/finalizar_ata';
import './custom/deliberacoes';
import './custom/registrar_ata';
import './custom/registrarparticipantes';
import './custom/texto_principal';

//SELECTS
import './custom/selects/select-locais';
import './custom/selects/select-user';
