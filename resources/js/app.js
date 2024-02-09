import './bootstrap.js';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import AddFavoritePizzaModal from "./components/AddFavoritePizzaModal.vue";

const app = createApp({});
app.component('add-favorite-pizza-modal', AddFavoritePizzaModal);
app.mount("#appFavorite");
