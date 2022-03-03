<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :active-name="$t('packages')"
        active-icon="grid"
        :action-name="
          $t('action_model', { model: $t('package'), action: $t('add') })
        "
        :action-href="route('manage.packages.create')"
      />
    </template>
    <div class="htm-page htm-page__packages-index">
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
                  <th>package name</th>
                  <th>package slug</th>
                  <th>created at</th>
                  <th class="text-center">actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-if="packages.length == 0">
                  no data to view yet!
                </tr>
                <tr v-for="pg in packages" v-else :key="pg.id">
                  <td>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </td>
                  <td>{{ pg.id }}</td>
                  <td>
                    {{ $i18n.locale === 'ar' ? pg.ar_name : pg.en_name }}
                  </td>
                  <td>
                    {{ $i18n.locale === 'ar' ? pg.ar_slug : pg.en_slug }}
                  </td>
                  <td>{{ pg.created_at }}</td>
                  <td class="w-full flex items-center justify-center">
                    <Link
                      :href="route('manage.packages.show', pg.id)"
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
                      :href="route('manage.packages.edit', pg.id)"
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
                    <span v-if="pg.deleted_at">trashed</span>
                    <button
                      v-else
                      class="
                        ht-base-transition
                        btn btn-xs btn-ghost
                        transform
                        hover:bg-transparent hover:scale-125
                      "
                      @click="openModel(pg)"
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
                  <th>package name</th>
                  <th>package slug</th>
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
    :show="confirmDeletePackage"
    modal-type="error"
    @close="closeModal"
  >
    <template #title>
      {{
        $i18n.locale === 'ar'
          ? packageToDelete.ar_name
          : packageToDelete.en_name
      }}
    </template>

    <template #content>
      are you sure you want to delete your
      {{
        $i18n.locale === 'ar'
          ? packageToDelete.ar_name
          : packageToDelete.en_name
      }}, OK, you can restore it in 1 month
    </template>

    <template #footer>
      <div class="flex space-x-2">
        <button class="btn btn-sm" @click="closeModal">Cancel</button>

        <button class="btn btn-sm btn-error" @click="deletePackage">
          {{
            $t('action_model', { model: $t('package'), action: $t('delete') })
          }}
        </button>
      </div>
    </template>
  </DialogModal>
</template>

<script>
import { ref } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { useStore } from 'vuex'
import { Link } from '@inertiajs/inertia-vue3'
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'
import SearchFilter from '@/Shared/UI/SearchFilter'
import DialogModal from '@/Shared/UI/DialogModal'

const components = {
  Link,
  ManageLayout,
  Breadcrumb,
  SearchFilter,
  DialogModal,
}

export default {
  name: 'ManagePackagesIndex',

  components,

  props: {
    packages: {
      type: Array,
      default: () => [],
    },
  },

  setup() {
    let packageToDelete = ref(null)
    const confirmDeletePackage = ref(false)
    const store = useStore()

    const openModel = (packg) => {
      packageToDelete.value = packg
      confirmDeletePackage.value = true
    }
    const closeModal = () => {
      confirmDeletePackage.value = false
      packageToDelete.value = null
    }

    const deletePackage = () => {
      Inertia.delete(
        route('manage.packages.destroy', { package: packageToDelete.value.id }),
        {
          onFinish: () => {
            store.commit('closeModal')

            store.commit('openNotification', {
              title: 'delete package',
              type: 'success',
              content: 'package deleted successfully',
            })
          },
        },
      )
    }

    return {
      packageToDelete,
      openModel,
      closeModal,
      deletePackage,
      confirmDeletePackage,
    }
  },
}
</script>
