<template>
  <div class="card shadow-sm w-75">
    <div class="card-header">Register</div>
    <div class="card-body">
      <div class="alert alert-danger" role="alert" v-if="$page.props.status">
        {{$page.props.status}}
      </div>
      <!-- select role -->
      <div
        class="d-flex flex-row justify-content-center text-align-center"
        v-if="regStage == 0"
      >
        <span class="h3 mr-2 mb-0" style="line-height: 2">I am a/n... </span>
        <select
          name="sel_role"
          class="form-control form-control-lg w-25"
          v-model="filterForm.selectedRole"
          v-on:change="moveForm('f')"
        >
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
        <span class="h4 mr-2 mb-0" style="line-height: 2"
          >Please enter your {{ stageOneCaption }}:
        </span>
        <form class="form-inline" @submit.prevent="submit">
          <breeze-input
            id="uniqueCode"
            type="text"
            v-model="filterForm.code"
            required
          />
          <breeze-button
            class="ml-4"
            :class="{ '': filterForm.processing }"
            :disabled="filterForm.processing"
          >
            Find
          </breeze-button>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
import GuestLayout from "@/Layouts/GuestLayout";
import BreezeButton from "@/Components/Button";
import BreezeInput from "@/Components/Input";
export default {
  layout: GuestLayout,

  components: {
    BreezeInput,
    BreezeButton,
  },

  props: {
    status: String,
  },

  computed: {
    stageOneCaption: function () {
      var caption = null;
      switch (this.filterForm.selectedRole) {
        case "student":
          caption = "student number";
          break;
        case "faculty":
          caption = "saculty number";
          break;
        case "org":
          caption = "organization code";
          break;
        default:
          caption = "Code";
          break;
      }

      return caption;
    },
  },
  data() {
    return {
      regStage: 0,
      filterForm: this.$inertia.form({
        selectedRole: "",
        code: "",
      }),
    };
  },
  methods: {
    moveForm: function (direction) {
      if (direction == "f") {
        this.regStage++;
      } else {
        this.regStage--;
      }
    },

    submit() {
      this.filterForm.get(this.route("register"));
    },
  },
};
</script>
