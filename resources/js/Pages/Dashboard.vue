<template>
  <sidebar-layout>
    <div class="card my-4 shadow-sm">
      <div class="card-body">
        You're logged in!
      </div>
    </div>
  </sidebar-layout>
</template>

<script>
import SidebarLayout from '@/Layouts/SidebarLayout';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated';

export default {
  components: {
    SidebarLayout,
    BreezeAuthenticatedLayout,
  },
}
</script>
