import { createApp } from 'vue'
import App from './App.vue'
import "./styles.css"
import axios from 'axios'

import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'

axios.defaults.baseURL = process.env.VUE_APP_ROOT_API
import router from './routes/'
import store from './store'

createApp(App)
.use(ElementPlus)
.use(router)
.use(store)
.mount('#app')
