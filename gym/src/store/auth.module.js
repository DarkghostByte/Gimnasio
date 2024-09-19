import AuthService from "@/services/auth.service";

const user = JSON.parse(localStorage.getItem('onlyfans_tkn'))
const initialState = user ? { status: { loggedIn: true }, user } :
                            { status: { loggedIn: false }, user:null }

export const auth = {
    namespaced: true,
    state: initialState,
    actions: {
      login({ commit }, user) {
        return AuthService.login(user)
          .then(user => {
            commit('loginSuccess', user);
            return Promise.resolve(user);
          })
          .catch(error => {
            if (error.response && error.response.status === 401) {
              commit('loginFailure', 'Invalid credentials');
            } else {
              commit('loginFailure', 'An error occurred during login');
            }
            return Promise.reject(error);
          });
      },
        logout({commit}){
            AuthService.logout()
            commit('logout')
        }
    },
    mutations:{
        loginSuccess(state,user){
            state.status.loggedIn = true
            state.user = user
        },
        logout(state){
            state.status.loggedIn=false
            state.user=null
        },
        loginFailure(state, errorMessage) {
      state.status.loggedIn = false;
      state.user = null;
      state.error = errorMessage; // Add an error property to store error messages
    },
    }
}