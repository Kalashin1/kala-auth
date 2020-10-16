// connecting to our php script via ajax
let createUser, loginUser = (userObject) =>{
    return new Promise((resolve, reject)=>{
        let XHR = new XMLHttpRequest();
        XHR.open('POST', 'index.php', true);
        XHR.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        XHR.send(userObject);
        
        console.log(XHR);
        XHR.addEventListener('load', ()=>{
            if(XHR.status === 200){
                resolve(XHR.response)
            }
            else{
                reject(XHR.response)
            }
        })
    })
};

console.log(loginUser)

let onlineStatus = logout = (url)=>{
    return new Promise((resolve, reject)=>{
        let XHR = new XMLHttpRequest();
        XHR.open('GET', url);
        XHR.send();
        console.log(XHR);

        XHR.addEventListener('load', ()=>{
            if(XHR.status === 200){
                resolve(XHR.response)
            }
            else{
                reject(XHR.response)
            }
        })
    })
}


let signupForm = document.querySelector('#signupForm');

let loginForm = document.querySelector('#loginForm');

let onlineBtn = document.querySelector('#online');

let logoutBtn = document.querySelector('#logout');


signupForm.addEventListener('submit',(e)=>{
    e.preventDefault()
    let params = `name=${signupForm.name.value}&username=${signupForm.username.value}&email=${signupForm.email.value}&password=${signupForm.password.value}&submit=${signupForm.submit.value}`;          
    // console.log(params)
    createUser(params).then(response => {
        console.log(response)
    }).catch(err =>{
        console.log(err)
    })
});


loginForm.addEventListener('submit', (e)=>{
    e.preventDefault();
    let params = `username=${loginForm.username.value}&password=${loginForm.password.value}&login=${loginForm.login.value}`
    loginUser(params).then(response => {
        console.log(response)
    }).catch(err => {
        console.log(err)
    })
});

onlineBtn.addEventListener('click', (e)=>{
    e.preventDefault();
    onlineStatus('online.php').then(user => {
        console.log(user)
    }).catch(err => {
        console.log(err)
    })
})


logoutBtn.addEventListener('click', (e)=>{
    e.preventDefault();
    logout('logout.php').then(response => {
        console.log(response)
    }).catch(err => {
        console.log(err)
    })
})