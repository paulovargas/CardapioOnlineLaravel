import { createRouter, createWebHistory } from "vue-router";

//import DeliveryComponent from "./pages/Public/DeliveryComponent"
import ReservationComponent from "./pages/Public/reservation/ReservationComponent.vue"
import HomeComponent from "./pages/home/HomeComponent.vue";
import HomeDeliveryComponent from "./pages/Public/home/HomeComponent.vue";
import LoginComponent from "./pages/login/LoginComponent.vue";
import MenuComponent from "./pages/menu/MenuComponent.vue";
import RegisterCategoryComponent from "./pages/registerCategory/RegisterCategoryComponent.vue";
import RegisterMenuComponent from "./pages/registerMenu/RegisterMenuComponent.vue";
import RegisterUserComponent from "./pages/registerUser/RegisterUserComponent.vue";
import UsersComponent from "./pages/users/UsersComponent.vue";

const routes = [
  {
    path: "/",
    name: "delivery",
    component: HomeDeliveryComponent,
  },
  {
    path: "/reservation",
    name: "reservation",
    component: ReservationComponent,
  },
  {
    path: "/login",
    name: "login",
    component: LoginComponent,
  },
  {
    path: "/home",
    name: "home",
    component: HomeComponent,
  },
  {
    path: "/users",
    name: "users",
    component: UsersComponent,
  },
  {
    path: "/registerUser",
    name: "registerUser",
    component: RegisterUserComponent,
  },
  {
    path: "/registerCategory",
    name: "registerCategory",
    component: RegisterCategoryComponent,
  },
  {
    path: "/registerMenu",
    name: "registerMenu",
    component: RegisterMenuComponent,
  },
  {
    path: "/menu",
    name: "menu",
    component: MenuComponent,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
