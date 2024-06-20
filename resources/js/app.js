import './bootstrap';

import Swal from 'sweetalert2'

import 'sweetalert2/src/sweetalert2.scss'


window.Swal = Swal;
const toast = Swal.mixin({
    toast:true,
    position:'top-end',
    showConFirmButton:false,
    timer : 3000,
    timeProgressBar:true
});
window.toast =  toast;

import { createApp } from 'vue';

import router from "./router"

import App from './components/App.vue'


createApp(App).use(router).mount('#app')