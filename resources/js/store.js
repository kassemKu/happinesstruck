import Vuex from 'vuex'
import Cookies from 'js-cookie'
const convertCookieToBoolean = (str) => {
  switch (str.toLowerCase().trim()) {
    case 'true':
    case 'yes':
    case '1':
      return true

    case 'false':
    case 'no':
    case '0':
    case null:
      return false

    default:
      return Boolean(str)
  }
}

export const store = new Vuex.Store({
  state: {
    applyTheme: Cookies.get('theme') || 'light',
    isManageSidebarOpen:
      Cookies.get('isManageSidebarOpen') &&
      convertCookieToBoolean(Cookies.get('isManageSidebarOpen')),
    isWebMenuOpen: false,
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
    isWebMenuOpen: (state) => state.isWebMenuOpen,
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
    // web Menu
    toggleWebMenu(state) {
      state.isWebMenuOpen = !state.isWebMenuOpen
    },
    closeWebMenu(state) {
      state.isWebMenuOpen = false
    },
    // openWebSidebar(state) {
    //   state.isWebMenuOpen = true
    //   Cookies.set('isWebMenuOpen', true)
    // },
    // theme switcher
    themeSwitcher(state, theme) {
      state.applyTheme = theme
      Cookies.set('theme', theme)
      const htmlTag = document.querySelector('html')
      htmlTag.setAttribute('data-theme', theme)
    },
    // toggle modal
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
    // cart quantity
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
