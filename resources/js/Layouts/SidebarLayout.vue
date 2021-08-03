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
      <span class="navbar-text">Dashboard</span>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            {{ $page.props.auth.user.username }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <inertia-link :href="route('logout')" method="post" as="button" type="button" class="dropdown-item px-4">
              Sign Out
            </inertia-link>
          </div>
        </li>
      </ul>
    </nav>
    <!-- Sidebar -->
    <authenticated-sidebar />

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
          </div>
        </div>
      </div>
    </main>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->
</template>

<script>
import AuthenticatedSidebar from "@/Components/Sidebars/AuthenticatedSidebar";

export default {
  components: {
    AuthenticatedSidebar,
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

    toggleSidebarDropdown: function () {
      this.isDropdownOpen = !this.isDropdownOpen;
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

.sidebar-dropdown-container {
  display: none;
  padding-left: 8px;
}

.sidebar-dropdown-container.open {
  display: block;
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
