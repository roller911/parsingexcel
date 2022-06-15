/*window.onload=function(){
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
};*/
 function srzn(){
 var elems = document.getElementsByClassName('mark');
 var student = document.getElementsByClassName('student');
 var myl = elems.length;
  sum = 0;
  for(i=0;i<student.length;i++){
  	for(j=0; j<elems.length;j++){
    sum+= parseInt(document.getElementById('r'+i+'c'+j).value);
    //alert(sum);
      }
      document.getElementById('sr'+i).value=sum/4;
      sum=0;
  }
}