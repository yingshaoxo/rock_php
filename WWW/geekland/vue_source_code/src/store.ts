import { reactive, ref } from "vue";
import { notification } from "ant-design-vue";
import dayjs from "dayjs";

export const super_store = {
  functions: {},
  pages: {},
  show: {
    message: (msg: string) => {
      notification.open({
        message: "Info",
        description: msg,
        style: {
          whiteSpace: "pre",
          overflow: "scroll",
        },
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
          whiteSpace: "pre",
          overflow: "scroll",
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
    log: (str: any) => {
      console.log(str);
    },
  },
  time: {
    convert_timestamp_to_string(time: any) {
      return dayjs.unix(time).format("YYYY-MM-DD HH:mm:ss");
      // const theDate = new Date(time);
      // let timeString = theDate.toISOString();
      // let splits = timeString.split("T");
      // timeString = splits[0] + " " + splits[1];
      // splits = timeString.split("Z");
      // timeString = splits[0];
      // return timeString;
    },
  },
};

export default {
  super_store,
};
