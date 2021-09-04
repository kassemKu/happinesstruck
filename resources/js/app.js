import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import { CarbonIconsVue } from '@carbon/icons-vue'
import { components } from './carbon'
import { VueCookieNext } from 'vue-cookie-next'
import { createI18n } from 'vue-i18n'
import i18n from './i18n'
import { store } from './store'
import VueFeather from 'vue-feather'

VueCookieNext.config({
  expire: '1d',
  path: '/',
  domain: '',
  secure: '',
  sameSite: '',
})

const appName =
  window.document.getElementsByTagName('title')[0]?.innerText ||
  'HAPPINESSTRUCK'

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => require(`./Pages/${name}.vue`),
  setup({ el, app, props, plugin }) {
    return createApp({ render: () => h(app, props) })
      .use(plugin)
      .mixin({ methods: { route } })
      .use(CarbonIconsVue, { components })
      .use(VueCookieNext)
      .use(createI18n(i18n))
      .use(store)
      .component(VueFeather.name, VueFeather)
      .mount(el)
  },
})

InertiaProgress.init({ color: '#4B5563' })
