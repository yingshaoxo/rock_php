import axios from "axios";
import config from "./config";

export const GET = (url: string) => {
  return axios({
    method: "get",
    url: config.HOST + url,
  });
};

export const POST = (url: string, data: any) => {
  return axios({
    method: "post",
    url: config.HOST + url,
    data,
  });
};

export const get_task_list = async () => {
  return (await POST("/api/user/get_task_list.php", {}))?.data;
};
