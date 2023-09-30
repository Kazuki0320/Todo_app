import { createStore } from 'vuex';

const store = createStore({
  state: {
    todoList: []
  },
  getters: {
    todoList: state => state.todoList,
  },
  mutations: {
    updateTodoList(state, newTodo) {
      state.todoList = newTodo
    },
  },
  actions: {
    updateTodoList({commit}, newTodo) {
      commit("updateTodoList", newTodo)
    },
  },
});

export default store;