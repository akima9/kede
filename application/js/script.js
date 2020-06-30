$(document).ready(function(){

//글쓰기 버튼 클릭 Start
	$("#add-post").on("click",function(){
		self.location="/ci/Main/addPost";
	});
//End 글쓰기 버튼 클릭

//목록 버튼 클릭 Start
	$("#post-list").on("click",function(){
		self.location="/ci/Main/index";
	});
//End 목록 버튼 클릭

//취소 버튼 클릭 Start
	$("#cancel").on("click",function(){
		window.history.back();
	});
//End취소 버튼 클릭

//summernote Start
	$('#summernote').summernote({
		height: 500
	});
//End summernote

	
	$('.dupe-check-btn').on('click',function(){
		alert("중복확인 클릭");
	});

});
