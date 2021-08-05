<template>
  <form @submit.prevent="submit">
    <div class="form-group">
      <label for="email">E-mail</label>
      <input
        type="email"
        name="email"
        id="email"
        class="form-control"
        placeholder="Email"
        autofocus
        v-model="form.email"
      />
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input
        type="password"
        name="password"
        id="password"
        class="form-control"
        placeholder="Password"
        v-model="form.password"
      />
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Login</button>
    </div>
  </form>
</template>
<script>
export default {
  props: {
    canResetPassword: Boolean,
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        email: "",
        password: "",
        remember: false,
      }),
    };
  },

  methods: {
    submit() {
      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? "on" : "",
        }))
        .post(this.route("login"), {
          onFinish: () => this.form.reset("password"),
        });
    },
  },
};
</script>
