window.onload=function(){
const input = document.getElementById('pr1').value;
const input2 = document.getElementById('pr2').value;
const log = document.getElementById('pr_result');
var sum = 0;


sum.addEventListener('input', updateValue);
alert(sum);

function updateValue(e) {
sum = input2+input;
log.textContent = e.target.value;
}
};