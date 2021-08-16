<template>
  <div class="card shadow-sm w-50">
    <div class="card-header">Log In</div>
    <div class="card-body">

    <breeze-validation-errors class="mb-3" />

    <div v-if="status" class="alert alert-success mb-3 rounded-0" role="alert">
      {{ status }}
    </div>
    <login-box :canResetPassword="this.canResetPassword" />
  </div>
  </div>
</template>

<script>
import BreezeButton from '@/Components/Button';
import GuestLayout from "@/Layouts/GuestLayout";
import BreezeInput from '@/Components/Input';
import BreezeCheckbox from '@/Components/Checkbox';
import LoginBox from '@/Components/LoginBox';
import BreezeLabel from '@/Components/Label';
import BreezeValidationErrors from '@/Components/ValidationErrors';

export default {
  layout: GuestLayout,

  components: {
    LoginBox,
    BreezeButton,
    BreezeInput,
    BreezeCheckbox,
    BreezeLabel,
    BreezeValidationErrors
  },

  props: {
    canResetPassword: Boolean,
    status: String
  },

  data() {
    return {
      form: this.$inertia.form({
        email: '',
        password: '',
        remember: false
      })
    }
  },

  methods: {
    submit() {
      this.form
          .transform(data => ({
            ... data,
            remember: this.form.remember ? 'on' : ''
          }))
          .post(this.route('login'), {
            onFinish: () => this.form.reset('password'),
          })
    }
  }
}
</script>
