<template>
  <h5>{{ fullName }}</h5>
  <div class="user-info__general">
    <span>{{ email }}</span>
    <span>{{ departmentName }}</span>
  </div>
</template>

<script>
export default {
  name: 'UserMainInfo',
  props: {
    name: {
      type: String,
      default: '',
    },
    lastName: {
      type: String,
      default: '',
    },
    email: {
      type: String,
      default: '',
    },
    department: {
      type: Object,
      default() {
        return { name: '' };
      },
    },
  },
  data() {
    return {
      fullName: `${this.name  } ${  this.lastName}`,
      departmentName: this.department?.name ?? '',
    };
  },
};
</script>
