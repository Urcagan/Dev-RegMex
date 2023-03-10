import './bootstrap';
import '../css/app.css';

import { createApp } from "vue";
import App from "./components/App.vue"
import router from "./router";
import axios from "axios";


const app =createApp(App)
app.use(router)
app.config.globalProperties.axios = axios
app.mount('#app')

// createApp(App).use(router).mount("#app")

