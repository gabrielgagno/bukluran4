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
    <!-- pagename-container -->
    <div
      class="
        d-flex
        flex-column
        align-items-center
        justify-content-center
        pagename-container
      "
    >
      <!-- title-container -->
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
        <h1 class="mb-4">Bukluran 4</h1>
      </div>
    </div>
    <!-- slot -->
    <slot />
  </div>
  <guest-footer />
</template>

<script>
import GuestFooter from "@/Components/GuestFooter";

export default {
  components: {
    GuestFooter,
  },
};
</script>

<style>
.centerbox-container {
  margin-top: 5vh;
  margin-bottom: 13vh;
  width: 100%;
  height: 60%;
  max-width: 80vw;
}
</style>
