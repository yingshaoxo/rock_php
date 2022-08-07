import { reactive, ref } from "vue";

export const super_store = {
  css: {},
  functions: {},
  pages: {},
  basic: {
    jsonToObj(json: string) {
      return JSON.parse(json);
    },
    objToJson(obj: any) {
      return JSON.stringify(obj);
    },
    openALink: (url: string) => {
      window.open(url);
    },
    redirect_to_url: (url: string) => {
      window.location.href = url;
    },
    copy_to_clipboard: (str: string) => {
      navigator.clipboard.writeText(str);
    },
  },
};

export default {
  super_store,
};
