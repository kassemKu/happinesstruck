<template>
  <div class="htm-sidebar-nav-container">
    <nav class="htm-sidebar-nav h-screen overflow-y-auto ht-scrollbar">
      <div class="mt-24">
        <ManageSideNavGroup>
          <ManageSideNavLink
            :name="$t('dashboard')"
            :href="route('manage.dashboard')"
            :active="$page.url.includes('manage/dashboard')"
          >
            <template #icon>
              <Dashboard24 />
            </template>
          </ManageSideNavLink>
        </ManageSideNavGroup>
        <ManageSideNavGroup
          :group-title="$t('model_management', { model: $t('users') })"
        >
          <template #groupIcon>
            <Identification24 class="w-7 h-7" />
          </template>
          <ManageSideNavLink :name="$t('permissions')" :href="'/'">
            <template #icon>
              <Password24 />
            </template>
          </ManageSideNavLink>
          <ManageSideNavLink :name="$t('roles')" :href="'/'">
            <template #icon>
              <Function24 />
            </template>
          </ManageSideNavLink>
          <ManageSideNavLink :name="$t('admins')" :href="'/'">
            <template #icon>
              <UserSpeaker24 />
            </template>
          </ManageSideNavLink>
          <ManageSideNavLink :name="$t('customers')" :href="'/'">
            <template #icon>
              <UserCertification24 />
            </template>
          </ManageSideNavLink>
        </ManageSideNavGroup>
        <ManageSideNavGroup
          :group-title="$t('model_management', { model: $t('products') })"
        >
          <template #groupIcon>
            <Store24 class="w-7 h-7" />
          </template>
          <ManageSideNavLink
            :name="$t('sections')"
            :href="route('manage.sections.index')"
            :active="$page.url.includes('manage/sections')"
          >
            <template #icon>
              <Category24 />
            </template>
          </ManageSideNavLink>
          <ManageSideNavLink
            :name="$t('categories')"
            :href="route('manage.categories.index')"
            :active="$page.url.includes('manage/categories')"
          >
            <template #icon>
              <Categories24 />
            </template>
          </ManageSideNavLink>
          <ManageSideNavLink
            :name="$t('products')"
            :href="route('manage.products.index')"
            :active="$page.url.includes('manage/products')"
          >
            <template #icon>
              <Product24 />
            </template>
          </ManageSideNavLink>
          <ManageSideNavLink :name="$t('suppliers')" :href="'/'">
            <template #icon>
              <Collaborate24 />
            </template>
          </ManageSideNavLink>
          <ManageSideNavLink :name="$t('orders')" :href="'/'">
            <template #icon>
              <ShoppingCartArrowDown24 />
            </template>
          </ManageSideNavLink>
          <ManageSideNavLink :name="$t('warehouses')" :href="'/'">
            <template #icon>
              <DataReference24 />
            </template>
          </ManageSideNavLink>
        </ManageSideNavGroup>
        <ManageSideNavGroup
          :group-title="$t('model_management', { model: $t('packages') })"
        >
          <template #groupIcon>
            <DeliveryParcel24 class="w-7 h-7" />
          </template>
          <ManageSideNavLink
            :name="$t('trucks')"
            :href="route('manage.trucks.index')"
          >
            <template #icon>
              <Delivery24 />
            </template>
          </ManageSideNavLink>
          <ManageSideNavLink
            :name="$t('packages')"
            :href="route('manage.packages.index')"
          >
            <template #icon>
              <DeliveryParcel24 />
            </template>
          </ManageSideNavLink>
          <ManageSideNavLink
            :name="$t('tools')"
            :href="route('manage.tools.index')"
          >
            <template #icon>
              <Category24 />
            </template>
          </ManageSideNavLink>
          <ManageSideNavLink :name="$t('bookings')" :href="'/'">
            <template #icon>
              <EventSchedule24 />
            </template>
          </ManageSideNavLink>
        </ManageSideNavGroup>
        <ManageSideNavGroup :group-title="$t('site_settings')">
          <template #groupIcon>
            <Settings24 class="w-7 h-7" />
          </template>
          <ManageSideNavLink :name="$t('site_settings')" :href="'/'">
            <template #icon>
              <Tools24 />
            </template>
          </ManageSideNavLink>
          <ManageSideNavLink
            :name="$t('banners')"
            :href="route('manage.banners.index')"
            :active="$page.url.includes('manage/banners')"
          >
            <template #icon>
              <Bullhorn24 />
            </template>
          </ManageSideNavLink>
          <ManageSideNavLink :name="$t('pages')" :href="'/'">
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
import ManageSideNavLink from '@/Shared/Partials/MSideNavLink'

const components = { ManageSideNavGroup, ManageSideNavLink }

export default {
  name: 'ManageSidenav',

  components,
}
</script>
