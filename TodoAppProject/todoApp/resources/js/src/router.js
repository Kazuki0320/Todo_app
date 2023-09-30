import { createRouter, createWebHistory } from 'vue-router'

import TodoList from './components/TodoInput.vue'
import Login from './components/Login.vue'

const routes = [
  { path: '/', component: TodoList },
  { path: '/login', component: Login },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
