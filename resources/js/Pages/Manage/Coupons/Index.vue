<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :active-name="$t('coupons')"
        active-icon="grid"
        :action-name="
          $t('action_model', { model: $t('coupon'), action: $t('add') })
        "
        :action-href="route('manage.coupons.create')"
      />
    </template>
    <div class="htm-page htm-page__coupons-index">
      <div class="htm-table-container flex flex-col space-y-8">
        <div class="htm-search-filter">
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
                  <th>coupon code</th>
                  <th>coupon type</th>
                  <th>start at</th>
                  <th>expiry at</th>
                  <th class="text-center">actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-if="coupons.length == 0">
                  no data to view yet!
                </tr>
                <tr v-for="coupon in coupons" v-else :key="coupon.id">
                  <td>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </td>
                  <td>{{ coupon.id }}</td>
                  <td>
                    {{ coupon.code }}
                  </td>
                  <td>
                    {{ coupon.type }}
                  </td>
                  <td>{{ coupon.start_date }}</td>
                  <td>{{ coupon.expiry_date }}</td>
                  <td class="w-full flex items-center justify-center">
                    <Link
                      :href="route('manage.coupons.show', coupon.id)"
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
                      :href="route('manage.coupons.edit', coupon.id)"
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
                    <span v-if="coupon.deleted_at">trashed</span>
                    <button
                      v-else
                      class="
                        ht-base-transition
                        btn btn-xs btn-ghost
                        transform
                        hover:bg-transparent hover:scale-125
                      "
                      @click="openConfirmDelete(coupon.id)"
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
                  <th>coupon code</th>
                  <th>coupon type</th>
                  <th>start at</th>
                  <th>expiry at</th>
                  <th class="text-center">actions</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </ManageLayout>
</template>

<script>
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
  name: 'ManageCouponsIndex',

  components,

  props: {
    coupons: {
      type: Array,
      default: () => [],
    },
  },

  setup() {},
}
</script>
