<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-12 mt-3" v-for="user in users">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top h-100 w-50"
               :src="'http://openweathermap.org/img/w/'+user.weather.weather[0].icon+'.png'" alt="img">
          <div class="card-body">
            <h5 class="card-title">{{ user.name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ user.email }}</h6>
            <p class="card-text">Weather: {{ user.weather.weather[0].main }}
              <img>
            </p>
            <a href="#" class="card-link">Card link</a>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center mt-5" v-if="mainUrl !=null" v-intersection-observer="getUsers">
      <div class="spinner-border " v-show="spinner"></div>
    </div>

  </div>

</template>


<script setup lang="ts">
import {ref, onMounted} from "vue";
import axios from 'axios';
import {vIntersectionObserver} from '@vueuse/components'


let users = ref([]);
let mainUrl = ref('http://localhost?page=1');
let spinner = ref(true)
let allowLoad = ref(true);

function getUsers() {
  spinner.value = true;
  if (allowLoad.value && mainUrl.value !== null) {
    allowLoad.value = false
    axios.get(mainUrl.value).then((data) => {
      users.value = users.value.concat(data.data.data)
      mainUrl.value = data.data.links.next
      spinner.value = false;
      allowLoad.value = true;
    })
  }
}

onMounted(() => {
  getUsers();
})

</script>

<style scoped>
.spinner-border {
  margin-right: 20px;
}
</style>