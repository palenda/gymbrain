<template>
  <div class="profile">
    <div class="profile-info">
      <div class="img" />
        <div class="circle"></div>
      <div class="info">
        <h4>
            Polina Valenda
        </h4>
        <div class="email">
            palendasixx3@mail.ru
        </div>
      </div>
    </div>
    <form
      method="POST"
      action="/logout"
    >
      <input
        type="hidden"
        name="_token"
      >
      <button class="profile-logout">
        <svg
          width="16"
          height="16"
          viewBox="0 0 18 18"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M9 0C8.44771 0 8 0.447715 8 1V4C8 4.55228 8.44771 5 9 5C9.55229 5 10 4.55228 10 4V2H16V16H10V14C10 13.4477 9.55229 13 9 13C8.44771 13 8 13.4477 8 14V17C8 17.5523 8.44771 18 9 18H17C17.5523 18 18 17.5523 18 17V1C18 0.447715 17.5523 0 17 0H9ZM3.29289 5.29289C3.68342 4.90237 4.31658 4.90237 4.70711 5.29289C5.09763 5.68342 5.09763 6.31658 4.70711 6.70711L3.41421 8H13C13.5523 8 14 8.44772 14 9C14 9.55228 13.5523 10 13 10H3.41421L4.70711 11.2929C5.09763 11.6834 5.09763 12.3166 4.70711 12.7071C4.31658 13.0976 3.68342 13.0976 3.29289 12.7071L0.292894 9.70711C-0.0976312 9.31658 -0.0976312 8.68342 0.292894 8.29289L3.29289 5.29289Z"
            fill="#191B1D"
          />
        </svg>
      </button>
    </form>
  </div>
</template>

<script>
export default {
  name: 'Profile',
};
</script>

<style lang="scss" scoped>
.profile {
    display: flex;
    flex-direction: row;
    align-items: center;

    &-info {
        display: flex;
        flex-direction: row;
        align-items: center;

        flex-grow: 1;

        margin-right: 16px;

        .img {
            margin-right: 16px;
        }

        .info {
            display: flex;
            flex-direction: column;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;

            .email {
                font-family: Karla, serif;
                font-size: 14px;
                font-weight: 300;
                line-height: 16px;
                letter-spacing: 0.05em;
                text-align: left;
            }
        }
    }

    &-logout {
        width: 48px;
        height: 48px;

        background: #FFFFFF;
        border: 1px solid #D9D9D9;
        border-radius: 100px;

        position: relative;

        cursor: pointer;

        svg {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-right: -50%;
            transform: translate(-50%, -50%);
        }
    }
}

.circle {
    border-radius: 50%;
    width: 30px;
    padding: 30px;
    height: 30px;
    background: linear-gradient(137.36deg, #CA6363 -2.8%, #1D4EFF 139.54%);
}

</style>
