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
        <div class="htm-search-filter">
          <SearchFilter v-model="form.search" @reset="clearSearch" />
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
                <tr v-if="products.data.length == 0">
                  no data to view yet!
                </tr>
                <tr
                  v-for="(product, index) in products.data"
                  v-else
                  :key="index"
                >
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
        <Pagination :links="products.links" />
      </div>
    </div>
  </ManageLayout>
  <Modal max-width="xl" type="success" @modalAction="deleteProduct" />
</template>

<script>
import { Inertia } from '@inertiajs/inertia'
import { useStore } from 'vuex'
import { Link } from '@inertiajs/inertia-vue3'
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'
import SearchFilter from '@/Shared/UI/SearchFilter'
import Modal from '@/Shared/Layouts/Modal'
import throttle from 'lodash/throttle'
import pickBy from 'lodash/pickBy'
import mapValues from 'lodash/mapValues'
import Pagination from '@/Shared/UI/Pagination.vue'

const components = {
  Link,
  ManageLayout,
  Breadcrumb,
  SearchFilter,
  Modal,
  Pagination,
}

export default {
  name: 'ManageProductsIndex',
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
  },
  setup() {
    let productToDeleteId = 0
    const store = useStore()
    const isModalOpen = store.state.isModalOpen
    const openConfirmDelete = (productId) => {
      store.commit('openModal')
      productToDeleteId = productId
    }
    const deleteProduct = () => {
      Inertia.delete(route('manage.products.destroy', productToDeleteId), {
        onFinish: () => {
          store.commit('closeModal')
          store.commit('openNotification', {
            title: 'delete product',
            type: 'success',
            content: 'product deleted successfully',
          })
        },
      })
    }
    return {
      openConfirmDelete,
      isModalOpen,
      deleteProduct,
    }
  },
  data() {
    return {
      form: {
        search: this.filters.search,
        filter: this.filters.filter,
      },
    }
  },
  // filter and search
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        Inertia.get(route('manage.products.index'), pickBy(this.form), {
          preserveState: true,
        })
      }, 150),
    },
  },
  methods: {
    clearSearch() {
      this.form = mapValues(this.form, () => null)
    },
  },
}
</script>

<style>
.btn-group > .btn:first-child,
.btn-group > .btn:last-child {
  border-radius: var(--rounded-btn);
}

.btn-group > .btn:not(:last-child) {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}

.btn-group > .btn:not(:first-child) {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
  margin-right: -1px;
}
</style>
