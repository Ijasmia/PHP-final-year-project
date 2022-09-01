document.getElementById("main_select").onchange = function(){
  
  let selector = document.getElementById("main_select");
  let value = selector[selector.selectedIndex].value;
  
    
  let nodeList = document.getElementById("sub_select").querySelectorAll("option");
  
  
   nodeList.forEach(function(option){
   
   if(option.classList.contains(value)){
      option.style.display="block";
    }else{
      option.style.display="none";
    }
    
  });  
}


 document.getElementById("loc_select").onchange = function(){
	  
	  let selector = document.getElementById("loc_select");
      let value = selector[selector.selectedIndex].value;
  
    
     let nodeList = document.getElementById("city_select").querySelectorAll("option");
      nodeList.forEach(function(option){
   
        if(option.classList.contains(value)){
        option.style.display="block";
      }else{
          option.style.display="none";
       }
    
      });  
}

document.getElementById("jobmain_select").onchange = function(){
  
  let selector = document.getElementById("jobmain_select");
  let value = selector[selector.selectedIndex].value;
  
    
  let nodeList = document.getElementById("jobsub_select").querySelectorAll("option");
  
  
   nodeList.forEach(function(option){
   
   if(option.classList.contains(value)){
      option.style.display="block";
    }else{
      option.style.display="none";
    }
    
  });  
}