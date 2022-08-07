let HOST: string = "/geekland";
if (import.meta.env.DEV) {
  HOST = "http://127.0.0.1:80/geekland";
}

export default {
  HOST,
};
