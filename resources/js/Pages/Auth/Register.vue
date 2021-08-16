<template>
  <div class="card shadow-sm w-75">
    <div class="card-header">Register</div>
    <div class="card-body">
      <!-- reg form -->
      <breeze-validation-errors class="mb-3" />
      <div class="d-flex flex-row justify-content-center">
        <span v-if="role == 'org'" class="h5 mr-2">Organization Name</span>
        <span v-else class="h5 mr-2">Name:</span>
        <span v-if="role == 'org'" class="h5">{{ userable.name }}</span>
        <span v-else class="h5"
          >{{ userable.first_name }} {{ userable.last_name }}</span
        >
      </div>
      <form @submit.prevent="submit">
        <div class="form-group">
          <breeze-label for="role" value="Role" />
          <select class="form-control form-control-md" v-model="form.role">
            <option v-for="role in roles" :key="role.id" :value="role.id">
              {{ role.name }}
            </option>
          </select>
        </div>
        <div class="form-group">
          <breeze-label for="email" value="Email" />
          <breeze-input id="email" type="email" v-model="form.email" required />
        </div>

        <div class="form-group">
          <breeze-label for="username" value="Username" />
          <breeze-input
            id="username"
            type="text"
            v-model="form.username"
            required
          />
        </div>

        <div class="form-group">
          <breeze-label for="password" value="Password" />
          <breeze-input
            id="password"
            type="password"
            v-model="form.password"
            required
            autocomplete="new-password"
          />
        </div>

        <div class="form-group">
          <breeze-label for="password_confirmation" value="Confirm Password" />
          <breeze-input
            id="password_confirmation"
            type="password"
            v-model="form.password_confirmation"
            required
            autocomplete="new-password"
          />
        </div>

        <div
          class="form-group"
          v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature"
        >
          <div class="custom-control custom-checkbox">
            <breeze-checkbox
              name="terms"
              id="terms"
              v-model:checked="form.terms"
            />

            <label class="custom-control-label" for="terms">
              I agree to the
              <a target="_blank" :href="route('terms.show')"
                >Terms of Service</a
              >
              and
              <a target="_blank" :href="route('policy.show')">Privacy Policy</a>
            </label>
          </div>
        </div>

        <div class="mb-0">
          <div class="d-flex justify-content-end align-items-baseline">
            <inertia-link
              :href="route('login')"
              class="text-muted mr-3 text-decoration-none"
            >
              Already registered?
            </inertia-link>

            <breeze-button
              class="ml-4"
              :class="{ 'text-white-50': form.processing }"
              :disabled="form.processing"
            >
              Register
            </breeze-button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import BreezeButton from "@/Components/Button";
import BreezeCheckbox from "@/Components/Checkbox";
import GuestLayout from "@/Layouts/GuestLayout";
import BreezeInput from "@/Components/Input";
import BreezeLabel from "@/Components/Label";
import BreezeValidationErrors from "@/Components/ValidationErrors";

export default {
  layout: GuestLayout,

  components: {
    BreezeButton,
    BreezeCheckbox,
    BreezeInput,
    BreezeLabel,
    BreezeValidationErrors,
  },

  props: {
    roles: Object,
    role: String,
    userable: Object,
  },

  data() {
    return {
      form: this.$inertia.form({
        role: null,
        username: "",
        email: "",
        password: "",
        password_confirmation: "",
        terms: false,
      }),
    };
  },
  methods: {
    submit() {
      this.form.post(this.route("register"), {
        onFinish: () => this.form.reset("password", "password_confirmation"),
      });
    },
  },
};
</script>
