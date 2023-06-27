import './bootstrap';

import {createApp} from 'vue'
import App from './App.vue'
import router from './router' // <- Здесь

createApp(App).use(router).mount("#app") // <- И здесь
