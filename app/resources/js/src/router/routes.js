import Home from "../views/HomeView.vue";
import Catalog from "../views/CatalogView.vue";
import Admin from "../views/AdminView.vue";
import Edit from "../views/EditView.vue"
import Contacts from "../views/ContactsView.vue"
import About from "../views/AboutView.vue"
import Product from "../views/ProductView.vue"
import Login from "../views/LoginView.vue"
import Error from "../views/ErrorView.vue"
import Profile from "../views/ProfileView.vue"

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
        path: "/login",
        component: Login,
        name: "Вход",
    },
    {
        path: "/contacts",
        component: Contacts,
        name: "Контакты",
    },
    {
        path: "/about",
        component: About,
        name: "О Нас",
    },
    {
        path: "/admin",
        component: Admin,
        name: "Админ-Панель",
    },
    {
        path: "/edit",
        component: Edit,
        name: "Редактирование товара",
    },
    {
        path: "/product",
        component: Product,
        name: "Страница Товара",
    },
    {
        path: "/profile",
        component: Profile,
        name: "Личный кабинет",
    },
    { path: '/:pathMatch(.*)*', component: Error },
];

export default routes;
