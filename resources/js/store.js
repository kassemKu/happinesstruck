import Vuex from 'vuex'

export const store = new Vuex.Store({
  state: {
    isManageSidebarOpen: true,
  },
  getters: {
    isManageSidebarOpen: (state) => state.isManageSidebarOpen,
  },
  mutations: {
    // manage sidebar
    toggleManageSidebar(state) {
      state.isManageSidebarOpen = !state.isManageSidebarOpen
    },
  },
  actions: {},
})
