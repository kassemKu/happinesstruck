<template>
  <WebLayout>
    <Head title="STORE">
      <meta title="description" content="lorem ipsum" />
    </Head>
    <div
      class="
        htw-page htw-page__store
        bg-base-200
        flex
        min-h-screen
        my-12
        m-4
        md:m-8
        lg:m-16
        p-4
        md:p-0
        overflow-hidden
        border
        rounded-box
      "
    >
      <div
        class="
          hidden
          w-72
          md:flex
          flex-col
          ltr:border-r
          rtl:border-l
          capitalize
          font-medium
        "
      >
        <div
          class="h-16 flex items-center space-x-2 px-6 border-b text-gray-400"
        >
          <VueFeather type="filter" />
          <h5 class="text-xl">{{ $t('filters') }}</h5>
        </div>
        <div class="px-8 flex flex-col space-y-6">
          <div
            v-for="section in sections"
            :key="section.id"
            class="py-6 flex flex-col space-y-6"
          >
            <div class="flex space-x-2">
              <p class="font-semibold text-gray-500 uppercase">
                {{ $i18n.locale === 'ar' ? section.ar_name : section.en_name }}
              </p>
            </div>
            <ul class="flex flex-col space-y-4">
              <li
                v-for="category in section.categories"
                :key="category.id"
                class="flex space-x-2"
              >
                <input
                  type="checkbox"
                  class="checkbox"
                  :name="category.en_name"
                  @input="selectCategory(category)"
                />
                <span class="text-sm">{{
                  $i18n.locale === 'ar' ? category.ar_name : category.en_name
                }}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- filters -->
      <div class="flex-1 flex flex-col space-y-8 p-4 md:p-10">
        <div
          class="
            relative
            flex
            items-center
            w-full
            text-base-300
            focus-within:text-info
          "
        >
          <button
            class="
              h-full
              absolute
              ltr:ml-3
              rtl:mr-3
              pointer-events-none
              flex
              items-center
            "
          >
            <VueFeather type="search" stroke-width="3" />
          </button>
          <input
            v-model="filtersForm.search"
            :placeholder="$t('search.')"
            class="
              ltr:pr-4
              rtl:pl-4
              ltr:pl-10
              rtl:pr-10
              py-2
              border-none
              rounded-xl
              w-full
              placeholder-gray-500
              ring-1 ring-base-300
              font-semibold
              focus:ring-1 focus:ring-info
            "
            type="text"
            name="search"
            aria-label="search"
            autocomplete="off"
          />
          <button
            class="
              btn btn-ghost btn-xs
              hover:bg-transparent
              absolute
              ltr:right-0
              rtl:left-0
              flex
              items-center
              group-focus:text-yellow-300
            "
            @click.prevent="clearSearch"
          >
            <VueFeather type="x" stroke-width="3" class="w-4 h-4" />
          </button>
        </div>
        <!-- search -->

        <div class="capitalize">
          <p class="text-gray-400">
            {{ $t('result_for_search') }}
            <b class="text-base-content rtl:mr-1 text-sm"
              >"{{ filtersForm.search }}"</b
            >
          </p>
        </div>
        <!-- result text -->
        <div
          class="
            flex
            items-center
            space-x-8
            md:space-x-16
            capitalize
            justify-center
            md:justify-start
          "
        >
          <p class="text-gray=500">{{ $t('sort') }}</p>
          <div class="flex space-x-4">
            <button class="btn btn-accent capitalize btn-sm">
              {{ $t('popular') }}
            </button>
            <button
              class="
                btn btn-outline
                border-base-300
                text-gray-400
                btn-sm
                capitalize
                hover:border-gray-500 hover:bg-transparent hover:text-gray-500
              "
            >
              {{ $t('most_new') }}
            </button>
            <button
              class="
                btn btn-outline
                border-base-300
                text-gray-400
                btn-sm
                capitalize
                hover:border-gray-500 hover:bg-transparent hover:text-gray-500
              "
            >
              {{ $t('price') }}
              <VueFeather
                type="chevron-down"
                stroke-width="3"
                class="w-5 h-5"
              />
            </button>
          </div>
        </div>
        <!-- sort -->
        <div>
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-y-8 md:gap-6">
            <Link
              v-for="product in data"
              :key="product.id"
              :href="route('web.showProduct', product.id)"
              class="
                rounded-box
                border border-base-300
                p-6
                relative
                cursor-pointer
                shadow-inner
                transform
                transition
                duration-500
                ease-in-out
                hover:shadow-2xl
              "
            >
              <figure class="flex items-center justify-center">
                <img
                  :src="product.media[0].full_url"
                  class="object-cover w-full h-64 rounded-box"
                />
              </figure>
              <div class="flex flex-col md:space-y-6 mt-4">
                <div class="flex flex-col">
                  <h2 class="card-title font-semibold capitalize">
                    {{
                      $i18n.locale === 'ar' ? product.ar_name : product.en_name
                    }}
                  </h2>
                </div>
                <div class="flex items-center justify-between">
                  <div>
                    <p class="text-gray-400">{{ $t('price') }}</p>
                    <p class="font-semibold">
                      <span>{{ product.sale_price }} </span>
                      <span class="uppercase">
                        {{ $i18n.locale === 'ar' ? 'دك' : 'kd' }}</span
                      >
                    </p>
                  </div>
                  <button
                    class="
                      btn btn-outline
                      border-base-300
                      text-gray-400
                      btn-sm
                      capitalize
                      hover:border-gray-500
                      hover:bg-transparent
                      hover:text-gray-500
                    "
                    @click.prevent="addToCart(product)"
                  >
                    {{ $t('add_to_cart') }}
                  </button>
                </div>
              </div>
            </Link>
          </div>
        </div>
        <!-- products view -->
      </div>
    </div>
  </WebLayout>
