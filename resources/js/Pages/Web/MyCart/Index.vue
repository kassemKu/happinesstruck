<template>
  <WebLayout>
    <Head title="MYCART">
      <meta title="MYCART" content="lorem ipsum" />
    </Head>
    <div class="htw-page htw-my__cart-page bg-base-300 bg-opacity-30">
      <HtSection>
        <div class="mt-6 md:mt-12">
          <div class="bg-white p-4 md:p-12 rounded-box">
            <div v-if="cart.length === 0">
              <div class="text-center w-full text-error">
                <span class="text-lg">¡Your cart is empty!</span>
              </div>
            </div>

            <div v-else class="w-full flex flex-col">
              <div class="self-center md:self-end w-full md:w-1/2 lg:w-1/3">
                <h6 class="mb-2 text-lg uppercase font-bold">
                  {{ $t('cart_total') }}
                </h6>
                <div
                  class="
                    divide-y-2
                    mb-16
                    border-2
                    rounded-box
                    px-4
                    uppercase
                    font-medium
                    text-sm
                  "
                >
                  <div class="flex justify-between py-4">
                    <p>{{ $t('subtotal') }}</p>
                    <p class="bg-gray-200 py-1 px-2 rounded">
                      {{ cartSubtotal }}
                      {{ $i18n.locale === 'ar' ? 'دك' : 'kd' }}
                    </p>
                  </div>
                  <div>
                    <div class="flex justify-between py-4 items-center">
                      <p>{{ $t('total') }}</p>
                      <p class="bg-gray-200 py-1 px-2 rounded">
                        {{ cartTotal }}
                        {{ $i18n.locale === 'ar' ? 'دك' : 'kd' }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- cart total -->
              <div class="overflow-x-auto ht-scrollbar">
                <table class="w-full table">
                  <thead>
                    <tr
                      class="
                        tracking-wider
                        uppercase
                        text-sm text-left text-gray-400
                        border-b-2 border-gray-200
                      "
                    >
                      <th class="px-6 md:px-4 py-2 text-center">
                        {{ $t('image') }}
                      </th>
                      <th class="px-6 md:px-4 py-2 text-center">
                        {{ $t('product_name') }}
                      </th>
                      <th class="px-6 md:px-4 text-center py-2">
                        {{ $t('quantity') }}
                      </th>
                      <th class="px-6 md:px-4 text-center py-2">
                        {{ $t('unit_price') }}
                      </th>
                      <th class="px-6 md:px-4 text-center py-2">
                        {{ $t('total_price') }}
                      </th>
                      <th class="px-6 md:px-4 text-center py-2">
                        {{ $t('action') }}
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr
                      v-for="(item, i) in cart"
                      :key="i"
                      class="
                        uppercase
                        text-gray-600 text-xs
                        font-medium
                        tracking-wider
                        border-b-2 border-gray-200
                      "
                    >
                      <td class="px-6 md:px-4 py-2 md:py-6">
                        <div class="avatar">
                          <div
                            class="w-16 h-16 md:w-24 md:h-24 mask mask-squircle"
                          >
                            <img
                              :src="item.options.image[0].full_url"
                              :alt="item.options.en_name"
                            />
                          </div>
                        </div>
                      </td>
                      <td class="px-6 md:px-4 text-xs py-2 md:py-6 text-center">
                        <span>{{
                          $i18n.locale === 'en'
                            ? item.options.en_name
                            : item.options.ar_name
                        }}</span>
                        <span
                          class="
                            block
                            text-xs text-gray-400
                            font-semibold
                            focus:outline-none
                          "
                          @click="deleteItem(item.rowId)"
                        >
                          ({{ item.options.SKU }})
                        </span>
                      </td>
                      <td class="px-6 md:px-4 py-2 md:py-6 text-center">
                        <div class="form-control">
                          <div
                            class="flex items-center justify-center space-x-4"
                          >
                            <button
                              class="
                                btn btn-outline btn-square btn-sm btn-info
                                hover:text-base-100 hover:bg-info
                              "
                              @click="updateQty(item, 'increase')"
                            >
                              <VueFeather
                                type="plus"
                                class="w-5 h-5"
                                stroke-width="3"
                                aria-hidden="true"
                                aria-expanded="false"
                              />
                            </button>
                            <input
                              :placeholder="item.qty"
                              class="
                                rounded-btn
                                border-none
                                text-center
                                oldstyle-nums
                                w-12
                                placeholder-gray-800
                                bg-slate-200
                                cursor-not-allowed
                              "
                              type="text"
                            />
                            <button
                              class="
                                btn btn-outline btn-square btn-sm btn-info
                                hover:text-base-100 hover:bg-info
                              "
                              @click="updateQty(item, 'decrease')"
                            >
                              <VueFeather
                                type="minus"
                                class="w-5 h-5"
                                stroke-width="3"
                                aria-hidden="true"
                                aria-expanded="false"
                              />
                            </button>
                          </div>
                        </div>
                      </td>
                      <td class="px-6 md:px-4 text-center py-6">
                        <span
                          class="
                            md:py-2 md:px-2
                            rounded-md
                            bg-blue-100
                            text-blue-500
                          "
                          >{{ item.price }}
                          {{ $i18n.locale === 'ar' ? 'دك' : 'kd' }}</span
                        >
                      </td>
                      <td class="px-6 md:px-4 text-center py-6">
                        <span
                          class="
                            md:py-2 md:px-2
                            rounded-md
                            bg-green-100
                            text-green-500 text-xs
                          "
                          >{{ item.subtotal }}
                          {{ $i18n.locale === 'ar' ? 'دك' : 'kd' }}</span
                        >
                      </td>
                      <td class="px-6 md:px-4 text-center">
                        <button
                          class="
                            btn btn-outline btn-square btn-sm btn-error
                            border-none
                            bg-error bg-opacity-30
                            hover:text-base-100 hover:bg-error
                          "
                          @click.prevent="deleteItem(item.rowId)"
                        >
                          <VueFeather
                            type="trash-2"
                            class="w-5 h-5"
                            aria-hidden="true"
                            aria-expanded="false"
                          />
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="mt-8 flex justify-between">
            <Link
              :href="route('web.store')"
              class="btn btn-outline btn-info border-2 btn-sm md:btn-md"
            >
              back to shopping
            </Link>
            <Link
              v-if="cart.length > 0"
              :href="route('web.checkout')"
              class="btn btn-outline btn-success border-2 btn-sm md:btn-md"
            >
              Proceed to checkout
            </Link>
          </div>
        </div>
      </HtSection>
    </div>
  </WebLayout>
</template>

<script>
import { onMounted, computed } from 'vue'
import { Head, Link, usePage } from '@inertiajs/inertia-vue3'
import { useStore } from 'vuex'
import WebLayout from '@/Layouts/Web/WebLayout'
import HtSection from '@/Shared/Layouts/HtSection'

const components = {
  Head,
  WebLayout,
  HtSection,
  Link,
}

export default {
  name: 'WebPageCheckout',

  components,

  setup() {
    const page = usePage()
    const store = useStore()
    const cart = computed(() => {
      return store.state.cart
    })

    const cartSubtotal = computed(() => {
      return store.state.cartSubtotal
    })

    const cartTotal = computed(() => {
      return store.state.cartTotal
    })

    const updateQty = (item, type) => {
      store.commit('updateCartItemQty', { item, type })
      store.commit('updateCartItemQtyDB', item)
    }

    const deleteItem = (rowId) => {
      store.commit('deleteCartItem', rowId)
    }

    onMounted(() => {
      store.commit(
        'getUserCart',
        Array.from(Object.values(page.props.value.cart)),
      )
      store.commit('getCartSubtotal', page.props.value.cartSubtotal)
      store.commit('getCartTotal', page.props.value.cartTotal)
    })

    return { cart, cartSubtotal, cartTotal, updateQty, deleteItem }
  },
}
</script>
