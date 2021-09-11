<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :activeName="$t('categories')"
        activeIcon="grid"
        :actionName="
          $t('action_model', { model: $t('category'), action: $t('add') })
        "
        :actionHref="route('manage.categories.create')"
      />
    </template>
    <div class="htm-page htm-page__categories-index">
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
                  <th>category name</th>
                  <th>created at</th>
                  <th class="text-center">actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-if="categories.length == 0">
                  no data to view yet!
                </tr>
                <tr v-else v-for="category in categories" :key="category.id">
                  <td>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </td>
                  <td>{{ category.id }}</td>
                  <td>
                    {{
                      $i18n.locale === 'ar'
                        ? category.ar_name
                        : category.en_name
                    }}
                  </td>
                  <td>{{ category.created_at }}</td>
                  <td class="w-full flex items-center justify-center">
                    <Link
                      :href="route('manage.categories.show', category.id)"
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
                      :href="route('manage.categories.edit', category.id)"
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
                    <span v-if="category.deleted_at">trashed</span>
                    <button
                      class="btn btn-xs btn-ghost hover:bg-transparent group"
                      v-else
                      @click="openModel(category)"
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
                  <th>category name</th>
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
    :show="confirmDeleteCategory"
    @close="closeModal"
    modalType="error"
  >
    <template #title>
      {{
        $i18n.locale === 'ar'
          ? categoryToDelete.ar_name
          : categoryToDelete.en_name
      }}
    </template>

    <template #content>
      are you sure you want to delete your category, OK, you can restort it in 1
      month
      <div class="mt-4"></div>
    </template>

    <template #footer>
      <div class="flex space-x-2">
        <button class="btn btn-sm" @click="closeModal">Cancel</button>

        <button class="btn btn-sm btn-error" @click="deleteCategory">
          {{
            $t('action_model', { model: $t('category'), action: $t('delete') })
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

import pickBy from 'lodash/pickBy'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'

const components = { Link, ManageLayout, Breadcrumb, DialogModal, SearchFilter }

export default {
  name: 'ManageCategoriesIndex',

  components,

  props: {
    categories: Array,
    filters: Object,
  },

  data() {
    return {
      confirmDeleteCategory: false,
      categoryToDelete: {},
      form: this.$inertia.form({
        search: this.filters.search,
        trashed: this.filters.trashed,
      }),
    }
  },

  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get(
          this.route('manage.categories.index'),
          pickBy(this.form),
          {
            preserveState: true,
          },
        )
      }, 150),
    },
  },

  methods: {
    openModel(category) {
      this.categoryToDelete = category
      this.confirmDeleteCategory = true
    },
    closeModal() {
      this.categoryToDelete = {}
      this.confirmDeleteCategory = false
    },
    deleteCategory() {
      this.$inertia.delete(
        route('manage.categories.destroy', { category: this.categoryToDelete }),
        {
          preserveScroll: true,
          onSuccess: () => this.closeModal(),
          onError: () => console.log('do smomthing on error'),
          onFinish: () => console.log('do smomthing on finish'),
        },
      )
    },
    reset() {
      this.form = mapValues(this.form.search, () => null)
    },
  },
}
</script>
