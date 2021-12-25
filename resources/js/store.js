import Vuex from 'vuex'
import Cookies from 'js-cookie'

export const store = new Vuex.Store({
  state: {
    applyTheme: Cookies.get('theme') || 'light',
    isManageSidebarOpen: Cookies.get('isManageSidebarOpen') === 'true',
    isWebSidebarOpen: Cookies.get('isWebSidebarOpen') === 'true' || false,
    isModalOpen: false,
    activeAuthView: 'login',
    notification: {
      isOpen: false,
      type: 'success',
      title: '',
      content: '',
      dur: 3000,
      delay: 500,
    },
    cartCount: 0,
  },
  getters: {
    isManageSidebarOpen: (state) => state.isManageSidebarOpen,
    isWebSidebarOpen: (state) => state.isWebSidebarOpen,
    applyTheme: (state) => state.applyTheme,
    isModalOpen: (state) => state.isModalOpen,
    isNotificationOpen: (state) => state.notification.isOpen,
    notificationType: (state) => state.notification.type,
    notificationTitle: (state) => state.notification.title,
    notificationContent: (state) => state.notification.content,
    activeAuthView: (state) => state.activeAuthView,
    getCartCount: (state) => state.cartCount,
  },
  mutations: {
    // manage sidebar
    toggleManageSidebar(state) {
      state.isManageSidebarOpen = !state.isManageSidebarOpen
      Cookies.set('isManageSidebarOpen', state.isManageSidebarOpen)
    },
    // web sidebar
    closeWebSidebar(state) {
      state.isWebSidebarOpen = false
      Cookies.set('isWebSidebarOpen', false)
    },
    openWebSidebar(state) {
      state.isWebSidebarOpen = true
      Cookies.set('isWebSidebarOpen', true)
    },
    // theme switcher
    themeSwitcher(state, theme) {
      state.applyTheme = theme
      Cookies.set('theme', theme)
      const htmlTag = document.querySelector('html')
      htmlTag.setAttribute('data-theme', theme)
    },
    // toggle model
    closeModal(state) {
      state.isModalOpen = false
    },
    openModal(state) {
      state.isModalOpen = true
    },
    // Notification
    closeNotification(state) {
      state.notification.isOpen = false
      setTimeout(() => {
        state.notification.type = ''
        state.notification.title = ''
        state.notification.content = ''
      }, state.notification.delay + state.notification.dur)
    },
    openNotification(state, payload) {
      const openNotificationDelay = setTimeout(() => {
        state.notification.isOpen = true
        state.notification.type = payload.type
        state.notification.title = payload.title
        state.notification.content = payload.content
      }, state.notification.delay)

      setTimeout(() => {
        this.commit('closeNotification')
        clearTimeout(openNotificationDelay)
      }, state.notification.dur)
    },
    // auth screen view
    setActiveAuthView(state, payload) {
      state.activeAuthView = payload
    },
    // user cart counter
    updateCartCount(state, payload) {
      state.cartCount = payload
    },
    addItemToCart(state) {
      ++state.cartCount
    },
    removeItemToCart(state) {
      if (state.cartCount === 0) return
      --state.cartCount
    },
  },
  actions: {},
})
