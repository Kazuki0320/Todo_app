import { createStore } from 'vuex';

const store = createStore({
  state: {
    todoList: []
  },
  getters: {
    todoList: state => state.todoList,
  },
  mutations: {
    updateTodo(state, newTodo) {
      state.todoList = newTodo
    },
  },
  actions: {
    updateTodo({commit}, newTodo) {
      commit("updateTodo", newTodo)
    },
  },
});

export default store;