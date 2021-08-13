<template>
  <div class="card shadow-sm w-75 px-3">
    <div class="card-body">
      <div class="mb-3 small text-muted">
        Thank you for signing up to Bukluran! Before you can use the system,
        please verify your email by clicking the link we sent to your email
        during registration. If you lost the link for some reason, click "Resend
        Verification."
      </div>

      <div class="alert alert-success" role="alert" v-if="verificationLinkSent">
        A new verification link has been sent to the email address you provided
        during registration.
      </div>

      <form @submit.prevent="submit">
        <div class="mt-4 d-flex justify-content-between">
          <breeze-button
            :class="{ 'btn-primary': form.processing }"
            :disabled="form.processing"
          >
            Resend Verification Email
          </breeze-button>

          <inertia-link
            :href="route('logout')"
            method="post"
            as="button"
            class="btn btn-link"
            >Log out</inertia-link
          >
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import BreezeButton from "@/Components/Button";
import BreezeGuestLayout from "@/Layouts/GuestLayout";

export default {
  layout: BreezeGuestLayout,

  components: {
    BreezeButton,
  },

  props: {
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form(),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("verification.send"));
    },
  },

  computed: {
    verificationLinkSent() {
      return this.status === "verification-link-sent";
    },
  },
};
</script>
