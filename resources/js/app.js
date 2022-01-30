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
// datePicker
import LitepieDatepicker from 'litepie-datepicker'
import Datepicker from 'vue3-date-time-picker'
import 'vue3-date-time-picker/dist/main.css'
import VueNextSelect from 'vue-next-select'

// three
import { TroisJSVuePlugin } from 'troisjs'

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
    const HAPPINESSTRUCKAPP = createApp({ render: () => h(app, props) })

    HAPPINESSTRUCKAPP.use(plugin)
    HAPPINESSTRUCKAPP.mixin({ methods: { route } })
    HAPPINESSTRUCKAPP.use(CarbonIconsVue, { components })
    HAPPINESSTRUCKAPP.use(VueCookieNext)
    HAPPINESSTRUCKAPP.use(createI18n(i18n))
    HAPPINESSTRUCKAPP.use(store)
    HAPPINESSTRUCKAPP.component(VueFeather.name, VueFeather)
    HAPPINESSTRUCKAPP.component('Datepicker', Datepicker)
    HAPPINESSTRUCKAPP.component('VueSelect', VueNextSelect)
    HAPPINESSTRUCKAPP.use(LitepieDatepicker)
    HAPPINESSTRUCKAPP.use(TroisJSVuePlugin)
    HAPPINESSTRUCKAPP.mount(el)

    return HAPPINESSTRUCKAPP
  },
})

InertiaProgress.init({ color: '#4B5563' })
