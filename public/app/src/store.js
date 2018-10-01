import Vue from "vue";
import Vuex from "vuex";
Vue.use(Vuex);
Vue.config.devtools = true;
export default new Vuex.Store({
state: {
	user: null
},
actions: {},
mutations: {
	setUser(state, data) {
		state.user = data.user;
		state.token = data.token;
	}
}
});
