<template>
  <nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <li class="sidebar-brand">
        <a href="#"> Bukluran 4</a>
      </li>
      <li>
        <a href="#">Dashboard</a>
      </li>
      <li>
        <a
          href="#"
          class="sidebar-dropdown-btn"
          v-on:click="toggleSidebarDropdown()"
          >Dropdown</a
        >
        <div
          class="sidebar-dropdown-container"
          :class="{ open: this.isDropdownOpen }"
        >
          <a href="#">Link 1</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
      </li>
      <li>
        <a href="#" class="sidebar-dropdown-btn">Dropdown 2</a>
        <div class="sidebar-dropdown-container">
          <a href="#">Link 1</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
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
export default {
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
