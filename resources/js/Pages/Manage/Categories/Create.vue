<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parentHref="route('manage.categories.index')"
        :parentName="$t('categories')"
        parentIcon="grid"
        :activeName="
          $t('action_model', { action: $t('add'), model: $t('category') })
        "
        activeIcon="pen-tool"
      />
    </template>
    <div class="ht-page htm-page htm-page__categories-create">
      <div class="htm-manage-section rounded-sm">
        <div class="htm-manage-section-action">
          <ManageForm
            :formTitle="
              $t('action_model', { action: $t('add'), model: $t('category') })
            "
          >
            <TextField
              name="ar_name"
              placeholder="arabic name"
              label="arabic name"
            />
            <TextField
              name="ar_name"
              placeholder="arabic name"
              label="arabic name"
            />
            <TextField
              name="ar_name"
              placeholder="arabic name"
              label="arabic name"
            />
            <TextField
              name="ar_name"
              placeholder="arabic name"
              label="arabic name"
              optional
            />

            <button class="btn btn-block btn-info">
              {{
                $t('action_model', { action: $t('add'), model: $t('category') })
              }}
            </button>
          </ManageForm>
        </div>
      </div>
    </div>
  </ManageLayout>
</template>

<script>
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'
import TextField from '@/Shared/UI/TextField'
import ManageForm from '@/Shared/Layouts/MForm'

const components = { ManageLayout, Breadcrumb, TextField, ManageForm }

export default {
  name: 'ManageCategoryCreate',

  components,
}
</script>
