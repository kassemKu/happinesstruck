<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.trucks.index')"
        :parent-name="$t('trucks')"
        parent-icon="grid"
        :active-name="$i18n.locale === 'ar' ? truck.ar_name : truck.en_name"
        :action-href="route('manage.trucks.edit', truck.id)"
        :action-name="
          $t('action_model', { model: $t('truck'), action: $t('edit') })
        "
        action-icon="edit"
      />
    </template>
    <div class="htm-page htm-page__trucks-show">
      <div class="flex flex-col space-y-8">
        <div>
          <pre>{{ truck }}</pre>
        </div>
      </div>
    </div>
  </ManageLayout>
</template>

<script>
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'

const components = { ManageLayout, Breadcrumb }

export default {
  name: 'ManageTruckShow',

  components,

  props: {
    truck: { type: Object, default: () => ({}) },
  },
}
</script>
