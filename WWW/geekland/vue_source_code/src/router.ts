import { createRouter, createWebHashHistory, RouteRecordRaw } from "vue-router";
import HelloWorld from "./components/HelloWorld.vue";

export const routesMap = {
  home: "/",
};

const routes: Array<RouteRecordRaw> = [
  {
    path: routesMap.home,
    name: "home",
    component: HelloWorld,
  },
];

export const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
