<template>
  <nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <li>
        <a href="#">Dashboard</a>
      </li>
      <li>
        <dropdown-option dropdown-name="Sample" />
      </li>
      <li>
        <dropdown-option dropdown-name="Sample 2" />
      </li>
      <li>
        <a href="#">Events</a>
      </li>
      <li>
        <a href="#">About</a>
      </li>
      <li>
        <a href="#">Services</a>
      </li>
      <li>
        <a href="#">Contact</a>
      </li>
    </ul>
  </nav>
</template>
<script>

import DropdownOption from '@/Components/Sidebars/DropdownOption';

export default {
  components: {
    DropdownOption,
  },
  data() {
    return {
      isDropdownOpen: false,
    };
  },

  methods: {
    toggleSidebarDropdown: function () {
      this.isDropdownOpen = !this.isDropdownOpen;
    },
  },
};
</script>
