<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :active-name="$t('products')"
        active-icon="grid"
        :action-name="
          $t('action_model', { model: $t('product'), action: $t('add') })
        "
        :action-href="route('manage.products.create')"
      />
    </template>
    <div class="htm-page htm-page__products-index">
      <div class="htm-table-container flex flex-col space-y-8">
        <div class="htm-searsh-filter">
          <SearchFilter />
        </div>
        <div class="htm-table">
          <div class="overflow-x-auto ht-scrollbar">
            <table class="table w-full">
              <thead>
                <tr>
                  <th>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </th>
                  <th>ID</th>
                  <th>product name</th>
                  <th>product slug</th>
                  <th>created at</th>
                  <th class="text-center">actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-if="products.length == 0">
                  no data to view yet!
                </tr>
                <tr v-for="product in products" v-else :key="product.id">
                  <td>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </td>
                  <td>{{ product.id }}</td>
                  <td>
                    {{
                      $i18n.locale === 'ar' ? product.ar_name : product.en_name
                    }}
                  </td>
                  <td>
                    {{
                      $i18n.locale === 'ar' ? product.ar_slug : product.en_slug
                    }}
                  </td>
                  <td>{{ product.created_at }}</td>
                  <td class="w-full flex items-center justify-center">
                    <Link
                      :href="route('manage.products.show', product.id)"
                      class="
                        btn btn-xs btn-ghost
                        hover:bg-transparent
                        transform
                        ht-base-transition
                        hover:scale-125
                      "
                    >
                      <VueFeather
                        type="eye"
                        class="w-5 h-5 text-success"
                        aria-hidden="true"
                        aria-expanded="false"
                      />
                    </Link>
                    <Link
                      :href="route('manage.products.edit', product.id)"
                      class="
                        inline-block
                        ht-base-transition
                        btn btn-xs btn-ghost
                        transform
                        hover:bg-transparent hover:scale-125
                      "
                    >
                      <VueFeather
                        type="edit"
                        class="w-5 h-5 text-info"
                        aria-hidden="true"
                        aria-expanded="false"
                      />
                    </Link>
                    <span v-if="product.deleted_at">trashed</span>
                    <button
                      v-else
                      class="
                        ht-base-transition
                        btn btn-xs btn-ghost
                        transform
                        hover:bg-transparent hover:scale-125
                      "
                      @click="openConfirmDelete(product.id)"
                    >
                      <VueFeather
                        type="trash-2"
                        class="w-5 h-5 text-error"
                        aria-hidden="true"
                        aria-expanded="false"
                      />
                    </button>
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th>select</th>
                  <th>ID</th>
                  <th>product name</th>
                  <th>product slug</th>
                  <th>created at</th>
                  <th class="text-center">actions</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </ManageLayout>
  <Modal max-width="xl" @modalAction="deleteProduct" />
</template>

<script>
import { Inertia } from '@inertiajs/inertia'
import { useStore } from 'vuex'
import { Link } from '@inertiajs/inertia-vue3'
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'
import SearchFilter from '@/Shared/UI/SearchFilter'
import Modal from '@/Shared/Layouts/Modal'

const components = {
  Link,
  ManageLayout,
  Breadcrumb,
  SearchFilter,
  Modal,
}

export default {
  name: 'ManageProductsIndex',

  components,

  props: {
    products: {
      type: Array,
      default: () => [],
    },
  },

  setup() {
    let productTodeleteId = 0
    const store = useStore()

    const isModalOpen = store.state.isModalOpen

    const openConfirmDelete = (productId) => {
      store.commit('openModal')
      productTodeleteId = productId
    }

    const deleteProduct = () => {
      Inertia.delete(route('manage.products.destroy', productTodeleteId), {
        onFinish: () => {
          store.commit('closeModal')

          store.commit('openNotification', {
            title: "delete producut",
            type: "success",
            content: "product deleted successfully",
          })

        },
      })
    }

    return { openConfirmDelete, isModalOpen, deleteProduct }
  },
}
</script>
