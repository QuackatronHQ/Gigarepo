<template>
  <div class="container">
    <h3 class="p-3 text-center">Pricing</h3>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Plan name</th>
          <th>No. of users</th>
          <th>Custom domain</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="plan in plans">
          <td>{{ plan.name }}</td>
          <td>{{ plan.userCount }}</td>
          <td>{{ plan.customDomain }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      users: [
        { id: 1, name: "Starter", userCount: 10, customDomain: "No" },
        { id: 2, name: "Business", userCount: 100, customDomain: "Yes" },
        { id: 3, name: "Enterprise", userCount: 500, customDomain: "Yes" },
      ],
    };
  },

  props: {
    mode: "Number",
    count: ["Number", "String"],
    userSettings: {
      type: "Object",
      default: function () {
        return {};
      },
    },
    isLoggedIn: {
      type: Boolean,
      default: true,
    },
  },
};
</script>
