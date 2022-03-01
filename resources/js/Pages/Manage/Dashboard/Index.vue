<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :active-name="$t('dashboard')"
        active-icon="grid"
        :action-name="
          $t('action_model', { model: $t('dashboard'), action: $t('add') })
        "
      />
    </template>

    <!-- :action-href="route('manage.dashboard.create')" -->

    <div class="flex flex-col px-2 py-4 border-t-4 border-green-700 shadow-md">
      <VueFeather
        class="text-green-700 w-6 h-6 flex items-start justify-start"
        type="user"
      />
      <div class="flex flex-col py-2 items-center justify-center">
        <p class="font-semibold">{{ data.users }}</p>
        <p class="uppercase text-blue-400">users</p>
      </div>
      <div class="flex flex-col items-start justify-center">
        <div class="flex items-center justify-start text-xs">
          <p class="text-gray-400">last update at:</p>
          <p class="font-semibold">date</p>
        </div>
        <div class="flex items-center justify-start text-xs">
          <p class="text-gray-400">the action:</p>
          <p class="font-semibold">the action</p>
        </div>
      </div>
    </div>

    <div class="flex flex-col px-2 py-4 border-t-4 border-green-700 shadow-md">
      <VueFeather
        class="text-green-700 w-6 h-6 flex items-start justify-start"
        type="user"
      />
      <div class="flex flex-col py-2 items-center justify-center">
        <p class="font-semibold">{{ data.orders }}</p>
        <p class="uppercase text-blue-400">orders</p>
      </div>
      <div class="flex flex-col items-start justify-center">
        <div class="flex items-center justify-start text-xs">
          <p class="text-gray-400">last update at:</p>
          <p class="font-semibold">date</p>
        </div>
        <div class="flex items-center justify-start text-xs">
          <p class="text-gray-400">the action:</p>
          <p class="font-semibold">the action</p>
        </div>
      </div>
    </div>

    <div class="flex flex-col px-2 py-4 border-t-4 border-green-700 shadow-md">
      <VueFeather
        class="text-green-700 w-6 h-6 flex items-start justify-start"
        type="user"
      />
      <div class="flex flex-col py-2 items-center justify-center">
        <p class="font-semibold">{{ data.categories }}</p>
        <p class="uppercase text-blue-400">categories</p>
      </div>
      <div class="flex flex-col items-start justify-center">
        <div class="flex items-center justify-start text-xs">
          <p class="text-gray-400">last update at:</p>
          <p class="font-semibold">date</p>
        </div>
        <div class="flex items-center justify-start text-xs">
          <p class="text-gray-400">the action:</p>
          <p class="font-semibold">the action</p>
        </div>
      </div>
    </div>

    <div class="flex flex-col px-2 py-4 border-t-4 border-green-700 shadow-md">
      <VueFeather
        class="text-green-700 w-6 h-6 flex items-start justify-start"
        type="user"
      />
      <div class="flex flex-col py-2 items-center justify-center">
        <p class="font-semibold">{{ data.products }}</p>
        <p class="uppercase text-blue-400">products</p>
      </div>
      <div class="flex flex-col items-start justify-center">
        <div class="flex items-center justify-start text-xs">
          <p class="text-gray-400">last update at:</p>
          <p class="font-semibold">date</p>
        </div>
        <div class="flex items-center justify-start text-xs">
          <p class="text-gray-400">the action:</p>
          <p class="font-semibold">the action</p>
        </div>
      </div>
    </div>

    <div class="flex flex-col px-2 py-4 border-t-4 border-green-700 shadow-md">
      <VueFeather
        class="text-green-700 w-6 h-6 flex items-start justify-start"
        type="user"
      />
      <div class="flex flex-col py-2 items-center justify-center">
        <p class="font-semibold">{{ data.packages }}</p>
        <p class="uppercase text-blue-400">packages</p>
      </div>
      <div class="flex flex-col items-start justify-center">
        <div class="flex items-center justify-start text-xs">
          <p class="text-gray-400">last update at:</p>
          <p class="font-semibold">date</p>
        </div>
        <div class="flex items-center justify-start text-xs">
          <p class="text-gray-400">the action:</p>
          <p class="font-semibold">the action</p>
        </div>
      </div>
    </div>

    <div class="flex flex-col px-2 py-4 border-t-4 border-green-700 shadow-md">
      <VueFeather
        class="text-green-700 w-6 h-6 flex items-start justify-start"
        type="user"
      />
      <div class="flex flex-col py-2 items-center justify-center">
        <p class="font-semibold">{{ data.bookings }}</p>
        <p class="uppercase text-blue-400">bookings</p>
      </div>
      <div class="flex flex-col items-start justify-center">
        <div class="flex items-center justify-start text-xs">
          <p class="text-gray-400">last update at:</p>
          <p class="font-semibold">date</p>
        </div>
        <div class="flex items-center justify-start text-xs">
          <p class="text-gray-400">the action:</p>
          <p class="font-semibold">the action</p>
        </div>
      </div>
    </div>
    <!-- <pre> {{data.products}} </pre> -->
  </ManageLayout>
</template>

<script>
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'

const components = {
  ManageLayout,
  Breadcrumb,
}

export default {
  name: 'ManageDashboard',

  components,
  props: {
    data: {
      type: Array,
      default: () => [],
    },
  },
  setup(props) {
    const dataDb = Object.entries(props.data)
    return {
      dataDb,
    }
  },
}
</script>
