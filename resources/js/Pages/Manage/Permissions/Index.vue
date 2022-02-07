<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :active-name="$t('permissions')"
        active-icon="grid"
        :action-name="
          $t('action_model', { model: $t('permission'), action: $t('add') })
        "
        :action-href="route('manage.permissions.create')"
      />
    </template>
    <div class="htm-page htm-page__permissions-index">
      <div class="htm-table-container flex flex-col space-y-8">
        <div class="htm-table">
          <div class="overflow-x-auto ht-scrollbar rounded-box">
            <table class="table w-full">
              <thead>
                <tr>
                  <th>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </th>
                  <th>ID</th>
                  <th>permission display name</th>
                  <th>permission slug</th>
                  <th>created at</th>
                  <th class="text-center">actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-if="permissions.length == 0">
                  no data to view yet!
                </tr>
                <tr
                  v-for="permission in permissions"
                  v-else
                  :key="permission.id"
                >
                  <td>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </td>
                  <td>{{ permission.id }}</td>
                  <td>
                    {{ permission.display_name }}
                  </td>
                  <td>
                    {{ permission.name }}
                  </td>
                  <td>{{ permission.created_at }}</td>
                  <td class="w-full flex items-center justify-center">
                    <Link
                      :href="route('manage.permissions.show', permission.id)"
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
                      :href="route('manage.permissions.edit', permission.id)"
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
                    <span v-if="permission.deleted_at">trashed</span>
                    <button
                      v-else
                      class="
                        ht-base-transition
                        btn btn-xs btn-ghost
                        transform
                        hover:bg-transparent hover:scale-125
                      "
                      @click="openConfirmDelete(permission)"
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
                  <th>permission display name</th>
                  <th>permission slug</th>
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
    :show="confirmDeletePermission"
    modal-type="error"
    @close="closeModal"
  >
    <template #title>
      {{ permissionToDelete.display_name }}
    </template>

    <template #content>
      {{ $t('shore_delete_model', { model: $t('permission') }) }}
      <div class="mt-4"></div>
    </template>

    <template #footer>
      <div class="flex space-x-2">
        <button class="btn btn-sm" @click="closeModal">
          {{ $t('cancel') }}
        </button>

        <button class="btn btn-sm btn-error" @click="deletePermission">
          {{
            $t('action_model', {
              model: $t('permission'),
              action: $t('delete'),
            })
          }}
        </button>
      </div>
    </template>
  </DialogModal>
</template>

<script>
import { ref, reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { Link } from '@inertiajs/inertia-vue3'
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'
import DialogModal from '@/Shared/UI/DialogModal'

const components = {
  Link,
  ManageLayout,
  Breadcrumb,
  DialogModal,
}

export default {
  name: 'ManagePermissionsIndex',

  components,

  props: {
    permissions: {
      type: Array,
      default: () => [],
    },
  },
  setup() {
    let confirmDeletePermission = ref(false)
    let permissionToDelete = reactive({})

    const openConfirmDelete = (permission) => {
      confirmDeletePermission.value = true
      permissionToDelete = permission
    }

    const closeModal = () => {
      confirmDeletePermission.value = false
      permissionToDelete = {}
    }

    const deletePermission = () => {
      Inertia.delete(
        route('manage.permissions.destroy', { permission: permissionToDelete }),
        {
          preserveScroll: true,
          onSuccess: () => (confirmDeletePermission.value = false),
          onError: () => (confirmDeletePermission.value = false),
          onFinish: () => (confirmDeletePermission.value = false),
        },
      )
    }

    return {
      openConfirmDelete,
      confirmDeletePermission,
      permissionToDelete,
      closeModal,
      deletePermission,
    }
  },
}
</script>
