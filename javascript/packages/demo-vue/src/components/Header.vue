<template>
  <div
    ref="header"
    v-for="item in items"
    v-model="headerData"
    v-if="!visible"
    is="header"
    @click="functionCall"
    v-bind:foo="'bar'"
    :class="[{ 'foo': isFoo }, { 'bar': isBar }]"
    v-html="someHTML"
  >
    <div v-for="item in navItems">{{item.name}}</div>
  </div>
  <div>{{title}}</div>
</template>

<script>
import { ref } from 'vue'

export default {
  name: "header",
  setup({ headerContent }) {
    return () => {
      const visitors = ref(0)
      visitors++
      return h('div', headerContent)
    }
  },
  data: {
    title: "DeepSource",
  }
};
</script>
