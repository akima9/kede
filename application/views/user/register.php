<div class="contents-wrapper inner">

	<h1 class="cate-title">회원가입</h1>

	<div class="register-form">
		<form action="register_form" method="post">
			<input type="text" class="user-id" name="user-id" placeholder="아이디" value="<?php echo set_value('user-id'); ?>">
			<?php echo form_error('user-id'); ?>
			<button type="button" class="dupe-check-btn">중복확인</button>
			<?php echo form_error('dupe-check'); ?>
			<input type="hidden" class="dupe-check" name="dupe-check" value="<?php echo set_value('dupe-check'); ?>">
			<input type="password" class="user-pw" name="user-pw" placeholder="비밀번호" value="<?php echo set_value('user-pw'); ?>">
			<?php echo form_error('user-pw'); ?>
			<input type="password" class="pw-conf" name="pw-conf" placeholder="비밀번호 재입력" value="<?php echo set_value('pw-conf'); ?>">
			<?php echo form_error('pw-conf'); ?>
			<input type="submit" class="register-submit" name="submit">
		</form>
	</div>

</div>