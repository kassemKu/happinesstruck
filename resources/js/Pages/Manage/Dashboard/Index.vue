<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb />
    </template>
    <div class="htm-dashboard-index grid grid-cols-4 gap-6"></div>
  </ManageLayout>
</template>

<script>
import { reactive } from 'vue'
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'
import DashboardCard from '../../../Shared/Layouts/DashboardCard'

const components = { ManageLayout, Breadcrumb, DashboardCard }

export default {
  name: 'ManageDashboard',

  components,
  props: {
    allData: {
      type: Object,
      default: () => ({}),
    },
  },

  setup(props) {
    const data = reactive(Object.entries(props.allData))
    return { data }
  },
}
</script>
