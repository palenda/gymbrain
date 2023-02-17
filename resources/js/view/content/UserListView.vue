<template>
  <div>
    <h4>CVs List</h4>
    <Filter
      :skills="skills"
      :departments="departments"
    />
    <div class="users">
      <UserListItem
        v-for="user in users"
        :key="user.id"
        :user="user"
      />
    </div>
  </div>
</template>

<script>
import Filter from '../../components/Filter';
import UserListItem from '../../components/userList/UserListItem';

export default {
  name: 'UserListView',
  components: {
    UserListItem,
    Filter,
  },
  data() {
    return {
      skills: [],
      departments: [],
      users: [],
    };
  },
  mounted() {
    this.getSkills();
    this.getDepartments();
    this.getUsers();
  },
  methods: {
    getSkills() {
      this.axios.get('/api/v1/skills')
        .then(response => {
          this.skills = response.data.data;
        });
    },
    getDepartments() {
      this.axios.get('/api/v1/departments')
        .then(response => {
          this.departments = response.data.data;
        });
    },
    getUsers() {
      this.axios.get('/api/v1/users')
        .then(response => {
          this.users = response.data.data;
        });
    },
  },
};
</script>

<style lang="scss">

</style>
