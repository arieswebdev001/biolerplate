import Vue from "vue";
import VueRouter from "vue-router";
import Login from "./components/auth/Login.vue";
import ForgotPassword from "./components/auth/ForgotPassword.vue";

import Dashboard from "./components/Dashboard.vue";
import PageNotFoundError from "./components/errors/PageNotFoundError.vue";
Vue.use(VueRouter);
export default new VueRouter({
  routes: [
    {
      path: "/login",
      component: Login,
      name: "Login Page"
    },
    {
      path: "/",
      component: Dashboard,
      name: "Dashboard"
    },
    {
      path: "/dashboard",
      component: Dashboard,
      name: "Dashboard"
    },
    {
      path: "/forgot-password",
      component: ForgotPassword,
      name: "Forgot Password"
    },
    {
      path: "*",
      component: PageNotFoundError,
      name: "PageNotFoundError"
    }
  ],
  scrollBehavior(to, from, savedPosition) {
    return { x: 0, y: 0 };
  }
});
