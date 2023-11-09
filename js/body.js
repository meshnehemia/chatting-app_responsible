const height =window.innerHeight;
const width = window.innerWidth;
let chatperson ='';
const wbody = document.querySelector('.body');
const screen = document.querySelector('.iframe');
const person = document.getElementsByClassName('list');

wbody.style.height =height + 'px';
wbody.style.width =width + 'px';
for (let i = 0 ;i<person.length;i++){
    person[i].addEventListener('click', (e) => {
        e.preventDefault();
        for (let k = 0 ;k<person.length;k++){
            person[k].querySelector('.user').classList.remove('active');
        }
        chatperson =  person[i].querySelector('input[type="text"]').value;
        person[i].querySelector('.user').classList.add('active');
        if(width <= 695){
            window.location.assign('chatting.html');
        }else{
            person[i].querySelector('input[type="text"]').value;
            screen.setAttribute('src',"login.html");
        }
    });

}
