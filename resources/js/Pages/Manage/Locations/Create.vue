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
export default {
  name: 'LocationsCreate',
}
</script>
