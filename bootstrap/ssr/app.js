import "bootstrap";
import axios from "axios";
/* empty css      */window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
const el = document.getElementById("app");
createApp({
  // Your Vue.js app configuration
}).mount(el);
