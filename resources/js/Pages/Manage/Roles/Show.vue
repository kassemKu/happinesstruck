<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.permissions.index')"
        :parent-name="$t('permissions')"
        parent-icon="grid"
        :active-name="data.display_name"
        :action-href="route('manage.permissions.edit', data.id)"
        :action-name="
          $t('action_model', { model: $t('permission'), action: $t('edit') })
        "
        action-icon="edit"
      />
    </template>
    <div class="htm-page htm-page__permissions-show">
      <div class="card shadow">
        <div class="card-body">
          <h2 class="card-title">{{ data.display_name }}</h2>
          <p>{{ data.description }}</p>
        </div>
      </div>
    </div>
  </ManageLayout>
</template>

<script>
import { reactive } from 'vue'
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'

const components = { ManageLayout, Breadcrumb }

export default {
  name: 'ManagePermissionShow',

  components,

  props: {
    permission: { type: Object, default: () => ({}) },
  },

  setup(props) {
    return { data: reactive(props.permission) }
  },
}
</script>
