<template>
  <div class="user-info__skills">
    <div class="skills">
      <span
        v-for="skill in skillsToShow"
        :key="skill.id"
      >
        {{ skill.name }}
      </span>
      <input
        v-if="displayShowAllButton"
        class="span"
        type="button"
        :value="showedAll ? 'Hide' : 'Show all'"
        @click="recountSkillsToShow"
      >
    </div>
  </div>
</template>

<script>
export default {
  name: 'UserSkillsInfo',
  props: {
    skills: {
      type: Array,
      default() {
        return [];
      },
    },
  },
  data() {
    return {
      countToShow: 4,
      skillsToShow: [],
      displayShowAllButton: true,
      showedAll: false,
    };
  },
  mounted() {
    this.displayShowAllButton = this.skills.length > this.countToShow;
    this.skillsToShow = this.skills.slice(0, this.countToShow);
  },
  methods: {
    recountSkillsToShow() {
      this.skillsToShow = this.showedAll
        ? this.skills.slice(0, this.countToShow)
        : this.skills;
      this.showedAll = !this.showedAll;
    },
  },
};
</script>
