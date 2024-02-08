import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();




import { createApp } from 'vue'
import Counter from './components/Counter.vue'
import Edit from './components/Edit.vue'
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
 
const app = createApp()
 
app.component('counter', Counter)
app.component('edit', Edit)
app.use(VueToast);

app.mount('#app')

