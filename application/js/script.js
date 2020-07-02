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

	// 중복확인 클릭 이벤트 : start
	$('.dupe-check-btn').on('click',function(){
		var user_id = $(".user-id").val();
		$.ajax({
			method : "post",
			url : "/ci/RestUserController/user_dupe_check",
			data : {"user_id" : user_id},
			dataType : "json"
		}).done(function(data){
			
			if(data.status == "dupe"){
				alert("이미 사용중인 아이디입니다.");
			}else{
				alert("사용하실 수 있는 아이디입니다.");
				$(".dupe-check").val(data.status);
			}
		}).fail(function(xhr, status, errorThrown){

		}).always(function(xhr, status){

		});
	});
	// 중복확인 클릭 이벤트 : end

	// 아이디 수정 시 중복확인 초기화 : start
	$(".user-id").on("change",function(){
		$(".dupe-check").val("");
	});
	// 아이디 수정 시 중복확인 초기화 : end

});
