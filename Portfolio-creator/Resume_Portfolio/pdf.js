
window.onload=function(){
	$('.download').on('click',function(e){
       let ids=$(this).siblings('div').attr('id');
       const resumedown=document.getElementById(ids);
       var opt = {
  		filename:'PortfolioCreator.pdf',
  		jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' },
       };
       html2pdf().from(resumedown).set(opt).save();
	});
};