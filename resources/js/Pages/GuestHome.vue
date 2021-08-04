<template>
  <div class="container d-flex flex-column align-items-center justify-content-center center-container">
      <div class="d-flex flex-column align-items-center justify-content-center pagename-container">
          <img src="img/up-logo.png" alt="University of the Philippines seal" class="img-fluid " />
      </div>
      <div></div>
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
  background-color:red;
}

.pagename-container {
    background-color: blue;
    margin-top: 10vh;
    margin-bottom: 10vh;
    max-height: 40vh;
}
</style>
