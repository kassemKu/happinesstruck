<template>
  <div class="htm-sidebar-nav-container">
    <nav class="htm-sidebar-nav h-screen overflow-y-auto ht-scrollbar">
      <div class="mt-24">
        <ManageSideNavGroup>
          <ManageSideNavLink name="dashboard" :href="'/'" active>
            <template #icon>
              <Dashboard24 />
            </template>
          </ManageSideNavLink>
        </ManageSideNavGroup>
        <ManageSideNavGroup groupTitle="users management">
          <template #groupIcon>
            <Identification24 />
          </template>
          <ManageSideNavLink name="permissions" :href="'/'">
            <template #icon>
              <Password24 />
            </template>
          </ManageSideNavLink>
          <ManageSideNavLink name="roles" :href="'/'">
            <template #icon>
              <Function24 />
            </template>
          </ManageSideNavLink>
          <ManageSideNavLink name="admins" :href="'/'">
            <template #icon>
              <UserSpeaker24 />
            </template>
          </ManageSideNavLink>
          <ManageSideNavLink name="customers" :href="'/'">
            <template #icon>
              <UserCertification24 />
            </template>
          </ManageSideNavLink>
        </ManageSideNavGroup>
        <ManageSideNavGroup groupTitle="products management">
          <template #groupIcon>
            <Store24 />
          </template>
          <ManageSideNavLink name="products" :href="'/'">
            <template #icon>
              <Product24 />
            </template>
          </ManageSideNavLink>
          <ManageSideNavLink name="orders" :href="'/'">
            <template #icon>
              <ShoppingCartArrowDown24 />
            </template>
          </ManageSideNavLink>
          <ManageSideNavLink name="warehouses" :href="'/'">
            <template #icon>
              <DataReference24 />
            </template>
          </ManageSideNavLink>
        </ManageSideNavGroup>
        <ManageSideNavGroup groupTitle="packages management">
          <template #groupIcon>
            <Delivery24 />
          </template>
          <ManageSideNavLink name="packages" :href="'/'">
            <template #icon>
              <DeliveryParcel24 />
            </template>
          </ManageSideNavLink>
          <ManageSideNavLink name="bookings" :href="'/'">
            <template #icon>
              <EventSchedule24 />
            </template>
          </ManageSideNavLink>
        </ManageSideNavGroup>
        <ManageSideNavGroup groupTitle="site settings">
          <template #groupIcon>
            <Settings24 />
          </template>
          <ManageSideNavLink name="general settings" :href="'/'">
            <template #icon>
              <Tools24 />
            </template>
          </ManageSideNavLink>
          <ManageSideNavLink name="pages" :href="'/'">
            <template #icon>
              <Book24 />
            </template>
          </ManageSideNavLink>
        </ManageSideNavGroup>
      </div>
    </nav>
  </div>
</template>

<script>
import ManageSideNavGroup from '@/Shared/Layouts/MNavGroup'
import ManageSideNavLink from '@/Shared/Partials/MSideNavLink.vue'

const components = { ManageSideNavGroup, ManageSideNavLink }

export default {
  name: 'ManageSidenav',

  components,
}
</script>
