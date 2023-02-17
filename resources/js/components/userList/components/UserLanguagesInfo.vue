<template>
  <div
    class="user-info__languages collapsible"
    :class="{open: activeCollapse}"
    @click="activeCollapse = !activeCollapse"
  >
    <div class="title-wrapper">
      <h5>Foreign Languages</h5>
      <span class="expand-arrow" />
    </div>
    <div class="languages collapse-target">
      <div
        v-for="language in languages"
        :key="language.id"
        class="language"
      >
        <h6>{{ language.name }}</h6>
        <span v-if="language.level">{{ language.level.name }}</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'UserLanguagesInfo',
  props: {
    languages: {
      type: Array,
      default() {
        return [];
      },
    },
  },
  data() {
    return {
      activeCollapse: false,
    };
  },
};
</script>
