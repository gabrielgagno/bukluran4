<template>
  <div class="container mb-2">
      <div class="row">
        <!-- TODO remove right border in mobile -->
        <div class="col-md-4 border-right login-container style:">
          <h2 class="h3">Login</h2>
          <login-box :canResetPassword="this.canResetPassword" />
          <inertia-link
            v-if="canResetPassword"
            :href="route('password.request')"
            class="text-muted mr-3"
          >
            Forgot your password?
          </inertia-link>
          <inertia-link
            v-if="canRegister"
            :href="route('register')"
            class="text-muted mr-3"
            >Create an Account</inertia-link
          >
        </div>
        <div class="col-md-8 announcements-container">
          <h2 class="h3">Announcements</h2>
          <div>
            <!-- TODO replace with dynamic elements -->
            <announcements-card />
            <announcements-card />
          </div>
        </div>
      </div>
    </div>
</template>

<script>
import LoginBox from "@/Components/LoginBox";
import GuestFooter from "@/Components/GuestFooter";
import GuestLayout from '@/Layouts/GuestLayout';
import AnnouncementsCard from "@/Components/AnnouncementsCard";

export default {
  layout: GuestLayout,
  components: {
    LoginBox,
    GuestFooter,
    GuestLayout,
    AnnouncementsCard,
  },
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    canResetPassword: Boolean,
  },
};
</script>

<style>
.centerbox-container {
  margin-top: 5vh;
  margin-bottom: 10vh;
  width: 100%;
  height: 60%;
  max-width: 80vw;
}

.announcements-container > div {
  overflow-x: hidden;
  overflow-y: scroll;
  max-height: 40vh;
  min-height: 40vh;
}

.border-right {
  border-right: 1px dashed rgb(46, 46, 46);
}
</style>
