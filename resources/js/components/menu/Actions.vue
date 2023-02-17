<template>
    <div class="statistics">
        <div
            class="statisticsText"
            type="text"
        >
            Statistics
        </div>
        <div
            class="number"
            type="text"
        >
            1
        </div>
        <div
            class="text"
            type="text"
        >
            rooms completed
        </div>
        <div
            class="rate"
            type="text"
        >
            With rating(4/5)
        </div>
    </div>
</template>

<script>

export default {
    name: 'Actions',
}
</script>

<style lang="scss" scoped>
.number {
    position: absolute;
    width: 20px;
    height: 60px;
    right: 495px;
    top: 230px;

    font-family: 'Sora';
    font-style: normal;
    font-weight: 300;
    font-size: 48px;
    line-height: 60px;
    letter-spacing: 0.05em;

    color: rgba(28, 29, 25, 0.8);
}
.statistics {
    display: flex;
    flex-wrap: wrap;
    align-content: flex-start;

    margin-top: 165px;
}
.text {
    position: absolute;
    width: 99px;
    height: 34px;
    right: 380px;
    top: 244px;

    font-family: 'Karla';
    font-style: normal;
    font-weight: 300;
    font-size: 16px;
    line-height: 107%;
    /* or 17px */


    color: #191B1D;
}

.rate {
    position: absolute;
    width: 123px;
    height: 19px;
    right: 380px;
    top: 300px;

    font-family: 'Karla';
    font-style: normal;
    font-weight: 300;
    font-size: 16px;
    line-height: 19px;

    color: #191B1D;
}

.statisticsText {
    position: absolute;
    width: 125px;
    height: 30px;
    right: 390px;
    top: 190px;

    font-family: 'Sora';
    font-style: normal;
    font-weight: 600;
    font-size: 24px;
    line-height: 30px;
    letter-spacing: 0.03em;

    color: #191B1D;
}
</style>
