<template>
  <div class="roomListContainer">
    <div class="container">
      <div class="card">
        <div class="card-header"><h1>Room</h1></div>
        <div class="card-body">LIST ROOM</div>


      </div>
    </div>
  </div>
</template>

<script>
import addRoomForm from "./addRoomForm.vue";
import listView from "./listViewRoom.vue";

export default {
  components: {
    addRoomForm,
    listView,
  },
};
</script>
