import { createRouter, createWebHashHistory, RouteRecordRaw } from "vue-router";
import HelloWorld from "./components/HelloWorld.vue";
import Admin from "./pages/admin.vue";

export const routesMap = {
  home: "/",
  admin: "/admin",
};

const routes: Array<RouteRecordRaw> = [
  {
    path: routesMap.home,
    name: "home",
    component: HelloWorld,
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
