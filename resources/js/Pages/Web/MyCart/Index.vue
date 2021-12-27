<template>
  <WebLayout>
    <Head title="MYCART">
      <meta title="MYCART" content="lorem ipsum" />
    </Head>
    <div class="htw-page htw-my__cart-page bg-base-300 bg-opacity-30">
      <HtSection>
        <div class="mt-36">
          <div class="bg-white p-12">
            <div v-if="cart.length === 0">
              <div class="text-center w-full text-error">
                <span class="text-lg">¡Your cart is empty!</span>
              </div>
            </div>

            <div v-else>
              <div class="float-right w-1/3">
                <h6 class="mb-2 text-lg uppercase font-bold">cart total</h6>
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
                    <p>subtotal</p>
                    <p class="bg-gray-200 py-1 px-2 rounded">
                      {{ cartSubtotal }} DK
                    </p>
                  </div>
                  <div>
                    <div class="flex justify-between py-4 items-center">
                      <p>total</p>
                      <p class="bg-gray-200 py-1 px-2 rounded">
                        {{ cartTotal }} DK
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- cart total -->

              <table class="w-full table-auto">
                <thead>
                  <tr
                    class="
                      tracking-wider
                      uppercase
                      text-sm text-left text-gray-400
                      border-b-2 border-gray-200
                    "
                  >
                    <th class="py-2">image</th>
                    <th class="py-2">product</th>
                    <th class="text-center py-2">qtd</th>
                    <th class="text-center px-4 py-2">unit price</th>
                    <th class="text-center px-4 py-2">total price</th>
                    <th class="text-center px-4 py-2">action</th>
                  </tr>
                </thead>

                <tbody>
                  <tr
                    v-for="(item, i) in cart"
                    :key="i"
                    class="
                      uppercase
                      text-gray-600 text-xs
                      font-bold
                      tracking-wider
                      border-b-2 border-gray-200
                    "
                  >
                    <td class="py-6">
                      <div class="avatar">
                        <div class="w-24 h-24 mask mask-squircle">
                          <img
                            :src="item.options.image[0].full_url"
                            :alt="item.options.en_name"
                          />
                        </div>
                      </div>
                    </td>
                    <td class="py-6">
                      <span>{{ item.options.en_name }}</span>
                      <button
                        class="
                          block
                          text-xs text-gray-400
                          font-semibold
                          focus:outline-none
                        "
                        @click="deleteItem(item.id)"
                      >
                        ({{ item.options.SKU }})
                      </button>
                    </td>
                    <td class="py-6 text-center">
                      <div class="form-control">
                        <div class="flex items-center justify-center space-x-4">
                          <button
                            class="
                              btn btn-outline btn-square btn-sm btn-info
                              hover:text-base-100 hover:bg-info
                            "
                            @click="updateQty(item.rowId, item.qty, 'increase')"
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
                            @click="updateQty(item.rowId, item.qty, 'decrease')"
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
                    <td class="text-center py-6">
                      <span
                        class="py-2 px-2 rounded-md bg-blue-100 text-blue-500"
                        >{{ item.price }} DK</span
                      >
                    </td>
                    <td class="text-center py-6">
                      <span
                        class="py-2 px-2 rounded-md bg-green-100 text-green-500"
                        >{{ item.subtotal }} DK</span
                      >
                    </td>
                    <td class="text-center">
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

          <div class="mt-8 flex justify-between">
            <Link
              :href="route('web.store')"
              class="btn btn-outline btn-info border-2"
            >
              back to shopping
            </Link>
            <Link
              v-if="cart.length > 0"
              :href="route('web.checkout')"
              class="btn btn-outline btn-success border-2"
            >
              Proceed to checkout
            </Link>
          </div>
        </div>
      </HtSection>
    </div>
    <pre>{{ cart }}</pre>
  </WebLayout>
</template>

<script>
import { reactive, ref } from 'vue'
import { Head, Link, usePage } from '@inertiajs/inertia-vue3'
import WebLayout from '@/Layouts/Web/WebLayout'
import HtSection from '@/Shared/Layouts/HtSection'
import axios from 'axios'

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
    const cart = reactive(Object.values(page.props.value.cart))
    const cartSubtotal = ref(page.props.value.cartSubtotal)
    const cartTotal = ref(page.props.value.cartTotal)

    const updateQty = (rowId, qty, type) => {
      if (qty < 1) return

      if (type === 'increase') {
        qty++
      } else {
        qty--
      }

      axios
        .post(route('web.updateQuantity', { rowId, qty }), { type })
        .then((res) => console.log(res))

      //   Inertia.post(route('web.updateQuantity', { rowId, qty }), {
      //     onSuccess: () => {
      //       cart, cartSubtotal, cartTotal
      //     },
      //   })
    }

    const deleteItem = (rowId) => {
      Inertia.post(route('web.deleteCartItem', { rowId }), {
        onSuccess: () => {},
      })
    }

    return { cart, cartSubtotal, cartTotal, updateQty, deleteItem }
  },
}
</script>
