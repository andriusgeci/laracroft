import './bootstrap';

import {createApp} from "vue";
import {store} from "./store/store"
import Departments from "./components/Departments.vue";

// vform validation https://vform.vercel.app/
import Form from 'vform';
window.Form = Form;

const app = createApp({});

app.component('departments', Departments);
app.use(store);
app.mount('#app');
