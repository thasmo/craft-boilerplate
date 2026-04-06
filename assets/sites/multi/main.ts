import { createApp, defineAsyncComponent } from 'vue';
import 'virtual:uno.css';
import '../../global/styles/base.css';

const application = createApp({});

application.component('AppButton', defineAsyncComponent(() => import('../../global/components/button.vue')));

application.mount('#main');
