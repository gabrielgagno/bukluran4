<template>
  <div
    class="
      container
      d-flex
      flex-column
      align-items-center
      justify-content-center
      centerbox-container
    "
  >
    <div
      class="
        d-flex
        flex-column
        align-items-center
        justify-content-center
        pagename-container
      "
    >
      <div
        class="
          d-flex
          flex-column
          align-items-center
          justify-content-center
          title-container
        "
      >
        <img
          src="img/up-logo.png"
          alt="University of the Philippines seal"
          class="mt-4 mb-4"
          height="100"
          width="100"
        />
        <h1>Bukluran 4</h1>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-4 border-right login-container">
          <h2 class="h3">Login</h2>
          <login-box />
        </div>
        <div class="col-md-8 announcements-container">
            <h2 class="h3">Announcements</h2>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LoginBox from "@/Components/LoginBox";

export default {
  components: {
    LoginBox,
  },
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
  },
};
</script>

<style>
.center-container {
  background-color: red;
}

.centerbox-container {
  background-color: blue;
  margin-top: 10vh;
  width: 100%;
  height: 60%;
  max-width: 80vw;
}

.login-container {
  background-color: green;
}

.announcements-container {
  background-color: chartreuse;
}
</style>
