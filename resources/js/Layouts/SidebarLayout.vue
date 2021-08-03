<template>
  <div id="wrapper" :class="{ toggled: this.sidebarStatus }">
    <nav class="navbar navbar-expand-lg navbar-dark" id="top-nav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <button
            class="btn btn-default"
            id="menu-toggle"
            v-on:click="toggleSidebar()"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
        </li>
      </ul>
      <a
        class="navbar-brand"
        :class="{ toggled: !this.sidebarStatus }"
        id="alternate-branding"
        >Bukluran 4</a
      >
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link">Sign Out</a>
        </li>
      </ul>
    </nav>
    <!-- Sidebar -->
    <nav id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          <a href="#"> Bukluran 4</a>
        </li>
        <li>
          <a href="#">Dashboard</a>
        </li>
        <li>
          <a href="#">Shortcuts</a>
        </li>
        <li>
          <a href="#">Overview</a>
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
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <main id="page-content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <h1>Simple Sidebar</h1>
            <p>
              This template has a responsive menu toggling system. The menu will
              appear collapsed on smaller screens, and will appear non-collapsed
              on larger screens. When toggled using the button below, the menu
              will appear/disappear. On small screens, the page content will be
              pushed off canvas.
            </p>
            <p>
              Make sure to keep all page content within the
              <code>#page-content-wrapper</code>.
            </p>
            <!--button
              class="btn btn-primary"
              id="menu-toggle"
              v-on:click="toggleSidebar()"
            >
              Toggle Menu
            </button-->
          </div>
        </div>
      </div>
    </main>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->
</template>

<script>
import BreezeApplicationLogo from "@/Components/ApplicationLogo";
import BreezeDropdown from "@/Components/Dropdown";
import BreezeDropdownLink from "@/Components/DropdownLink";
import BreezeNavLink from "@/Components/NavLink";

export default {
  components: {
    BreezeApplicationLogo,
    BreezeDropdown,
    BreezeDropdownLink,
    BreezeNavLink,
  },

  data() {
    return {
      showingNavigationDropdown: false,
      sidebarStatus: false, //inverse in big screens
    };
  },

  methods: {
    toggleSidebar: function () {
      this.sidebarStatus = !this.sidebarStatus;
    },
  },
};
</script>

<style>
body {
  overflow-x: hidden;
}

/* Toggle Styles */

#wrapper {
  padding-left: 0;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

#wrapper.toggled {
  padding-left: 250px;
}

#sidebar-wrapper {
  z-index: 1000;
  position: fixed;
  left: 250px;
  top: 0px;
  width: 0;
  height: 100%;
  margin-left: -250px;
  overflow-y: auto;
  background: #391009;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

#wrapper.toggled #sidebar-wrapper {
  width: 250px;
}

#page-content-wrapper {
  width: 100%;
  position: absolute;
  padding: 15px;
}

#wrapper.toggled #page-content-wrapper {
  position: absolute;
  margin-right: -250px;
}

/* Top Nav Styles */
#top-nav {
  background-color: #7b1113;
}

#alternate-branding.toggled {
  display: none;
}

#alternate-branding {
  display: inline-block;
}

/* Sidebar Styles */

.sidebar-nav {
  position: absolute;
  top: 0;
  width: 250px;
  margin: 0;
  padding: 0;
  list-style: none;
}

.sidebar-nav li {
  text-indent: 20px;
  line-height: 40px;
}

.sidebar-nav li a {
  display: block;
  text-decoration: none;
  color: #999999;
}

.sidebar-nav li a:hover {
  text-decoration: none;
  color: #fff;
  background: rgba(255, 255, 255, 0.2);
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
  text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
  height: 65px;
  font-size: 18px;
  line-height: 60px;
}

.sidebar-nav > .sidebar-brand a {
  color: #999999;
}

.sidebar-nav > .sidebar-brand a:hover {
  color: #fff;
  background: none;
}

@media (min-width: 768px) {
  #wrapper {
    padding-left: 250px;
  }

  #wrapper.toggled {
    padding-left: 0;
  }

  #sidebar-wrapper {
    width: 250px;
  }

  #wrapper.toggled #sidebar-wrapper {
    width: 0;
  }

  #page-content-wrapper {
    padding: 20px;
    position: relative;
  }

  #wrapper.toggled #page-content-wrapper {
    position: relative;
    margin-right: 0;
  }
}
</style>
