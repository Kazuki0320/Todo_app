import { createStore } from 'vuex';

const store = createStore({
  state: {
    message: ''
  },
  getters: {
    message: state => state.message,
  },
  mutations: {
    updateMessage(state, newMessage) {
			state.message = newMessage
		},
  },
  actions: {
    updateMessage({commit}, newMessage) {
			commit("updateMessage", newMessage)
		},
  },
});

export default store;
