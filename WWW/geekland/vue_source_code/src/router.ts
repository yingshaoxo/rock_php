import { createRouter, createWebHashHistory, RouteRecordRaw } from "vue-router";
import HelloWorld from "./components/HelloWorld.vue";
import Admin from "./pages/admin.vue";
import php_containerVue from "./pages/php_container.vue";
import PhpContainer from "./pages/php_container.vue";

export const routesMap = {
  home: "/",
  admin: "/admin",
  php: "/php",
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
  {
    path: routesMap.php,
    name: "php",
    component: PhpContainer,
  },
];

export const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
