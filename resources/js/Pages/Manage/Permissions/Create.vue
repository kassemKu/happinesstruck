<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.permissions.index')"
        :parent-name="$t('permissions')"
        parent-icon="grid"
        :active-name="
          $t('action_model', { action: $t('add'), model: $t('permission') })
        "
        active-icon="pen-tool"
      />
    </template>
    <div class="htm-page htm-page__permissions-create">
      <div class="htm-manage-permission">
        <div class="htm-manage-permission-action">
          <ManageForm
            :form-title="
              $t('action_model', { action: $t('add'), model: $t('permission') })
            "
            :btn-title="
              $t('action_model', { action: $t('add'), model: $t('permission') })
            "
            @formSubmitted="createPermission"
          >
            <TextField
              v-model="form.display_name"
              name="display_name"
              :placeholder="$t('display_name')"
              :label="$t('display_name')"
              :server-error="$page.props.errors.display_name"
            />
            <TextField
              v-model="form.name"
              name="name"
              :placeholder="$t('name')"
              :label="$t('name')"
              :server-error="$page.props.errors.name"
            />
            <HTextarea
              v-model="form.description"
              optional
              name="description"
              :placeholder="$t('description')"
              :label="$t('description')"
              :server-error="$page.props.errors.description"
            />
          </ManageForm>
        </div>
      </div>
    </div>
  </ManageLayout>
</template>

<script>
import { useForm, usePage } from '@inertiajs/inertia-vue3'
import { useStore } from 'vuex'
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'
import TextField from '@/Shared/UI/TextField'
import ManageForm from '@/Shared/Layouts/MForm'
import HTextarea from '@/Shared/UI/HTextarea'
// TODO:: to fix emit checkbox
// import CheckBox from '@/Shared/UI/CheckBox'

const components = {
  ManageLayout,
  Breadcrumb,
  TextField,
  ManageForm,
  HTextarea,
}

export default {
  name: 'ManagePermissionsCreate',
  components,

  setup() {
    const form = useForm('createPermission', {
      name: null,
      display_name: null,
      description: null,
    })
    const page = usePage()
    const store = useStore()

    const createPermission = () => {
      form.post(route('manage.permissions.store'), {
        onStart: () => console.log('Do Something on start'),
        onFinish: () => console.log('Do Something on finish'),
        onError: (errors) => {
          store.commit('openNotification', {
            title: 'something went wrong',
            type: 'error',
            content: errors,
          })
        },
        onSuccess: () => {
          if (
            page.props.value.errors &&
            Object.keys(page.props.value.errors).length === 0
          ) {
            form.reset()
            store.commit('openNotification', {
              title: 'create permission',
              type: 'success',
              content: 'permission created successfully',
            })
          }
        },
      })
    }

    return { form, createPermission }
  },
}
</script>
