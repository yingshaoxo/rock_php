import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";
import { resolve } from "path";

const pathResolve = (dir: string): any => resolve(__dirname, ".", dir);

export default defineConfig({
  base: `./`,
  resolve: {
    alias: [
      {
        find: "@/",
        replacement: pathResolve("src") + "/",
      },
    ],
  },
  plugins: [vue()],
  css: {
    preprocessorOptions: {
      scss: {
        additionalData: `@import "${pathResolve(
          "src"
        )}/assets/scss/variables.scss";`,
      },
      // less: {
      //   javascriptEnabled: true,
      //   additionalData: `@import "${pathResolve('src')}/assets/less/variables.less";`
      // }
    },
  },
});
