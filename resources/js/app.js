import './bootstrap';
import '../css/app.css';

import { createApp } from "vue";
import App from "./components/App.vue"
import router from "./router";
import axios from "axios";
import { store } from "./store/index.js"


const app =createApp(App)
app.use(router)
app.use(store)
app.config.globalProperties.axios = axios
app.mount('#app')

// createApp(App).use(router).mount("#app")

