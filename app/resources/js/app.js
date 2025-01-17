import "./bootstrap.js";

import { createApp } from "vue";
import App from "./src/App.vue";
import router from "./src/router/router.js";
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
import VueCookies from "vue-cookies";
import { createYmaps } from 'vue-yandex-maps'; 



const settings = { 
    apikey: '05f02f8e-303d-44eb-988d-0d0abbe08436', 
  }; 


const options = {
    // You can set your default options here
};

createApp(App).use(createYmaps(settings)).use(VueCookies).use(Toast).use(router).mount("#app");
