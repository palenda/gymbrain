<template>
    <div>
        <Profile />
        <hr>
        <Actions />
        <hr>
        <ActiveRooms/>
        <hr>
        <OwnedRooms/>
    </div>
</template>

<script>
import OwnedRooms from '../../components/menu/OwnedRooms';
import ActiveRooms from '../../components/menu/ActiveRooms';
import Profile from '../../components/menu/Profile';
import Actions from '../../components/menu/Actions';

export default {
    name: 'MenuProfileView',

    components: {
        OwnedRooms,
        ActiveRooms,
        Profile,
        Actions,
    },

    data() {
        return {
            // instancesUserId: window.Laravel.user.id,
        };
    },
};
</script>

<style scoped>

</style>
