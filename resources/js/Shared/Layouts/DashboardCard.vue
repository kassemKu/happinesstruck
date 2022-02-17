<template>
  <div class="htm-dashboard-card">
    <div class="flex flex-col px-2 py-4 border-t-4 border-green-700 shadow-md">
      <icon
        class="text-green-700 w-6 h-6 flex items-start justify-start"
        icon="bx:bxs-user"
      ></icon>
      <div class="flex flex-col py-2 items-center justify-center">
        <p class="font-semibold">3</p>
        <p class="uppercase text-blue-400">users</p>
      </div>
      <div class="flex flex-col items-start justify-center">
        <div class="flex items-center justify-start text-xs">
          <p class="text-gray-400">last update at:</p>
          <p class="font-semibold">date</p>
        </div>
        <div class="flex items-center justify-start text-xs">
          <p class="text-gray-400">the action</p>
          <p class="font-semibold">the action</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'DashboardCard',
}
</script>
