<template>
  <div
    class="user-info__resumes collapsible"
    :class="{open: activeCollapse}"
    @click="activeCollapse = !activeCollapse"
  >
    <div class="title-wrapper">
      <h5>CV instances</h5>
      <span class="expand-arrow" />
    </div>
    <div class="resumes collapse-target">
      <div
        v-for="resume in resumes"
        :key="resume.id"
        class="resume"
      >
        <h6>
          <router-link :to="{ name: 'resume', params: { resumeId: resume.id } }">
            {{ resume.title }}
          </router-link>
        </h6>
        <span>Modified at {{ dateTime(resume.updated_at) }}</span>
      </div>
    </div>
  </div>
</template>

<script>
// import moment from 'moment';

export default {
  name: 'UserResumeListInfo',
  props: {
    resumes: {
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
  methods: {
    dateTime(value) {
      if (value) {
        return moment(value).format('DD MM Y');
      }
    },
  },
};
</script>
