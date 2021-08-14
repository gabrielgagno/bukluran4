<template>
  <div class="card shadow-sm w-75 px-3">
    <div class="card-body">
      <!-- select role -->
      <div
        class="d-flex flex-row justify-content-center text-align-center"
        v-if="regStage == 0"
      >
        <span class="h2">I am a/n... </span>
        <select name="sel_role" class="form-control form-control-lg w-25" v-model="selectedRole" v-on:change="moveForm('f')">
          <option value="student">Student</option>
          <option value="org">Organization</option>
          <option value="faculty">Faculty</option>
        </select>
      </div>
      <!-- component for search unique code -->
      <div
        class="d-flex flex-row justify-content-center text-align-center"
        v-if="regStage == 1"
      >
        <span class="h2">Please enter your {{ stageOneCaption }}: </span>
      </div>
      <!-- reg form -->
      <breeze-validation-errors class="mb-3" />

      <form @submit.prevent="submit" v-if="regStage == 2">
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
  },

  data() {
    return {
      regStage: 0,
      selectedRole: null,
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
  computed: {
    stageOneCaption: function () {
      var caption = null;
      switch(this.selectedRole) {
        case 'student':
          caption = 'Student Number';
          break;
        case 'faculty':
          caption = 'Faculty Number';
          break;
        case 'org':
          caption = 'Organization Code';
          break;
        default:
          caption = 'Code';
          break;
      }

      return caption;
    }
  },
  methods: {
    moveForm: function (direction) {
      alert(this.selectedRole);
      if(direction == 'f') {
        this.regStage++;
      } else {
        this.regStage--;
      }
    },
    submit() {
      this.form.post(this.route("register"), {
        onFinish: () => this.form.reset("password", "password_confirmation"),
      });
    },
  },
};
</script>