</template>

<script>
import { ref, onMounted, watch, reactive } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'
import { Head } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
import axios from 'axios'
import { useStore } from 'vuex'
import debounce from 'lodash/debounce'
import pickBy from 'lodash/pickBy'
// import mapValues from 'lodash/mapValues'
import WebLayout from '@/Layouts/Web/WebLayout'

const components = {
  Head,
  WebLayout,
  Link,
}

export default {
  name: 'WebStorePage',

  components,

  props: {
    products: {
      type: Object,
      default: () => ({}),
    },
    filters: {
      type: Object,
      default: () => ({}),
    },
    allSections: { type: Array, default: () => [] },
  },

  setup(props) {
    const store = useStore()

    const addToCart = (product) => {
      axios.post(route('web.addToCart', product)).then((res) => {
        const { data } = res

        store.commit('updateCartCount', data.count)
      })
    }

    const data = ref([])
    const sections = reactive(props.allSections)

    // search
    const filtersForm = reactive({
      search: props.filters.search,
      category: props.filters.category,
      sort: props.filters.sort,
    })

    watch(
      () => ({ ...filtersForm }),
      debounce((val) => {
        Inertia.get(route('web.store'), pickBy(val), {
          preserveState: true,
          onSuccess: async () => {
            data.value = await props.products.data
          },
        })
      }, 250),
    )
    const clearSearch = () => (filtersForm.search = '')
    // filters
    const selectedCategories = reactive([])
    const selectedCategory = (cat) => selectedCategories.includes(cat)
    const selectCategory = (cat) => {
      if (!selectedCategory(cat.id)) {
        selectedCategories.push(cat.id)
        filtersForm.category = selectedCategories.toString()
      } else {
        const removeIndex = selectedCategories.findIndex(
          (item) => item === cat.id,
        )
        selectedCategories.splice(removeIndex, 1)
        filtersForm.category = selectedCategories.toString()
      }
    }

    onMounted(() => (data.value = props.products.data))

    return {
      addToCart,
      data,
      filtersForm,
      clearSearch,
      sections,
      selectedCategories,
      selectedCategory,
      selectCategory,
    }
  },
}
</script>
