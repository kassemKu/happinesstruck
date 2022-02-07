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
              $t('action_model', {
                action: $t('update'),
                model: $t('permission'),
              })
            "
            :btn-title="
              $t('action_model', {
                action: $t('update'),
                model: $t('permission'),
              })
            "
            @formSubmitted="updatePermission"
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
  name: 'ManagePermissionsUpdate',
  components,
  props: {
    permission: { type: Object, default: () => ({}) },
  },

  setup(props) {
    const form = useForm('updatePermission', {
      name: props.permission.display_name,
      display_name: props.permission.name,
      description: props.permission.description,
    })
    const page = usePage()
    const store = useStore()

    const updatePermission = () => {
      form.put(route('manage.permissions.update', props.permission.id), {
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
              title: 'update permission',
              type: 'success',
              content: 'permission updated successfully',
            })
          }
        },
      })
    }

    return { form, updatePermission }
  },
}
</script>
