import './bootstrap';
import { createApp } from 'vue';
import Index from './components/Index.vue';
import router from './routes/user';

createApp(Index).use(router).mount('#app');
// const app = createApp({});
// app.component('user-table',UserTable);
// app.mount('#app');