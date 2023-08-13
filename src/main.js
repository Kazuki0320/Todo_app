import { createApp } from 'vue';
import App from './App.vue';
import store from './store'; // Vuex ストアをインポート
import 'vuetify/styles'
import '@mdi/font/css/materialdesignicons.css'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
	components,
	directives,
})

const app = createApp(App);
app.use(store); // Vuex ストアをアプリケーションに統合
app.use(vuetify); // Vuetify インスタンスをアプリケーションに統合
app.mount('#app');

