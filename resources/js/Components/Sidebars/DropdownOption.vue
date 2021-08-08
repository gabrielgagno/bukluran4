<template>
  <a href="#" class="sidebar-dropdown-btn" v-on:click="toggleSidebarDropdown()">{{ this.dropdownName }}</a>
  <div class="sidebar-dropdown-container" :class="{ open: this.isOpen }">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</template>
<script>
// TODO: make dynamic
export default {
    props: {
        dropdownName: String,
        subMenuObjects: Object,
    },
    data () {
        return {
            isOpen: false,
        }
    },
    methods: {
    toggleSidebarDropdown: function () {
      this.isOpen = !this.isOpen;
    },
  },
}

</script>
