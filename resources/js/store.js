import Vuex from 'vuex'
import axios from 'axios'
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
      (Cookies.get('isManageSidebarOpen') &&
        convertCookieToBoolean(Cookies.get('isManageSidebarOpen'))) ||
      true,
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
    cartSubtotal: 0,
    cartTotal: 0,
    cart: [],
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
    getCart: (state) => state.cart,
    getCartSubtotal: (state) => state.cartSubtotal,
    getCartTotal: (state) => state.cartTotal,
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
    // user cart details
    getUserCart(state, payload) {
      state.cart = payload
    },
    updateCartItemQty(state, payload) {
      if (!state.cart.includes(payload.item)) return
      const item = state.cart.filter((i) => i.rowId === payload.item.rowId)
      if (payload.type === 'increase') {
        item[0].qty++
      } else {
        if (item[0].qty === 1) return
        item[0].qty--
      }
    },
    // update cart item count
    async updateCartItemQtyDB(state, payload) {
      if (payload.qty < 1) return
      await axios
        .post(
          route('web.updateQuantity', {
            rowId: payload.rowId,
            qty: payload.qty,
          }),
        )
        .then((res) => {
          const { data } = res
          state.cartCount = data.count
          const item = state.cart.find((i) => i.rowId === payload.rowId)
          item.subtotal = (item.qty * item.price).toFixed(2)
          state.cartSubtotal = data.subtotal
          state.cartTotal = data.total
          state.cartCount = data.count
        })
    },
    // delete item from cart
    async deleteCartItem(state, payload) {
      const index = state.cart.findIndex((el) => el.rowId === payload)
      if (index >= 0) {
        state.cart.splice(index, 1)
      }
      state.cart.filter((item) => item.rowId !== payload)
      await axios
        .post(route('web.deleteCartItem', payload))
        .then((res) => {
          const { data } = res
          state.cartSubtotal = data.subtotal
          state.cartTotal = data.total
          state.cartCount = data.count
        })
        .then(() => {})
    },

    // user cart counter
    updateCartCount(state, payload) {
      state.cartCount = payload
    },
    // user cart subtotal
    getCartSubtotal(state, payload) {
      state.cartSubtotal = payload
    },
    // user cart total
    getCartTotal(state, payload) {
      state.cartTotal = payload
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
