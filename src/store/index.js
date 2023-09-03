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
    deleteTodo(state, index) {
      state.todoList.splice(index, 1);
    }
  },
  actions: {
    updateTodo({commit}, newTodo) {
      commit("updateTodo", newTodo)
    },
    deleteTodo({commit}, index) {
      commit("deleteTodo", index)
    }
  },
});

export default store;