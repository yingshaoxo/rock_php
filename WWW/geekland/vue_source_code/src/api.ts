import axios from "axios";
import config from "./config";
import { super_store } from "./store";

export const POST = async (url: string, data: any) => {
  try {
    let response: any = await axios({
      method: "post",
      url: config.HOST + url,
      data,
    });
    response = response.data;
    if ("error" in response) {
      super_store.show.error(response?.error);
      return null;
    } else if ("data" in response) {
      return response?.data;
    } else {
      return null;
    }
  } catch (e: any) {
    super_store.show.error(String(e));
    return null;
  }
};

export const get_task_list = async () => {
  return await POST("/api/user/task_api.php", {
    command: "get_task_list",
    data: {},
  });
};

export const confirm_task = async (id: string) => {
  return await POST("/api/user/task_api.php", {
    command: "confirm",
    data: {
      id,
    },
  });
};

export const refuse_task = async (id: string) => {
  return await POST("/api/user/task_api.php", {
    command: "refuse",
    data: {
      id,
    },
  });
};
