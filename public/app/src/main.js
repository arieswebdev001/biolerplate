import Vue from "vue";
import App from "./App.vue";
import Router from "./router";
import store from "./store";
import { mixins } from "./mixins";

import axios from "axios";
import VueAxios from "vue-axios";
import VueCroppie from "vue-croppie";
import ToggleButton from "vue-js-toggle-button";
import VueSocketio from "vue-socket.io";

Vue.config.productionTip = false;
Vue.config.devtools = true;

Vue.use(ToggleButton);
Vue.use(VueCroppie);
Vue.use(VueAxios, axios);
Vue.mixin(mixins);

//Vue.use(VueSocketio, ":3000");
new Vue({
  el: "#app",
  render: h => h(App),
  router: Router,
  store
});
