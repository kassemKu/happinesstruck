<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :activeName="$t('products')"
        activeIcon="grid"
        :actionName="
          $t('action_model', { model: $t('product'), action: $t('add') })
        "
        :actionHref="route('manage.products.create')"
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
                <tr v-else v-for="product in products" :key="product.id">
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
                      class="btn btn-xs btn-ghost hover:bg-transparent group"
                    >
                      <VueFeather
                        type="eye"
                        class="
                          w-5
                          h-5
                          text-success
                          transform
                          ht-base-transition
                          group-hover:scale-110
                        "
                        aria-hidden="true"
                        aria-expanded="false"
                      />
                    </Link>
                    <Link
                      :href="route('manage.products.edit', product.id)"
                      class="btn btn-xs btn-ghost hover:bg-transparent group"
                    >
                      <VueFeather
                        type="edit"
                        class="
                          w-5
                          h-5
                          text-info
                          transform
                          ht-base-transition
                          group-hover:scale-110
                        "
                        aria-hidden="true"
                        aria-expanded="false"
                      />
                    </Link>
                    <span v-if="product.deleted_at">trashed</span>
                    <button
                      class="btn btn-xs btn-ghost hover:bg-transparent group"
                      v-else
                      @click="openModel(product)"
                    >
                      <VueFeather
                        type="trash-2"
                        class="
                          w-5
                          h-5
                          text-error
                          transform
                          ht-base-transition
                          group-hover:scale-110
                        "
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
  <DialogModal
    :show="confirmDeleteProduct"
    @close="closeModal"
    modalType="error"
  >
    <template #title>
      {{
        $i18n.locale === 'ar'
          ? productToDelete.ar_name
          : productToDelete.en_name
      }}
    </template>

    <template #content>
      are you sure you want to delete your product, OK, you can restort it in 1
      month
      <div class="mt-4"></div>
    </template>

    <template #footer>
      <div class="flex space-x-2">
        <button class="btn btn-sm" @click="closeModal">Cancel</button>

        <button class="btn btn-sm btn-error" @click="deleteproduct">
          {{
            $t('action_model', { model: $t('product'), action: $t('delete') })
          }}
        </button>
      </div>
    </template>
  </DialogModal>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'
import DialogModal from '@/Shared/UI/DialogModal'
import SearchFilter from '@/Shared/UI/SearchFilter'

const components = { Link, ManageLayout, Breadcrumb, DialogModal, SearchFilter }

export default {
  name: 'ManageProductsIndex',

  components,

  props: {
    products: Array,
  },

  data() {
    return {
      confirmDeleteProduct: false,
    }
  },
}
</script>
