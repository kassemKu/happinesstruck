<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :active-name="$t('tools')"
        active-icon="grid"
        :action-name="
          $t('action_model', { model: $t('tool'), action: $t('add') })
        "
        :action-href="route('manage.tools.create')"
      />
    </template>
    <div class="htm-page htm-page__tools-index">
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
                  <th>tool name</th>
                  <th>tool slug</th>
                  <th>created at</th>
                  <th class="text-center">actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-if="tools.length == 0">
                  no data to view yet!
                </tr>
                <tr v-for="tool in tools" v-else :key="tool.id">
                  <td>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </td>
                  <td>{{ tool.id }}</td>
                  <td>
                    {{ $i18n.locale === 'ar' ? tool.ar_name : tool.en_name }}
                  </td>
                  <td>
                    {{ $i18n.locale === 'ar' ? tool.ar_slug : tool.en_slug }}
                  </td>
                  <td>{{ tool.created_at }}</td>
                  <td class="w-full flex tools-center justify-center">
                    <Link
                      :href="route('manage.tools.show', tool.id)"
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
                      :href="route('manage.tools.edit', tool.id)"
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
                    <span v-if="tool.deleted_at">trashed</span>
                    <button
                      v-else
                      class="
                        ht-base-transition
                        btn btn-xs btn-ghost
                        transform
                        hover:bg-transparent hover:scale-125
                      "
                      @click="openConfirmDelete(tool.id)"
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
                  <th>tool name</th>
                  <th>tool slug</th>
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
  <Modal
    max-width="xl"
    :title="`delete tool ?`"
    type="error"
    action-title="delete tool"
    @modalAction="deleteTool"
  >
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae
      temporibus quo impedit?
    </p>
  </Modal>
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
  name: 'ManageToolsIndex',

  components,

  props: {
    tools: {
      type: Array,
      default: () => [],
    },
  },

  setup() {
    let toolToDeleteId = 0
    const store = useStore()

    const isModalOpen = store.state.isModalOpen

    const openConfirmDelete = (packageId) => {
      store.commit('openModal')
      toolToDeleteId = packageId
    }

    const deleteTool = () => {
      Inertia.delete(route('manage.tools.destroy', toolToDeleteId), {
        onFinish: () => {
          store.commit('closeModal')

          store.commit('openNotification', {
            title: 'delete tool',
            type: 'success',
            content: 'package deleted successfully',
          })
        },
      })
    }

    return { openConfirmDelete, isModalOpen, deleteTool }
  },
}
</script>
