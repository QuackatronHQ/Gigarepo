<template>
  <Tutorial />
</template>

<script>
export default {
  /** require-head-as-head */
  head: {
    title: "My page",
  },

  /** no-globals-in-created */
  created() {
    window.name = "joe";
  },

  asyncData(context) {
    /** no-env-in-context */
    if (context.isServer) {
      const data = "city1";
    }

    /** no-this-in-fetch-data */
    if (this.$route.path === "name") {
    }

    /** no-timing-in-fetch-data */
    let name = "joe";
    setTimeout(() => {
      name = "baz";
    }, 0);
  },
  fetch({ isClient }) {
    /** no-env-in-context */
    if (isClient) {
      const data = "city1";
    }

    /** no-timing-in-fetch-data */
    let name = "joe";
    setInterval(() => {
      name = "smith";
    }, 0);
  },

  mounted() {
    /** no-env-in-hooks */
    if (process.server) {
      const city = "NYC";
    }
  },
  beforeMount() {
    /** no-env-in-hooks */
    if (process.client) {
      const city = "NYC";
    }
  },
  beforeDestroy() {
    /** no-env-in-hooks */
    if (process.browser) {
      const city = "NYC";
    }
  },
};
</script>
