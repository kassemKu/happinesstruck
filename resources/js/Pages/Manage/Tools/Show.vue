<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.tools.index')"
        :parent-name="$t('tools')"
        parent-icon="grid"
        :active-name="$i18n.locale === 'ar' ? tool.ar_name : tool.en_name"
        :action-href="route('manage.tools.edit', tool.id)"
        :action-name="
          $t('action_model', { model: $t('package'), action: $t('edit') })
        "
        action-icon="edit"
      />
    </template>
    <div class="htm-page htm-page__tools-show">
      <div class="flex flex-col space-y-8">
        <div>
          <h2 class="text-xl font-bold capitalize">
            {{ $i18n.locale === 'ar' ? tool.ar_name : tool.en_name }}
          </h2>
          <p class="text-neutral text-opacity-60">
            {{
              $i18n.locale === 'ar'
                ? tool.ar_short_description
                : tool.en_short_description
            }}
          </p>

          <pre>
            {{ tool }}
          </pre>
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
  name: 'ManageToolShow',

  components,

  props: {
    tool: { type: Object, default: () => ({}) },
  },
}
</script>
