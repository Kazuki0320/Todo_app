import { createStore } from 'vuex';

const store = createStore({
  state: {
    todoList: []
  },
  getters: {
    todoList: state => state.todoList,
  },
  mutations: {
    updateTodo(state, todoValueList) {
      state.todoList = todoValueList
    },
  },
  actions: {
    updateTodo({commit}, todoValueList) {
      commit("updateTodo", todoValueList)
    },
  },
});

export default store;
