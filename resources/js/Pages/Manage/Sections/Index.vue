<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :active-name="$t('sections')"
        active-icon="grid"
        :action-name="
          $t('action_model', { model: $t('section'), action: $t('add') })
        "
        :action-href="route('manage.sections.create')"
      />
    </template>
    <div class="htm-page htm-page__sections-index">
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
                  <th>section name</th>
                  <th>created at</th>
                  <th class="text-center">actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-if="sections.length == 0">
                  no data to view yet!
                </tr>
                <tr v-for="section in sections.data" v-else :key="section.id">
                  <td>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </td>
                  <td>{{ section.id }}</td>
                  <td>
                    {{
                      $i18n.locale === 'ar' ? section.ar_name : section.en_name
                    }}
                  </td>
                  <td>{{ section.created_at }}</td>
                  <td class="w-full flex items-center justify-center">
                    <Link
                      :href="route('manage.sections.show', section.id)"
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
                      :href="route('manage.sections.edit', section.id)"
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
                    <span v-if="section.deleted_at">trashed</span>
                    <button
                      v-else
                      class="btn btn-xs btn-ghost hover:bg-transparent group"
                      @click="openModel(section)"
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
                  <th>section name</th>
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
    modal-type="error"
    :show="confirmDeleteSection"
    @close="closeModal"
  >
    <template #title>
      {{
        $i18n.locale === 'ar'
          ? sectionToDelete.ar_name
          : sectionToDelete.en_name
      }}
    </template>

    <template #content>
      are you sure you want to delete your section, OK, you can restort it in 1
      month
      <div class="mt-4"></div>
    </template>

    <template #footer>
      <div class="flex space-x-2">
        <button class="btn btn-sm" @click="closeModal">Cancel</button>

        <button class="btn btn-sm btn-error" @click="deleteSection">
          {{
            $t('action_model', { model: $t('section'), action: $t('delete') })
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
  name: 'ManageSectionsIndex',

  components,

  props: {
    sections: { type: Object, default: () => ({}) },
    filters: { type: Object, default: () => ({}) },
  },

  data() {
    return {
      confirmDeleteSection: false,
      sectionToDelete: {},
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
          this.route('manage.sections.index'),
          pickBy(this.form),
          {
            preserveState: true,
          },
        )
      }, 150),
    },
  },

  methods: {
    openModel(section) {
      this.sectionToDelete = section
      this.confirmDeleteSection = true
    },
    closeModal() {
      this.sectionToDelete = {}
      this.confirmDeleteSection = false
    },
    deleteSection() {
      this.$inertia.delete(
        route('manage.sections.destroy', { section: this.sectionToDelete }),
        {
          preserveScroll: true,
          onSuccess: () => this.closeModal(),
          onError: () => console.log('do something on error'),
          onFinish: () => console.log('do something on finish'),
        },
      )
    },
    reset() {
      this.form = mapValues(this.form.search, () => null)
    },
  },
}
</script>
