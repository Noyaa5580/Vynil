import './bootstrap';

import { createApp } from 'vue';
import App from './src/App.vue';
import router from './src/router/router.js';
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
import VueCookies from 'vue-cookies'






const options = {
    // You can set your default options here
};

createApp(App)
    .use(VueCookies)
    .use(Toast)
    .use(router)
    .mount('#app');