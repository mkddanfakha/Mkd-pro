import './bootstrap';
import '../css/app.css';

import { createApp } from 'vue';
import { MotionPlugin } from '@vueuse/motion';
import router from './router';
import AppLayout from './layouts/AppLayout.vue';

const app = createApp(AppLayout);

app.use(router);
app.use(MotionPlugin);

app.mount('#app');
