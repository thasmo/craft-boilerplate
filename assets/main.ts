import { createApp, defineAsyncComponent } from 'vue';

import 'virtual:uno.css';
import './styles.css';

const application = createApp({});

application.component('AppButton', defineAsyncComponent(() => import('./components/button.vue')));

application.mount('#main');
