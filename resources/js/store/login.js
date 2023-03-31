import axios from "axios"
import { Inertia } from '@inertiajs/inertia'
import { reject } from "lodash";
export default {
    state:{
        email:null,
        password:null,
    },
    actions:{
        loginUser({commit},payload){
            return new Promise((resolve,reject)=>{
                axios.post(route('loggedIn'),payload).then((result) => {
                    console.log("API"+result.data);
                    commit("setUser",result.data);
                    resolve(result.data);
                }).catch((err) => {
                    reject(err)
                });
            })
        },
        getUserAPI({commit}){
            return new Promise((resolve,reject)=>{
                axios.get(route('get-user')).then((result) => {
                    // console.log(result.data.email);
                    commit("setUser",{
                        email : result.data.email,
                        name : result.data.name,
                        password : "A124",
                    });
                    resolve(result.data);
                }).catch((err) => {
                    
                });
            })
        }
    },
    mutations:{
        setUser(state,payload){
            console.log("PAYLOAD "+payload);
            state.email = payload.email;
            state.password = payload.password ? payload.password : "hash10101010";
            state.name = payload.name;
        },
        getError(state,payload){

        }
    },
    getters:{
        getUser(state){
            return {
                state
            };
        }
    }
}