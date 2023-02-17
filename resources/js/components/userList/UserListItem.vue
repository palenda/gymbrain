<template>
  <div class="user">
    <img
      v-if="user.image"
      class="img"
      src="{{ user.image }}"
      alt=""
    >
    <div
      v-else
      class="img"
    />
    <div class="user-info">
      <UserMainInfo
        :name="user.name"
        :last-name="user.last_name"
        :email="user.email"
        :department="user.department"
      />
      <UserSkillsInfo
        :skills="user.skills"
      />
      <UserLanguagesInfo
        :languages="user.languages"
      />
      <UserResumeListInfo
        :resumes="user.resumes"
      />
    </div>
  </div>
</template>

<script>
import UserMainInfo from './components/UserMainInfo';
import UserSkillsInfo from './components/UserSkillsInfo';
import UserLanguagesInfo from './components/UserLanguagesInfo';
import UserResumeListInfo from './components/UserResumeListInfo';

export default {
  name: 'UserListItem',
  components: {
    UserMainInfo,
    UserSkillsInfo,
    UserLanguagesInfo,
    UserResumeListInfo,
  },
  props: {
    user: {
      type: Object,
      required: true,
    },
  },
};
</script>
