<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.locations.index')"
        :parent-name="$t('location')"
        parent-icon="map-pin"
        :active-name="
          $t('action_model', { action: $t('add'), model: $t('location') })
        "
        active-icon="pen-tool"
      />
    </template>
  </ManageLayout>
</template>

<script>
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'

const components = { ManageLayout, Breadcrumb }

export default {
  name: 'LocationsCreate',
  components,
}
</script>
