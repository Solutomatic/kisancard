/* global $, alert, console */
$(document).ready(function(){
    'use strict';
    
   /* var x = 0,
        inptSkill = $('#input-skills');
    
    inptSkill.on('keyup',function(e){
        e.stopPropagation();
        if(e.which == 13){
            e.preventDefault();
            
            var curVal = inptSkill.val().trim();
            var found = false;
            for(var i = 0; i<x; i++){
                var str = $('.tag-span').eq(i).text().trim();
                if(str == curVal){
                    found=true;
                }
            }
            if(!found && curVal.length > 1){
                $('.tags').append('<span class="tag-span"><i class="fa fa-times"></i> '+curVal + '<input hidden type="text" value="'+curVal+'" name="skills[]"></span>');
                x++;
            }

            inptSkill.val('');
            
        }
    });
    
    $('.fa-plus-circle').click(function(){
        var curVal = inptSkill.val().trim();
        var found = false;
        for(var i = 0; i<x; i++){
            var str = $('.tag-span').eq(i).text().trim();
            if(str == curVal){
                found=true;
            }
        }
        if(!found && curVal.length > 1){
            $('.tags').append('<span class="tag-span"><i class="fa fa-times"></i> '+curVal + '<input hidden type="text" value="'+curVal+'" name="skills[]"></span>');
            x++;
        }
        
        inptSkill.val('');
    });
    
    // Remove Tag On Click
    
    $('.tags').on('click','.tag-span i',function(){
        $(this).parent('.tag-span').fadeOut(500).remove();
        x--;
        
    });
    */
    // Add education block
   // var i=1;
    $('#add-edu').on('click',function(){
		var i = $(this).attr("data-id");
       $('.all-edus').append('<div class="add-border"><span></span><h2>New education</h2><span></span></div><div class="new-edu"><label>School:</label><input type="text" name="edu['+i+'][school]" class="form-control" placeholder="Ex: al-albayt university">          <label>Degree:</label><input type="text" name="edu['+i+'][degree]" class="form-control" placeholder="Ex: Bachelor\'s"><div class="form-row"><div class="col">                   <label>From year:</label><input type="month" name="edu['+i+'][start]" class="form-control">              </div><div class="col"><label>To year (optional=present):</label>                                 <input type="month" name="edu['+i+'][end]" class="form-control"></div></div></div><label>Field of study:</label>                  <input type="text" name="edu['+i+'][studyfeild]" class="form-control" placeholder="Ex: Computer Science"><label>CGPA:</label>                  <input type="text" name="edu['+i+'][cgpa]" class="form-control" placeholder="Ex: 9.5">'); 
   i++; });
    
    
    // Add Experience block
   // var ex=1;
    $('#add-exp').on('click',function(){
		var ex = $(this).attr("data-id");
       $('.all-exps').append('<div class="add-border"><span></span><h2>New Experience</h2><span></span></div><div class="new-exp"><label>Job/Internship Title:</label><input type="text" name="exp['+ex+'][jobtitle]" class="form-control" placeholder="Ex: Design Engineer"><label>Company Name:</label>                      <input type="text" name="exp['+ex+'][company]" class="form-control" placeholder="Ex: Capabl"><label>City:</label>                      <input type="text" name="exp['+ex+'][city]" class="form-control" placeholder="Ex: Pune">              <div class="form-row"><div class="col"><label>From year:</label>                                 <input type="month" name="exp['+ex+'][start]" class="form-control"></div><div class="col">                     <label>To year (optional=present):</label><input type="month" name="exp['+ex+'][end]" class="form-control">  </div></div><label>Company Website (optional):</label>                      <input type="text" name="exp['+ex+'][companyweb]" class="form-control" placeholder="Ex: capabl.in"><label>Description (optional):</label><textarea name="exp['+ex+'][details]" class="form-control" placeholder="Suggestings : 6 months - 3 - 4 points 1 year more 4 - 5 points. "></textarea><label>Defined roles/Enter your own:</label><input type="text" name="exp['+ex+'][role]" class="form-control" placeholder=""/></div>');
   ex++; });
	
	 
    // Add Project block
   // var pr=1;
    $('#add-project').on('click',function(){
		var pr = $(this).attr("data-id");
       $('.all-projects').append('<div class="add-border"><span></span><h2>New Project</h2><span></span></div><div class="new-project"><label>Name:</label><input type="text" name="project['+pr+'][name]" class="form-control" placeholder="Ex: Design Engineer"><label>Domain:</label>                      <input type="text" name="project['+pr+'][domain]" class="form-control" placeholder="Ex: Capabl">              <div class="form-row"><div class="col"><label>From year:</label>                                 <input type="month" name="project['+pr+'][start]" class="form-control"></div><div class="col">                     <label>To year (optional=present):</label><input type="month" name="project['+pr+'][end]" class="form-control">  </div></div><label>Report Link/Documentation/Repositaty:</label>                      <input type="text" name="project['+pr+'][link]" class="form-control" placeholder="Ex: capabl.in/repo/1,pdf"><label>Details (optional):</label><textarea name="project['+pr+'][details]" class="form-control" placeholder="Add Important Points not more then 6"></textarea></div>');
   pr++; });
	
	 // Add Responsibility block
   // var res=1;
    $('#add-responsibility').on('click',function(){
	var res = $(this).attr("data-id");	
       $('.all-responsibilities').append('<div class="add-border"><span></span><h2>New Responsibility</h2><span></span></div><div class="new-responsibility"><label>Role:</label><input type="text" name="responsibility['+res+'][role]" class="form-control" placeholder="Ex: Design Engineer"><label>Event/Task/club:</label>                      <input type="text" name="responsibility['+res+'][task]" class="form-control" placeholder="Ex: Capabl">              <div class="form-row"><div class="col"><label>From year:</label>                                 <input type="month" name="responsibility['+res+'][start]" class="form-control"></div><div class="col">                     <label>To year (optional=present):</label><input type="month" name="responsibility['+res+'][end]" class="form-control">  </div></div><label>Details (optional):</label><textarea name="responsibility['+res+'][details]" class="form-control" placeholder="Add Important Points not more then 6"></textarea></div>');
  res++;  });
	
	 // Add Accomplishment block
   // var ac=1;
    $('#add-accomplishment').on('click',function(){
	var ac = $(this).attr("data-id");		
       $('.all-accomplishments').append('<div class="add-border"><span></span><h2>New Accomplishment</h2><span></span></div><div class="new-accomplishment"><label>Event/Task/club:</label><input type="text" name="accomplishment['+ac+'][task]" class="form-control" placeholder="Ex: Design Engineer"> <div class="form-row"><div class="col"><label>Date:</label>                                 <input type="month" name="accomplishment['+ac+'][date]" class="form-control"></div></div><label>Details:</label><textarea name="accomplishment['+ac+'][details]" class="form-control" placeholder="Bullet Points"></textarea></div>');
  ac++;  });
    
    // Add skills block
    
    $('.add-skills').on('click',function(){
        $('.all-skills').append('<div class="add-border"><span></span><h2>New Skill</h2><span></span></div><div class="new-skills"><label>Skill</label> <input type="text" name="skill" class="form-control">          <label>Proficiency</label><input type="text" name="skills['+ac+'][]" class="form-control"></div>');
        
    });

    // Add socials block
    
    $('.add-socials').on('click',function(){
        $('.all-socials').append('<div class="add-border"><span></span><h2>New social</h2><span></span></div><div class="new-socials"><label>Social Name</label> <input type="text" name="social" class="form-control">          <label>Social Link</label><input type="text" name="socials[]" class="form-control"> <label>Social icon image (16px*16px)</label><input type="file" name="socials[]" class="form-control" /></div>');
        
    });

    // Add socials block
    
    $('.add-hoppies').on('click',function(){
        $('.all-hoppies').append('<div class="add-border"><span></span><h2>New Hoppy</h2><span></span></div><div class="new-hoppies"> <label>Hoppy icon image (32px*32px)</label><input type="file" name="hoppies[]" class="form-control" /></div>');
        
    });
    
    
});