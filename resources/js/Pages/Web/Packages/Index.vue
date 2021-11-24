<template>
  <WebLayout>
    <Head title="OUR-PACKAGES">
      <meta title="description" content="lorem ipsum" />
    </Head>
    <div class="htw-page htw-page__packages">
      <div class="htw-landing__packages-container">
        <div
          v-for="pg in packages"
          :key="pg.id"
          class="
            htw-package
            w-full
            grid grid-cols-2
            gap-x-8
            items-center
            h-screen
            px-16
            capitalize
          "
        >
          <div
            :style="{
              background:
                pg.media.length > 0 ? `url(${pg.media[0].full_url})` : '',
            }"
            class="htw-package__img-bg bg-cover bg-center h-full bg-info"
          ></div>
          <div class="flex flex-col space-y-8 font-medium">
            <div class="alert alert-warning">
              <div class="flex-1">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  class="w-6 h-6 mx-2 stroke-current"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                  ></path>
                </svg>
                <label
                  >please note, this package available above
                  <em class="font-semibold text-red-600"
                    >{{ pg.min_price_per_event }} DK</em
                  >
                  !</label
                >
              </div>
            </div>
            <!-- package min price note -->
            <div class="flex flex-col space-y-6 max-w-md">
              <h1 class="text-3xl font-bold">{{ pg.en_name }}</h1>
              <p class="text-neutral text-opacity-60">
                {{ pg.en_short_description }}
              </p>
            </div>
            <div v-if="pg.items.length > 0" class="flex flex-col space-y-6">
              <div
                v-for="item in pg.items"
                :key="item.id"
                class="
                  bg-info bg-opacity-10
                  flex
                  justify-between
                  rounded-box
                  px-4
                  py-2
                "
              >
                <div class="flex space-x-2">
                  <img
                    :src="item.media[0].full_url"
                    :alt="item.en_name"
                    class="w-16 h-16 object-cover rounded-box border"
                  />
                  <div class="flex flex-col">
                    <p class="text-sm capitalize">{{ item.en_name }}</p>
                    <p class="text-sm capitalize text-gray-400 text-xs">
                      #{{ item.SKU }}
                    </p>
                  </div>
                </div>
                <div class="self-center">
                  <p class="text-sm capitalize font-bold">
                    {{ item.price_per_event }} DK X {{ item.quantity }}
                  </p>
                </div>
              </div>
            </div>
            <!-- package items -->
            <div class="">
              <button
                :href="route('web.store')"
                class="
                  btn btn-wide btn-info
                  rounded-none rounded-tl-xl rounded-br-2xl
                "
                @click="openBookingBopUp(pg)"
              >
                customize and booking now
              </button>
            </div>
            <!-- booking btn -->
          </div>
        </div>
      </div>
    </div>
  </WebLayout>
  <template v-if="activePackagePopupView === 'selectItems'">
    <Modal
      max-width="screen-lg"
      :title="`custom your event package`"
      type="info"
      action-title="save selected items and close"
      screen-height
      @modalAction="saveBookingItems"
    >
      <div class="flex flex-col space-y-8">
        <div>
          <h3 class="uppercase text-info capitalize font-semibold text-xl mb-4">
            package items
          </h3>
          <div class="grid grid-cols-4 gap-8 text-sm font-medium capitalize">
            <div
              v-for="packageItem in form.selectedItems"
              :key="packageItem.id"
              class="flex flex-col items-center space-y-4"
            >
              <div class="relative h-48">
                <img
                  :src="packageItem.media[0].full_url"
                  :alt="packageItem.en_name"
                  class="w-full h-full object-cover rounded-box border"
                />
                <div
                  class="
                    absolute
                    right-0
                    bottom-0
                    w-10
                    h-10
                    bg-error
                    rounded-full
                    flex
                    items-center
                    justify-center
                    text-base-100
                  "
                >
                  <p class="font-bold uppercase text-lg">
                    {{ packageItem.quantity }}
                  </p>
                </div>
              </div>
              <p>{{ packageItem.en_name }}</p>
            </div>
          </div>
        </div>
        <div>
          <h3 class="uppercase text-info capitalize font-semibold text-xl mb-4">
            select items to added to this package
          </h3>
          <div class="grid grid-cols-4 gap-8 text-sm font-medium capitalize">
            <div
              v-for="item in availableItems"
              :key="item.id"
              class="flex flex-col items-center space-y-4"
            >
              <div
                class="
                  max-w-sm
                  flex
                  items-center
                  justify-between
                  bg-base-300 bg-opacity-60
                  rounded-btn
                  h-10
                "
                :class="{
                  'border-2 border-info': userSelection(item),
                }"
              >
                <button
                  type="button"
                  class="
                    h-full
                    w-8
                    flex
                    items-center
                    justify-center
                    bg-base-300 bg-opacity-30
                    flex-grow
                  "
                  :class="
                    userSelection(item)
                      ? 'cursor-pointer'
                      : 'cursor-not-allowed'
                  "
                  @click="userInitItemsToAdded(item)"
                >
                  <VueFeather type="plus" stroke-width="3" class="w-4 h-4" />
                </button>
                <p
                  class="
                    uppercase
                    flex-shrink
                    px-2
                    h-full
                    flex
                    items-center
                    space-x-1
                  "
                >
                  <span class="text-xs font-semibold"
                    >{{ item.price_per_event }} X</span
                  >
                  <span class="font-bold text-lg uppercase text-info">
                    {{ getUserItemQuantity(item) }}
                  </span>
                </p>
                <button
                  type="button"
                  class="
                    h-full
                    w-8
                    flex
                    items-center
                    justify-center
                    bg-base-300 bg-opacity-30
                    flex-grow
                  "
                  :class="
                    userSelection(item)
                      ? 'cursor-pointer'
                      : 'cursor-not-allowed'
                  "
                  @click.prevent="removeUserItemSelection(item)"
                >
                  <VueFeather type="minus" stroke-width="3" class="w-4 h-4" />
                </button>
              </div>
              <div
                class="
                  h-48
                  flex
                  items-center
                  relative
                  rounded-box
                  group
                  border-2
                "
                :class="{ 'border-info': userSelection(item) }"
              >
                <img
                  :src="item.media[0].full_url"
                  :alt="item.en_name"
                  class="w-full h-full object-cover rounded-box border"
                />
                <div
                  v-show="!userSelection(item)"
                  class="
                    absolute
                    inset-0
                    bg-base-300 bg-opacity-80
                    items-center
                    justify-center
                    rounded-box
                    hidden
                    group-hover:flex
                  "
                >
                  <button
                    type="button"
                    class="
                      btn btn-outline
                      border-2 border-info
                      btn-circle
                      text-info
                      hover:bg-info hover:border-info
                    "
                    @click.prevent="userInitItemsToAdded(item)"
                  >
                    <VueFeather type="plus" stroke-width="3" class="w-4 h-4" />
                  </button>
                </div>
              </div>
              <div>
                <p>{{ item.en_name }}</p>
              </div>
              <div>
                <button
                  class="btn btn-sm"
                  :class="userSelection(item) ? 'btn-outline' : 'btn-disabled'"
                  tabindex="-1"
                  role="button"
                  aria-disabled="true"
                  @click.prevent="pushToBookingItems(item)"
                >
                  visually disabled
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </Modal>
  </template>
  <template v-else>
    <Modal
      max-width="screen-lg"
      :title="`add items to this package`"
      type="info"
      action-title="save selected items and close"
      screen-height
    >
      <div class="flex flex-col space-y-8">
        <h3 class="uppercase text-info capitalize font-semibold text-xl mb-4">
          please complete your booking details
        </h3>
        <form class="grid grid-cols-2 space-x-4 items-center">
          <TextField
            v-model="form.event_title"
            name="event_title"
            :placeholder="$t('event_title')"
            :label="$t('event_title')"
            :server-error="$page.props.errors.event_title"
          />
          <!-- event title -->
          <div>
            <Listbox v-model="selectedCity">
              <div class="relative mt-1">
                <ListboxButton
                  class="
                    w-full
                    input
                    border border-base-300 border-2
                    bg-transparent
                    hover:border-neutral hover:border-opacity-50
                    shadow-sm
                    text-left
                  "
                >
                  <span class="block truncate">{{ selectedCity.en_name }}</span>
                  <span
                    class="
                      absolute
                      inset-y-0
                      right-0
                      flex
                      items-center
                      pr-2
                      pointer-events-none
                    "
                  >
                    <VueFeather
                      type="chevron-down"
                      class="w-5 h-5 text-gray-400"
                      aria-hidden="true"
                    />
                  </span>
                </ListboxButton>
                <transition
                  leave-active-class="transition duration-100 ease-in"
                  leave-from-class="opacity-100"
                  leave-to-class="opacity-0"
                >
                  <ListboxOptions
                    class="
                      absolute
                      w-full
                      py-1
                      mt-1
                      overflow-auto
                      text-base
                      bg-white
                      rounded-md
                      shadow-lg
                      max-h-60
                      ring-1 ring-black ring-opacity-5
                      focus:outline-none
                      sm:text-sm
                    "
                  >
                    <ListboxOption
                      v-for="city in cities"
                      v-slot="{ active, selected }"
                      :key="city.en_name"
                      :value="city"
                      as="template"
                    >
                      <li
                        :class="[
                          active
                            ? 'text-amber-900 bg-amber-100'
                            : 'text-gray-900',
                          'cursor-default select-none relative py-2 pl-10 pr-4',
                        ]"
                      >
                        <span
                          :class="[
                            selected ? 'font-medium' : 'font-normal',
                            'block truncate',
                          ]"
                          >{{ city.en_name }}</span
                        >
                        <span
                          v-if="selected"
                          class="
                            absolute
                            inset-y-0
                            left-0
                            flex
                            items-center
                            pl-3
                            text-amber-600
                          "
                        >
                          <VueFeather
                            type="check"
                            class="w-5 h-5"
                            aria-hidden="true"
                          />
                        </span>
                      </li>
                    </ListboxOption>
                  </ListboxOptions>
                </transition>
              </div>
            </Listbox>
          </div>
          <!-- location selector -->
          <HTextarea
            v-model="form.event_description"
            optional
            name="ar_event_description"
            :placeholder="
              $t('field_name_lang', {
                name: $t('event_description'),
                lang: $t('the_arabic'),
              })
            "
            :label="
              $t('field_name_lang', {
                name: $t('event_description'),
                lang: $t('the_arabic'),
              })
            "
            :server-error="$page.props.errors.ar_event_description"
          />
          <!-- event description -->
          <Datepicker v-model="date" :auto-position="false" />
          <!-- start date -->
        </form>
      </div>
    </Modal>
  </template>
