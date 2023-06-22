import { createApp } from 'vue';
import App from './App.vue'
import './styles/app.scss';

import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

import Api from './plugins/api';

console.log('app.js');

const vuetify = createVuetify({
    components,
    directives,
});


const app = createApp(App).use(vuetify);
app.config.globalProperties.$api = new Api('https://localhost');
app.mount('#app');
