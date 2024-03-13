import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import axios from "axios";

import "bootstrap/dist/css/bootstrap.min.css";
import "@fortawesome/fontawesome-free/css/all.css";
import "@fortawesome/fontawesome-free/js/all.js";

//axios.defaults.baseURL = "https://localhost:8000/api";



axios.defaults.baseURL = 'http://localhost:8000/api'
axios.defaults.headers.common['Authorization'] = `bearer ${localStorage.getItem('token')}`

createApp(App).use(router).mount("#app");
