export default{
  
  state: {
    dark_mode: false
  },

  getters: {
    get_mode(state) {
			return state.dark_mode;
		},
  },

  actions: {
    toggle_mode(context) {
      context.commit("mode");
    }
  },

  mutations: {

    mode(state,data) {
        return state.dark_mode = !state.dark_mode;
    },

  }
}