import { createStore } from 'vuex';

const store = createStore({
  state: {
    todo: ''
  },
  getters: {
    todo: state => state.todo,
  },
  mutations: {
    updateTodo(state, newTodo) {
			state.todo = newTodo
		},
  },
  actions: {
    updateTodo({commit}, newTodo) {
			commit("updateTodo", newTodo)
		},
  },
});

export default store;
