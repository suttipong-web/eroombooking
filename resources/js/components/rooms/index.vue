
<style>
@import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
body{
  font-family: "Kanit", sans-serif;
}
</style>

<template>
    <div>
      <div>
        <button type="button" class="btn btn-primary"  @click="newRoom"  >Add</button>

      </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">ห้อง</th>
                <th scope="col">รายละเอียก</th>
                <th scope="col">จัดการ</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
                
              <tr v-for="item in ListRoom " v-bind:key="item.id" >
                <th scope="row">{{ item.id }}</th>
                <td>{{ item.roomFullName}}</td>
                <td>{{ item.roomDetail}}</td>
                <td>
                  <button type="button" class="btn btn-primary">แก้ไข</button>
                  <button type="button" class="btn btn-danger">ลบ</button>

                </td>
              </tr>
           
            </tbody>
          </table>
    </div>
</template>

<script setup>
import axios from 'axios';
import { iteratee } from 'lodash';
import { onMounted,ref} from 'vue'
import { useRouter } from 'vue-router'

const router =  useRouter()

let ListRoom = ref([])
onMounted(async()=>{
  getRooms()
})
const newRoom = ()=> {
  router.push('/room/add')
}
const getRooms = async()=> {
  let response= await axios.get("/api/getAllRoom")
  ListRoom.value= response.data.ListRoom
  console.log('ListRoom',ListRoom.value)
}

</script>