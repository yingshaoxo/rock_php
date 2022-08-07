import { createApp } from "vue";
import App from "./App.vue";
import Antd from "ant-design-vue";

import "ant-design-vue/dist/antd.css";
import "@/assets/css/index.css";

// import { i18n } from './i18n'
import { router } from "./router";

createApp(App)
  // .use(i18n)
  .use(router)
  .use(Antd)
  .mount("#app");
