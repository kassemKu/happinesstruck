<template>
  <div class="bg-base-200 text-base-content p-10">
    <footer class="p-12 footer htw-footer bg-yellow-50">
      <div class="">
        <Link
          href="/"
          type="button"
          class="
            htw-header-logo
            inline-flex
            items-center
            justify-center
            space-x-2
            uppercase
            font-black
            text-xl text-warning
            transform
            cursor-pointer
            hover:bg-transparent hover:text-info
          "
          @click="navigateTo('web.landing')"
        >
          {{ $t('site_title') }}
        </Link>
        <p>{{ $t('site_subtitle') }}</p>
        <div class="flex flex-col mt-8">
          <span class="footer-title mb-4">{{ $t('find_us') }}</span>
          <div class="flex space-x-4">
            <a
              href="https://instagram.com/h_truckq8?utm_medium=copy_link"
              target="_blank"
              class="
                htw-footer__social
                htw-instagram-btn
                btn btn-circle
                transform
                hover:scale-105
              "
            >
              <VueFeather type="instagram" stroke-width="2.5" />
            </a>
            <a
              href="https://www.facebook.com/profile.php?id=100035061467878"
              target="_blank"
              class="
                htw-footer__social
                htw-facebook-btn
                btn btn-circle
                transform
                hover:scale-105
              "
            >
              <VueFeather type="facebook" stroke-width="2" />
            </a>
            <button
              class="
                htw-footer__social
                htw-twitter-btn
                btn btn-circle
                transform
                hover:scale-105
              "
            >
              <VueFeather type="twitter" stroke-width="2.5" />
            </button>
            <a
              href="https://youtube.com/channel/UCADBH6tDEsnNMkDlbxltINg"
              target="_blank"
              class="
                htw-footer__social
                htw-youtube-btn
                btn btn-circle
                transform
                hover:scale-105
              "
            >
              <VueFeather type="youtube" stroke-width="2.5" />
            </a>
          </div>
        </div>
      </div>
      <div>
        <span class="footer-title">{{ $t('services') }}</span>
        <a class="link link-hover">{{ $t('service_title') }}</a>
        <a class="link link-hover">{{ $t('service_title') }}</a>
        <a class="link link-hover">{{ $t('service_title') }}</a>
        <a class="link link-hover">{{ $t('service_title') }}</a>
      </div>
      <div class="grid-rows-2 gap-y-12">
        <div class="flex flex-col">
          <span class="footer-title mb-4">{{ $t('company') }}</span>
          <a class="link link-hover">{{ $t('about') }}</a>
          <a class="link link-hover">{{ $t('contact') }}</a>
          <a class="link link-hover">{{ $t('jobs') }}</a>
        </div>
      </div>
      <div>
        <span class="footer-title">{{ $t('legal') }}</span>
        <a class="link link-hover">{{ $t('terms') }}</a>
        <a class="link link-hover">{{ $t('privacy') }}</a>
        <a class="link link-hover">{{ $t('values') }}</a>
      </div>
    </footer>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import LanguageSwitcher from '@/Shared/Partials/LanguageSwitcher'

const components = { Link, LanguageSwitcher }

export default {
  name: 'WebFooter',

  components,
}
</script>

<style scoped>
.htw-footer {
  border-top-left-radius: 7rem;
  border-bottom-right-radius: 8rem;
}

.htw-facebook-btn {
  background-color: #3b5998;
  border: 1px solid #3b5998;
}
.htw-facebook-btn:hover {
  background-color: transparent;
  border: 2px solid #3b5998;
  color: #3b5998;
}

.htw-instagram-btn {
  background-color: #c32aa3;
  border: 1px solid #c32aa3;
}
.htw-instagram-btn:hover {
  background-color: transparent;
  border: 2px solid #c32aa3;
  color: #c32aa3;
}
.htw-twitter-btn {
  background-color: #1da1f2;
  border: 1px solid #1da1f2;
}
.htw-twitter-btn:hover {
  background-color: transparent;
  border: 2px solid #1da1f2;
  color: #1da1f2;
}
.htw-youtube-btn {
  background-color: #bd081c;
  border: 1px solid #bd081c;
}
.htw-youtube-btn:hover {
  background-color: transparent;
  border: 2px solid #bd081c;
  color: #bd081c;
}
</style>
