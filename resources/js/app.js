import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();




import { createApp } from 'vue'
import Counter from './components/Counter.vue'
 
const app = createApp()
 
app.component('counter', Counter)
 
app.mount('#app')

