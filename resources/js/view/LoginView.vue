<template>
  <div class="container">
    <div class="cv-login-page">
      <img
        src="../../images/logo.png"
        alt=""
      >
      <form
        v-if="!user"
        method="POST"
        action="/login/google"
      >
        <div class="row mt-3">
          <div class="col-md-8 offset-md-4">
            <button
              type="submit"
              class="btn btn-danger"
            >
              <i class="fab fa-google-f fa-fw" />Auth with Google
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>

export default {
  name: 'LoginView',
  computed: {
    user: () => {
      return window.Laravel.user || null;
    },
  },

  mounted() {
    if (window.Laravel.user) {
      this.$router.push({
        name: '/',
      });
    }
  },
};
</script>

<style lang="scss" scoped>
.container {
    position: absolute;
    top: 50%;
    left: 50%;
    margin: 0 -50% 0 0;
    transform: translate(-50%, -50%);
    text-align: center;
    .cv-login-page {
        display: flex;
        flex-direction: column;
        gap: 30px;
        align-items: center;
        justify-content: center;
    }
    button {
        cursor: pointer;
        background: white;
        border: 1px solid #D9D9D9;
        padding: 14px 16px;
        font-size: 16px;
        font-weight: 400;
        line-height: 20px;
        letter-spacing: 0;
        text-align: left;
    }
}

</style>
