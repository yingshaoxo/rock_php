import { createRouter, createWebHashHistory, RouteRecordRaw } from "vue-router";
import HelloWorld from "./components/HelloWorld.vue";

import Admin from "./pages/admin.vue";
import Home from "./pages/home.vue";

export const routesMap = {
  entrie: "/",
  home: "/home",
  admin: "/admin",
};

const routes: Array<RouteRecordRaw> = [
  {
    path: routesMap.entrie,
    name: "entrie",
    component: HelloWorld,
  },
  {
    path: routesMap.home,
    name: "home",
    component: Home,
  },
  {
    path: routesMap.admin,
    name: "admin",
    component: Admin,
  },
];

export const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
