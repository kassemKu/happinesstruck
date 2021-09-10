import Vuex from 'vuex'
import Cookies from 'js-cookie'

export const store = new Vuex.Store({
  state: {
    applyTheme: Cookies.get('theme') || 'light',
    isManageSidebarOpen: Cookies.get('isManageSidebarOpen') === 'true',
    isModelOpen: false,
  },
  getters: {
    isManageSidebarOpen: (state) => state.isManageSidebarOpen,
    applyTheme: (state) => state.applyTheme,
    isModelOpen: (state) => state.isModelOpen,
  },
  mutations: {
    // manage sidebar
    toggleManageSidebar(state) {
      state.isManageSidebarOpen = !state.isManageSidebarOpen
      Cookies.set('isManageSidebarOpen', state.isManageSidebarOpen)
    },
    // theme switcher
    themeSwitcher(state, theme) {
      state.applyTheme = theme
      Cookies.set('theme', theme)
      const htmlTag = document.querySelector('html')
      htmlTag.setAttribute('data-theme', theme)
    },
    // toggle model
    closeModel(state) {
      state.isModelOpen = false
    },
    openModel(state) {
      state.isModelOpen = true
    },
  },
  actions: {},
})
