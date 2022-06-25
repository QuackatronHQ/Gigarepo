<template>
  <div
    ref="header"
    v-for="item in items"
    v-once
    id="uniqueID"
    v-model="headerData"
    my-prop="prop"
    v-if="!visible"
    is="header"
    @click="functionCall"
    v-text="textContent"
  ></div>
  <div v-bind:foo="'bar'" />
</template>

<script>
export default {
  name: "header",
  data() {
    return {
      msg: "Welcome to DeepSource Demo Vue",
    };
  },
  props: {
    myProp: "Number",
    anotherProp: ["Number", "String"],
    myFieldWithBadType: {
      type: "Object",
      default: function () {
        return {};
      },
    },
    myOtherFieldWithBadType: {
      type: "Number",
      default: 1,
    },
  },
};
</script>
