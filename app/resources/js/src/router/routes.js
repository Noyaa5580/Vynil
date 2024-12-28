import Home from "../views/HomeView.vue";
import Catalog from "../views/CatalogView.vue";
import Admin from "../views/AdminView.vue";


const routes = [
    {
        path: "/",
        component: Home,
        name: "Главная",
    },
    {
        path: "/catalog",
        component: Catalog,
        name: "Каталог",
    },
    {
        path: "/admin",
        component: Admin,
        name: "Админ-Панель",
    },

];

export default routes;
