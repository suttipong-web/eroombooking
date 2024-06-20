<template>
    <div class="addItem">
            <input v-model="name" type="text" > 
      <div class="card">
        <div class="card-header"><h1>     Add Room </h1></div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                  <label for="roomFullName" class="form-label" >ชือห้อง</label>
                  <input type="text" class="form-control" id="roomFullName" v-model="item.roomFullName" >
                </div>          
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>  
        </div>
      </div>
    </div>
</template>

<script>
import axios from 'axios';
import Rooms from './rooms.vue';

export default {
    data:function() {
        return {
            item:{
                roomFullName:""
            }
        }
    },
    methods:{
        addItem(){
               if(this.roomFullName==''){
                return ;
               } 
               axios.post('api/room/store', {
                item : this.item
               })
               .then(
               
               )
        }
    }
}
</script>
<style scoped>

</style>