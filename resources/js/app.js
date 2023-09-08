import './bootstrap';

import {createApp} from "vue";
import Departments from "./components/Departments.vue";

const app = createApp({});

app.component('departments', Departments);
app.mount('#app');