</template>

<script>
import { ref, reactive, onMounted } from 'vue'
import { useStore } from 'vuex'
import { useForm } from '@inertiajs/inertia-vue3'
import { Head } from '@inertiajs/inertia-vue3'
import LitepieDatepicker from 'litepie-datepicker'
import WebLayout from '@/Layouts/Web/WebLayout'
import Modal from '@/Shared/Layouts/Modal'
import TextField from '@/Shared/UI/TextField'
import HTextarea from '@/Shared/UI/HTextarea'
import {
  Listbox,
  ListboxLabel,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
} from '@headlessui/vue'

const components = {
  Head,
  WebLayout,
  Modal,
  TextField,
  HTextarea,
  Listbox,
  ListboxLabel,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
  LitepieDatepicker,
}

export default {
  name: 'WebPackagesPage',

  components,

  props: {
    packages: {
      type: Array,
      default: () => [],
    },
    allItems: {
      type: Array,
      default: () => [],
    },
  },

  setup(props) {
    const store = useStore()
    let activePackagePopupView = ref('selectItems')
    const form = useForm({
      event_title: null,
      event_description: null,
      event_location: null,
      selectedItems: [],
    })

    const cities = reactive([
      {
        ar_name: 'مدينة الكويت',
        en_name: 'kuwait city',
        isAvailable: true,
      },
      {
        ar_name: 'الجهراء',
        en_name: 'aljahra',
        isAvailable: false,
      },
      {
        ar_name: 'الفروانية',
        en_name: 'alfarwaniyah',
        isAvailable: false,
      },
      {
        ar_name: 'حولي',
        en_name: 'hawli',
        isAvailable: false,
      },
      {
        ar_name: 'مبارك الكبير',
        en_name: 'mubarak alkabir',
        isAvailable: false,
      },
      {
        ar_name: 'الاحمدي',
        en_name: 'alahmadi',
        isAvailable: false,
      },
      {
        ar_name: 'السالمية',
        en_name: 'alsalimya',
        isAvailable: false,
      },
      {
        ar_name: 'ضاحية صباح السالم',
        en_name: 'dahyat sabah alsalem',
        isAvailable: false,
      },
      {
        ar_name: 'الفحيحيل',
        en_name: 'alfuhayhil',
        isAvailable: false,
      },
      {
        ar_name: 'سلوى',
        en_name: 'salwa',
        isAvailable: false,
      },
    ])

    const selectedCity = ref(cities[0])

    const availableItems = reactive(props.allItems)
    let userSelections = reactive([])

    const date = ref(new Date())

    const openBookingBopUp = (packg) => {
      form.selectedItems = Object.values(packg.items)
      store.commit('openModal')
    }

    const userInitItemsToAdded = (item) => {
      userSelections.push(item)
      console.log(userSelections)
    }

    const removeUserItemSelection = (item) => {
      userSelections.splice(userSelections.indexOf(item), 1)
    }

    const userSelection = (i) => {
      return userSelections.includes(i)
    }

    const getUserItemQuantity = (item) => {
      if (!userSelection(item)) return 0
      const quantity = userSelections.filter((i) => i.id == item.id)

      item.quantity = quantity.length

      return quantity.length
    }

    const pushToBookingItems = (item) => {
      form.selectedItems.push(item)
    }

    const saveBookingItems = () => {
      activePackagePopupView.value = 'otherView'
    }

    onMounted(() => {})

    return {
      openBookingBopUp,
      form,
      activePackagePopupView,
      availableItems,
      userSelections,
      userInitItemsToAdded,
      removeUserItemSelection,
      userSelection,
      getUserItemQuantity,
      pushToBookingItems,
      saveBookingItems,
      cities,
      selectedCity,
      date,
    }
  },
}
</script>

<style scoped>
.htw-package__img-bg {
  height: calc(100vh - 20rem);
  border-top-left-radius: 7rem;
  border-bottom-right-radius: 8rem;
}
</style>
