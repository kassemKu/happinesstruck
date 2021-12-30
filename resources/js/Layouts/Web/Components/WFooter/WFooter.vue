<template>
  <div class="bg-base-200 text-base-content p-10">
    <footer class="p-12 footer htw-footer bg-yellow-50">
      <div class="">
        <Link
          href="/"
          class="
            inline-flex
            items-center
            justify-center
            space-x-2
            uppercase
            font-black
            text-xl text-warning
            transform
            hover:bg-transparent hover:text-info
          "
        >
          <span>happiness</span>
          <span>truck</span>
        </Link>
        <p>we make the happiness <br />Providing reliable tech since 1992</p>
        <div class="flex flex-col mt-8">
          <span class="footer-title mb-4">find us</span>
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
        <span class="footer-title">Services</span>
        <a class="link link-hover">Branding</a>
        <a class="link link-hover">Design</a>
        <a class="link link-hover">Marketing</a>
        <a class="link link-hover">Advertisement</a>
      </div>
      <div class="grid-rows-2 gap-y-12">
        <div class="flex flex-col">
          <span class="footer-title mb-4">Company</span>
          <a class="link link-hover">About us</a>
          <a class="link link-hover">Contact</a>
          <a class="link link-hover">Jobs</a>
          <a class="link link-hover">Press kit</a>
        </div>
      </div>
      <div>
        <span class="footer-title">Legal</span>
        <a class="link link-hover">Terms of use</a>
        <a class="link link-hover">Privacy policy</a>
        <a class="link link-hover">Cookie policy</a>
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
