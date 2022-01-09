<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :active-name="$t('trucks')"
        active-icon="grid"
        :action-name="
          $t('action_model', { model: $t('truck'), action: $t('add') })
        "
        :action-href="route('manage.trucks.create')"
      />
    </template>
    <div class="htm-page htm-page__trucks-index">
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
                  <th>truck name</th>
                  <th>truck slug</th>
                  <th>created at</th>
                  <th class="text-center">actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-if="trucks.length == 0">
                  no data to view yet!
                </tr>
                <tr v-for="truck in trucks" v-else :key="truck.id">
                  <td>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </td>
                  <td>{{ truck.id }}</td>
                  <td>
                    {{ $i18n.locale === 'ar' ? truck.ar_name : truck.en_name }}
                  </td>
                  <td>
                    {{ $i18n.locale === 'ar' ? truck.ar_slug : truck.en_slug }}
                  </td>
                  <td>{{ truck.created_at }}</td>
                  <td class="w-full flex items-center justify-center">
                    <Link
                      :href="route('manage.trucks.show', truck.id)"
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
                      :href="route('manage.trucks.edit', truck.id)"
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
                    <span v-if="truck.deleted_at">trashed</span>
                    <button
                      v-else
                      class="
                        ht-base-transition
                        btn btn-xs btn-ghost
                        transform
                        hover:bg-transparent hover:scale-125
                      "
                      @click="openConfirmDelete(truck.id)"
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
                  <th>truck name</th>
                  <th>truck slug</th>
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
  <Modal max-width="xl" type="success" @modalAction="deleteTruck" />
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
  name: 'ManagetrucksIndex',

  components,

  props: {
    trucks: {
      type: Array,
      default: () => [],
    },
  },

  setup() {
    let truckTodeleteId = 0
    const store = useStore()

    const isModalOpen = store.state.isModalOpen

    const openConfirmDelete = (truckId) => {
      store.commit('openModal')
      truckTodeleteId = truckId
    }

    const deleteTruck = () => {
      Inertia.delete(route('manage.trucks.destroy', truckTodeleteId), {
        onFinish: () => {
          store.commit('closeModal')

          store.commit('openNotification', {
            title: 'delete producut',
            type: 'success',
            content: 'truck deleted successfully',
          })
        },
      })
    }

    return { openConfirmDelete, isModalOpen, deleteTruck }
  },
}
</script>
