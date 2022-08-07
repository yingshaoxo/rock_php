import { reactive, ref } from "vue";
import { notification } from "ant-design-vue";

export const super_store = {
  functions: {},
  pages: {},
  show: {
    message: (msg: string) => {
      notification.open({
        message: "Info",
        description: msg,
        onClick: () => {
          console.log(msg);
        },
      });
    },
    error: (msg: string) => {
      notification.open({
        message: "Error",
        description: msg,
        style: {
          width: "600px",
          marginLeft: `${335 - 600}px`,
        },
        class: "notification-custom-class",
        onClick: () => {
          console.log(msg);
        },
      });
    },
  },
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
