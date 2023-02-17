<template>
  <div class="instances">
    <div class="instances-header">
      <h4>Room Activity</h4>
    </div>
    <div class="instances-items">
      <div
        class="item"
      >
        <div class="item-title">
            <h5>PHP Skills</h5>
            <span>Show</span>
        </div>
        <div class="item-text">
          5 days left
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'ActiveRooms',
};
</script>

<style lang="scss" scoped>
.instances {
    display: flex;
    flex-direction: column;

    &-header {
        display: flex;
        flex-direction: row;

        .amount {
            font-family: 'Karla', sans-serif;
            font-size: 14px;
            font-weight: 300;
            line-height: 16px;
            letter-spacing: 0;
            text-align: left;

            margin-left: 16px;

            border: 1px solid #D9D9D9;
            border-radius: 100px;

            padding: 6px 14px;
        }
    }

    &-items {
        display: flex;
        flex-direction: column;

        margin-top: 8px;

        .item {
            display: flex;
            flex-direction: column;

            margin-top: 24px;

            &-title {
                display: flex;
                flex-direction: row;
                align-items: center;

                .origin {
                    background: #cffdbd;
                    padding: 3px 10px;
                    border-radius: 20px;
                    font-size: 12px;
                    margin-left: 10px;
                    margin-bottom: 20px;
                }

                span {
                    font-family: 'Karla', sans-serif;
                    font-size: 14px;
                    font-weight: 300;
                    line-height: 16px;
                    letter-spacing: 0;
                    text-align: left;

                    margin-left: 8px;

                    color: #6A5EFF;

                    cursor: pointer;
                }
            }

            &-text {
                font-family: 'Karla', sans-serif;
                font-size: 14px;
                font-weight: 300;
                line-height: 16px;
                letter-spacing: 0.05em;
                text-align: left;
            }
        }
    }
}

</style>
