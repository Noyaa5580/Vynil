import './bootstrap';

import { createApp } from 'vue';
import App from './src/App.vue';
import router from './src/router/router.js';
import Toast from "vue-toastification";

import "vue-toastification/dist/index.css";




let token = document.head.querySelector('meta[name="csrf-token"]');
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;


const options = {
    // You can set your default options here
};

createApp(App)

    .use(Toast)
    .use(router)
    .mount('#app');