import { createStore } from 'vuex';

const store = createStore({
  state: {
    message: ''
  },
  getters: {
    message: state => state.message,
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
