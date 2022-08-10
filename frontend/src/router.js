import { createRouter, createWebHistory } from "vue-router";

import HomeComponent from "./pages/home/HomeComponent";
import LoginComponent from "./pages/login/LoginComponent";

const routes = [
  {
    path: "/",
    name: "login",
    component: LoginComponent,
  },
  {
    path: "/home",
    name: "home",
    component: HomeComponent,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
