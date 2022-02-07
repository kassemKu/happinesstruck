<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :active-name="$t('roles')"
        active-icon="grid"
        :action-name="
          $t('action_model', { model: $t('role'), action: $t('add') })
        "
        :action-href="route('manage.roles.create')"
      />
    </template>
    <div class="htm-page htm-page__roles-index">
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
                  <th>role display name</th>
                  <th>role slug</th>
                  <th>created at</th>
                  <th class="text-center">actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-if="roles.length == 0">
                  no data to view yet!
                </tr>
                <tr v-for="role in data" v-else :key="role.id">
                  <td>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </td>
                  <td>{{ role.id }}</td>
                  <td>
                    {{ role.display_name }}
                  </td>
                  <td>
                    {{ role.name }}
                  </td>
                  <td>{{ role.created_at }}</td>
                  <td class="w-full flex items-center justify-center">
                    <Link
                      :href="route('manage.roles.show', role.id)"
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
                      :href="route('manage.roles.edit', role.id)"
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
                    <span v-if="role.deleted_at">trashed</span>
                    <button
                      v-else
                      class="
                        ht-base-transition
                        btn btn-xs btn-ghost
                        transform
                        hover:bg-transparent hover:scale-125
                      "
                      @click="openConfirmDelete(role)"
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
                  <th>role display name</th>
                  <th>role slug</th>
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
  <DialogModal :show="confirmDeleteRole" modal-type="error" @close="closeModal">
    <template #title>
      {{ roleToDelete.display_name }}
    </template>

    <template #content>
      {{ $t('shore_delete_model', { model: $t('role') }) }}
      <div class="mt-4"></div>
    </template>

    <template #footer>
      <div class="flex space-x-2">
        <button class="btn btn-sm" @click="closeModal">
          {{ $t('cancel') }}
        </button>

        <button class="btn btn-sm btn-error" @click="deleteRole">
          {{
            $t('action_model', {
              model: $t('role'),
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
  name: 'ManageRolesIndex',

  components,

  props: {
    roles: {
      type: Array,
      default: () => [],
    },
  },
  setup(props) {
    let confirmDeleteRole = ref(false)
    let roleToDelete = reactive({})
    const data = reactive(props.roles)

    const openConfirmDelete = (role) => {
      roleToDelete = role
      confirmDeleteRole.value = true
    }

    const closeModal = () => {
      confirmDeleteRole.value = false
      roleToDelete = {}
    }

    const deleteRole = () => {
      Inertia.delete(route('manage.roles.destroy', { role: roleToDelete }), {
        preserveScroll: true,
        onSuccess: () => (confirmDeleteRole.value = false),
        onError: () => (confirmDeleteRole.value = false),
        onFinish: () => (confirmDeleteRole.value = false),
      })
    }

    return {
      data,
      openConfirmDelete,
      confirmDeleteRole,
      roleToDelete,
      closeModal,
      deleteRole,
    }
  },
}
</script>
