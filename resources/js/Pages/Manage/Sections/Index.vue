<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :activeName="$t('sections')"
        activeIcon="grid"
        :actionName="
          $t('action_model', { model: $t('section'), action: $t('add') })
        "
        :actionHref="route('manage.sections.create')"
      />
    </template>
    <div class="htm-page htm-page__sections-index">
      <div class="htm-table-container">
        <div class="htm-searsh-filter"></div>
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
                <tr v-for="section in sections" :key="section.id">
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
                    <button
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
    :show="confirmDeleteSection"
    @close="closeModal"
    modalType="error"
  >
    <template #title>
      {{ $i18n.locale === 'ar' ? form.section.ar_name : form.section.en_name }}
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

const components = { Link, ManageLayout, Breadcrumb, DialogModal }

export default {
  name: 'ManageSectionsIndex',

  components,

  data() {
    return {
      confirmDeleteSection: false,
      form: this.$inertia.form({
        section: {},
      }),
    }
  },

  props: {
    sections: Array,
  },
  methods: {
    openModel(section) {
      this.form.section = section
      this.confirmDeleteSection = true
    },
    closeModal() {
      this.form.section = {}
      this.confirmDeleteSection = false
    },
    deleteSection() {
      this.form.delete(route('manage.sections.destroy', this.form.section), {
        preserveScroll: true,
        onSuccess: () => this.closeModal(),
        onError: () => console.log('do smomthing on error'),
        onFinish: () => console.log('do smomthing on finish'),
      })
    },
  },
}
</script>
