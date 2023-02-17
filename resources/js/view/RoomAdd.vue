<template>
    <div>
        <h4>General Information</h4>
        <div class="input">
                <label>Name</label>
                <input
                    placeholder="Room name"
                >
            <label>Time</label>
            <input
                placeholder="Enter Time"
            >
            <select class="select">
                <option value="first">First Value</option>
                <option value="second" selected>Each day</option>
                <option value="third">Third Value</option>
            </select>
        </div>
    </div>
</template>

<script>
export default {
    name: 'RoomAdd',
}
</script>
<style lang="scss" scoped>

.input {
    //display: flex;
    display:inline-block;
    flex-direction: column;
    flex-grow: 1;

&-label {
     font-family: Karla, serif;
     font-size: 20px;
     font-weight: 400;
     line-height: 23px;
     letter-spacing: 0;
     text-align: left;

     margin-bottom: 4px;
 }
}

.select {
    flex-direction: column;
    font-family: Karla, serif;
    color: black;
    position: relative;

    label {
        font-size: 20px;
        font-weight: 400;
        line-height: 23px;
        letter-spacing: 0;
        text-align: left;
        margin-bottom: 4px;
    }

    select {
        width: 100%;
        height: 48px;
        border-radius: 0;
        background-color: inherit;
        border: 1px solid gray;
        cursor: pointer;
        padding: 10px 48px 14px 16px;
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 19px;
        overflow: hidden;
        outline:none;
        z-index: 1;
        appearance: none;


        option {
            border: 1px solid gray;
            padding: 14px 48px 14px 16px !important;
        }
    }

    svg {
        position: absolute;
        right: 0;
        bottom: 0;
    }
}


</style>
