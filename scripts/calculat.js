function srzn(){
 var elems = document.getElementsByClassName('mark');
 var student = document.getElementsByClassName('student');
 var myl = elems.length;
 var stl = student.length;
  sum = 0;
  sum2=0;
  sum1=0;
  sum3=0;
  for(i=0;i<student.length;i++){
    for(j=0; j<elems.length;j++){

        if(document.getElementById('r'+i+'c'+j).value != ''){
    sum+= parseInt(document.getElementById('r'+i+'c'+j).value);
   
      }
  }
      document.getElementById('sr'+i).value= (sum / myl).toFixed(1);
      sum=0;
      
      sum3+=parseInt(document.getElementById('sr'+i).value);
      document.getElementById('srzngr').value=(sum3/stl).toFixed(1);
  }

  count=0;
  count5=0;
  count4=0;
  count3=0;
  count2=0;
  realizcount=0;
for(j=0; j<=elems.length;j++){
  for(i=0;i<student.length;i++){
     if(document.getElementById('r'+i+'c'+j).value != ''){
        cell = parseInt(document.getElementById('r'+i+'c'+j).value)
        sum+= cell;
    if(cell == 5){
      count5++;
    }if(cell == 4){
count4++;
    }if(cell == 3){
count3++;
    }if(cell == 2){
count2++;
    }if(cell == 3 || cell == 4 || cell == 5){
    realizcount++;
}if(cell == 4 || cell == 5){
    count++;
}
}
      }
      document.getElementById('srp'+j).value= (sum / stl).toFixed(1);
      document.getElementById('kol5'+j).value= count5;
      document.getElementById('kol4'+j).value= count4;
      document.getElementById('kol3'+j).value= count3;
      document.getElementById('kol2'+j).value= count2;
      document.getElementById('real'+j).value= (realizcount / stl * 100).toFixed(1) +'%';
      document.getElementById('kach'+j).value= (count / stl * 100).toFixed(1) +'%';
      sum=0;
      realizcount=0;
      count5=0;
      count4=0;
      count3=0;
      count2=0;
      count=0;

      sum1+=parseInt(document.getElementById('real'+j).value);
      document.getElementById('realgr').value=(sum1/stl).toFixed(1)+'%';
      sum2+=parseInt(document.getElementById('kach'+j).value);
      document.getElementById('kachgr').value=(sum2/stl).toFixed(1)+'%';
  }

  

}

function propusk(){
   
var student = document.getElementsByClassName('student');
pr=0;
pr_yv=0;
pr_neyv=0;
vsego = 0;
 for(i=0;i<student.length;i++){
      yv = parseInt(document.getElementById('yvpr'+i).value);
      neyv = parseInt(document.getElementById('neyvpr'+i).value);


      pr+= yv+neyv;
      pr_yv += yv;
      pr_neyv += parseInt(document.getElementById('neyvpr'+i).value);
    document.getElementById('pr_result'+i).value = pr;
    pr=0;

    vsego +=  parseInt(document.getElementById('pr_result'+i).value);

}
 document.getElementById('pr_yv').value = pr_yv;
 document.getElementById('pr_neyv').value = pr_neyv;
document.getElementById('vsego').value = vsego
}