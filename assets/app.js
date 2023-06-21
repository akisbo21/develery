import { createApp } from 'vue';
import App from './App.vue'
import './styles/app.css';


import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
    components,
    directives,
});


console.log('app.js');


const app = createApp(App).use(vuetify);
app.mount('#app');