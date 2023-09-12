import './bootstrap';

import {createApp} from "vue";
import Departments from "./components/Departments.vue";

// vform validation https://vform.vercel.app/
import Form from 'vform';
window.Form = Form;

const app = createApp({});

app.component('departments', Departments);
app.mount('#app');
