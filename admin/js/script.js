$(document).ready(function(){
  $('#selectAllBoxses').click(function(event){ 
    if(this.checked){
     $('.checkBoxses').each(function(){
         this.checked = true;
     });   
        
    }else{
        $('.checkBoxes').each(function(){
         this.checked = false;
     }); 
    }
    
    });
});

