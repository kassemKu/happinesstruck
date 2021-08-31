import Cookies from 'js-cookie'
import ar from './locales/ar.json'
import en from './locales/en.json'

export const i18n = {
  locale: Cookies.get('locale') || 'ar',
  default: 'ar',
  fallbackLocale: 'ar',
  messages: {
    en,
    ar,
  },
}
export default i18n
