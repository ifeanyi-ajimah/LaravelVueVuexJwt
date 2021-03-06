import Axios from "axios"

export function login(credentials){
    return new Promise((resolve, reject) => {
        axios.post('/api/auth/login', credentials)
        .then((response) =>{
            resolve(response.data);
        })
        .catch((error) =>{
            reject("wrong email or password");
        })
    })
}

//this will check if local user is stored in local storage
export function getLocalUser(){
    const userStr = localStorage.getItem("user");
    if(!userStr){
        return null;
    }
    return JSON.parse(userStr)
}








