<style>
@import url("https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
body {
  font-family: "Kanit", sans-serif;
  padding-top: 60px;
}
</style>

<template>
  <div class="container">
    <div class="addItem">
      <div class="card">
        <div class="card-header"><h1>จัดการข้อมูลห้อง</h1></div>
        <div class="card-body">
          <form class="row g-3" enctype="multipart/form-data" >
            <div class="col-6">
              <label for="roomtype" class="form-label">ประเภทห้อง</label>
              <select id="roomtype" class="form-select" v-model="form.roomTypeId">
                <!-- ต่อฐานข้อมูล  -->
                <option value="1">ห้องประชุม</option>
                <option value="2">ห้องเรียน</option>
                <option value="3">ห้องคอมพิวเตอร์</option>
              </select>
            </div>
            <div class="col-6">
              <label for="plance" class="form-label">สถานที่/อาคาร </label>
              <select id="plance" class="form-select" v-model="form.placeId">
                <!-- ต่อฐานข้อมูล  -->
                <option value="1">อาคาร 30 ปี</option>
                <option value="2">อาคาร Rtt</option>
              </select>
            </div>

            <div class="col-md-12">
              <label for="roomFullName" class="form-label">ชื่อห้อง</label>
              <input
                type="text"
                class="form-control"
                id="roomFullName"
                v-model="form.roomFullName"
                required
                placeholder=" ระบุชื่อห้อง | ห้องประชุม 3 ชั้น 7 "
              />
            </div>
            <div class="col-md-6">
              <label for="roomTitle" class="form-label">ชื่อย่อ</label>
              <input
                type="text"
                class="form-control"
                id="roomTitle"
                v-model="form.roomTitle"
                placeholder="ห้อง วสท. (*ถ้ามี)"
              />
            </div>
            <div class="col-md-6">
              <label for="roomSize" class="form-label">ขนาดห้อง</label>
              <input
                type="text"
                class="form-control"
                id="roomSize"
                v-model="form.roomSize"
                placeholder=" 20 ที่นั่ง "
              />
            </div>
            <div class="col-12">
              <label for="roomDetail" class="form-label">รายละเอียด/หมายเหตุ </label>
              <textarea
                class="form-control"
                placeholder="ระบุรายละเอียด ของห้อง "
                id="roomDetail"
                v-model="form.roomDetail"
              ></textarea>
            </div>
            <div class="col-12">
              <label for="thumbnail" class="form-label">ตัวอย่างห้อง</label>
              <input type="file" id="thumbnail" @change="updatePhoto" />

              <div>
                <img src="getPhoto()" class="img-thumbnail" alt="..." />
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="btn btn-primary" @click="saveData()">เพิ่มข้อมูลห้อง</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
import router from "../../router";

let form = ref({
  roomFullName: "",
  roomTypeId: "",
  placeId: "",
  roomTitle: "",
  roomSize: "",
  roomDetail: "",
  photo: "",
});

const getPhoto = () => {
  let photo = "/uoload/image.png";
  if (form.value.photo) {
    if (form.value.photo.indexOf("base64") != -1) {
      photo = form.value.photo;
    } else {
      photo = "/upload/" + form.value.photo;
    }
  }
  return photo;
};
//เลือกรูปภาพ
const updatePhoto = (e) => {
  let file = e.target.files[0];
  let reader = new FileReader();
  reader.onload = function(){
    callback(fileReader.result);
  } 
  reader.readAsDataURL(file);
 // form.value.photo =
};
//INSert
const saveData = async () => {
  const formData = new FormData();
 formData.append("roomFullName", form.value.roomFullName);
 formData.append("roomTitle", form.value.roomTitle);
 formData.append("roomTypeId", form.value.roomTypeId);
 formData.append("placeId", form.value.placeId);
 formData.append("roomSize", form.value.roomSize);
 formData.append("roomDetail", form.value.roomDetail);
 formData.append('thumbnail',form.value.photo)

  axios.post("/api/room/store", formData)
    .then((response) => {
         toast.fire({
            icon:"success",
            title: "Room add successfully"

        })
        router.push('/')
    })
    .catch((error) => {});
};
</script>
