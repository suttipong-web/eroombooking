import { createRouter , createWebHistory  } from 'vue-router'

import roomIndex from '../components/rooms/index.vue'

import notFound from '../components/notFound.vue'

import roomNew from '../components/rooms/addRoom.vue'


const routes= [
    {
        path:'/',
        component : roomIndex
    } ,
    {
        path:'/room/add',
        component:roomNew
    }    
    ,{
        path:'/:pathMatch(.*)*',
        component:notFound
    }
]

const router = createRouter ({
    history:createWebHistory(process.env.BASE_URL),
    routes,
})

export default router